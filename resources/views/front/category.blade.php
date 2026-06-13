@extends('layouts.front')

@section('title', 'Kategori: ' . $category->name . ' - Ereskha')

@section('content')

<!-- Category Header -->
<section class="relative py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-soft-pink/20 to-secondary/5"></div>
    <div class="absolute top-10 right-10 w-64 h-64 bg-primary/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-10 left-10 w-48 h-48 bg-secondary/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Breadcrumb -->
        <nav class="flex items-center justify-center space-x-2 text-sm mb-8">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-primary transition-colors"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right text-gray-300 text-xs"></i>
            <span class="text-gray-700 font-medium">{{ $category->name }}</span>
        </nav>

        <div class="animate-fade-in-up">
            <div class="w-20 h-20 mx-auto bg-gradient-to-br from-primary/10 to-secondary/10 rounded-full flex items-center justify-center mb-6">
                @if($category->image)
                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-full object-cover rounded-full">
                @else
                    <i class="fas fa-tag text-3xl text-primary/60"></i>
                @endif
            </div>
            <h1 class="text-3xl lg:text-5xl font-display font-bold text-gray-800 mb-4">{{ $category->name }}</h1>
            @if($category->description)
                <p class="text-gray-500 max-w-2xl mx-auto text-lg">{{ $category->description }}</p>
            @endif
            <p class="text-primary font-medium mt-4">{{ $products->total() }} Produk ditemukan</p>
        </div>
    </div>
</section>

<!-- Products Grid -->
<section class="py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($products->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6 stagger-container">
            @foreach($products as $product)
            <div class="stagger-item product-card bg-white rounded-2xl lg:rounded-3xl overflow-hidden border border-gray-100 group" style="opacity: 0; transform: translateY(30px);">
                <div class="relative aspect-square overflow-hidden bg-gray-50">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" 
                         class="product-img w-full h-full object-cover" loading="lazy">
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
                <div class="p-4 lg:p-5">
                    <span class="text-xs font-medium text-primary/70 uppercase tracking-wider">{{ $category->name }}</span>
                    <h3 class="font-outfit font-semibold text-gray-800 mt-1 mb-2 line-clamp-2 text-sm lg:text-base group-hover:text-primary transition-colors">
                        <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                    </h3>
                    <div class="flex items-center gap-2 flex-wrap">
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

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $products->links() }}
        </div>
        @else
        <div class="text-center py-20">
            <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                <i class="fas fa-box-open text-gray-300 text-4xl"></i>
            </div>
            <h3 class="text-xl font-outfit font-semibold text-gray-800 mb-2">Belum Ada Produk</h3>
            <p class="text-gray-500 mb-6">Produk untuk kategori ini akan segera hadir.</p>
            <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-xl font-medium hover:bg-primary/90 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Home
            </a>
        </div>
        @endif
    </div>
</section>

@endsection
