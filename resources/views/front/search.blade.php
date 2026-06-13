@extends('layouts.front')

@section('title', 'Pencarian: ' . $query . ' - Ereskha')

@section('content')

<section class="py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10 reveal">
            <h1 class="text-2xl lg:text-3xl font-display font-bold text-gray-800 mb-2">
                @if($query)
                    Hasil pencarian: <span class="gradient-text">"{{ $query }}"</span>
                @else
                    Semua <span class="gradient-text">Produk</span>
                @endif
            </h1>
            <p class="text-gray-500">{{ $products->total() }} produk ditemukan</p>
        </div>

        @if($products->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6 stagger-container">
            @foreach($products as $product)
            <div class="stagger-item product-card bg-white rounded-2xl overflow-hidden border border-gray-100 group" style="opacity:0;transform:translateY(30px);">
                <div class="relative aspect-square overflow-hidden bg-gray-50">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-img w-full h-full object-cover" loading="lazy">
                    @if($product->has_discount)
                    <div class="absolute top-3 left-3 badge-discount">
                        <span class="inline-flex items-center px-2.5 py-1 bg-primary text-white text-xs font-bold rounded-lg">-{{ $product->discount_percent }}%</span>
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all duration-300 flex items-center justify-center">
                        <a href="{{ route('product.show', $product->slug) }}" class="opacity-0 group-hover:opacity-100 transform scale-75 group-hover:scale-100 transition-all duration-300 bg-white text-gray-800 px-5 py-2.5 rounded-xl font-medium text-sm shadow-xl hover:bg-primary hover:text-white">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </a>
                    </div>
                </div>
                <div class="p-4">
                    <span class="text-xs font-medium text-primary/70 uppercase tracking-wider">{{ $product->category->name ?? '' }}</span>
                    <h3 class="font-outfit font-semibold text-gray-800 mt-1 mb-2 line-clamp-2 text-sm group-hover:text-primary transition-colors">
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
        <div class="mt-12 flex justify-center">{{ $products->appends(['q' => $query])->links() }}</div>
        @else
        <div class="text-center py-20">
            <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                <i class="fas fa-search text-gray-300 text-4xl"></i>
            </div>
            <h3 class="text-xl font-outfit font-semibold text-gray-800 mb-2">Produk Tidak Ditemukan</h3>
            <p class="text-gray-500 mb-6">Coba gunakan kata kunci lain.</p>
            <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-xl font-medium hover:bg-primary/90 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Home
            </a>
        </div>
        @endif
    </div>
</section>

@endsection
