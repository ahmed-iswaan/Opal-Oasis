<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Users')]
class Users extends Component
{
    use WithPagination;

    public string $search = '';

    public bool $showForm = false;
    public bool $showDeleteModal = false;

    public ?string $editingId = null;
    public ?string $deletingId = null;

    public string $name = '';
    public string $email = '';
    public string $password = '';

    /**
     * Selected roles (multiple).
     *
     * @var array<int, string>
     */
    public array $roles = [];

    protected function authorizeOrAbort(string $permission): void
    {
        abort_unless(auth()->user()?->can($permission), 403);
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function create(): void
    {
        $this->authorizeOrAbort('users.create');

        $this->resetForm();
        $this->editingId = null;
        $this->showForm = true;
    }

    public function edit(string $id): void
    {
        $this->authorizeOrAbort('users.update');

        $user = User::query()->findOrFail($id);

        $this->editingId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
        $this->roles = $user->roles()->pluck('name')->values()->all();

        $this->showForm = true;
    }

    public function closeForm(): void
    {
        $this->showForm = false;
        $this->resetErrorBag();
    }

    public function save(): void
    {
        $this->editingId
            ? $this->authorizeOrAbort('users.update')
            : $this->authorizeOrAbort('users.create');

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->editingId, 'id'),
            ],
            'roles' => ['array'],
            'roles.*' => ['string', Rule::exists('roles', 'name')],
        ];

        if ($this->editingId === null) {
            $rules['password'] = ['required', 'string', 'min:8'];
        } elseif ($this->password !== '') {
            $rules['password'] = ['string', 'min:8'];
        }

        $validated = $this->validate($rules);

        $user = $this->editingId
            ? User::query()->findOrFail($this->editingId)
            : new User();

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (($validated['password'] ?? '') !== '') {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        $user->syncRoles($validated['roles'] ?? []);

        $this->dispatch('notify', message: 'User saved successfully.');
        $this->showForm = false;
        $this->resetForm();
    }

    public function confirmDelete(string $id): void
    {
        $this->authorizeOrAbort('users.delete');

        $this->deletingId = $id;
        $this->showDeleteModal = true;
    }

    public function closeDelete(): void
    {
        $this->showDeleteModal = false;
        $this->deletingId = null;
    }

    public function deleteConfirmed(): void
    {
        $this->authorizeOrAbort('users.delete');

        if (!$this->deletingId) {
            return;
        }

        $user = User::query()->findOrFail($this->deletingId);

        // Revoke all access granted via roles AND directly assigned permissions.
        $user->syncRoles([]);
        $user->syncPermissions([]);

        $this->closeDelete();
        $this->dispatch('notify', message: 'User access removed.');
    }

    /**
     * Get users query paginator (helper for delete paging).
     */
    protected function paginator()
    {
        return User::query()
            ->when($this->search !== '', function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
            })
            ->latest('created_at')
            ->paginate(10);
    }

    public function resetForm(): void
    {
        $this->editingId = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->roles = [];
    }

    public function render()
    {
        $this->authorizeOrAbort('users.view');

        $users = $this->paginator();

        return view('livewire.pages.admin.users', [
            'users' => $users,
            'availableRoles' => Role::query()->orderBy('name')->get(),
        ]);
    }
}
