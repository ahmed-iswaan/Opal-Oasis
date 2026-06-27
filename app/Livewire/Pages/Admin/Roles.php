<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Roles')]
class Roles extends Component
{
    public bool $showForm = false;
    public ?string $editingId = null;

    public string $name = '';
    public array $selectedPermissions = [];

    protected function authorizeOrAbort(string $permission): void
    {
        abort_unless(auth()->user()?->can($permission), 403);
    }

    public function create(): void
    {
        $this->authorizeOrAbort('roles.create');

        $this->resetForm();
        $this->showForm = true;
    }

    public function edit(string $id): void
    {
        $this->authorizeOrAbort('roles.update');

        $role = Role::query()->findOrFail($id);

        $this->editingId = $role->id;
        $this->name = $role->name;
        $this->selectedPermissions = $role->permissions()->pluck('name')->all();

        $this->showForm = true;
    }

    public function save(): void
    {
        $this->editingId
            ? $this->authorizeOrAbort('roles.update')
            : $this->authorizeOrAbort('roles.create');

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')->ignore($this->editingId, 'id')],
            'selectedPermissions' => ['array'],
        ]);

        $role = $this->editingId
            ? Role::query()->findOrFail($this->editingId)
            : new Role();

        $role->name = $validated['name'];
        $role->guard_name = 'web';
        $role->save();

        // Capture previous permission set to detect removals.
        $before = $role->permissions()->pluck('name')->all();

        $role->syncPermissions($validated['selectedPermissions'] ?? []);

        $after = $role->permissions()->pluck('name')->all();
        $removed = array_values(array_diff($before, $after));

        // If a permission was removed from the role, users who have this role might still have it
        // assigned directly. Revoke those direct permissions to keep access aligned with roles.
        if (!empty($removed)) {
            User::query()
                ->whereHas('roles', fn ($q) => $q->where('id', $role->id))
                ->each(function (User $user) use ($removed) {
                    foreach ($removed as $permName) {
                        if ($user->hasDirectPermission($permName)) {
                            $user->revokePermissionTo($permName);
                        }
                    }
                });
        }

        $this->dispatch('notify', message: 'Role saved successfully.');
        $this->showForm = false;
        $this->resetForm();
    }

    public function delete(string $id): void
    {
        $this->authorizeOrAbort('roles.delete');

        $role = Role::query()->findOrFail($id);

        // Capture role name and its permission names BEFORE deleting.
        $roleName = $role->name;
        $rolePermissionNames = $role->permissions()->pluck('name')->all();

        // Detach this role from users.
        User::query()
            ->whereHas('roles', fn ($q) => $q->where('id', $role->id))
            ->each(function (User $user) use ($roleName, $rolePermissionNames) {
                // Remember what the user had directly.
                $direct = $user->getDirectPermissions()->pluck('name')->all();

                // Remove the deleted role.
                $user->removeRole($roleName);

                // Determine which permissions the user still has via remaining roles.
                $viaRolesAfter = $user->getPermissionsViaRoles()->pluck('name')->all();

                // Revoke direct permissions that were also in the deleted role,
                // but are not granted via any other remaining role.
                foreach ($rolePermissionNames as $permName) {
                    if (!in_array($permName, $direct, true)) {
                        continue;
                    }

                    if (!in_array($permName, $viaRolesAfter, true)) {
                        $user->revokePermissionTo($permName);
                    }
                }
            });

        $role->delete();

        $this->dispatch('notify', message: 'Role deleted.');
    }

    public function resetForm(): void
    {
        $this->editingId = null;
        $this->name = '';
        $this->selectedPermissions = [];
    }

    public function render()
    {
        $this->authorizeOrAbort('roles.view');

        return view('livewire.pages.admin.roles', [
            'roles' => Role::query()->orderBy('name')->get(),
            'permissions' => Permission::query()->orderBy('name')->get(),
        ]);
    }
}
