@extends('layouts.admin')
@section('page-title', 'Kelola Kategori')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
    <p class="text-gray-500">Total: {{ $categories->count() }} kategori</p>
    <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-5 py-2.5 bg-sidebar text-white rounded-xl font-medium hover:bg-sidebar/90 transition-colors text-sm">
        <i class="fas fa-plus mr-2"></i>Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">#</th>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Gambar</th>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Nama</th>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Slug</th>
                    <th class="px-6 py-4 text-center font-semibold text-gray-600">Produk</th>
                    <th class="px-6 py-4 text-center font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($categories as $index => $category)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 text-gray-500">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">
                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-12 h-12 rounded-xl object-cover bg-gray-100">
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $category->name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $category->slug }}</td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-medium">{{ $category->products_count }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="p-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition-colors" title="Edit">
                                <i class="fas fa-edit text-sm"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
                <tr><td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada kategori</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
