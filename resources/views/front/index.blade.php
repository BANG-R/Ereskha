@extends('layouts.front')

@section('title', 'Ereskha - Fashion Muslim Wanita Modern & Elegan')

@section('content')

<section class="relative min-h-[85vh] lg:min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-soft-pink/30 to-secondary/5"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-secondary/10 rounded-full blur-3xl animate-float" style="animation-delay: 3s;"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-soft-pink/30 rounded-full blur-3xl animate-float" style="animation-delay: 1.5s;"></div>
    </div>

    <div class="absolute top-32 right-20 hidden lg:block">
        <div class="w-24 h-24 border-2 border-primary/20 rounded-full animate-pulse-soft"></div>
    </div>
    <div class="absolute bottom-32 left-20 hidden lg:block">
        <div class="w-16 h-16 border-2 border-secondary/20 rounded-lg rotate-45 animate-bounce-soft"></div>
    </div>

    <div class="absolute top-1/4 right-1/4 w-4 h-4 bg-primary/30 rounded-full animate-float" style="animation-delay: 0.5s;"></div>
    <div class="absolute top-1/3 left-1/4 w-3 h-3 bg-secondary/30 rounded-full animate-float" style="animation-delay: 2s;"></div>
    <div class="absolute bottom-1/4 right-1/3 w-5 h-5 bg-warm-gold/30 rounded-full animate-float" style="animation-delay: 4s;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left animate-fade-in-up">
                <div class="inline-flex items-center px-4 py-2 bg-primary/10 rounded-full mb-6">
                    <span class="w-2 h-2 bg-primary rounded-full mr-2 animate-pulse"></span>
                    <span class="text-primary font-medium text-sm">New Collection</span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-display font-bold leading-tight mb-6">
                    <span class="text-gray-800">Koleksi</span><br>
                    <span class="gradient-text">Muslimah</span><br>
                    <span class="text-gray-800">Elegan &</span>
                    <span class="text-primary"> Modern</span>
                </h1>

                <p class="text-gray-500 text-lg lg:text-xl mb-8 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                    Temukan koleksi fashion muslim premium yang memadukan keanggunan dan kenyamanan untuk setiap momen istimewa Anda.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#products" class="btn-primary inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-primary to-primary/80 text-white rounded-2xl font-semibold text-lg shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 hover:-translate-y-1 transition-all duration-300">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Lihat Koleksi
                    </a>
                    <a href="{{ route('about') }}" class="inline-flex items-center justify-center px-8 py-4 border-2 border-secondary/20 text-secondary rounded-2xl font-semibold text-lg hover:bg-secondary hover:text-white hover:border-secondary transition-all duration-300">
                        <i class="fas fa-play-circle mr-2"></i>
                        Tentang Kami
                    </a>
                </div>

                <div class="flex items-center gap-8 mt-12 justify-center lg:justify-start">
                    <div class="text-center">
                        <div class="text-2xl lg:text-3xl font-bold text-secondary">
                            {{ $totalProducts >= 1000 ? number_format($totalProducts / 1000, 1) . 'K+' : $totalProducts }}
                        </div>
                        <div class="text-gray-400 text-sm mt-1">Produk</div>
                    </div>

                    @if($totalCustomers > 0)
                        <div class="w-px h-12 bg-gray-200"></div>
                        <div class="text-center">
                            <div class="text-2xl lg:text-3xl font-bold text-secondary">
                                {{ $totalCustomers >= 1000 ? number_format($totalCustomers / 1000, 1) . 'K+' : $totalCustomers }}
                            </div>
                            <div class="text-gray-400 text-sm mt-1">Customer</div>
                        </div>
                    @endif

                    @if($averageRating > 0)
                        <div class="w-px h-12 bg-gray-200"></div>
                        <div class="text-center">
                            <div class="text-2xl lg:text-3xl font-bold text-secondary">
                                {{ number_format($averageRating, 1) }}
                            </div>
                            <div class="text-gray-400 text-sm mt-1">Rating</div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="relative hidden lg:flex justify-center items-center">
                <div class="relative w-96 h-96 xl:w-[480px] xl:h-[480px]">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-full animate-pulse-soft"></div>
                    <div class="absolute inset-4 bg-gradient-to-br from-soft-pink/50 to-primary/10 rounded-full"></div>
                    
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-32 h-32 mx-auto bg-gradient-to-br from-primary to-secondary rounded-3xl flex items-center justify-center shadow-2xl shadow-primary/30 transform rotate-6 animate-float">
                                <i class="fas fa-mosque text-white text-5xl"></i>
                            </div>
                            <p class="mt-6 text-secondary font-display font-semibold text-lg">Modest Fashion</p>
                            <p class="text-gray-400 text-sm">Premium Quality</p>
                        </div>
                    </div>

                    <div class="absolute top-8 right-8 bg-white rounded-2xl p-4 shadow-xl animate-bounce-soft">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-green-500 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm text-gray-800">Premium</p>
                                <p class="text-gray-400 text-xs">Quality</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-12 left-0 bg-white rounded-2xl p-4 shadow-xl animate-bounce-soft" style="animation-delay: 1s;">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <i class="fas fa-truck text-primary text-sm"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm text-gray-800">Free Ongkir</p>
                                <p class="text-gray-400 text-xs">Seluruh Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-gray-300 rounded-full flex justify-center">
            <div class="w-1.5 h-3 bg-gray-400 rounded-full mt-2 animate-pulse"></div>
        </div>
    </div>
