<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php($appName = config('app.name', 'LoopE'))
    <title>Masuk - {{ $appName }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/loading-utils.js') }}"></script>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-pink-100 via-pink-50 to-rose-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="text-center md:text-left space-y-6">
                <div class="inline-flex items-center text-pink-500 font-semibold text-lg">
                    <span>Welcome back to</span>
                </div>
                <div class="flex justify-center md:justify-start">
                    <img src="{{ asset('image/logo.png') }}" alt="LoopE" class="h-24 w-auto">
                </div>
                <p class="text-gray-600 leading-relaxed max-w-md">
                    Masuk untuk melanjutkan belanja dan nikmati kemudahan mengelola pesanan rajutan favorit Anda.
                </p>
            </div>

            <div class="bg-white/95 backdrop-blur-md rounded-3xl shadow-2xl p-8 md:p-10">
                <h2 class="text-2xl font-bold text-pink-600 mb-6 text-center">Masuk Akun</h2>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5" data-loading="Sedang masuk...">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-pink-500 mb-2">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                               class="w-full rounded-xl border border-pink-200 bg-pink-50/70 focus:border-pink-400 focus:ring focus:ring-pink-200/60">
                        @error('email')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-pink-500 mb-2">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required autocomplete="current-password"
                                   class="w-full rounded-xl border border-pink-200 bg-pink-50/70 focus:border-pink-400 focus:ring focus:ring-pink-200/60 pr-12">
                            <button type="button" onclick="togglePasswordVisibility('password')" 
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-pink-400 hover:text-pink-600">
                                <svg id="password-eye-open" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <svg id="password-eye-closed" class="h-5 w-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <button type="submit" id="login-button"
                            class="w-full mt-4 inline-flex justify-center rounded-full bg-pink-500 py-3 text-white font-semibold shadow-lg hover:bg-pink-600 transition disabled:opacity-70 disabled:cursor-not-allowed">
                        <span class="button-text">Masuk</span>
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-pink-500 font-semibold hover:text-pink-600">Daftar</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            const eyeOpen = document.getElementById(inputId + '-eye-open');
            const eyeClosed = document.getElementById(inputId + '-eye-closed');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
