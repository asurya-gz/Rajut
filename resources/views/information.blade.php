<x-app-layout title="Layanan Informasi">
    <div class="bg-gradient-to-br from-pink-100 via-rose-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <span class="inline-flex items-center rounded-full bg-white/70 px-4 py-1 text-sm font-semibold text-pink-500 shadow-sm">
                        Layanan Informasi
                    </span>
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                        Pusat Bantuan & Informasi <span class="text-pink-500">LoopE</span>
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Temukan jawaban atas pertanyaan umum, proses pemesanan, dan layanan purna jual kami. Tim
                        LoopE siap membantu memastikan pengalaman berbelanja rajutan Anda nyaman dan menyenangkan.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#faq" class="inline-flex items-center gap-2 rounded-full bg-pink-500 px-6 py-3 text-white font-semibold shadow-lg transition hover:bg-pink-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.01 2.907-.176.035-.352.07-.53.102a1 1 0 00-.79.98v.011M12 19h.01" />
                            </svg>
                            Baca FAQ
                        </a>
                        <a href="#contact" class="inline-flex items-center gap-2 rounded-full border border-pink-300 bg-white/80 px-6 py-3 text-pink-600 font-semibold transition hover:border-pink-400 hover:bg-white">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -top-10 -left-8 h-36 w-36 rounded-full bg-pink-200/70 blur-3xl"></div>
                    <div class="absolute -bottom-10 -right-8 h-32 w-32 rounded-full bg-purple-200/70 blur-3xl"></div>
                    <div class="relative rounded-3xl bg-white/90 p-6 shadow-xl backdrop-blur">
                        <div class="grid gap-4">
                            <div class="rounded-2xl border border-pink-100 bg-pink-50/70 p-5">
                                <p class="text-sm font-semibold text-pink-500 uppercase tracking-wide">Jam Operasional</p>
                                <p class="mt-2 text-gray-700">Senin - Jumat: 09.00 - 18.00 WIB</p>
                                <p class="text-gray-700">Sabtu: 09.00 - 15.00 WIB</p>
                                <p class="text-sm text-gray-500 mt-2">Tetap hubungi kami melalui email di luar jam layanan, tim akan merespons secepatnya.</p>
                            </div>
                            <div class="rounded-2xl border border-pink-100 bg-white/80 p-5">
                                <p class="text-sm font-semibold text-pink-500 uppercase tracking-wide">Nomor Darurat Pemesanan</p>
                                <p class="mt-2 text-2xl font-bold text-pink-500">(+62) 812-3456-7890</p>
                                <p class="text-sm text-gray-500">WhatsApp tersedia setiap hari 24 jam untuk kebutuhan mendesak.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-16 bg-white" id="faq">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Pertanyaan Umum</h2>
                <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Berikut beberapa pertanyaan yang sering kami terima dari pelanggan. Semoga membantu Anda
                    mendapatkan informasi yang dibutuhkan dengan cepat.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                @php
                    $faqs = [
                        [
                            'question' => 'Bagaimana proses pemesanan produk di LoopE?',
                            'answer' => 'Pilih produk favorit Anda, tentukan jumlah, lalu klik "Tambah ke Keranjang". Setelah selesai, buka halaman keranjang untuk meninjau pesanan dan lanjut ke checkout. Anda dapat melakukan pembayaran melalui transfer bank atau e-wallet yang tersedia.'
                        ],
                        [
                            'question' => 'Apakah saya bisa request custom warna atau ukuran?',
                            'answer' => 'Tentu! Anda bisa menghubungi tim customer service kami melalui WhatsApp untuk konsultasi. Pengrajin kami akan memberikan estimasi waktu pengerjaan dan biaya tambahan jika diperlukan.'
                        ],
                        [
                            'question' => 'Berapa lama waktu pengiriman?',
                            'answer' => 'Produk ready stock akan diproses 1-2 hari kerja. Untuk produk pre-order atau custom, diperlukan waktu produksi 5-10 hari kerja tergantung kompleksitas desain.'
                        ],
                        [
                            'question' => 'Bagaimana kebijakan retur?',
                            'answer' => 'Kami menerima retur dalam 3 hari setelah barang diterima jika terdapat kerusakan atau kesalahan produksi. Hubungi kami dengan menyertakan foto produk dan nomor pesanan untuk proses retur.'
                        ],
                    ];
                @endphp

                @foreach ($faqs as $faq)
                    <div class="rounded-3xl border border-pink-100 bg-pink-50/60 p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-pink-600 mb-2">{{ $faq['question'] }}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $faq['answer'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-pink-200/40 via-rose-100/60 to-white py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Panduan Singkat</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Beberapa informasi tambahan tentang cara kami menangani pesanan, pembayaran, dan perawatan
                        produk rajutan LoopE.
                    </p>
                </div>
                <div class="lg:col-span-2 grid sm:grid-cols-2 gap-6">
                    <div class="rounded-3xl bg-white p-6 shadow-md border border-pink-100">
                        <h3 class="text-xl font-semibold text-pink-600 mb-3">Metode Pembayaran</h3>
                        <ul class="space-y-2 text-gray-600 text-sm">
                            <li>• Transfer Bank (BCA, BRI, Mandiri)</li>
                            <li>• E-Wallet (OVO, GoPay, Dana)</li>
                            <li>• Virtual Account otomatis</li>
                            <li>• Cicilan 0% untuk pesanan di atas Rp1.500.000</li>
                        </ul>
                    </div>
                    <div class="rounded-3xl bg-white p-6 shadow-md border border-pink-100">
                        <h3 class="text-xl font-semibold text-pink-600 mb-3">Status Pesanan</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Cek status pesanan Anda di halaman <a href="{{ route('orders.index') }}" class="text-pink-500 font-semibold hover:text-pink-600">Pesanan Saya</a>. Notifikasi juga dikirim melalui email atau WhatsApp ketika pesanan diproses dan dikirim.
                        </p>
                    </div>
                    <div class="rounded-3xl bg-white p-6 shadow-md border border-pink-100">
                        <h3 class="text-xl font-semibold text-pink-600 mb-3">Perawatan Produk</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Cucilah produk rajutan secara manual dengan air dingin dan deterjen lembut. Jemur di tempat teduh dan hindari pemerasan keras agar bentuk tetap terjaga.</p>
                    </div>
                    <div class="rounded-3xl bg-white p-6 shadow-md border border-pink-100">
                        <h3 class="text-xl font-semibold text-pink-600 mb-3">Layanan Pelanggan</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Tim kami siap membantu melalui email <a href="mailto:hello@loope.id" class="text-pink-500 font-semibold hover:text-pink-600">hello@loope.id</a> dan WhatsApp <span class="font-semibold text-pink-500">(+62) 812-3456-7890</span>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-16 bg-white" id="contact">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl bg-pink-50/80 border border-pink-100 shadow-lg p-10">
                <div class="flex flex-col items-center text-center space-y-6">
                    <h2 class="text-3xl font-bold text-gray-900">Butuh Bantuan Lebih Lanjut?</h2>
                    <p class="text-gray-600 leading-relaxed max-w-3xl">
                        Tim LoopE siap membantu melalui kanal layanan resmi berikut.
                    </p>
                    <div class="grid gap-6 w-full sm:grid-cols-3">
                        <div class="rounded-2xl bg-white/90 border border-pink-100 p-6 shadow-sm">
                            <p class="text-sm font-semibold text-pink-500 uppercase tracking-wide mb-2">Email</p>
                            <p class="text-gray-800 font-medium">hello@loope.id</p>
                        </div>
                        <div class="rounded-2xl bg-white/90 border border-pink-100 p-6 shadow-sm">
                            <p class="text-sm font-semibold text-pink-500 uppercase tracking-wide mb-2">WhatsApp</p>
                            <p class="text-gray-800 font-medium">(+62) 812-3456-7890</p>
                        </div>
                        <div class="rounded-2xl bg-white/90 border border-pink-100 p-6 shadow-sm">
                            <p class="text-sm font-semibold text-pink-500 uppercase tracking-wide mb-2">Alamat Studio</p>
                            <p class="text-gray-800 font-medium">Jl. Anyelir No.12, Bandung</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