</section>

<section class="py-8 bg-white border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="flex items-center justify-center space-x-3 py-4">
                <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-shipping-fast text-primary text-xl"></i>
                </div>
                <div>
                    <p class="font-semibold text-sm text-gray-800">Gratis Ongkir</p>
                    <p class="text-gray-400 text-xs">Min. Rp 200K</p>
                </div>
            </div>
            <div class="flex items-center justify-center space-x-3 py-4">
                <div class="w-12 h-12 bg-secondary/10 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-shield-alt text-secondary text-xl"></i>
                </div>
                <div>
                    <p class="font-semibold text-sm text-gray-800">100% Original</p>
                    <p class="text-gray-400 text-xs">Produk Asli</p>
                </div>
            </div>
            <div class="flex items-center justify-center space-x-3 py-4">
                <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-undo text-green-500 text-xl"></i>
                </div>
                <div>
                    <p class="font-semibold text-sm text-gray-800">Easy Return</p>
                    <p class="text-gray-400 text-xs">7 Hari Garansi</p>
                </div>
            </div>
            <div class="flex items-center justify-center space-x-3 py-4">
                <div class="w-12 h-12 bg-yellow-50 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-headset text-yellow-500 text-xl"></i>
                </div>
                <div>
                    <p class="font-semibold text-sm text-gray-800">CS 24/7</p>
                    <p class="text-gray-400 text-xs">Siap Membantu</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 reveal">
            <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Kategori</span>
            <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-800 mb-4">
                Jelajahi <span class="gradient-text">Koleksi Kami</span>
            </h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Temukan berbagai pilihan fashion muslim terbaik untuk setiap kebutuhan Anda</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">
            @foreach($categories as $category)
            <a href="{{ route('category.show', $category->slug) }}" class="category-card group">
                <div class="relative bg-white rounded-3xl p-6 lg:p-8 text-center border border-gray-100 hover:border-primary/20 transition-all duration-400">
                    <div class="w-20 h-20 lg:w-24 lg:h-24 mx-auto mb-5 rounded-full bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center group-hover:from-primary/20 group-hover:to-secondary/20 transition-all duration-300 overflow-hidden">
                        @if($category->image)
                            <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-full object-cover rounded-full">
                        @else
                            @php
                                $icons = ['Kerudung' => 'fa-hat-cowboy', 'Gamis' => 'fa-vest', 'Dress' => 'fa-shirt', 'Setelan' => 'fa-vest-patches'];
                                $icon = $icons[$category->name] ?? 'fa-tag';
                            @endphp
                            <i class="fas {{ $icon }} text-3xl lg:text-4xl text-primary/70 group-hover:text-primary transition-colors duration-300 group-hover:scale-110 transform"></i>
                        @endif
                    </div>
                    <h3 class="font-outfit font-semibold text-gray-800 text-lg mb-1 group-hover:text-primary transition-colors duration-300">{{ $category->name }}</h3>
                    <p class="text-gray-400 text-sm">{{ $category->products_count }} Produk</p>
                    
                    <div class="absolute top-4 right-4 w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 transform group-hover:translate-x-0 -translate-x-2">
                        <i class="fas fa-arrow-right text-primary text-xs"></i>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section id="products" class="py-16 lg:py-24 bg-gradient-to-b from-white to-bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-14 reveal">
            <div>
                <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Produk Terbaru</span>
                <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-800">
                    Koleksi <span class="gradient-text">Terbaru</span>
                </h2>
            </div>
            <a href="{{ route('search') }}?q=" class="mt-4 sm:mt-0 inline-flex items-center text-primary hover:text-primary/80 font-semibold transition-colors duration-300 group">
                Lihat Semua
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
            @foreach($products as $product)
            <div class="product-card bg-white rounded-2xl lg:rounded-3xl overflow-hidden border border-gray-100 group">
                <div class="relative aspect-square overflow-hidden bg-gray-50">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" 
                         class="product-img w-full h-full object-cover"
                         loading="lazy">
                    
                    @if($product->has_discount)
                    <div class="absolute top-3 left-3 badge-discount">
                        <span class="inline-flex items-center px-2.5 py-1 bg-primary text-white text-xs font-bold rounded-lg shadow-lg">
                            -{{ $product->discount_percent }}%
                        </span>
                    </div>
                    @endif

                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all duration-300 flex items-center justify-center">
                        <a href="{{ route('product.show', $product->slug) }}" 
                           class="opacity-0 group-hover:opacity-100 transform scale-75 group-hover:scale-100 transition-all duration-300 bg-white text-gray-800 px-5 py-2.5 rounded-xl font-medium text-sm shadow-xl hover:bg-primary hover:text-white">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </a>
                    </div>
                </div>

                <div class="p-4 lg:p-5 flex flex-col justify-between min-h-[120px]">
                    <div>
                        <span class="text-xs font-medium text-primary/70 uppercase tracking-wider">{{ $product->category->name ?? '' }}</span>
                        
                        <h3 class="font-outfit font-semibold text-gray-800 mt-1 mb-2 line-clamp-2 text-sm lg:text-base group-hover:text-primary transition-colors duration-300">
                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                    </div>
                    
                    <div class="flex items-center gap-2 flex-wrap mt-auto">
                        @if($product->has_discount)
                            <span class="text-primary font-bold text-lg">{{ $product->formatted_discount_price }}</span>
                            <span class="text-gray-400 text-sm line-through">{{ $product->formatted_price }}</span>
                        @else
                            <span class="text-primary font-bold text-lg">{{ $product->formatted_price }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal relative overflow-hidden rounded-3xl bg-gradient-to-r from-secondary via-secondary to-primary p-8 lg:p-16">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
            <div class="absolute top-1/2 right-1/4 w-32 h-32 bg-white/5 rounded-full"></div>

            <div class="relative grid lg:grid-cols-2 gap-8 items-center">
                <div class="text-white">
                    <span class="inline-flex items-center px-4 py-1.5 bg-white/20 rounded-full text-sm font-medium mb-6">
                        <i class="fas fa-fire mr-2"></i>Special Offer
                    </span>
                    <h2 class="text-3xl lg:text-5xl font-display font-bold mb-4 leading-tight">
                        Diskon Spesial<br>Hingga <span class="text-yellow-300">50%</span>
                    </h2>
                    <p class="text-white/80 text-lg mb-8 max-w-md">
                        Dapatkan koleksi fashion muslim premium dengan harga spesial. Promo terbatas!
                    </p>
                    <a href="#products" class="inline-flex items-center px-8 py-4 bg-white text-secondary rounded-2xl font-bold hover:bg-yellow-300 hover:text-secondary transition-all duration-300 shadow-xl hover:-translate-y-1">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Belanja Sekarang
                    </a>
                </div>

                <div class="hidden lg:flex justify-center">
                    <div class="relative">
                        <div class="w-64 h-64 bg-white/10 rounded-3xl flex items-center justify-center transform rotate-6 animate-float">
                            <div class="w-56 h-56 bg-white/10 rounded-3xl flex items-center justify-center transform -rotate-12">
                                <i class="fas fa-gift text-white/40 text-7xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 reveal">
            <span class="inline-block px-4 py-1.5 bg-secondary/10 text-secondary rounded-full text-sm font-medium mb-4">Mengapa Ereskha?</span>
            <h2 class="text-3xl lg:text-4xl font-display font-bold text-gray-800 mb-4">
                Kelebihan <span class="gradient-text">Berbelanja di Ereskha</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-8 rounded-3xl bg-gradient-to-b from-primary/5 to-transparent hover:from-primary/10 transition-all duration-500 group">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-primary to-primary/70 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary/20 group-hover:scale-110 transition-transform duration-300 transform rotate-3 group-hover:rotate-0">
                    <i class="fas fa-gem text-white text-2xl"></i>
                </div>
                <h3 class="font-outfit font-semibold text-xl text-gray-800 mb-3">Kualitas Premium</h3>
                <p class="text-gray-500 leading-relaxed">Setiap produk dibuat dengan material pilihan terbaik dan craftsmanship yang detail untuk kenyamanan Anda.</p>
            </div>

            <div class="text-center p-8 rounded-3xl bg-gradient-to-b from-secondary/5 to-transparent hover:from-secondary/10 transition-all duration-500 group">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-secondary to-secondary/70 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-secondary/20 group-hover:scale-110 transition-transform duration-300 transform -rotate-3 group-hover:rotate-0">
                    <i class="fas fa-leaf text-white text-2xl"></i>
                </div>
                <h3 class="font-outfit font-semibold text-xl text-gray-800 mb-3">Desain Eksklusif</h3>
                <p class="text-gray-500 leading-relaxed">Desain original yang tidak pasaran, terinspirasi dari tren fashion muslimah internasional.</p>
            </div>

            <div class="text-center p-8 rounded-3xl bg-gradient-to-b from-warm-gold/10 to-transparent hover:from-warm-gold/20 transition-all duration-500 group">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-warm-gold to-warm-gold/70 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-warm-gold/20 group-hover:scale-110 transition-transform duration-300 transform rotate-3 group-hover:rotate-0">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
                <h3 class="font-outfit font-semibold text-xl text-gray-800 mb-3">Harga Terjangkau</h3>
                <p class="text-gray-500 leading-relaxed">Kualitas premium tanpa harus merogoh kocek dalam. Harga bersahabat untuk semua kalangan.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 lg:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
        <div class="bg-gradient-to-br from-soft-pink/50 to-primary/5 rounded-3xl p-8 lg:p-14 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-secondary/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
            
            <div class="relative">
                <i class="fas fa-paper-plane text-primary/20 text-5xl mb-6"></i>
                <h2 class="text-2xl lg:text-3xl font-display font-bold text-gray-800 mb-4">Jangan Lewatkan Promo Terbaru!</h2>
                <p class="text-gray-500 mb-8 max-w-lg mx-auto">Hubungi kami via WhatsApp untuk mendapatkan update koleksi terbaru dan promo eksklusif.</p>
                <a href="https://wa.me/6281234567890?text=Halo%20Ereskha,%20saya%20ingin%20bertanya%20tentang%20produk" target="_blank"
                   class="inline-flex items-center px-8 py-4 bg-green-500 text-white rounded-2xl font-semibold hover:bg-green-600 transition-all duration-300 shadow-lg shadow-green-500/30 hover:-translate-y-1">
                    <i class="fab fa-whatsapp text-xl mr-2"></i>
                    Chat via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

@endsection