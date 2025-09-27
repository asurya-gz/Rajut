<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'UMKM Mini-Commerce') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @if (session('success'))
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-gradient-to-b from-rose-50 via-white to-white border-t border-rose-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="grid gap-10 lg:grid-cols-4 lg:gap-16">
                        <!-- Brand -->
                        <div class="space-y-4">
                            <div>
                                <h2 class="text-2xl font-semibold text-rose-600">LoopE</h2>
                                <p class="mt-2 text-sm text-gray-500">Koleksi rajutan premium yang dibuat dengan cinta untuk menemani setiap momen hangatmu.</p>
                            </div>
                            <div class="flex items-center space-x-4 text-gray-400">
                                <a href="#" class="p-2 rounded-full border border-gray-200 hover:border-rose-300 hover:text-rose-500 transition" aria-label="Instagram">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <rect x="3" y="3" width="18" height="18" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <circle cx="17.5" cy="6.5" r="1"></circle>
                                    </svg>
                                </a>
                                <a href="#" class="p-2 rounded-full border border-gray-200 hover:border-rose-300 hover:text-rose-500 transition" aria-label="LinkedIn">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3 8.75h3.96V21H3zM9.5 8.75H13v1.67h.05c.48-.9 1.64-1.85 3.38-1.85 3.61 0 4.28 2.27 4.28 5.22V21h-3.96v-5.16c0-1.23-.02-2.81-1.72-2.81-1.72 0-1.98 1.34-1.98 2.72V21H9.5z" />
                                    </svg>
                                </a>
                                <a href="#" class="p-2 rounded-full border border-gray-200 hover:border-rose-300 hover:text-rose-500 transition" aria-label="X">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4l16 16M20 4 4 20" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="space-y-3">
                            <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Produk</h3>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li><a href="#" class="hover:text-rose-500">Koleksi Unggulan</a></li>
                                <li><a href="#" class="hover:text-rose-500">Kerjasama Desainer</a></li>
                                <li><a href="#" class="hover:text-rose-500">Buat Custom</a></li>
                            </ul>
                        </div>

                        <div class="space-y-3">
                            <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Perusahaan</h3>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li><a href="#" class="hover:text-rose-500">Tentang LoopE</a></li>
                                <li><a href="#" class="hover:text-rose-500">Cerita Pelanggan</a></li>
                                <li><a href="#" class="hover:text-rose-500">Blog & Tips</a></li>
                            </ul>
                        </div>

                        <div class="space-y-3">
                            <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Dukungan</h3>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li><a href="#" class="hover:text-rose-500">Hubungi Kami</a></li>
                                <li><a href="#" class="hover:text-rose-500">Bantuan & FAQ</a></li>
                                <li><a href="#" class="hover:text-rose-500">Kebijakan</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-12 border-t border-rose-100 pt-6 text-sm text-gray-400">
                        <p class="text-center md:text-left">&copy; {{ date('Y') }} LoopE. Semua hak cipta dilindungi.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
