@extends('layouts.front')

@section('title', 'Kontak - Ereskha')

@section('content')

<section class="relative py-20 lg:py-28 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-soft-pink/20 to-secondary/5"></div>
    <div class="absolute top-20 left-20 w-64 h-64 bg-primary/10 rounded-full blur-3xl animate-float"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
        <span class="inline-flex items-center px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-6">
            <i class="fas fa-envelope mr-2"></i>Get in Touch
        </span>
        <h1 class="text-4xl lg:text-6xl font-display font-bold text-gray-800 mb-6">Hubungi <span class="gradient-text">Kami</span></h1>
        <p class="text-gray-500 text-lg max-w-2xl mx-auto">Kami siap membantu Anda. Jangan ragu untuk menghubungi kami kapan saja.</p>
    </div>
</section>

<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8 mb-16 stagger-container">
            @foreach([
                ['icon' => 'fa-map-marker-alt', 'color' => 'from-primary to-primary/70', 'title' => 'Alamat', 'detail' => \App\Models\Setting::getValue('contact_address') ?? 'Jl. Fashion Muslim No. 123, Jakarta Selatan, Indonesia', 'sub' => 'Toko Pusat'],
                ['icon' => 'fa-phone-alt', 'color' => 'from-secondary to-secondary/70', 'title' => 'Telepon', 'detail' => \App\Models\Setting::getValue('contact_phone') ?? '+62 812-3456-7890', 'sub' => 'Senin - Sabtu, 09:00 - 21:00'],
                ['icon' => 'fa-envelope', 'color' => 'from-warm-gold to-warm-gold/70', 'title' => 'Email', 'detail' => \App\Models\Setting::getValue('contact_email') ?? 'info@ereskha.com', 'sub' => 'Respon dalam 24 jam'],
            ] as $contact)
            <div class="stagger-item bg-white rounded-3xl p-8 text-center border border-gray-100 hover:border-primary/20 hover:shadow-xl transition-all duration-500 group" style="opacity:0;transform:translateY(30px);">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br {{ $contact['color'] }} rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas {{ $contact['icon'] }} text-white text-xl"></i>
                </div>
                <h3 class="font-outfit font-semibold text-lg text-gray-800 mb-1">{{ $contact['title'] }}</h3>
                <p class="text-gray-700 font-medium">{{ $contact['detail'] }}</p>
                <p class="text-gray-400 text-sm mt-1">{{ $contact['sub'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-start reveal">
            <!-- Social Media -->
            <div class="bg-white rounded-3xl p-8 lg:p-10 border border-gray-100">
                <h3 class="text-2xl font-display font-bold text-gray-800 mb-6">Ikuti Kami</h3>
                <p class="text-gray-500 mb-8">Follow media sosial kami untuk update koleksi terbaru dan promo menarik.</p>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ \App\Models\Setting::getValue('social_instagram', 'https://instagram.com/ereskha.id') }}" target="_blank" class="flex items-center space-x-3 p-4 rounded-2xl bg-gradient-to-r from-pink-50 to-purple-50 hover:from-pink-100 hover:to-purple-100 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-purple-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fab fa-instagram text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">Instagram</p>
                            <p class="text-gray-400 text-xs">@ereskha.id</p>
                        </div>
                    </a>
                    <a href="{{ \App\Models\Setting::getValue('social_facebook', 'https://facebook.com/ereskha.official') }}" target="_blank" class="flex items-center space-x-3 p-4 rounded-2xl bg-blue-50 hover:bg-blue-100 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fab fa-facebook-f text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">Facebook</p>
                            <p class="text-gray-400 text-xs">Ereskha Official</p>
                        </div>
                    </a>
                    <a href="{{ \App\Models\Setting::getValue('social_tiktok', 'https://tiktok.com/@ereskha.id') }}" target="_blank" class="flex items-center space-x-3 p-4 rounded-2xl bg-gray-50 hover:bg-gray-100 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-gray-800 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fab fa-tiktok text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">TikTok</p>
                            <p class="text-gray-400 text-xs">@ereskha.id</p>
                        </div>
                    </a>
                    <a href="{{ \App\Models\Setting::getValue('social_whatsapp', 'https://wa.me/6281234567890') }}" target="_blank" class="flex items-center space-x-3 p-4 rounded-2xl bg-green-50 hover:bg-green-100 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fab fa-whatsapp text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">WhatsApp</p>
                            <p class="text-gray-400 text-xs">Chat Langsung</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Map placeholder / Real Map -->
            <div class="bg-white rounded-3xl p-8 lg:p-10 border border-gray-100">
                <h3 class="text-2xl font-display font-bold text-gray-800 mb-6">Lokasi Kami</h3>
                <div class="bg-gradient-to-br from-gray-100 to-gray-50 rounded-2xl h-72 flex items-center justify-center overflow-hidden relative group">
                    @if(\App\Models\Setting::getValue('google_map_embed'))
                        <div class="w-full h-full [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:border-0">
                            {!! \App\Models\Setting::getValue('google_map_embed') !!}
                        </div>
                        @if(\App\Models\Setting::getValue('google_map_link'))
                        <a href="{{ \App\Models\Setting::getValue('google_map_link') }}" target="_blank" class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300 z-10 flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <span class="px-6 py-3 bg-white text-gray-800 rounded-xl font-medium shadow-lg flex items-center hover:scale-105 transition-transform">
                                <i class="fas fa-map-marker-alt text-primary mr-2"></i> Buka di Google Maps
                            </span>
                        </a>
                        @endif
                    @else
                        <div class="text-center">
                            <div class="w-16 h-16 mx-auto bg-primary/10 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-map-marked-alt text-primary text-2xl"></i>
                            </div>
                            <p class="text-gray-500 font-medium">Belum ada peta</p>
                            <p class="text-gray-400 text-sm">Silakan atur di menu Admin</p>
                        </div>
                    @endif
                </div>
                <div class="mt-6">
                    <a href="{{ \App\Models\Setting::getValue('social_whatsapp', 'https://wa.me/6281234567890') }}?text=Halo%20Ereskha,%20saya%20ingin%20berkunjung%20ke%20toko" target="_blank"
                       class="w-full inline-flex items-center justify-center px-6 py-4 bg-green-500 text-white rounded-2xl font-semibold hover:bg-green-600 transition-all duration-300 shadow-lg shadow-green-500/20">
                        <i class="fab fa-whatsapp text-xl mr-2"></i>Chat via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
