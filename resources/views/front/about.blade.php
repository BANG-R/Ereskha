@extends('layouts.front')

@section('title', 'Tentang Kami - Ereskha')

@section('content')

<section class="relative py-20 lg:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-secondary/5 via-soft-pink/20 to-primary/5"></div>
    <div class="absolute top-20 right-20 w-72 h-72 bg-primary/10 rounded-full blur-3xl animate-float"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
        <span class="inline-flex items-center px-4 py-1.5 bg-secondary/10 text-secondary rounded-full text-sm font-medium mb-6">
            <i class="fas fa-heart mr-2"></i>Our Story
        </span>
        <h1 class="text-4xl lg:text-6xl font-display font-bold text-gray-800 mb-6">{{ \App\Models\Setting::getValue('about_title') ?? 'Tentang Ereskha' }}</h1>
        <p class="text-gray-500 text-lg lg:text-xl max-w-3xl mx-auto">{{ \App\Models\Setting::getValue('about_subtitle') ?? 'Elegansi dalam Setiap Helai Kain' }}</p>
    </div>
</section>

<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="reveal">
                <div class="relative bg-gradient-to-br from-primary/20 to-secondary/20 rounded-3xl p-8 lg:p-12">
                    <div class="bg-white rounded-2xl p-8 shadow-xl text-center">
                        <div class="w-24 h-24 mx-auto bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <i class="fas fa-mosque text-white text-4xl"></i>
                        </div>
                        <h3 class="font-display text-2xl font-bold text-gray-800 mb-2">Ereskha</h3>
                        <p class="text-gray-400">Est. 2024</p>
                    </div>
                </div>
            </div>
            <div class="reveal">
                <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Cerita Kami</span>
                <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-800 mb-6">Perjalanan <span class="gradient-text">Ereskha</span></h2>
                <div class="space-y-4 text-gray-500 leading-relaxed whitespace-pre-line">
                    {{ \App\Models\Setting::getValue('about_content') ?? 'Ereskha lahir dari keinginan untuk menghadirkan busana muslimah yang tidak hanya syar\'i, namun juga elegan dan mengikuti perkembangan zaman.' }}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 reveal">
            <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-800">Nilai-Nilai <span class="gradient-text">Kami</span></h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 stagger-container">
            @foreach([
                ['icon' => 'fa-gem', 'color' => 'from-primary to-primary/70', 'title' => 'Kualitas', 'desc' => 'Material terbaik dengan standar produksi tinggi'],
                ['icon' => 'fa-palette', 'color' => 'from-secondary to-secondary/70', 'title' => 'Desain', 'desc' => 'Desain original modern yang tidak pasaran'],
                ['icon' => 'fa-hand-holding-heart', 'color' => 'from-warm-gold to-warm-gold/70', 'title' => 'Amanah', 'desc' => 'Jujur dan transparan dalam setiap transaksi'],
                ['icon' => 'fa-leaf', 'color' => 'from-green-500 to-green-400', 'title' => 'Berkelanjutan', 'desc' => 'Ramah lingkungan dalam proses produksi'],
            ] as $value)
            <div class="stagger-item bg-white rounded-3xl p-8 text-center border border-gray-100 hover:border-primary/20 hover:shadow-xl transition-all duration-500 group" style="opacity:0;transform:translateY(30px);">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br {{ $value['color'] }} rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas {{ $value['icon'] }} text-white text-xl"></i>
                </div>
                <h3 class="font-outfit font-semibold text-lg text-gray-800 mb-2">{{ $value['title'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $value['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
        <div class="bg-gradient-to-br from-secondary to-primary rounded-3xl p-8 lg:p-16 relative overflow-hidden text-white">
            <div class="absolute top-0 right-0 w-40 h-40 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <i class="fas fa-handshake text-white/20 text-5xl mb-6"></i>
            <h2 class="text-2xl lg:text-4xl font-display font-bold mb-4">Mari Berkolaborasi</h2>
            <p class="text-white/80 text-lg mb-8 max-w-xl mx-auto">Tertarik untuk menjadi reseller atau mitra bisnis?</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-white text-secondary rounded-2xl font-bold hover:bg-yellow-300 transition-all duration-300 shadow-xl hover:-translate-y-1">
                <i class="fas fa-envelope mr-2"></i>Hubungi Kami
            </a>
        </div>
    </div>
</section>

@endsection
