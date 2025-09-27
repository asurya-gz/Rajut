<nav x-data="{ open: false }" class="bg-white shadow-sm border-b border-pink-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-6 py-4">
            <!-- Logo -->
            <div class="flex items-center shrink-0">
                <a href="{{ route('home') }}" class="text-3xl font-semibold tracking-wide text-pink-500">
                    L<span class="text-pink-400">oo</span>PE
                </a>
            </div>

            <!-- Search Bar -->
            <div class="hidden flex-1 max-w-2xl md:block">
                <div class="relative">
                    <input type="text" placeholder="Cari barangmu di sini" class="w-full rounded-full border border-pink-200 bg-pink-50/40 pl-5 pr-14 py-2.5 text-sm text-pink-900 placeholder:text-pink-300 focus:outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-100">
                    <button class="absolute right-1.5 top-1/2 -translate-y-1/2 transform flex h-9 w-9 items-center justify-center rounded-full bg-pink-400 text-white transition hover:bg-pink-500">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Right Section -->
            <div class="hidden items-center space-x-3 md:flex">
                <!-- Cart with counter -->
                <a href="{{ route('cart.index') }}" class="relative">
                    <div class="flex items-center space-x-2 rounded-full border border-pink-200 bg-pink-100/80 px-4 py-2 text-pink-700">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white/70 text-pink-500">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m1.6 8L5 5M7 13l-2-5m2 5l1.5 6h9.5M9 19.5a1.5 1.5 0 003 0M20 19.5a1.5 1.5 0 003 0"></path>
                            </svg>
                        </span>
                        <span class="text-sm font-medium">Keranjang Belanja</span>
                    </div>
                    <span class="absolute -top-2 -right-2 min-w-[20px] rounded-full bg-red-500 px-1.5 py-0.5 text-center text-xs font-semibold text-white shadow-sm">3</span>
                </a>

                <!-- Auth Buttons -->
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="rounded-full bg-pink-400 px-5 py-2 text-sm font-medium text-white transition hover:bg-pink-500">
                                {{ Auth::user()->name }}
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('orders.index')">
                                {{ __('Orders') }}
                            </x-dropdown-link>
                            @if(auth()->user()?->isAdmin())
                                <x-dropdown-link :href="route('admin.dashboard')">
                                    {{ __('Admin') }}
                                </x-dropdown-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('register') }}" class="rounded-full border border-pink-200 bg-pink-100/70 px-5 py-2 text-sm font-medium text-pink-600 transition hover:bg-pink-200">
                        Daftar
                    </a>
                    <a href="{{ route('login') }}" class="rounded-full border border-pink-400 px-5 py-2 text-sm font-medium text-pink-500 transition hover:bg-pink-50">
                        Masuk
                    </a>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Search Bar (tablet & below) -->
        <div class="md:hidden">
            <div class="relative pb-3">
                <input type="text" placeholder="Cari barangmu di sini" class="w-full rounded-full border border-pink-200 bg-pink-50/40 pl-4 pr-12 py-2 text-sm text-pink-900 placeholder:text-pink-300 focus:outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-100">
                <button class="absolute right-1 top-1/2 -translate-y-1/2 transform flex h-8 w-8 items-center justify-center rounded-full bg-pink-400 text-white transition hover:bg-pink-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Navigation Bar -->
    <div class="bg-[#c65b7c]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-10 py-3 text-white">
                <a href="#" class="text-sm font-semibold tracking-wide transition hover:text-pink-200">
                    Beranda
                </a>
                <a href="#" class="text-sm font-semibold tracking-wide transition hover:text-pink-200">
                    Pesanan
                </a>
                <a href="#" class="text-sm font-semibold tracking-wide transition hover:text-pink-200">
                    Layanan Informasi
                </a>
                <a href="#" class="text-sm font-semibold tracking-wide transition hover:text-pink-200">
                    Tentang Kami
                </a>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-200">
        <!-- Search Bar Mobile -->
        <div class="px-4 py-3">
            <div class="relative">
                <input type="text" placeholder="Cari barangmu di sini" class="w-full rounded-full border border-pink-200 bg-pink-50/40 px-4 py-2 pr-12 text-sm text-pink-900 placeholder:text-pink-300 focus:outline-none focus:border-pink-400 focus:ring-2 focus:ring-pink-100">
                <button class="absolute right-1 top-1/2 -translate-y-1/2 transform flex h-8 w-8 items-center justify-center rounded-full bg-pink-400 text-white transition hover:bg-pink-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="px-4 py-2 space-y-1">
            <a href="{{ route('home') }}" class="block rounded-md px-3 py-2 text-gray-700 transition hover:bg-pink-50 hover:text-pink-600">
                Beranda
            </a>
            <a href="{{ route('cart.index') }}" class="block rounded-md px-3 py-2 text-gray-700 transition hover:bg-pink-50 hover:text-pink-600">
                Keranjang Belanja
            </a>
            <a href="{{ route('orders.index') }}" class="block rounded-md px-3 py-2 text-gray-700 transition hover:bg-pink-50 hover:text-pink-600">
                Pesanan
            </a>
            <a href="#" class="block rounded-md px-3 py-2 text-gray-700 transition hover:bg-pink-50 hover:text-pink-600">
                Layanan Informasi
            </a>
            <a href="#" class="block rounded-md px-3 py-2 text-gray-700 transition hover:bg-pink-50 hover:text-pink-600">
                Tentang Kami
            </a>
            @if(auth()->user()?->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="block rounded-md px-3 py-2 text-gray-700 transition hover:bg-pink-50 hover:text-pink-600">
                    Admin
                </a>
            @endif
        </div>

        <!-- Auth Section -->
        <div class="px-4 py-3 border-t border-gray-200">
            @auth
                <div class="mb-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="space-y-1">
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-gray-700 hover:bg-pink-50 hover:text-pink-600 rounded-md">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 text-gray-700 hover:bg-pink-50 hover:text-pink-600 rounded-md">
                            Log Out
                        </button>
                    </form>
                </div>
            @else
                <div class="space-y-2">
                    <a href="{{ route('register') }}" class="block w-full rounded-full bg-pink-400 px-4 py-2 text-center text-sm font-medium text-white transition hover:bg-pink-500">
                        Daftar
                    </a>
                    <a href="{{ route('login') }}" class="block w-full rounded-full border border-pink-400 px-4 py-2 text-center text-sm font-medium text-pink-500 transition hover:bg-pink-50">
                        Masuk
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
