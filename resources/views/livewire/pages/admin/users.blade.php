<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="space-y-1">
            <h1 class="text-2xl font-semibold tracking-tight text-gray-900">Users</h1>
            <p class="text-sm text-gray-600">Create and manage users, passwords, and roles.</p>
        </div>

        <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9 3a6 6 0 104.472 10.03l2.249 2.249a1 1 0 001.414-1.414l-2.25-2.25A6 6 0 009 3zm-4 6a4 4 0 118 0 4 4 0 01-8 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input
                    wire:model.live.debounce.300ms="search"
                    type="text"
                    placeholder="Search users"
                    class="w-full rounded-xl border border-gray-200 bg-white py-2.5 pl-10 pr-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 sm:w-80"
                />
            </div>

            @can('users.create')
                <button
                    wire:click="create"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                    </svg>
                    New user
                </button>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">Total users</div>
            <div class="mt-2 text-2xl font-semibold text-gray-900">{{ $users->total() }}</div>
        </div>
        <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">Showing</div>
            <div class="mt-2 text-2xl font-semibold text-gray-900">{{ $users->count() }}</div>
        </div>
        <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">Page</div>
            <div class="mt-2 text-2xl font-semibold text-gray-900">{{ $users->currentPage() }} / {{ $users->lastPage() }}</div>
        </div>
    </div>

    <div>
        <div class="px-1 py-2 sm:px-0">
            <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="text-sm font-semibold text-gray-900">Team members</div>
                    <div class="mt-1 text-xs text-gray-500">Manage users and roles.</div>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Last login</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($users as $user)
                        @php
                            $roleLabels = $user->roles->pluck('name')->values();
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gray-100 text-sm font-semibold text-gray-700">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>

                                    <div class="min-w-0">
                                        <div class="truncate text-sm font-semibold text-gray-900">{{ $user->name }}</div>
                                        <div class="truncate text-sm text-gray-600">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700">
                                @if($roleLabels->isEmpty())
                                    <span class="text-sm text-gray-500">—</span>
                                @else
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($roleLabels as $roleName)
                                            <span class="inline-flex items-center rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-inset ring-indigo-100">
                                                {{ $roleName }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-700">
                                @if($user->last_login_at)
                                    <div class="font-medium text-gray-900">{{ $user->last_login_at->diffForHumans() }}</div>
                                    <div class="text-xs text-gray-500">{{ $user->last_login_at->format('Y-m-d H:i') }}</div>
                                @else
                                    <span class="text-sm text-gray-500">Never</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    @can('users.update')
                                        <button
                                            wire:click="edit('{{ $user->id }}')"
                                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3 py-1.5 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50"
                                        >
                                            Edit
                                        </button>
                                    @endcan

                                    @can('users.delete')
                                        <button
                                            wire:click="confirmDelete('{{ $user->id }}')"
                                            class="inline-flex items-center justify-center rounded-lg bg-red-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-700"
                                        >
                                            Remove access
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center">
                                <div class="text-sm font-semibold text-gray-900">No users found</div>
                                <div class="mt-1 text-sm text-gray-600">Try adjusting your search or create a new user.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4">
            {{ $users->links() }}
        </div>
    </div>

    {{-- Create/Edit modal --}}
    @if($showForm)
        <div class="fixed inset-0 z-50">
            <div class="absolute inset-0 bg-gray-900/40" wire:click="closeForm"></div>

            <div class="absolute inset-0 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 sm:items-center">
                    <div class="w-full max-w-2xl rounded-2xl bg-white shadow-xl">
                        <div class="flex items-start justify-between gap-4 border-b border-gray-200 p-6">
                            <div>
                                <h2 class="text-base font-semibold text-gray-900">{{ $editingId ? 'Edit user' : 'Create user' }}</h2>
                                <p class="mt-1 text-sm text-gray-600">{{ $editingId ? 'Update user details and role.' : 'Set details, password, and role.' }}</p>
                            </div>
                            <button type="button" wire:click="closeForm" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700" aria-label="Close">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div class="p-6">
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Name</label>
                                    <input wire:model="name" type="text" placeholder="Full name"
                                        class="mt-1 block w-full rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10" />
                                    @error('name') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                                </div>

                                <div>
                                    <label class="text-sm font-medium text-gray-700">Email</label>
                                    <input wire:model="email" type="email" placeholder="name@example.com"
                                        class="mt-1 block w-full rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10" />
                                    @error('email') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                                </div>

                                <div>
                                    <label class="text-sm font-medium text-gray-700">Password</label>
                                    <p class="mt-1 text-xs text-gray-500">{{ $editingId ? 'Leave blank to keep the current password.' : 'Minimum 8 characters.' }}</p>
                                    <input wire:model="password" type="password" placeholder="••••••••"
                                        class="mt-2 block w-full rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10" />
                                    @error('password') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label class="text-sm font-medium text-gray-700">Roles</label>
                                    <p class="mt-1 text-xs text-gray-500">Users can have multiple roles.</p>

                                    <div class="mt-3 rounded-xl border border-gray-200 bg-gray-50 p-4">
                                        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
                                            @foreach($availableRoles as $availableRole)
                                                <label class="flex items-center gap-2 rounded-lg bg-white px-3 py-2 shadow-sm ring-1 ring-gray-100">
                                                    <input
                                                        type="checkbox"
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                        wire:model="roles"
                                                        value="{{ $availableRole->name }}"
                                                    />
                                                    <span class="text-sm font-medium text-gray-800">{{ $availableRole->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    @error('roles') <div class="mt-2 text-sm text-red-600">{{ $message }}</div> @enderror
                                    @error('roles.*') <div class="mt-2 text-sm text-red-600">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col-reverse gap-2 border-t border-gray-200 p-6 sm:flex-row sm:justify-end">
                            <button wire:click="closeForm" type="button" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50">
                                Cancel
                            </button>
                            <button wire:click="save" type="button" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Delete modal --}}
    @if($showDeleteModal)
        <div class="fixed inset-0 z-50">
            <div class="absolute inset-0 bg-gray-900/40" wire:click="closeDelete"></div>

            <div class="absolute inset-0 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 sm:items-center">
                    <div class="w-full max-w-md rounded-2xl bg-white shadow-xl">
                        <div class="p-6">
                            <div class="flex items-start gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-50 text-red-700">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l6.518 11.59c.75 1.334-.213 2.99-1.742 2.99H3.48c-1.53 0-2.492-1.656-1.743-2.99l6.52-11.59zM11 14a1 1 0 10-2 0 1 1 0 002 0zm-1-2a1 1 0 01-1-1V7a1 1 0 112 0v4a1 1 0 01-1 1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-base font-semibold text-gray-900">Remove access</h3>
                                    <p class="mt-1 text-sm text-gray-600">This will remove all roles and direct permissions from the user, but keep the account.</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col-reverse gap-2 border-t border-gray-200 p-6 sm:flex-row sm:justify-end">
                            <button wire:click="closeDelete" type="button" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50">
                                Cancel
                            </button>
                            <button wire:click="deleteConfirmed" type="button" class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700">
                                Remove access
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('livewire:init', () => {
            // notifications handled globally in resources/js/app.js via SweetAlert2
        });
    </script>
</div>
