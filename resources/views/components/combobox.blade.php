@props([
    'model' => null,
    'placeholder' => 'Select...',
    'options' => [],
    'searchPlaceholder' => 'Search...',
])

@php
    // Normalize options: allow array of strings or array of ['value'=>..,'label'=>..]
    $normalized = collect($options)->map(function ($opt) {
        if (is_array($opt)) {
            return [
                'value' => $opt['value'] ?? ($opt['id'] ?? null),
                'label' => $opt['label'] ?? ($opt['name'] ?? ($opt['value'] ?? '')),
            ];
        }
        return ['value' => (string) $opt, 'label' => (string) $opt];
    })->values();
@endphp

<div
    x-data="{
        open: false,
        q: '',
        modelValue: @entangle($model),
        options: @js($normalized->all()),
        get selectedLabel() {
            const hit = this.options.find(o => String(o.value) === String(this.modelValue));
            return hit ? hit.label : '';
        },
        toggle() { this.open = !this.open; if (this.open) this.$nextTick(() => this.$refs.search?.focus()); },
        close() { this.open = false; this.q = ''; },
        pick(value) { this.modelValue = value; this.close(); },
    }"
    @click.outside="close()"
    class="relative"
>
    <button
        type="button"
        @click="toggle()"
        class="flex w-full items-center justify-between gap-3 rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10"
    >
        <span class="truncate" x-text="selectedLabel || @js($placeholder)"></span>
        <svg class="h-4 w-4 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.24 4.5a.75.75 0 01-1.08 0l-4.24-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
    </button>

    <div
        x-show="open"
        x-transition.origin.top
        class="absolute z-50 mt-2 w-full overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg"
        style="display: none"
    >
        <div class="border-b border-gray-100 p-2">
            <input
                x-ref="search"
                x-model="q"
                type="text"
                :placeholder="@js($searchPlaceholder)"
                class="w-full rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10"
            />
        </div>

        <div class="max-h-60 overflow-auto py-1">
            @foreach($normalized as $opt)
                <button
                    type="button"
                    @click="pick(@js($opt['value']))"
                    x-show="q === '' || '{{ strtolower($opt['label']) }}'.includes(q.toLowerCase())"
                    class="flex w-full items-center justify-between gap-3 px-3 py-2 text-left text-sm hover:bg-gray-50"
                >
                    <span class="truncate">{{ $opt['label'] }}</span>

                    <template x-if="String(modelValue) === String(@js($opt['value']))">
                        <svg class="h-4 w-4 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.704 5.29a1 1 0 010 1.42l-7.2 7.2a1 1 0 01-1.42 0l-3.2-3.2a1 1 0 011.42-1.42l2.49 2.49 6.49-6.49a1 1 0 011.42 0z" clip-rule="evenodd" />
                        </svg>
                    </template>
                </button>
            @endforeach
        </div>
    </div>
</div>
