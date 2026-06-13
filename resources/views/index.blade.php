@extends('layouts.admin')

@section('title', 'Pengaturan Tampilan Utama')
@section('page-title', 'Pengaturan Tampilan')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="p-6 lg:p-8">
        @csrf
        @method('PUT')

        <div class="space-y-8">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Logo & Identitas</h3>
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Logo Website</label>
                        @if(isset($settings) && isset($settings['site_logo']) && $settings['site_logo'])
                            <div class="mb-3 bg-gray-100 p-4 rounded-xl inline-block">
                                <img src="{{ asset($settings['site_logo']) }}" alt="Site Logo" class="h-16 w-auto object-contain">
                            </div>
                        @else
                            <div class="mb-3 bg-gray-100 p-4 rounded-xl inline-block">
                                <img src="{{ asset('images/logo.png') }}" alt="Default Logo" class="h-16 w-auto object-contain">
                            </div>
                        @endif
                        <input type="file" name="site_logo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-all">
                        <p class="text-xs text-gray-500 mt-2">* Gambar logo disarankan memiliki background transparan (PNG).</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Halaman Tentang Kami</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Utama</label>
                        <input type="text" name="about_title" value="{{ $settings['about_title'] ?? 'Tentang Ereskha' }}" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sub Judul</label>
                        <input type="text" name="about_subtitle" value="{{ $settings['about_subtitle'] ?? 'Elegansi dalam Setiap Helai Kain' }}" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Konten Penjelasan</label>
                    <textarea name="about_content" rows="4" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">{{ $settings['about_content'] ?? "Ereskha lahir dari keinginan untuk menghadirkan busana muslimah yang tidak hanya syar'i, namun juga elegan dan mengikuti perkembangan zaman." }}</textarea>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Kontak & Footer</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon/WA</label>
                        <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '+62 812-3456-7890' }}" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                        <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'info@ereskha.com' }}" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                    <textarea name="contact_address" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">{{ $settings['contact_address'] ?? 'Jl. Fashion Muslim No. 123, Jakarta Selatan, Indonesia' }}</textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kode Embed Google Maps (HTML iframe)</label>
                    <textarea name="google_map_embed" rows="3" placeholder='<iframe src="https://www.google.com/maps/embed?..." ...></iframe>' class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">{{ $settings['google_map_embed'] ?? '' }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">* Cara: Buka Google Maps > Cari Lokasi > Bagikan (Share) > Sematkan Peta (Embed a map) > Salin HTML (Copy HTML).</p>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Link Google Maps (Direct)</label>
                    <input type="url" name="google_map_link" value="{{ $settings['google_map_link'] ?? '' }}" placeholder="https://maps.app.goo.gl/..." class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    <p class="text-xs text-gray-500 mt-1">* Link ini akan langsung mengarahkan user ke aplikasi Google Maps jika peta ditekan/diklik.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Singkat Footer</label>
                    <textarea name="footer_description" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">{{ $settings['footer_description'] ?? 'Brand fashion muslim wanita yang menghadirkan koleksi elegan dan modern untuk muslimah Indonesia. Kualitas premium dengan harga terjangkau.' }}</textarea>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Tautan Media Sosial</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Link Instagram</label>
                        <input type="url" name="social_instagram" value="{{ $settings['social_instagram'] ?? 'https://instagram.com/ereskha.id' }}" placeholder="Contoh: https://instagram.com/..." class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Link Facebook</label>
                        <input type="url" name="social_facebook" value="{{ $settings['social_facebook'] ?? 'https://facebook.com/ereskha.official' }}" placeholder="Contoh: https://facebook.com/..." class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Link TikTok</label>
                        <input type="url" name="social_tiktok" value="{{ $settings['social_tiktok'] ?? 'https://tiktok.com/@ereskha.id' }}" placeholder="Contoh: https://tiktok.com/@..." class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Link WhatsApp (Direct Chat)</label>
                        <input type="url" name="social_whatsapp" value="{{ $settings['social_whatsapp'] ?? 'https://wa.me/6281234567890' }}" placeholder="Contoh: https://wa.me/62..." class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b">Fitur Utama (Halaman Beranda)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Fitur 1 (Truk/Kirim)</label>
                        <input type="text" name="feature_1_title" value="{{ $settings['feature_1_title'] ?? 'Gratis Ongkir' }}" placeholder="Judul (Misal: Gratis Ongkir)" class="w-full px-4 py-2 mb-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                        <input type="text" name="feature_1_sub" value="{{ $settings['feature_1_sub'] ?? 'Min. Rp 200K' }}" placeholder="Sub judul (Misal: Min. Rp 200K)" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Fitur 2 (Perisai/Aman)</label>
                        <input type="text" name="feature_2_title" value="{{ $settings['feature_2_title'] ?? '100% Original' }}" placeholder="Judul" class="w-full px-4 py-2 mb-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                        <input type="text" name="feature_2_sub" value="{{ $settings['feature_2_sub'] ?? 'Produk Asli' }}" placeholder="Sub judul" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Fitur 3 (Kembali/Garansi)</label>
                        <input type="text" name="feature_3_title" value="{{ $settings['feature_3_title'] ?? 'Easy Return' }}" placeholder="Judul" class="w-full px-4 py-2 mb-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                        <input type="text" name="feature_3_sub" value="{{ $settings['feature_3_sub'] ?? '7 Hari Garansi' }}" placeholder="Sub judul" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Fitur 4 (Headset/Bantuan)</label>
                        <input type="text" name="feature_4_title" value="{{ $settings['feature_4_title'] ?? 'CS 24/7' }}" placeholder="Judul" class="w-full px-4 py-2 mb-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                        <input type="text" name="feature_4_sub" value="{{ $settings['feature_4_sub'] ?? 'Siap Membantu' }}" placeholder="Sub judul" class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-primary focus:border-primary">
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
            <button type="submit" class="px-6 py-2.5 bg-primary text-white font-medium rounded-xl hover:bg-primary/90 focus:ring-4 focus:ring-primary/20 transition-all">
                Simpan Pengaturan
            </button>
        </div>
    </form>

    <div class="p-6 lg:p-8 border-t border-gray-100 bg-gray-50 rounded-b-2xl">
        <h3 class="text-sm font-semibold text-gray-800 mb-2">Kembalikan Logo Bawaan</h3>
        <p class="text-sm text-gray-500 mb-4">Jika Anda ingin mengembalikan logo ke tampilan semula (teks/ikon bawaan atau logo default Ereskha), klik tombol di bawah ini.</p>
        <form action="{{ route('admin.settings.reset_logo') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin mengembalikan logo ke default?')" class="px-5 py-2 bg-red-100 text-red-600 hover:bg-red-200 font-medium rounded-xl transition-all text-sm flex items-center">
                <i class="fas fa-undo mr-2"></i> Reset Logo
            </button>
        </form>
    </div>
</div>
@endsection