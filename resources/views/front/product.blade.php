@extends('layouts.front')

@section('title', $product->name . ' - Ereskha')

@section('content')

<!-- Breadcrumb -->
<section class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-primary transition-colors duration-200">
                <i class="fas fa-home"></i>
            </a>
            <i class="fas fa-chevron-right text-gray-300 text-xs"></i>
            <a href="{{ route('category.show', $product->category->slug) }}" class="text-gray-400 hover:text-primary transition-colors duration-200">{{ $product->category->name }}</a>
            <i class="fas fa-chevron-right text-gray-300 text-xs"></i>
            <span class="text-gray-700 font-medium truncate max-w-xs">{{ $product->name }}</span>
        </nav>
    </div>
</section>

<!-- Product Detail -->
<section class="py-8 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-16">
            <!-- Product Image -->
            <div class="animate-fade-in">
                <div class="relative bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm group">
                    <!-- Discount Badge -->
                    @if($product->has_discount)
                    <div class="absolute top-4 left-4 z-10 badge-discount">
                        <span class="inline-flex items-center px-3 py-1.5 bg-primary text-white text-sm font-bold rounded-xl shadow-lg">
                            -{{ $product->discount_percent }}% OFF
                        </span>
                    </div>
                    @endif

                    <div class="aspect-square overflow-hidden">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                             id="mainImage">
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="animate-slide-in-right">
                <!-- Category badge -->
                <a href="{{ route('category.show', $product->category->slug) }}" 
                   class="inline-flex items-center px-3 py-1.5 bg-primary/10 text-primary rounded-lg text-sm font-medium hover:bg-primary/20 transition-colors duration-200 mb-4">
                    <i class="fas fa-tag mr-1.5 text-xs"></i>
                    {{ $product->category->name }}
                </a>

                <!-- Product Name -->
                <h1 class="text-2xl lg:text-4xl font-display font-bold text-gray-800 leading-tight mb-6">
                    {{ $product->name }}
                </h1>

                <!-- Price -->
                <div class="bg-gradient-to-r from-primary/5 to-transparent rounded-2xl p-6 mb-8">
                    @if($product->has_discount)
                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-gray-400 text-lg line-through">{{ $product->formatted_price }}</span>
                            <span class="inline-flex items-center px-2 py-0.5 bg-primary/10 text-primary text-sm font-bold rounded-lg">
                                -{{ $product->discount_percent }}%
                            </span>
                        </div>
                        <span class="text-primary font-bold text-3xl lg:text-4xl">{{ $product->formatted_discount_price }}</span>
                    @else
                        <span class="text-primary font-bold text-3xl lg:text-4xl">{{ $product->formatted_price }}</span>
                    @endif
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <h3 class="font-outfit font-semibold text-gray-800 text-lg mb-3">Deskripsi Produk</h3>
                    <div class="text-gray-500 leading-relaxed space-y-2">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>

                <!-- Features -->
                <div class="grid grid-cols-2 gap-3 mb-8">
                    <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-green-500"></i>
                        </div>
                        <span class="text-sm text-gray-600">Original 100%</span>
                    </div>
                    <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-truck text-blue-500"></i>
                        </div>
                        <span class="text-sm text-gray-600">Free Ongkir</span>
                    </div>
                    <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-undo text-purple-500"></i>
                        </div>
                        <span class="text-sm text-gray-600">Easy Return</span>
                    </div>
                    <div class="flex items-center space-x-3 bg-gray-50 rounded-xl p-3">
                        <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-shield-alt text-yellow-500"></i>
                        </div>
                        <span class="text-sm text-gray-600">Garansi 7 Hari</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ \App\Models\Setting::getValue('social_whatsapp', 'https://wa.me/6281234567890') }}?text={{ urlencode('Halo Ereskha, saya ingin order produk: ' . $product->name . ' (' . ($product->has_discount ? $product->formatted_discount_price : $product->formatted_price) . ')') }}" 
                       target="_blank"
                       class="btn-primary flex-1 inline-flex items-center justify-center px-8 py-4 bg-green-500 text-white rounded-2xl font-semibold text-lg shadow-lg shadow-green-500/30 hover:bg-green-600 hover:-translate-y-1 transition-all duration-300">
                        <i class="fab fa-whatsapp text-xl mr-2"></i>
                        Order via WhatsApp
                    </a>
                    <button onclick="shareProduct(event)" class="inline-flex items-center justify-center px-6 py-4 border-2 border-gray-200 text-gray-600 rounded-2xl font-semibold hover:border-primary hover:text-primary transition-all duration-300">
                        <i class="fas fa-share-alt mr-2"></i>
                        Share
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="py-16 bg-gradient-to-b from-bg-light to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal">
            <h2 class="text-2xl lg:text-3xl font-display font-bold text-gray-800">
                Produk <span class="gradient-text">Serupa</span>
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6 stagger-container">
            @foreach($relatedProducts as $related)
            <div class="stagger-item product-card bg-white rounded-2xl overflow-hidden border border-gray-100 group" style="opacity: 0; transform: translateY(30px);">
                <div class="relative aspect-square overflow-hidden bg-gray-50">
                    <img src="{{ $related->image_url }}" alt="{{ $related->name }}" 
                         class="product-img w-full h-full object-cover" loading="lazy">
                    @if($related->has_discount)
                    <div class="absolute top-3 left-3">
                        <span class="inline-flex items-center px-2 py-1 bg-primary text-white text-xs font-bold rounded-lg">
                            -{{ $related->discount_percent }}%
                        </span>
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all duration-300 flex items-center justify-center">
                        <a href="{{ route('product.show', $related->slug) }}" 
                           class="opacity-0 group-hover:opacity-100 transform scale-75 group-hover:scale-100 transition-all duration-300 bg-white text-gray-800 px-5 py-2.5 rounded-xl font-medium text-sm shadow-xl hover:bg-primary hover:text-white">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </a>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-outfit font-semibold text-gray-800 text-sm line-clamp-2 mb-2 group-hover:text-primary transition-colors">
                        <a href="{{ route('product.show', $related->slug) }}">{{ $related->name }}</a>
                    </h3>
                    <div class="flex items-center gap-2 flex-wrap">
                        @if($related->has_discount)
                            <span class="text-primary font-bold">{{ $related->formatted_discount_price }}</span>
                            <span class="text-gray-400 text-xs line-through">{{ $related->formatted_price }}</span>
                        @else
                            <span class="text-primary font-bold">{{ $related->formatted_price }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@section('scripts')
<script>
function shareProduct(event) {
    if (navigator.share) {
        navigator.share({
            title: '{{ $product->name }}',
            text: 'Cek produk elegan ini di Ereskha: {{ $product->name }}',
            url: window.location.href
        }).catch((error) => console.log('Error sharing:', error));
    } else {
        // Fallback untuk desktop/browser yang tidak support Web Share API
        navigator.clipboard.writeText(window.location.href).then(() => {
            const btn = event.currentTarget || event.target.closest('button');
            if (btn) {
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-check mr-2"></i> Link Disalin!';
                btn.classList.add('border-green-500', 'text-green-500');
                btn.classList.remove('border-gray-200', 'text-gray-600');
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.classList.remove('border-green-500', 'text-green-500');
                    btn.classList.add('border-gray-200', 'text-gray-600');
                }, 2000);
            } else {
                alert('Link produk berhasil disalin!');
            }
        });
    }
}
</script>
@endsection
