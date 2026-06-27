@php
    $title = '403 — Forbidden';
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head', ['title' => $title])
    </head>
    <body class="min-h-screen bg-white text-zinc-900 antialiased dark:bg-zinc-950 dark:text-zinc-100">
        <div class="relative isolate overflow-hidden">
            <!-- Background decorations -->
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
                <div class="absolute -top-24 left-1/2 h-72 w-[36rem] -translate-x-1/2 rounded-full bg-gradient-to-r from-indigo-200/60 via-fuchsia-200/60 to-rose-200/60 blur-3xl dark:from-indigo-500/15 dark:via-fuchsia-500/15 dark:to-rose-500/15"></div>
                <div class="absolute -bottom-32 right-[-6rem] h-72 w-72 rounded-full bg-gradient-to-tr from-indigo-200/60 to-sky-200/60 blur-3xl dark:from-indigo-500/10 dark:to-sky-500/10"></div>
                <div class="absolute -bottom-32 left-[-6rem] h-72 w-72 rounded-full bg-gradient-to-tr from-fuchsia-200/60 to-rose-200/60 blur-3xl dark:from-fuchsia-500/10 dark:to-rose-500/10"></div>
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(79,70,229,0.10),transparent_55%),radial-gradient(ellipse_at_bottom,rgba(236,72,153,0.08),transparent_55%)] dark:bg-[radial-gradient(ellipse_at_top,rgba(79,70,229,0.18),transparent_55%),radial-gradient(ellipse_at_bottom,rgba(236,72,153,0.12),transparent_55%)]"></div>
            </div>

            <div class="mx-auto flex min-h-screen max-w-6xl items-center justify-center px-6 py-16">
                <div class="w-full">
                    <div class="mx-auto grid max-w-4xl gap-8 rounded-[2rem] border border-zinc-200/70 bg-white/70 p-8 shadow-[0_20px_60px_-30px_rgba(2,6,23,0.35)] backdrop-blur-xl dark:border-zinc-800/70 dark:bg-zinc-950/60 md:grid-cols-2 md:items-center md:p-10">
                        <!-- Illustration -->
                        <div class="order-2 md:order-1">
                            <div class="mx-auto max-w-sm">
                                <div class="relative">
                                    <div class="absolute -inset-8 -z-10 rounded-full bg-gradient-to-tr from-indigo-200/60 to-fuchsia-200/60 blur-2xl dark:from-indigo-500/10 dark:to-fuchsia-500/10"></div>
                                    <svg viewBox="0 0 640 480" class="h-auto w-full drop-shadow-sm" role="img" aria-label="Forbidden">
                                        <defs>
                                            <linearGradient id="bg" x1="0" y1="0" x2="1" y2="1">
                                                <stop offset="0" stop-color="#EEF2FF" />
                                                <stop offset="1" stop-color="#FDF2F8" />
                                            </linearGradient>
                                            <linearGradient id="accent" x1="0" y1="0" x2="1" y2="1">
                                                <stop offset="0" stop-color="#4F46E5" />
                                                <stop offset="1" stop-color="#EC4899" />
                                            </linearGradient>
                                            <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                                                <feDropShadow dx="0" dy="14" stdDeviation="16" flood-color="#0F172A" flood-opacity="0.18" />
                                            </filter>
                                        </defs>

                                        <path d="M88 312c-32-84 18-180 111-220 97-41 236-29 319 44 79 69 102 184 37 259-66 78-220 111-334 92C142 469 112 375 88 312z" fill="url(#bg)" />

                                        <g filter="url(#shadow)">
                                            <rect x="160" y="120" rx="28" ry="28" width="320" height="240" fill="#FFFFFF" />
                                            <rect x="160" y="120" rx="28" ry="28" width="320" height="240" fill="none" stroke="#E5E7EB" />

                                            <rect x="286" y="212" rx="18" ry="18" width="68" height="86" fill="url(#accent)" />
                                            <path d="M303 212v-18c0-17 14-31 31-31s31 14 31 31v18" fill="none" stroke="#4F46E5" stroke-width="12" stroke-linecap="round" />
                                            <circle cx="320" cy="252" r="7" fill="#FFFFFF" />
                                            <path d="M320 259v15" stroke="#FFFFFF" stroke-width="6" stroke-linecap="round" />

                                            <line x1="200" y1="312" x2="440" y2="312" stroke="#E5E7EB" stroke-width="2" />
                                        </g>

                                        <g fill="#A5B4FC" opacity="0.9">
                                            <path d="M520 140l8 18 18 8-18 8-8 18-8-18-18-8 18-8 8-18z" />
                                            <path d="M120 176l6 14 14 6-14 6-6 14-6-14-14-6 14-6 6-14z" />
                                        </g>
                                    </svg>
                                </div>

                                <p class="mt-3 text-center text-xs font-medium tracking-wide text-zinc-500 dark:text-zinc-400">ACCESS RESTRICTED</p>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="order-1 md:order-2">
                            <div class="flex items-start gap-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-red-50 text-red-700 ring-1 ring-red-100 dark:bg-red-950/40 dark:text-red-300 dark:ring-red-900/50">
                                    <svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l6.518 11.59c.75 1.334-.213 2.99-1.742 2.99H3.48c-1.53 0-2.492-1.656-1.743-2.99l6.52-11.59zM10 13a1 1 0 011 1v.01a1 1 0 11-2 0V14a1 1 0 011-1zm0-6a1 1 0 00-1 1v3a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>

                                <div class="min-w-0 flex-1">
                                    <div class="inline-flex items-center gap-2">
                                        <span class="text-sm font-semibold text-red-700 dark:text-red-300">403</span>
                                        <span class="h-1 w-1 rounded-full bg-zinc-300 dark:bg-zinc-700"></span>
                                        <span class="text-sm font-medium text-zinc-600 dark:text-zinc-300">Forbidden</span>
                                    </div>

                                    <h1 class="mt-2 text-3xl font-semibold tracking-tight text-zinc-900 dark:text-zinc-100">
                                        Permission required
                                    </h1>
                                    <p class="mt-2 text-sm leading-6 text-zinc-600 dark:text-zinc-300">
                                        You’re signed in, but your account doesn’t have access to this page.
                                        Ask an administrator to grant the required permission.
                                    </p>

                                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center">
                                        <a
                                            href="{{ url()->previous() }}"
                                            class="inline-flex items-center justify-center rounded-xl border border-zinc-300/80 bg-white px-4 py-2 text-sm font-semibold text-zinc-700 shadow-sm hover:bg-zinc-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:border-zinc-700/80 dark:bg-zinc-950/40 dark:text-zinc-200 dark:hover:bg-zinc-900"
                                        >
                                            Go back
                                        </a>

                                        <form method="POST" action="{{ route('logout') }}" class="sm:ms-auto">
                                            @csrf
                                            <button
                                                type="submit"
                                                class="inline-flex w-full items-center justify-center rounded-xl border border-zinc-300/80 bg-white px-4 py-2 text-sm font-semibold text-zinc-700 shadow-sm hover:bg-zinc-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:border-zinc-700/80 dark:bg-zinc-950/40 dark:text-zinc-200 dark:hover:bg-zinc-900"
                                            >
                                                Log out
                                            </button>
                                        </form>
                                    </div>

                                    @if(app()->hasDebugModeEnabled())
                                        <div class="mt-6 rounded-2xl border border-zinc-200/80 bg-white/60 p-4 text-xs text-zinc-700 backdrop-blur dark:border-zinc-800/80 dark:bg-zinc-950/40 dark:text-zinc-300">
                                            <div class="flex items-center justify-between">
                                                <div class="font-semibold">Debug</div>
                                                <div class="text-[11px] text-zinc-500 dark:text-zinc-400">APP_DEBUG=true</div>
                                            </div>
                                            <div class="mt-2 grid gap-1">
                                                <div>Path: <span class="font-mono">{{ request()->path() }}</span></div>
                                                <div>URL: <span class="font-mono">{{ request()->fullUrl() }}</span></div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="mx-auto mt-6 max-w-xl text-center text-xs text-zinc-500 dark:text-zinc-400">
                        {{ config('app.name') }}
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
