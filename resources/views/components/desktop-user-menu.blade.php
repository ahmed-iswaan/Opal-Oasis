<div class="border-t border-zinc-200 pt-3 dark:border-zinc-700">
    <flux:dropdown position="top" align="start" class="w-full">
        <flux:sidebar.item
            as="button"
            class="group w-full rounded-xl px-3 py-5 transition hover:bg-zinc-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 dark:hover:bg-zinc-800"
        >
            <div class="flex w-full items-center gap-3">
                <flux:avatar
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    class="h-9 w-9"
                />

                <div class="min-w-0 flex-1 text-start">
                    <div class="truncate text-sm font-semibold text-zinc-900 dark:text-zinc-100">{{ auth()->user()->name }}</div>
                    <div class="truncate text-xs text-zinc-500 dark:text-zinc-400">{{ auth()->user()->email }}</div>
                </div>

                <flux:icon name="chevron-up-down" class="h-4 w-4 text-zinc-500 transition group-hover:text-zinc-700 dark:group-hover:text-zinc-200" />
            </div>
        </flux:sidebar.item>

        <flux:menu>
            <flux:menu.radio.group>
                <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                    {{ __('Settings') }}
                </flux:menu.item>
            </flux:menu.radio.group>

            <flux:menu.separator />

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <flux:menu.item
                    as="button"
                    type="submit"
                    icon="arrow-right-start-on-rectangle"
                    class="w-full cursor-pointer"
                    data-test="logout-button"
                >
                    {{ __('Log out') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</div>
