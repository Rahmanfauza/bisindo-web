<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bisindo - IsyaraLearn</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Lottie player for animated illustration -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body class="bg-gray-50">

    <!-- Navigation -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <span class="text-2xl font-bold transition-colors duration-300" id="logo-text">IsyaraLearn</span>
                </div>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center space-x-8">
                    @foreach($navItems as $item)
                    <a href="#{{ strtolower($item) }}"
                        class="nav-link nav-link-text font-medium transition-colors duration-300">
                        {{ $item }}
                    </a>
                    @endforeach

                    <button onclick="openLogin()"
                        class="bg-primary-green text-white px-6 py-2.5 rounded-full hover:bg-green-600 transition-all duration-300 font-medium shadow-lg hover:shadow-xl">
                        Login
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="transition-colors duration-300 focus:outline-none"
                        aria-label="Toggle menu">
                        <i class="fas fa-bars text-2xl" id="mobile-menu-icon"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="mobile-menu fixed top-20 left-0 w-full h-screen bg-white md:hidden z-30 shadow-xl">
            <div class="flex flex-col items-center space-y-8 mt-8">
                @foreach($navItems as $item)
                <a href="#{{ strtolower($item) }}"
                    class="nav-link mobile-menu-link text-gray-700 hover:text-primary-green font-medium text-lg">
                    {{ $item }}
                </a>
                @endforeach

                <button onclick="openLogin()"
                    class="mobile-menu-link bg-primary-green text-white px-8 py-3 rounded-full hover:bg-green-600 transition-all duration-300 font-medium shadow-lg">
                    Login
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative pt-16 min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('/img/Sign-Language.png') }}" alt="Sign Language Background"
                class="w-full h-full object-cover ">
            <!-- Dark overlay for better text readability -->
            <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/60 to-primary-green/40"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32 text-center">
            <div class="hero-animation">
                <!-- Main Heading -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    Belajar Bahasa Isyarat Indonesia<br>
                    <span class="text-primary-green">Mudah dan Menyenangkan!</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl sm:text-2xl text-gray-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                    Akses lebih dari 1.000 tanda dengan video dan pelajaran interaktif untuk mulai belajar hari ini.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <button type="button" onclick="openRegister()"
                        class="bg-primary-green text-white px-10 py-4 rounded-full hover:bg-green-600 transition-all duration-300 font-semibold text-lg shadow-xl hover:shadow-2xl hover:scale-105 transform">
                        Mulai Belajar Sekarang
                    </button>
                    <a href="#services"
                        class="border-2 border-white text-white px-10 py-4 rounded-full hover:bg-white hover:text-primary-green transition-all duration-300 font-semibold text-lg shadow-xl hover:shadow-2xl hover:scale-105 transform">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
            <a href="#services" class="text-white opacity-75 hover:opacity-100 transition">
                <i class="fas fa-chevron-down text-3xl"></i>
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="services" class="py-20 lg:py-32 bg-[#E8F5E9] relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Kenapa pilih <span class="text-primary-green">IsyaraLearn</span>?
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Pelajari Bahasa Isyarat Indonesia dengan cara yang mudah. Dengan IsyaraLearn, proses belajar menjadi
                    sederhana, menyenangkan, dan dapat kamu ikuti sesuai ritme — mulai dari dasar hingga kemampuan yang
                    lebih mahir.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($features as $feature)
                <div
                    class="card-hover {{ $feature['bg_class'] }} rounded-3xl p-8 relative overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                    <!-- Decorative Background Vector -->
                    <div
                        class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 rounded-full opacity-10 transform rotate-45 group-hover:scale-110 transition-transform duration-500 {{ $feature['icon_bg'] }}">
                    </div>

                    <!-- Top Row: Tag and Icon -->
                    <div class="flex justify-between items-start mb-16 relative z-10">
                        <!-- Tag -->
                        <div class="inline-flex items-center bg-white rounded-full px-4 py-2 shadow-sm">
                            <i class="fas {{ $feature['tag_icon'] }} {{ $feature['text_class'] }} text-sm mr-2"></i>
                            <span class="text-sm font-bold text-gray-800">{{ $feature['tag'] }}</span>
                        </div>

                        <!-- Large Icon -->
                        <div
                            class="{{ $feature['icon_bg'] }} p-4 rounded-2xl shadow-sm transform rotate-6 group-hover:rotate-12 transition-transform duration-300">
                            <i class="fas {{ $feature['icon'] }} {{ $feature['icon_color'] }} text-3xl"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="relative z-10 text-left">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 leading-tight">{{ $feature['title'] }}</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $feature['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-24 lg:py-32 bg-white relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div
                class="absolute top-1/2 -right-24 w-72 h-72 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-60">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                <!-- Left: Text -->
                <div class="about-text space-y-6">
                    <div class="group space-y-6 cursor-default">
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight">
                            Tentang <span class="text-primary-green transition-colors duration-300">IsyaraLearn</span>
                        </h2>
                        <div
                            class="w-20 h-1.5 bg-primary-green rounded-full transition-all duration-500 ease-in-out group-hover:w-48">
                        </div>
                    </div>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        IsyaraLearn adalah platform pertama di Indonesia yang memaknai
                        <span class="font-semibold text-gray-800">"tangan bicara, hati mendengar"</span>.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Kami menggunakan <span class="text-primary-green font-semibold">AI deteksi gerakan
                            real-time</span>
                        untuk memudahkan siapa saja belajar Bahasa Isyarat Indonesia (BISINDO) secara mandiri,
                        menyenangkan, dan gratis.
                    </p>

                    <!-- Level Indicators -->
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Tingkatan Pembelajaran</h3>
                    <div class="grid grid-cols-3 gap-4 pt-2">
                        <div onclick="goToSlide(0)"
                            class="bg-green-50 p-4 rounded-2xl border border-green-100 text-center hover:shadow-md transition-all duration-300 cursor-pointer hover:scale-105">
                            <span class="text-primary-green font-bold text-xs uppercase tracking-wider block mb-1">Level
                                1</span>
                            <h4 class="font-bold text-gray-800 text-sm mb-1">Pemula</h4>
                            <p class="text-xs text-gray-500">Abjad & Angka</p>
                        </div>
                        <div onclick="goToSlide(1)"
                            class="bg-yellow-50 p-4 rounded-2xl border border-yellow-100 text-center hover:shadow-md transition-all duration-300 cursor-pointer hover:scale-105">
                            <span class="text-yellow-600 font-bold text-xs uppercase tracking-wider block mb-1">Level
                                2</span>
                            <h4 class="font-bold text-gray-800 text-sm mb-1">Menengah</h4>
                            <p class="text-xs text-gray-500">Kata Sehari-hari</p>
                        </div>
                        <div onclick="goToSlide(2)"
                            class="bg-red-50 p-4 rounded-2xl border border-red-100 text-center hover:shadow-md transition-all duration-300 cursor-pointer hover:scale-105">
                            <span class="text-red-600 font-bold text-xs uppercase tracking-wider block mb-1">Level
                                3</span>
                            <h4 class="font-bold text-gray-800 text-sm mb-1">Mahir</h4>
                            <p class="text-xs text-gray-500">Tata Bahasa</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Photo Slider -->
                <div class="about-photo relative flex justify-center w-full max-w-md mx-auto group">
                    <div class="relative w-full overflow-hidden rounded-3xl shadow-xl aspect-[3/4]">
                        <!-- Slider Track -->
                        <div id="aboutSlider" class="flex transition-transform duration-500 ease-in-out h-full">
                            <!-- Slide 1: Beginner -->
                            <div class="w-full flex-shrink-0 relative h-full">
                                <img src="{{ asset('img/ch.png') }}" alt="Beginner Level"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                <div
                                    class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/90 via-black/50 to-transparent p-6 pt-20 text-white">
                                    <span
                                        class="bg-primary-green text-xs font-bold px-3 py-1 rounded-full mb-2 inline-block shadow-sm">Level
                                        1</span>
                                    <h4 class="text-xl font-bold mb-1">Pemula (Beginner)</h4>
                                    <p class="text-sm opacity-90 leading-snug">Pelajari dasar-dasar abjad dan angka.</p>
                                </div>
                            </div>
                            <!-- Slide 2: Intermediate -->
                            <div class="w-full flex-shrink-0 relative h-full">
                                <img src="{{ asset('img/ch1.png') }}" alt="Intermediate Level"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                <div
                                    class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/90 via-black/50 to-transparent p-6 pt-20 text-white">
                                    <span
                                        class="bg-yellow-500 text-xs font-bold px-3 py-1 rounded-full mb-2 inline-block shadow-sm">Level
                                        2</span>
                                    <h4 class="text-xl font-bold mb-1">Menengah (Intermediate)</h4>
                                    <p class="text-sm opacity-90 leading-snug">Kuasai kata-kata sehari-hari dan kalimat
                                        sederhana.</p>
                                </div>
                            </div>
                            <!-- Slide 3: Advanced -->
                            <div class="w-full flex-shrink-0 relative h-full">
                                <img src="{{ asset('img/ch2.png') }}" alt="Advanced Level"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                <div
                                    class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/90 via-black/50 to-transparent p-6 pt-20 text-white">
                                    <span
                                        class="bg-red-500 text-xs font-bold px-3 py-1 rounded-full mb-2 inline-block shadow-sm">Level
                                        3</span>
                                    <h4 class="text-xl font-bold mb-1">Mahir (Advanced)</h4>
                                    <p class="text-sm opacity-90 leading-snug">Berkomunikasi lancar dengan tata bahasa
                                        kompleks.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <button onclick="moveSlider(-1)"
                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-primary-green p-3 rounded-full shadow-lg backdrop-blur-sm transition-all duration-300 opacity-0 group-hover:opacity-100 transform hover:scale-110 focus:outline-none">
                            <i class="fas fa-chevron-left text-lg"></i>
                        </button>
                        <button onclick="moveSlider(1)"
                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-primary-green p-3 rounded-full shadow-lg backdrop-blur-sm transition-all duration-300 opacity-0 group-hover:opacity-100 transform hover:scale-110 focus:outline-none">
                            <i class="fas fa-chevron-right text-lg"></i>
                        </button>

                        <!-- Dots Indicators -->
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                            <button onclick="goToSlide(0)"
                                class="slider-dot w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition-all duration-300 active"></button>
                            <button onclick="goToSlide(1)"
                                class="slider-dot w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition-all duration-300"></button>
                            <button onclick="goToSlide(2)"
                                class="slider-dot w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition-all duration-300"></button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Dictionary Section -->
    <section class="py-12 lg:py-20 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Unified Card Container -->
            <div
                class="bg-gradient-to-br from-[#FFF4E6] to-[#FFE8CC] rounded-3xl shadow-2xl overflow-hidden flex flex-col lg:flex-row">
                <!-- Left: Content Area -->
                <div
                    class="w-full lg:w-1/2 p-8 md:p-10 lg:p-12 flex flex-col justify-center text-center lg:text-left space-y-6">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 leading-tight">
                        Jelajahi Kamus Video <span class="text-primary-green">Kami yang Lengkap</span>
                    </h2>
                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed">
                        Temukan lebih dari 2.000 tanda bahasa, setiap tanda dilengkapi dengan video
                        demonstrasi yang jelas, ideal untuk pemula maupun yang ingin memperbarui keterampilan.
                    </p>
                    <div class="pt-2 flex justify-center lg:justify-start">
                        <a href="#"
                            class="inline-flex items-center justify-center bg-primary-green text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full font-bold text-base sm:text-lg hover:bg-green-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 w-full sm:w-auto max-w-sm">
                            <i class="fas fa-file-alt mr-2 sm:mr-3 flex-shrink-0"></i>
                            <span class="text-center">Lihat Kamus Video Kami</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Image Area - No Padding, Full Size -->
                <div class="w-full lg:w-1/2 relative">
                    <img src="{{ asset('img/more.png') }}" alt="ASL Family Learning"
                        class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
    </section>

    <!-- IsyaraLearn untuk siapa -->
    <section class="py-20 lg:py-32 bg-gray-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6 leading-tight">
                    <span class="text-primary-green">IsyaraLearn</span> untuk Siapa?
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    IsyaraLearn dirancang untuk siapa saja yang ingin belajar Bahasa Isyarat Indonesia dengan cara yang
                    sederhana dan fleksibel.
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-8">
                @foreach($audienceCards as $index => $card)
                <div
                    class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group hover:-translate-y-2 lg:col-span-2 {{ $index === 3 ? 'lg:col-start-2' : '' }}">
                    <div class="relative h-48 bg-gradient-to-br {{ $card['gradient'] }} overflow-hidden">
                        <!-- Decorative hand icon -->
                        <div
                            class="absolute top-4 right-4 opacity-20 transform rotate-12 group-hover:rotate-6 transition-transform duration-500">
                            <svg class="w-32 h-32 {{ str_replace('500', '300', $card['icon_color']) }}"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23 5.5V20c0 2.2-1.8 4-4 4h-7.3c-1.08 0-2.1-.43-2.85-1.19L1 14.83s1.26-1.23 1.3-1.25c.22-.19.49-.29.79-.29.22 0 .42.06.6.16.04.01 4.31 2.46 4.31 2.46V4c0-.83.67-1.5 1.5-1.5S11 3.17 11 4v7h1V1.5c0-.83.67-1.5 1.5-1.5S15 .67 15 1.5V11h1V2.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5V11h1V5.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5z" />
                            </svg>
                        </div>
                        <div class="absolute bottom-4 left-4 bg-white rounded-full p-3 shadow-md">
                            <i class="fas {{ $card['icon'] }} {{ $card['icon_color'] }} text-2xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $card['title'] }}</h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $card['description'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-24 lg:py-32 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
                <!-- Left Column: Title and Illustration -->
                <div class="space-y-6">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6 leading-tight">
                            Pertanyaan yang Sering Diajukan
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Semua yang perlu Anda ketahui tentang IsyaraLearn,
                            dari memulai hingga belajar sesuai
                            kecepatan Anda sendiri.
                        </p>
                    </div>

                    <!-- Decorative Illustration -->
                    <div class="hidden lg:flex items-center justify-center mt-12">
                        <div class="relative">
                            <!-- Speech Bubble 1 (Blue) -->
                            <div class="absolute left-0 top-0 transform -translate-x-4 -translate-y-4 animate-bounce"
                                style="animation-delay: 0s; animation-duration: 3s;">
                                <div class="bg-cyan-100 rounded-full p-8 shadow-lg relative">
                                    <div class="text-4xl">❓</div>
                                    <div
                                        class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-8 border-r-8 border-t-8 border-transparent border-t-cyan-100">
                                    </div>
                                </div>
                            </div>

                            <!-- Speech Bubble 2 (Orange) -->
                            <div class="ml-24 mt-16 animate-bounce"
                                style="animation-delay: 0.5s; animation-duration: 3s;">
                                <div class="bg-orange-100 rounded-full p-10 shadow-lg relative">
                                    <div class="text-5xl">💡</div>
                                    <div
                                        class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-8 border-r-8 border-t-8 border-transparent border-t-orange-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: FAQ Accordion -->
                <div class="space-y-4">
                    @foreach($faqs as $faq)
                    <div
                        class="faq-item border-2 border-orange-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-orange-300">
                        <button
                            class="faq-question w-full text-left px-6 py-5 bg-white hover:bg-orange-50 transition-colors duration-300 flex justify-between items-center group"
                            onclick="toggleFAQ(this)">
                            <span class="text-lg font-bold text-gray-800 pr-4">{{ $faq['question'] }}</span>
                            <i
                                class="fas fa-plus text-orange-500 text-xl transition-transform duration-300 group-hover:rotate-90 flex-shrink-0"></i>
                        </button>
                        <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300">
                            <div class="px-6 py-4 bg-orange-50/50 border-t border-orange-100">
                                <p class="text-gray-700 leading-relaxed">{{ $faq['answer'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Us Section -->
    <section id="contact" class="py-24 lg:py-32 bg-white relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div
                class="absolute top-1/2 -left-24 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

                <!-- Left Column: Content & Illustration -->
                <div class="text-left space-y-8">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6 leading-tight">
                            Mari Terhubung dengan <span class="text-primary-green">IsyaraLearn</span>
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Kami siap membantu perjalanan belajarmu. Jangan ragu untuk bertanya, memberikan saran, atau
                            sekadar menyapa tim kami.
                        </p>
                    </div>
                </div>

                <!-- Right Column: Modern Form -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10 border border-gray-100 relative">
                    <div
                        class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-primary-green rounded-full opacity-20 blur-xl">
                    </div>

                    <h3 class="text-2xl font-bold text-gray-800 mb-8">Kirim Pesan</h3>

                    <form id="contactForm" class="space-y-6" data-route="{{ route('contact.send') }}">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 ml-1">Nama Lengkap</label>
                                <input type="text" name="name" placeholder="John Doe" required
                                    class="w-full px-5 py-4 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-green/50 focus:border-primary-green transition-all duration-300" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 ml-1">Telepon</label>
                                <input type="tel" name="phone" placeholder="+62..." required
                                    class="w-full px-5 py-4 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-green/50 focus:border-primary-green transition-all duration-300" />
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 ml-1">Email</label>
                            <input type="email" name="email" placeholder="nama@email.com" required
                                class="w-full px-5 py-4 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-green/50 focus:border-primary-green transition-all duration-300" />
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 ml-1">Pesan</label>
                            <textarea name="message" placeholder="Tulis pesanmu di sini..." required
                                class="w-full min-h-[160px] px-5 py-4 rounded-xl bg-gray-50 border border-gray-200 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-green/50 focus:border-primary-green transition-all duration-300 resize-y"></textarea>
                        </div>

                        <button type="submit" id="submitBtn"
                            class="w-full bg-primary-green text-white py-4 rounded-full hover:bg-green-700 active:scale-[0.98] transition-all duration-300 font-bold text-lg shadow-lg hover:shadow-green-500/30 flex items-center justify-center gap-2 group disabled:opacity-70 disabled:cursor-not-allowed">
                            <span id="btnText">Kirim Pesan</span>
                            <i class="fas fa-paper-plane text-sm group-hover:translate-x-1 transition-transform"></i>
                        </button>

                        <p id="formMsg" class="text-center text-sm font-medium hidden"></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- LOGIN/REGISTER MODAL -->
    <div id="loginModal" class="fixed inset-0 z-50 hidden transition-opacity duration-300" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <!-- backdrop -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeLogin()"></div>

        <!-- flex container -->
        <div
            class="relative flex items-center justify-center w-full h-full px-4 py-8 md:py-0 z-10 pointer-events-none overflow-y-auto">
            <!-- panel container -->
            <div class="container-slider bg-white rounded-2xl md:rounded-3xl shadow-2xl relative overflow-hidden w-full max-w-md md:max-w-4xl min-h-[500px] md:min-h-[600px] pointer-events-auto my-auto"
                id="sliderContainer">

                <!-- Close Button -->
                <button onclick="closeLogin()"
                    class="absolute top-3 right-3 md:top-4 md:right-4 z-[100] text-gray-600 hover:text-gray-900 transition-all duration-300 p-2">
                    <i class="fas fa-times text-xl"></i>
                </button>

                <!-- MOBILE TOGGLE BUTTONS -->
                <div class="md:hidden absolute bottom-0 left-0 right-0 z-30 bg-white border-t border-gray-200 flex">
                    <button id="mobileSignInBtn"
                        class="mobile-toggle-btn flex-1 py-4 text-sm font-bold text-primary-green border-b-2 border-primary-green transition-all">
                        Masuk
                    </button>
                    <button id="mobileSignUpBtn"
                        class="mobile-toggle-btn flex-1 py-4 text-sm font-bold text-gray-400 border-b-2 border-transparent transition-all">
                        Daftar
                    </button>
                </div>

                <!-- SIGN UP FORM (Register) -->
                <div
                    class="form-container sign-up-container absolute top-0 h-full transition-all duration-700 ease-in-out w-full md:w-1/2 left-0 opacity-0 md:opacity-0 z-10">
                    <form action="{{ route('register') }}" method="POST" id="modalRegisterForm"
                        class="bg-white flex flex-col items-center justify-center h-full px-6 md:px-12 text-center space-y-2 md:space-y-3 py-8 pb-20 md:pb-8 overflow-y-auto">
                        @csrf
                        <h1 class="font-bold text-xl md:text-2xl mb-1 md:mb-2 text-gray-800">Buat Akun</h1>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 w-full">
                            <div>
                                <input type="text" name="firstName" placeholder="Nama Depan"
                                    value="{{ old('firstName') }}" required
                                    class="bg-gray-100 border px-4 py-2.5 md:py-3 text-sm md:text-base rounded-lg w-full outline-none focus:ring-2 focus:ring-primary-green/50 @error('firstName') border-red-500 @else border-transparent @enderror" />
                                @error('firstName') <span
                                    class="text-red-500 text-xs text-left block ml-1 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="lastName" placeholder="Nama Belakang"
                                    value="{{ old('lastName') }}" required
                                    class="bg-gray-100 border px-4 py-2.5 md:py-3 text-sm md:text-base rounded-lg w-full outline-none focus:ring-2 focus:ring-primary-green/50 @error('lastName') border-red-500 @else border-transparent @enderror" />
                                @error('lastName') <span
                                    class="text-red-500 text-xs text-left block ml-1 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full">
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                                class="bg-gray-100 border px-4 py-2.5 md:py-3 text-sm md:text-base rounded-lg w-full outline-none focus:ring-2 focus:ring-primary-green/50 @error('email') border-red-500 @else border-transparent @enderror" />
                            @error('email') <span
                                class="text-red-500 text-xs text-left block ml-1 mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full">
                            <input type="password" name="password" placeholder="Password (Min. 8 karakter)" required
                                class="bg-gray-100 border px-4 py-2.5 md:py-3 text-sm md:text-base rounded-lg w-full outline-none focus:ring-2 focus:ring-primary-green/50 @error('password') border-red-500 @else border-transparent @enderror" />
                            @error('password') <span
                                class="text-red-500 text-xs text-left block ml-1 mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full">
                            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                                required
                                class="bg-gray-100 border px-4 py-2.5 md:py-3 text-sm md:text-base rounded-lg w-full outline-none focus:ring-2 focus:ring-primary-green/50" />
                        </div>

                        <div class="flex items-center w-full text-left text-xs">
                            <input type="checkbox" id="modalTerms" name="terms" required
                                class="h-4 w-4 text-primary-green rounded focus:ring-primary-green border-gray-300 cursor-pointer mr-2 flex-shrink-0">
                            <label for="modalTerms" class="text-gray-600">
                                Saya setuju dengan <a href="#"
                                    class="text-primary-green font-semibold hover:underline">Syarat & Ketentuan</a>
                            </label>
                        </div>

                        <button type="submit" id="registerBtn"
                            class="rounded-full border border-primary-green bg-primary-green text-white text-xs font-bold py-2.5 md:py-3 px-10 md:px-12 tracking-wider uppercase transition-transform active:scale-95 hover:bg-green-700 mt-2 w-full md:w-auto flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                            <span class="btn-text">Daftar</span>
                            <i class="fas fa-spinner fa-spin hidden loading-icon" style="display: none;"></i>
                        </button>

                        <!-- Mobile only: Switch to login -->
                        <p class="text-xs text-gray-600 md:hidden mt-2">
                            Sudah punya akun? <button type="button" onclick="switchToSignIn()"
                                class="text-primary-green font-semibold hover:underline">Masuk di sini</button>
                        </p>
                    </form>
                </div>

                <!-- SIGN IN FORM (Login) -->
                <div
                    class="form-container sign-in-container absolute top-0 h-full transition-all duration-700 ease-in-out w-full md:w-1/2 left-0 z-20">
                    <form action="{{ route('login.post') }}" method="POST"
                        class="bg-white flex flex-col items-center justify-center h-full px-6 md:px-12 text-center space-y-3 md:space-y-4 py-8 pb-20 md:pb-8 overflow-y-auto">
                        @csrf
                        <h1 class="font-bold text-2xl md:text-3xl mb-1 md:mb-2 text-gray-800">Masuk</h1>
                        <div class="social-container flex space-x-4 mb-2 md:mb-4">
                            <a href="#"
                                class="border border-gray-300 rounded-full w-9 h-9 md:w-10 md:h-10 flex items-center justify-center hover:bg-gray-50 transition"><i
                                    class="fab fa-facebook-f text-gray-600 text-sm"></i></a>
                            <a href="#"
                                class="border border-gray-300 rounded-full w-9 h-9 md:w-10 md:h-10 flex items-center justify-center hover:bg-gray-50 transition"><i
                                    class="fab fa-google text-gray-600 text-sm"></i></a>
                            <a href="#"
                                class="border border-gray-300 rounded-full w-9 h-9 md:w-10 md:h-10 flex items-center justify-center hover:bg-gray-50 transition"><i
                                    class="fab fa-linkedin-in text-gray-600 text-sm"></i></a>
                        </div>
                        <span class="text-xs md:text-sm text-gray-500">atau gunakan akun anda</span>
                        <div class="w-full">
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                                class="bg-gray-100 border px-4 py-2.5 md:py-3 text-sm md:text-base rounded-lg w-full outline-none focus:ring-2 focus:ring-primary-green/50 @error('email') border-red-500 @else border-transparent @enderror" />
                            @error('email') <span
                                class="text-red-500 text-xs text-left block ml-1 mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full">
                            <input type="password" name="password" placeholder="Password" required
                                class="bg-gray-100 border px-4 py-2.5 md:py-3 text-sm md:text-base rounded-lg w-full outline-none focus:ring-2 focus:ring-primary-green/50 @error('password') border-red-500 @else border-transparent @enderror" />
                            @error('password') <span
                                class="text-red-500 text-xs text-left block ml-1 mt-1">{{ $message }}</span> @enderror
                        </div>
                        <a href="#"
                            class="text-xs md:text-sm text-gray-600 hover:text-gray-800 border-b border-gray-300 pb-1">Lupa
                            Password anda?</a>
                        <button type="submit" id="loginBtn"
                            class="rounded-full border border-primary-green bg-primary-green text-white text-xs font-bold py-2.5 md:py-3 px-10 md:px-12 tracking-wider uppercase transition-transform active:scale-95 hover:bg-green-700 mt-2 md:mt-4 w-full md:w-auto flex items-center justify-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                            <span class="btn-text">Masuk</span>
                            <i class="fas fa-spinner fa-spin hidden loading-icon" style="display: none;"></i>
                        </button>

                        <!-- Mobile only: Switch to register -->
                        <p class="text-xs text-gray-600 md:hidden mt-2">
                            Belum punya akun? <button type="button" onclick="switchToSignUp()"
                                class="text-primary-green font-semibold hover:underline">Daftar di sini</button>
                        </p>
                    </form>
                </div>

                <!-- OVERLAY (Desktop Only) -->
                <div
                    class="overlay-container hidden md:block absolute top-0 left-1/2 w-1/2 h-full overflow-hidden transition-transform duration-700 ease-in-out z-50">
                    <div
                        class="overlay bg-gradient-to-r from-green-600 to-primary-green text-white relative -left-full h-full w-[200%] transform transition-transform duration-700 ease-in-out">
                        <!-- Left Overlay Panel (For Sign In) -->
                        <div
                            class="overlay-panel overlay-left absolute top-0 flex flex-col items-center justify-center h-full w-1/2 transform translate-x-0 transition-transform duration-700 ease-in-out -translate-x-[20%]">
                            <h1 class="font-bold text-3xl mb-4">Selamat Datang Kembali!</h1>
                            <p class="text-sm font-light leading-relaxed mb-8 px-6 text-center">
                                Untuk tetap terhubung dengan kami, silakan masuk dengan info pribadi anda
                            </p>
                            <button
                                class="ghost rounded-full border border-white bg-transparent text-white text-xs font-bold py-3 px-12 tracking-wider uppercase transition-transform active:scale-95 hover:bg-white/10"
                                id="signInBtn">Masuk</button>
                        </div>

                        <!-- Right Overlay Panel (For Sign Up) -->
                        <div
                            class="overlay-panel overlay-right absolute top-0 right-0 flex flex-col items-center justify-center h-full w-1/2 transform translate-x-0 transition-transform duration-700 ease-in-out px-10">
                            <h1 class="font-bold text-3xl mb-6 text-center">Halo, Teman!</h1>
                            <p class="text-base font-light leading-relaxed mb-8 text-center px-6">
                                Masukkan detail pribadi anda dan mulailah perjalanan belajar bersama kami
                            </p>
                            <button
                                class="ghost rounded-full border border-white bg-transparent text-white text-xs font-bold py-3 px-12 tracking-wider uppercase transition-transform active:scale-95 hover:bg-white/10"
                                id="signUpBtn">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16 relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none opacity-5">
            <div class="absolute top-10 right-10 w-64 h-64 bg-primary-green rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 left-10 w-64 h-64 bg-primary-green rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
                <!-- Column 1: Brand -->
                <div class="lg:col-span-1">
                    <div class="mb-6">
                        <span
                            class="text-3xl font-bold transition-colors duration-300 hover:text-primary-green cursor-pointer">IsyaraLearn</span>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        Platform pembelajaran Bahasa Isyarat Indonesia (BISINDO) untuk semua kalangan dengan teknologi
                        AI.
                    </p>
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center text-gray-400 hover:bg-primary-green hover:text-white transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center text-gray-400 hover:bg-primary-green hover:text-white transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center text-gray-400 hover:bg-primary-green hover:text-white transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center text-gray-400 hover:bg-primary-green hover:text-white transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-white">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#home"
                                class="text-gray-400 hover:text-primary-green transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 text-primary-green opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="#about"
                                class="text-gray-400 hover:text-primary-green transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 text-primary-green opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="#services"
                                class="text-gray-400 hover:text-primary-green transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 text-primary-green opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Layanan
                            </a>
                        </li>
                        <li>
                            <a href="#faq"
                                class="text-gray-400 hover:text-primary-green transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 text-primary-green opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#contact"
                                class="text-gray-400 hover:text-primary-green transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 text-primary-green opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Kontak
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Resources -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-white">Sumber Daya</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-primary-green transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 text-primary-green opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Kamus Video
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-primary-green transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 text-primary-green opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Pelajaran
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-primary-green transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 text-primary-green opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-primary-green transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 text-primary-green opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Bantuan
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-primary-green transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 text-primary-green opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                Kebijakan Privasi
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-white">Hubungi Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div
                                class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-primary-green flex-shrink-0 mr-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Email</p>
                                <a href="mailto:info@isyaralearn.com"
                                    class="text-gray-300 hover:text-primary-green transition-colors">
                                    info@isyaralearn.com
                                </a>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-primary-green flex-shrink-0 mr-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Telepon</p>
                                <a href="tel:+62" class="text-gray-300 hover:text-primary-green transition-colors">
                                    +62 XXX-XXXX-XXXX
                                </a>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-primary-green flex-shrink-0 mr-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Lokasi</p>
                                <p class="text-gray-300">Jakarta, Indonesia</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-gray-500 text-sm">
                        &copy; 2024 IsyaraLearn. Semua hak dilindungi.
                    </p>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="text-gray-500 hover:text-primary-green transition-colors">Syarat &
                            Ketentuan</a>
                        <a href="#" class="text-gray-500 hover:text-primary-green transition-colors">Kebijakan
                            Privasi</a>
                        <a href="#" class="text-gray-500 hover:text-primary-green transition-colors">Cookie</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toast Notifications for Session Messages
        @if(session('success'))
        Swal.fire({
            iconHtml: '👌',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top',
            customClass: {
                icon: 'no-border'
            }
        });
        @endif

        @if(session('error'))
        Swal.fire({
            iconHtml: '✋',
            title: 'Gagal!',
            text: "{{ session('error') }}",
            toast: true,
            position: 'top',
            customClass: {
                icon: 'no-border'
            }
        });
        @endif

        // Validation Errors Handling
        @if($errors->any())
        // Show a general toast for validation errors
        Swal.fire({
            iconHtml: '☝️',
            title: 'Periksa Kembali Formulir',
            text: 'Terdapat kesalahan pada data yang Anda masukkan. Silakan periksa kolom yang berwarna merah.',
            toast: true,
            position: 'top',
            timer: 5000,
            showConfirmButton: false,
            customClass: {
                icon: 'no-border'
            }
        });

        @if(old('firstName') || $errors->has('firstName') || $errors->has('lastName') || $errors->has(
            'password_confirmation'))
        // Open Register Modal
        openLogin();
        setTimeout(() => {
            const container = document.getElementById('sliderContainer');
            if (container) container.classList.add("right-panel-active");
        }, 100);
        @else
        // Open Login Modal
        openLogin();
        @endif
        @endif

        // Loading State Logic
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function() {
                const btn = this.querySelector('button[type="submit"]');
                if (btn) {
                    const btnText = btn.querySelector('.btn-text');
                    const loadingIcon = btn.querySelector('.loading-icon');

                    if (btnText) btnText.textContent = 'Memproses...';
                    if (loadingIcon) {
                        loadingIcon.classList.remove('hidden');
                        loadingIcon.style.display = 'inline-block';
                    }

                    btn.disabled = true;
                    btn.classList.add('opacity-75', 'cursor-not-allowed');
                }
            });
        });
    });
    </script>
</body>

</html>