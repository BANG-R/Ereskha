@extends('layouts.admin')
@section('page-title', 'Kelola Produk')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
    <p class="text-gray-500">Total: {{ $products->count() }} produk</p>
    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center px-5 py-2.5 bg-sidebar text-white rounded-xl font-medium hover:bg-sidebar/90 transition-colors text-sm">
        <i class="fas fa-plus mr-2"></i>Tambah Produk
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-4 py-4 text-left font-semibold text-gray-600">#</th>
                    <th class="px-4 py-4 text-left font-semibold text-gray-600">Gambar</th>
                    <th class="px-4 py-4 text-left font-semibold text-gray-600">Nama Produk</th>
                    <th class="px-4 py-4 text-left font-semibold text-gray-600">Kategori</th>
                    <th class="px-4 py-4 text-right font-semibold text-gray-600">Harga</th>
                    <th class="px-4 py-4 text-center font-semibold text-gray-600">Status</th>
                    <th class="px-4 py-4 text-center font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($products as $index => $product)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-4 py-4 text-gray-500">{{ $index + 1 }}</td>
                    <td class="px-4 py-4">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-xl object-cover bg-gray-100">
                    </td>
                    <td class="px-4 py-4">
                        <p class="font-medium text-gray-800 truncate max-w-xs">{{ $product->name }}</p>
                        <p class="text-xs text-gray-400">{{ $product->slug }}</p>
                    </td>
                    <td class="px-4 py-4">
                        <span class="inline-flex items-center px-2.5 py-1 bg-purple-50 text-purple-600 rounded-lg text-xs font-medium">{{ $product->category->name ?? '-' }}</span>
                    </td>
                    <td class="px-4 py-4 text-right">
                        @if($product->has_discount)
                            <p class="font-semibold text-primary">{{ $product->formatted_discount_price }}</p>
                            <p class="text-xs text-gray-400 line-through">{{ $product->formatted_price }}</p>
                        @else
                            <p class="font-semibold text-gray-800">{{ $product->formatted_price }}</p>
                        @endif
                    </td>
                    <td class="px-4 py-4 text-center">
                        @if($product->is_active)
                            <span class="inline-flex items-center px-2.5 py-1 bg-green-50 text-green-600 rounded-lg text-xs font-medium">Aktif</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 bg-red-50 text-red-600 rounded-lg text-xs font-medium">Non-aktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ route('admin.products.edit', $product) }}" class="p-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition-colors" title="Edit">
                                <i class="fas fa-edit text-sm"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors" title="Hapus">
                                    <i class="fas fa-trash text-sm pointer-events-none"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="px-4 py-12 text-center text-gray-400">Belum ada produk</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
