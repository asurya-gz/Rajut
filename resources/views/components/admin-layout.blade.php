@props(['title' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php($appName = config('app.name', 'EasyMart'))
    <title>{{ isset($title) && $title !== '' ? $title.' - '.$appName : 'Admin - '.$appName }}</title>

    <link rel="icon" href="{{ asset('image/logo.png') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/loading-utils.js') }}"></script>
</head>
<body class="font-sans antialiased bg-pink-100">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-pink-600 text-white fixed inset-y-0 left-0">
            <div class="p-6">
                <div class="mx-auto h-20 w-20 rounded-full bg-white flex items-center justify-center">
                    <img src="{{ asset('image/logo.png') }}" alt="{{ $appName }} logo" class="h-14 w-auto">
                </div>
            </div>

            <nav class="mt-8 h-full flex flex-col">
                <div class="px-4 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'flex items-center px-4 py-3 text-white bg-pink-700 rounded-lg' : 'flex items-center px-4 py-3 text-white hover:bg-pink-700 rounded-lg transition-colors duration-150' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'flex items-center px-4 py-3 text-white bg-pink-700 rounded-lg' : 'flex items-center px-4 py-3 text-white hover:bg-pink-700 rounded-lg transition-colors duration-150' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Product
                        <svg class="w-4 h-4 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>

                    <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'flex items-center px-4 py-3 text-white bg-pink-700 rounded-lg' : 'flex items-center px-4 py-3 text-white hover:bg-pink-700 rounded-lg transition-colors duration-150' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Transaction
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-pink-700 rounded-lg transition-colors duration-150">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Payment
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-pink-700 rounded-lg transition-colors duration-150">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Analytics
                    </a>
                </div>

                <div class="border-t border-pink-500 my-6 mx-4"></div>

                <div class="px-4 space-y-2">
                    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'flex items-center px-4 py-3 text-white bg-pink-700 rounded-lg' : 'flex items-center px-4 py-3 text-white hover:bg-pink-700 rounded-lg transition-colors duration-150' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        User Management
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-pink-700 rounded-lg transition-colors duration-150">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35.995-.241 1.493-1.295 1.066-2.573-.94-1.543.826-3.31 2.37-2.37.667.406 1.527.445 2.162.1.631-.344 1.093-.998 1.093-1.732z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Settings
                    </a>

                    <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-pink-700 rounded-lg transition-colors duration-150">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Help & Support
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="pt-2">
                        @csrf
                        <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-full bg-white/10 px-4 py-3 text-sm font-semibold text-white transition hover:bg-white/20">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1" />
                            </svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <div class="flex-1 ml-64 flex flex-col min-h-screen">
            <header class="bg-white shadow-sm border-b border-gray-200 flex-shrink-0">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex-1 max-w-lg">
                        <div class="relative">
                            <input type="text" placeholder="Cari..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        @php($recentActivities = collect(is_callable($recentActivities ?? null) ? $recentActivities() : ($recentActivities ?? [])))
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" @keydown.escape.window="open = false" type="button"
                                    class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-pink-100 bg-white text-pink-500 shadow-sm transition hover:border-pink-300 hover:text-pink-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.243 5.757A6 6 0 006 11v1.586l-.707.707A1 1 0 006 15h12a1 1 0 00.707-1.707L18 12.586V11a6 6 0 00-3.757-5.485" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 19a2 2 0 11-4 0" />
                                </svg>
                                @if($recentActivities->isNotEmpty())
                                    <span class="absolute -top-1 -right-1 h-3 w-3 rounded-full bg-pink-500"></span>
                                @endif
                            </button>

                            <div x-cloak x-show="open" x-transition.origin.top.right
                                 @click.outside="open = false"
                                 class="absolute right-0 z-50 mt-3 w-80 origin-top-right rounded-2xl border border-pink-100 bg-white shadow-xl shadow-pink-100/60">
                                <div class="flex items-center justify-between border-b border-pink-50 px-4 py-3">
                                    <p class="text-sm font-semibold text-gray-900">Aktivitas Terbaru</p>
                                    <button @click="open = false" class="text-xs font-medium text-pink-500 hover:text-pink-600">Tutup</button>
                                </div>

                                <div class="max-h-80 overflow-y-auto">
                                    @forelse($recentActivities as $activity)
                                        <div class="flex items-start gap-3 px-4 py-3 text-sm hover:bg-pink-50/70">
                                            <span class="mt-1 inline-flex h-8 w-8 items-center justify-center rounded-full bg-pink-100 text-pink-600">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2" />
                                                </svg>
                                            </span>
                                            <div class="flex-1">
                                                <p class="text-gray-900 font-semibold">
                                                    Pesanan #{{ $activity->id }} • {{ ucfirst($activity->status) }}
                                                </p>
                                                <p class="text-xs text-gray-500">
                                                    {{ optional($activity->user)->name ?? 'Pelanggan' }} ·
                                                    {{ $activity->created_at?->diffForHumans() }}
                                                </p>
                                                <p class="mt-1 text-xs font-medium text-pink-500">Total: Rp {{ number_format($activity->total, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="px-4 py-6 text-center text-sm text-gray-500">
                                            Belum ada aktivitas terbaru.
                                        </div>
                                    @endforelse
                                </div>

                                <div class="border-t border-pink-50 px-4 py-2 text-center text-[11px] uppercase tracking-wide text-pink-300">
                                    Aktivitas berdasarkan pesanan terbaru
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="h-8 w-8 bg-pink-500 rounded-full flex items-center justify-center">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="text-sm">
                                <p class="font-medium text-gray-900">{{ Auth::user()->name ?? 'Admin User' }}</p>
                                <p class="text-gray-500">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 space-y-6">
                @include('components.alert')

                @isset($header)
                    <div class="mb-2">
                        {{ $header }}
                    </div>
                @elseif(isset($title) && $title !== '')
                    <div class="mb-2">
                        <h1 class="text-2xl font-bold text-gray-900">{{ $title }}</h1>
                    </div>
                @endisset

                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')
    @stack('scripts')
</body>
</html>
