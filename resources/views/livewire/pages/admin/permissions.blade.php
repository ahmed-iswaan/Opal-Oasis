<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="space-y-1">
            <h1 class="text-2xl font-semibold tracking-tight text-gray-900">Permissions</h1>
            <p class="text-sm text-gray-600">Manage permissions for access control.</p>
        </div>

        @can('permissions.create')
            <button
                wire:click="create"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                </svg>
                New permission
            </button>
        @endcan
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">Total permissions</div>
            <div class="mt-2 text-2xl font-semibold text-gray-900">{{ $permissions->count() }}</div>
        </div>
        <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">Guard</div>
            <div class="mt-2 text-2xl font-semibold text-gray-900">web</div>
        </div>
        <div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">Tip</div>
            <div class="mt-2 text-sm font-semibold text-gray-900">Use clear, scoped names like <span class="font-mono">users.view</span></div>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Name</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($permissions as $perm)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $perm->name }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="inline-flex items-center gap-2">
                                @can('permissions.update')
                                    <button wire:click="edit('{{ $perm->id }}')" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3 py-1.5 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50">Edit</button>
                                @endcan
                                @can('permissions.delete')
                                    <button wire:click="delete('{{ $perm->id }}')" onclick="return confirm('Delete this permission?')" class="inline-flex items-center justify-center rounded-lg bg-red-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-700">Delete</button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Create/Edit modal --}}
    @if($showForm)
        <div class="fixed inset-0 z-50">
            <div class="absolute inset-0 bg-gray-900/40" wire:click="$set('showForm', false)"></div>

            <div class="absolute inset-0 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 sm:items-center">
                    <div class="w-full max-w-xl rounded-2xl bg-white shadow-xl">
                        <div class="flex items-start justify-between gap-4 border-b border-gray-200 p-6">
                            <div>
                                <h2 class="text-base font-semibold text-gray-900">{{ $editingId ? 'Edit permission' : 'Create permission' }}</h2>
                                <p class="mt-1 text-sm text-gray-600">Set the permission name.</p>
                            </div>
                            <button type="button" wire:click="$set('showForm', false)" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700" aria-label="Close">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div class="p-6">
                            <label class="text-sm font-medium text-gray-700">Name</label>
                            <input
                                wire:model="name"
                                type="text"
                                placeholder="permissions.view"
                                class="mt-1 block w-full rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10"
                            />
                            @error('name') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                        </div>

                        <div class="flex flex-col-reverse gap-2 border-t border-gray-200 p-6 sm:flex-row sm:justify-end">
                            <button wire:click="$set('showForm', false)" type="button" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50">
                                Cancel
                            </button>

                            @if($editingId)
                                @can('permissions.update')
                                    <button wire:click="save" type="button" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        Save
                                    </button>
                                @endcan
                            @else
                                @can('permissions.create')
                                    <button wire:click="save" type="button" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        Save
                                    </button>
                                @endcan
                            @endif
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
