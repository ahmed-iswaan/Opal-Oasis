<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Permission;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Permissions')]
class Permissions extends Component
{
    public bool $showForm = false;
    public ?string $editingId = null;

    public string $name = '';

    protected function authorizeOrAbort(string $permission): void
    {
        abort_unless(auth()->user()?->can($permission), 403);
    }

    public function create(): void
    {
        $this->authorizeOrAbort('permissions.create');

        $this->resetForm();
        $this->showForm = true;
    }

    public function edit(string $id): void
    {
        $this->authorizeOrAbort('permissions.update');

        $perm = Permission::query()->findOrFail($id);

        $this->editingId = $perm->id;
        $this->name = $perm->name;

        $this->showForm = true;
    }

    public function save(): void
    {
        $this->editingId
            ? $this->authorizeOrAbort('permissions.update')
            : $this->authorizeOrAbort('permissions.create');

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('permissions', 'name')->ignore($this->editingId, 'id')],
        ]);

        $perm = $this->editingId
            ? Permission::query()->findOrFail($this->editingId)
            : new Permission();

        $perm->name = $validated['name'];
        $perm->guard_name = 'web';
        $perm->save();

        $this->dispatch('notify', message: 'Permission saved successfully.');
        $this->showForm = false;
        $this->resetForm();
    }

    public function delete(string $id): void
    {
        $this->authorizeOrAbort('permissions.delete');

        $perm = Permission::query()->findOrFail($id);
        $perm->delete();

        $this->dispatch('notify', message: 'Permission deleted.');
    }

    public function resetForm(): void
    {
        $this->editingId = null;
        $this->name = '';
    }

    public function render()
    {
        $this->authorizeOrAbort('permissions.view');

        return view('livewire.pages.admin.permissions', [
            'permissions' => Permission::query()->orderBy('name')->get(),
        ]);
    }
}
