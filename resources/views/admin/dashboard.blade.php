@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm font-medium">Total Produk</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalProducts }}</p>
            </div>
            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center">
                <i class="fas fa-box text-blue-500 text-xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-green-500 font-medium"><i class="fas fa-arrow-up mr-1"></i>{{ $activeProducts }} aktif</span>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm font-medium">Total Kategori</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalCategories }}</p>
            </div>
            <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center">
                <i class="fas fa-tags text-purple-500 text-xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-gray-400">Kategori tersedia</span>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm font-medium">Status</p>
                <p class="text-3xl font-bold text-green-500 mt-1">Online</p>
            </div>
            <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center">
                <i class="fas fa-globe text-green-500 text-xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-gray-400">Website berjalan normal</span>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <h3 class="font-outfit font-semibold text-gray-800 text-lg mb-4">Aksi Cepat</h3>
        <div class="grid grid-cols-2 gap-3">
            <a href="{{ route('admin.products.create') }}" class="flex items-center space-x-3 p-4 rounded-xl bg-blue-50 hover:bg-blue-100 transition-colors group">
                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-plus text-white"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Tambah Produk</span>
            </a>
            <a href="{{ route('admin.categories.create') }}" class="flex items-center space-x-3 p-4 rounded-xl bg-purple-50 hover:bg-purple-100 transition-colors group">
                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-plus text-white"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Tambah Kategori</span>
            </a>
            <a href="{{ route('admin.products.index') }}" class="flex items-center space-x-3 p-4 rounded-xl bg-green-50 hover:bg-green-100 transition-colors group">
                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-list text-white"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Kelola Produk</span>
            </a>
            <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 p-4 rounded-xl bg-orange-50 hover:bg-orange-100 transition-colors group">
                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-external-link-alt text-white"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Lihat Website</span>
            </a>
        </div>
    </div>

    <!-- Latest Products -->
    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-outfit font-semibold text-gray-800 text-lg">Produk Terbaru</h3>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-primary hover:underline">Lihat semua</a>
        </div>
        <div class="space-y-3">
            @forelse($latestProducts as $product)
            <div class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition-colors">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-xl object-cover bg-gray-100">
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-sm text-gray-800 truncate">{{ $product->name }}</p>
                    <p class="text-xs text-gray-400">{{ $product->category->name ?? '-' }}</p>
                </div>
                <span class="text-sm font-semibold text-primary whitespace-nowrap">{{ $product->formatted_price }}</span>
            </div>
            @empty
            <p class="text-gray-400 text-sm text-center py-4">Belum ada produk</p>
            @endforelse
        </div>
    </div>
</div>

@endsection
