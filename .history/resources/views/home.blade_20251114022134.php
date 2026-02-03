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
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-gray-50">

    <!-- Navigation -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="bg-primary-green rounded-full p-2 mr-3">
                        <i class="fas fa-leaf text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold text-primary-green">IsyaraLearn</span>
                </div>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center space-x-8">
                    @foreach($navItems as $item)
                    <a href="#{{ strtolower($item) }}" class="nav-link text-gray-700 hover:text-primary-green font-medium">
                        {{ $item }}
                    </a>
                    @endforeach

                    <button onclick="openLogin()"
                        class="bg-primary-green text-white px-6 py-2 rounded-full hover:bg-green-600 transition">
                        Login
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-primary-green focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="mobile-menu fixed top-16 left-0 w-full h-screen bg-white md:hidden z-30">
            <div class="flex flex-col items-center space-y-8 mt-8">
                @foreach($navItems as $item)
                <a href="#{{ strtolower($item) }}" class="nav-link mobile-menu-link text-gray-700 hover:text-primary-green font-medium">
                    {{ $item }}
                </a>
                @endforeach

                <button onclick="openLogin()"
                    class="mobile-menu-link bg-primary-green text-white px-6 py-2 rounded-full hover:bg-green-600 transition">
                    Login
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-16 bg-green-50 min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="hero-animation">
                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-800 mb-6">
                        Tangan<span class="text-primary-green">Bicara</span> Hati Mendengar
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Platform pembelajaran bahasa isyarat Indonesia untuk semua kalangan, dilengkapi AI deteksi untuk kemudahan memahami.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="button"
                            onclick="openLogin()"
                            class="bg-primary-green text-white px-8 py-3 rounded-full hover:bg-green-600 transition font-semibold">
                            Get Started
                        </button>
                        <button class="border-2 border-primary-green text-primary-green px-8 py-3 rounded-full hover:bg-primary-green hover:text-white transition font-semibold">
                            Learn More
                        </button>
                    </div>
                </div>
                <div class="hero-animation">
                    <div class="relative">
                        <div class="bg-primary-green rounded-3xl p-8 opacity-10 absolute inset-0 transform rotate-6"></div>
                        <img src="{{ asset('/img/team spirit.gif') }}" class="rounded-3xl shadow-2xl relative z-0" alt="Team Spirit" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Kenapa pilih <span class="text-primary-green">IsyaraLearn</span>?
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Belajar dengan mudah dengan platfrom interaktif.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($features as $feature)
                <div class="card-hover bg-gray-50 rounded-xl p-8 text-center">
                    <div class="bg-primary-green rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas {{ $feature['icon'] }} text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600">{{ $feature['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-20 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left: Text -->
                <div class="about-text">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">
                        Tentang <span class="text-primary-green">IsyaraLearn</span>
                    </h2>
                    <p class="text-gray-600 mb-6">
                        IsyaraLearn adalah platform pertama di Indonesia yang memaknai
                        "tangan bicara, hati mendengar". Kami menggunakan AI deteksi gerakan
                        real-time untuk memudahkan siapa saja belajar Bahasa Isyarat Indonesia
                        (BISINDO) secara mandiri, menyenangkan, dan gratis.
                    </p>
                </div>

                <!-- Right: Photo -->
                <div class="about-photo">
                    <div class="relative">
                        <!-- decorative rotated backdrop - NOW ANTI-CLOCKWISE -->
                        <div class="bg-primary-green rounded-3xl p-8 opacity-10 absolute inset-0 transform -rotate-6"></div>

                        <!-- actual image -->
                        <img src="{{ asset('/img/About us page.gif') }}"
                            alt="About Us"
                            class="rounded-3xl shadow-2xl relative z-10 w-full h-auto object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Static wave divider -->
    <div class="wave-divider bg-white relative -mb-1">
        <svg viewBox="0 0 1440 150" xmlns="http://www.w3.org/2000/svg">
            <path fill="#339933" fill-opacity="1"
                d="M0,120 C360,120 480,40 720,40 C960,40 1080,120 1440,120 L1440,150 L0,150 Z">
            </path>
        </svg>
    </div>

    <!-- Contact Us Section -->
    <section id="contact" class="py-16 md:py-20 bg-[#339933] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-0">
            <!-- heading -->
            <div class="text-center mb-10 md:mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">Hubungi Kami</h2>
                <p class="text-green-100 text-base md:text-lg">
                    Punya pertanyaan? Kirim pesan langsung ke tim IsyaraLearn.
                </p>
            </div>

            <!-- card -->
            <div class="bg-white/95 backdrop-blur rounded-2xl shadow-2xl overflow-hidden">
                <div class="flex flex-col md:flex-row items-stretch">

                    <!-- illustration -->
                    <div class="md:w-2/5 flex items-center justify-center p-6 md:p-10 bg-green-50">
                        <img src="{{ asset('/img/Contact%20us-pana.svg') }}"
                            alt="Contact us"
                            class="w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 object-contain drop-shadow-lg z-0"
                            loading="lazy" />
                    </div>

                    <!-- form -->
                    <form id="contactForm"
                        class="md:w-3/5 flex flex-col justify-center p-6 md:p-10 space-y-5 md:space-y-6 bg-white">
                        <!-- PERBAIKAN: Hapus @csrf dari sini karena tidak diperlukan untuk form contact static -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                            <input type="text" name="name" placeholder="Nama Lengkap" required
                                class="px-4 py-3 md:px-5 md:py-4 rounded-lg border border-gray-300
                          focus:outline-none focus:ring-2 focus:ring-[#339933] transition
                          min-h-12 text-base" />
                            <input type="tel" name="phone" placeholder="Telepon" required
                                class="px-4 py-3 md:px-5 md:py-4 rounded-lg border border-gray-300
                          focus:outline-none focus:ring-2 focus:ring-[#339933] transition
                          min-h-12 text-base" />
                        </div>

                        <input type="email" name="email" placeholder="Email" required
                            class="w-full px-4 py-3 md:px-5 md:py-4 rounded-lg border border-gray-300
                        focus:outline-none focus:ring-2 focus:ring-[#339933] transition
                        min-h-12 text-base" />

                        <textarea name="message" placeholder="Pesan Anda" required
                            class="w-full min-h-[180px] md:min-h-[220px] px-4 py-3 md:px-5 md:py-4
                           rounded-lg border border-gray-300 resize-y
                           focus:outline-none focus:ring-2 focus:ring-[#339933] transition
                           text-base"></textarea>

                        <button type="submit"
                            id="submitBtn"
                            class="w-full bg-[#339933] text-white py-3 md:py-4 rounded-full
                         hover:bg-green-600 active:scale-95 transition transform
                         font-semibold text-lg disabled:opacity-60 disabled:cursor-not-allowed">
                            <span id="btnText">Kirim Pesan</span>
                        </button>

                        <p id="formMsg" class="text-center text-sm hidden"></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- LOGIN MODAL -->
    <div id="loginModal"
        class="fixed inset-0 z-50 hidden">
        <!-- backdrop -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeLogin()"></div>

        <!-- flex container -->
        <div class="relative flex items-center justify-center w-full h-full px-4 z-10">
            <!-- panel -->
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden relative z-10">

                <!-- close btn -->
                <button onclick="closeLogin()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>

                <form action="{{ route('login.post') }}" method="POST" class="p-8 space-y-5">
                    @csrf
                    <h2 class="text-2xl font-bold text-center text-gray-800">
                        Masuk ke <span class="text-primary-green">IsyaraLearn</span>
                    </h2>

                    <input type="email" name="email" required placeholder="Email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#339933]">
                    <input type="password" name="password" required placeholder="Kata sandi"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#339933]">

                    <button type="submit"
                        class="w-full bg-primary-green text-white py-3 rounded-full hover:bg-green-600 transition font-semibold">
                        Login
                    </button>

                    <p class="text-center text-sm text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-primary-green hover:underline font-medium">Daftar di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="bg-primary-green rounded-full p-2 mr-3">
                            <i class="fas fa-leaf text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold">IsyaraLearn</span>
                    </div>
                    <p class="text-gray-400">Platform pembelajaran bahasa isyarat Indonesia untuk semua kalangan.</p>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#about" class="hover:text-primary-green transition">About Us</a></li>
                        <li><a href="#services" class="hover:text-primary-green transition">Services</a></li>
                        <li><a href="#contact" class="hover:text-primary-green transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Contact Info</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-envelope mr-2"></i>info@isyaralearn.com</li>
                        <li><i class="fas fa-phone mr-2"></i>+62 XXX-XXXX-XXXX</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i>Indonesia</li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-primary-green transition"><i class="fab fa-facebook-f text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary-green transition"><i class="fab fa-twitter text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary-green transition"><i class="fab fa-instagram text-xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 IsyaraLearn. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>