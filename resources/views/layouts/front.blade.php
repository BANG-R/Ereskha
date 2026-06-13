<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ereskha - Brand Fashion Muslim Wanita Modern & Elegan. Koleksi kerudung, gamis, dress, dan setelan premium.">
    <meta name="keywords" content="fashion muslim, hijab, kerudung, gamis, dress muslimah, ereskha">
    <title>@yield('title', 'Ereskha - Fashion Muslim Premium')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ee4d2d',
                        secondary: '#1a2b5f',
                        'soft-pink': '#f8d7da',
                        'bg-light': '#f9fafb',
                        'warm-gold': '#d4a574',
                        'deep-plum': '#4a1942',
                    },
                    fontFamily: {
                        'display': ['Playfair Display', 'serif'],
                        'sans': ['Inter', 'sans-serif'],
                        'outfit': ['Outfit', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in': 'fadeIn 0.6s ease-out',
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'slide-in-left': 'slideInLeft 0.6s ease-out',
                        'slide-in-right': 'slideInRight 0.6s ease-out',
                        'pulse-soft': 'pulseSoft 2s ease-in-out infinite',
                        'shimmer': 'shimmer 2s linear infinite',
                        'bounce-soft': 'bounceSoft 2s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideInLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        slideInRight: {
                            '0%': { opacity: '0', transform: 'translateX(50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        pulseSoft: {
                            '0%, 100%': { opacity: '1' },
                            '50%': { opacity: '0.8' },
                        },
                        shimmer: {
                            '0%': { backgroundPosition: '-200% 0' },
                            '100%': { backgroundPosition: '200% 0' },
                        },
                        bounceSoft: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                    },
                },
            },
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* Scroll behavior */
        html { scroll-behavior: smooth; }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #ee4d2d; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #d4432a; }

        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #ee4d2d 0%, #c0392b 50%, #1a2b5f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Animated background gradient */
        .animated-gradient {
            background: linear-gradient(-45deg, #ee4d2d, #f8d7da, #1a2b5f, #d4a574);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Parallax shimmer effect */
        .shimmer-bg {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s linear infinite;
        }

        /* Product card hover */
        .product-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
        }
        .product-card:hover .product-img {
            transform: scale(1.08);
        }
        .product-img {
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Category card hover */
        .category-card {
            transition: all 0.4s ease;
        }
        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        /* Button hover animations */
        .btn-primary {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        .btn-primary:hover::after {
            width: 300px;
            height: 300px;
        }

        /* Navbar animation */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #ee4d2d;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }

        /* Scroll animation observer */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Floating particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.3;
            animation: float 6s ease-in-out infinite;
        }

        /* Badge pulse */
        .badge-discount {
            animation: pulseSoft 2s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-bg-light font-sans antialiased">

    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 glass">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 lg:h-24">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                    <img src="{{ \App\Models\Setting::getValue('site_logo') ? asset(\App\Models\Setting::getValue('site_logo')) : asset('images/logo.png') }}" alt="Ereskha Logo" class="h-16 lg:h-20 w-auto object-contain transform group-hover:scale-105 transition-transform duration-300">
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="nav-link text-gray-700 hover:text-primary font-medium transition-colors duration-300">Home</a>
                    <div class="relative group">
                        <button class="nav-link text-gray-700 hover:text-primary font-medium transition-colors duration-300 flex items-center space-x-1">
                            <span>Kategori</span>
                            <i class="fas fa-chevron-down text-xs transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 translate-y-2 overflow-hidden">
                            @php
                                $navCategories = \App\Models\Category::all();
                            @endphp
                            @foreach($navCategories as $cat)
                                <a href="{{ route('category.show', $cat->slug) }}" class="block px-5 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-primary/5 hover:to-primary/10 hover:text-primary transition-all duration-200 text-sm font-medium">
                                    <i class="fas fa-tag mr-2 text-xs"></i>{{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="nav-link text-gray-700 hover:text-primary font-medium transition-colors duration-300">Tentang Kami</a>
                    <a href="{{ route('contact') }}" class="nav-link text-gray-700 hover:text-primary font-medium transition-colors duration-300">Kontak</a>
                </div>

                <!-- Search Bar -->
                <div class="hidden md:flex items-center">
                    <form action="{{ route('search') }}" method="GET" class="relative">
                        <input type="text" name="q" placeholder="Cari produk..." 
                               class="w-48 lg:w-64 pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all duration-300 focus:w-72">
                        <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    </form>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="lg:hidden hidden border-t border-gray-100 bg-white">
            <div class="px-4 py-4 space-y-2">
                <!-- Mobile Search -->
                <form action="{{ route('search') }}" method="GET" class="mb-4">
                    <div class="relative">
                        <input type="text" name="q" placeholder="Cari produk..." 
                               class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/30">
                        <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                </form>
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-gray-700 hover:bg-primary/5 hover:text-primary font-medium transition-all duration-200">
                    <i class="fas fa-home mr-3"></i>Home
                </a>
                @foreach($navCategories as $cat)
                    <a href="{{ route('category.show', $cat->slug) }}" class="block px-4 py-3 rounded-xl text-gray-700 hover:bg-primary/5 hover:text-primary font-medium transition-all duration-200 pl-8">
                        <i class="fas fa-tag mr-3 text-xs"></i>{{ $cat->name }}
                    </a>
                @endforeach
                <a href="{{ route('about') }}" class="block px-4 py-3 rounded-xl text-gray-700 hover:bg-primary/5 hover:text-primary font-medium transition-all duration-200">
                    <i class="fas fa-info-circle mr-3"></i>Tentang Kami
                </a>
                <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-xl text-gray-700 hover:bg-primary/5 hover:text-primary font-medium transition-all duration-200">
                    <i class="fas fa-envelope mr-3"></i>Kontak
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20 lg:pt-24">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-secondary via-secondary to-gray-900 text-white mt-20">
        <!-- Wave separator -->
        <div class="w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-16" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" 
                      fill="#f9fafb"></path>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <div class="flex items-center mb-6">
                        <img src="{{ \App\Models\Setting::getValue('site_logo') ? asset(\App\Models\Setting::getValue('site_logo')) : asset('images/logo.png') }}" alt="Ereskha Logo" class="h-24 lg:h-32 w-auto object-contain bg-white/50 p-2 rounded-xl backdrop-blur-sm">
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed mb-6">
                        {{ \App\Models\Setting::getValue('footer_description') ?? 'Brand fashion muslim wanita yang menghadirkan koleksi elegan dan modern untuk muslimah Indonesia. Kualitas premium dengan harga terjangkau.' }}
                    </p>
                    <div class="flex space-x-3">
                        <a href="{{ \App\Models\Setting::getValue('social_instagram', 'https://instagram.com/ereskha.id') }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-primary rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="{{ \App\Models\Setting::getValue('social_facebook', 'https://facebook.com/ereskha.official') }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-primary rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="{{ \App\Models\Setting::getValue('social_tiktok', 'https://tiktok.com/@ereskha.id') }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-primary rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-tiktok text-sm"></i>
                        </a>
                        <a href="{{ \App\Models\Setting::getValue('social_whatsapp', 'https://wa.me/6281234567890') }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-primary rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-outfit font-semibold text-lg mb-6 flex items-center">
                        <span class="w-8 h-0.5 bg-primary mr-3"></span>Menu
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-sm flex items-center group"><i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform duration-200"></i>Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-sm flex items-center group"><i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform duration-200"></i>Tentang Kami</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-sm flex items-center group"><i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform duration-200"></i>Kontak</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="font-outfit font-semibold text-lg mb-6 flex items-center">
                        <span class="w-8 h-0.5 bg-primary mr-3"></span>Kategori
                    </h4>
                    <ul class="space-y-3">
                        @foreach($navCategories as $cat)
                        <li><a href="{{ route('category.show', $cat->slug) }}" class="text-gray-300 hover:text-primary transition-colors duration-300 text-sm flex items-center group"><i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform duration-200"></i>{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="font-outfit font-semibold text-lg mb-6 flex items-center">
                        <span class="w-8 h-0.5 bg-primary mr-3"></span>Kontak
                    </h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-primary mt-1"></i>
                            <span class="text-gray-300 text-sm">{{ \App\Models\Setting::getValue('contact_address') ?? 'Jl. Fashion Muslim No. 123, Jakarta Selatan, Indonesia' }}</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-phone text-primary"></i>
                            <span class="text-gray-300 text-sm">{{ \App\Models\Setting::getValue('contact_phone') ?? '+62 812-3456-7890' }}</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-primary"></i>
                            <span class="text-gray-300 text-sm">{{ \App\Models\Setting::getValue('contact_email') ?? 'info@ereskha.com' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-gray-400 text-sm">
                        &copy; {{ date('Y') }} Ereskha. All rights reserved. Made with <i class="fas fa-heart text-primary"></i> in Indonesia.
                    </p>
                    <div class="flex items-center space-x-6 text-sm text-gray-400">
                        <span>Fashion Muslim Premium</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 w-12 h-12 bg-primary text-white rounded-full shadow-lg hover:bg-primary/90 transition-all duration-300 opacity-0 invisible transform translate-y-4 z-50 flex items-center justify-center hover:scale-110">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        let menuOpen = false;

        mobileMenuBtn.addEventListener('click', () => {
            menuOpen = !menuOpen;
            mobileMenu.classList.toggle('hidden');
            const menuIcon = document.getElementById('menuIcon');
            if (menuOpen) {
                menuIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            } else {
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            }
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg');
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            } else {
                navbar.classList.remove('shadow-lg');
                navbar.style.background = 'rgba(255, 255, 255, 0.85)';
            }
        });

        // Back to top button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.remove('opacity-0', 'invisible', 'translate-y-4');
                backToTop.classList.add('opacity-100', 'visible', 'translate-y-0');
            } else {
                backToTop.classList.add('opacity-0', 'invisible', 'translate-y-4');
                backToTop.classList.remove('opacity-100', 'visible', 'translate-y-0');
            }
        });
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Scroll reveal animation
        const revealElements = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        revealElements.forEach(el => revealObserver.observe(el));

        // Staggered animation for grids
        document.querySelectorAll('.stagger-container').forEach(container => {
            const items = container.querySelectorAll('.stagger-item');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        items.forEach((item, index) => {
                            setTimeout(() => {
                                item.style.opacity = '1';
                                item.style.transform = 'translateY(0)';
                            }, index * 100);
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            observer.observe(container);
        });
    </script>

    @yield('scripts')
</body>
</html>
