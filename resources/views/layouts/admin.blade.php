<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Ereskha Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ee4d2d',
                        sidebar: '#1a2b5f',
                        'sidebar-hover': '#243672',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .sidebar-link { transition: all 0.2s ease; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,0.1); }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-sidebar transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center px-6 py-5 border-b border-white/10 bg-white/5 mx-4 mt-4 mb-2 rounded-2xl">
                    <img src="{{ \App\Models\Setting::getValue('site_logo') ? asset(\App\Models\Setting::getValue('site_logo')) : asset('images/logo.png') }}" alt="Ereskha Logo" class="h-12 w-auto object-contain">
                </div>

                <!-- Menu -->
                <nav class="flex-1 px-4 py-6 space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white {{ request()->routeIs('admin.dashboard') ? 'active text-white bg-white/10' : '' }}">
                        <i class="fas fa-th-large w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white {{ request()->routeIs('admin.products.*') ? 'active text-white bg-white/10' : '' }}">
                        <i class="fas fa-box w-5 text-center"></i>
                        <span>Produk</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white {{ request()->routeIs('admin.categories.*') ? 'active text-white bg-white/10' : '' }}">
                        <i class="fas fa-tags w-5 text-center"></i>
                        <span>Kategori</span>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white {{ request()->routeIs('admin.settings.*') ? 'active text-white bg-white/10' : '' }}">
                        <i class="fas fa-cog w-5 text-center"></i>
                        <span>Pengaturan Tampilan</span>
                    </a>

                    <div class="pt-6 border-t border-white/10 mt-6">
                        <a href="{{ route('home') }}" target="_blank" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white">
                            <i class="fas fa-external-link-alt w-5 text-center"></i>
                            <span>Lihat Website</span>
                        </a>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="sidebar-link w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-red-400">
                                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </nav>

                <!-- Footer -->
                <div class="px-6 py-4 border-t border-white/10">
                    <div class="flex items-center space-x-3">
                        <div class="w-9 h-9 bg-primary/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-primary text-sm"></i>
                        </div>
                        <div>
                            <p class="text-white text-sm font-medium">{{ session('admin_name', 'Admin') }}</p>
                            <p class="text-gray-400 text-xs">{{ session('admin_email', '') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Sidebar overlay mobile -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 px-4 lg:px-8 py-4 flex items-center justify-between sticky top-0 z-30">
                <div class="flex items-center space-x-4">
                    <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-bars text-gray-600"></i>
                    </button>
                    <h2 class="text-lg font-outfit font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-sm text-gray-500 hidden sm:block">{{ date('d M Y') }}</span>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 p-4 lg:p-8">
                <!-- Flash Messages -->
                @if(session('success'))
                <div id="flashMsg" class="mb-6 flex items-center p-4 bg-green-50 border border-green-200 rounded-xl text-green-700">
                    <i class="fas fa-check-circle mr-3"></i>
                    <span>{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="ml-auto text-green-400 hover:text-green-600"><i class="fas fa-times"></i></button>
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <strong>Terdapat kesalahan:</strong>
                    </div>
                    <ul class="list-disc list-inside text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Auto-dismiss flash message
        const flash = document.getElementById('flashMsg');
        if (flash) { setTimeout(() => { flash.style.opacity = '0'; setTimeout(() => flash.remove(), 300); }, 4000); }
    </script>
    @yield('scripts')
</body>
</html>
