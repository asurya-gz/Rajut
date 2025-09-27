<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Daftar</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-pink-100 via-pink-50 to-rose-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="text-center md:text-left space-y-6">
                <div class="inline-flex items-center text-pink-500 font-semibold text-lg">
                    <span>Welcome to</span>
                </div>
                <div class="text-6xl font-bold text-pink-600 tracking-wide">
                    LOOP<span class="text-pink-400">E</span>
                </div>
                <p class="text-gray-600 leading-relaxed max-w-md">
                    Bergabunglah dengan komunitas pecinta rajutan kami dan temukan berbagai koleksi produk handmade terbaik.
                </p>
            </div>

            <div class="bg-white/95 backdrop-blur-md rounded-3xl shadow-2xl p-8 md:p-10">
                <h2 class="text-2xl font-bold text-pink-600 mb-6 text-center">Daftar Akun</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-semibold text-pink-500 mb-2">Nama</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                               class="w-full rounded-xl border border-pink-200 bg-pink-50/70 focus:border-pink-400 focus:ring focus:ring-pink-200/60">
                        @error('name')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-pink-500 mb-2">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                               class="w-full rounded-xl border border-pink-200 bg-pink-50/70 focus:border-pink-400 focus:ring focus:ring-pink-200/60">
                        @error('email')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold text-pink-500 mb-2">Nomor Handphone</label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone') }}" required autocomplete="tel"
                               class="w-full rounded-xl border border-pink-200 bg-pink-50/70 focus:border-pink-400 focus:ring focus:ring-pink-200/60">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-pink-500 mb-2">Password</label>
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                               class="w-full rounded-xl border border-pink-200 bg-pink-50/70 focus:border-pink-400 focus:ring focus:ring-pink-200/60">
                        @error('password')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-pink-500 mb-2">Konfirmasi Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                               class="w-full rounded-xl border border-pink-200 bg-pink-50/70 focus:border-pink-400 focus:ring focus:ring-pink-200/60">
                    </div>

                    <button type="submit"
                            class="w-full mt-4 inline-flex justify-center rounded-full bg-pink-500 py-3 text-white font-semibold shadow-lg hover:bg-pink-600 transition">
                        Daftar
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-pink-500 font-semibold hover:text-pink-600">Masuk</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
