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

<body class="bg-paper text-pencil font-patrick overflow-x-hidden">

    <!-- Navigation -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <span class="text-3xl font-kalam font-bold transition-colors duration-300 transform -rotate-2 inline-block bg-postit px-3 py-1 border-[3px] border-pencil shadow-wobbly hover-jiggle cursor-pointer" id="logo-text">IsyaraLearn</span>
                </div>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center space-x-8">
                    @foreach($navItems as $item)
                    <a href="#{{ strtolower($item) }}"
                        class="nav-link nav-link-text font-kalam font-bold text-lg hover:text-correction transition-all duration-300 decoration-wavy decoration-2 underline-offset-4 hover:-translate-y-1 transform inline-block">
                        {{ $item }}
                    </a>
                    @endforeach

                    <a href="{{ route('translator') }}"
                        class="bg-paper text-pencil border-[3px] border-pencil rounded-wobbly px-6 py-2.5 font-kalam font-bold text-lg shadow-wobbly hover-jiggle inline-block text-center">
                        Terjemah
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="transition-colors duration-300 focus:outline-none hover-jiggle"
                        aria-label="Toggle menu">
                        <i class="fas fa-bars text-3xl font-bold" id="mobile-menu-icon"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="mobile-menu fixed top-20 left-0 w-full h-screen bg-paper border-t-[4px] border-dashed border-pencil md:hidden z-30 shadow-wobbly-lg">
            <div class="flex flex-col items-center space-y-8 mt-12 relative">
                <!-- Decorative background elements -->
                <div class="absolute top-10 left-10 w-32 h-32 border-[3px] border-pencil border-dashed rounded-wobbly opacity-20 -rotate-12 pointer-events-none"></div>
                <div class="absolute bottom-40 right-10 w-32 h-32 bg-correction rounded-wobbly opacity-10 rotate-45 pointer-events-none"></div>
                
                @foreach($navItems as $item)
                <a href="#{{ strtolower($item) }}"
                    class="nav-link mobile-menu-link text-pencil hover:text-correction transition-all duration-300 font-kalam font-bold text-2xl decoration-wavy decoration-2 underline-offset-8 transform hover:-rotate-2 hover:scale-110">
                    {{ $item }}
                </a>
                @endforeach

                <a href="{{ route('translator') }}"
                    class="mobile-menu-link text-white bg-correction border-[3px] border-pencil rounded-wobbly px-10 py-4 font-kalam font-bold text-2xl shadow-wobbly hover-jiggle transform rotate-1 mt-4 inline-block text-center">
                    Terjemah
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 min-h-screen flex items-center justify-center overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 grid md:grid-cols-2 gap-12 items-center">
            
            <div class="hero-animation text-left">
                <!-- Main Heading -->
                <h1 class="text-4xl md:text-6xl font-black text-pencil mb-6 leading-tight font-kalam">
                    Belajar Bahasa Isyarat Indonesia<br>
                    <span class="text-correction inline-block transform -rotate-2">Mudah dan Menyenangkan!</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl md:text-2xl text-pencil mb-10 max-w-xl font-patrick leading-relaxed bg-postit p-4 rounded-wobbly-md border-[3px] border-pencil shadow-wobbly transform rotate-1">
                    Akses lebih dari 1.000 tanda dengan video dan pelajaran interaktif untuk mulai belajar hari ini.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 items-start">
                    <a href="{{ route('translator') }}"
                        class="bg-correction text-white border-[3px] border-pencil px-8 py-3 rounded-wobbly font-kalam font-bold text-2xl shadow-wobbly hover-jiggle">
                        Mulai Menerjemah
                    </a>
                    <a href="#services"
                        class="bg-paper text-pencil border-[3px] border-pencil px-8 py-3 rounded-wobbly font-kalam font-bold text-2xl shadow-wobbly hover-jiggle inline-flex items-center justify-center">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

            <!-- Hero Image Replacement -->
            <div class="relative w-full h-96 flex justify-center items-center mt-12 md:mt-0">
                <div class="absolute inset-0 bg-pencil rounded-wobbly translate-x-4 translate-y-4"></div>
                <img src="{{ asset('/img/Sign-Language.png') }}" alt="Sign Language Background"
                    class="w-full h-full object-cover rounded-wobbly border-4 border-pencil relative z-10 grayscale hover:grayscale-0 transition-all duration-300">
                <!-- Tape effect -->
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-32 h-8 bg-black/10 -rotate-2 z-20"></div>
                <div class="absolute top-4 right-8 bg-postit text-pencil px-3 py-1 font-kalam font-bold border-2 border-pencil z-30 transform rotate-12 shadow-wobbly">Let's go!</div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="services" class="py-20 lg:py-32 bg-paper relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-kalam font-bold text-pencil mb-6">
                    Kenapa pilih <span class="text-correction border-b-4 border-dashed border-correction">IsyaraLearn</span>?
                </h2>
                <p class="text-xl text-pencil font-patrick max-w-3xl mx-auto">
                    Pelajari Bahasa Isyarat Indonesia dengan cara yang mudah. Dengan IsyaraLearn, proses belajar menjadi
                    sederhana, menyenangkan, dan dapat kamu ikuti sesuai ritme — mulai dari dasar hingga kemampuan yang
                    lebih mahir.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($features as $feature)
                <div
                    class="card-hover bg-white border-[3px] border-pencil rounded-wobbly-md shadow-wobbly p-8 relative overflow-visible transition-all duration-300 group hover-jiggle mt-6 text-center md:text-left">
                    
                    <!-- Tack Decoration -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-6 h-6 bg-correction rounded-full shadow-md z-20 border-2 border-pencil"></div>
                    <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-2 h-2 bg-white rounded-full shadow-inner z-20 opacity-80"></div>

                    <!-- Decorative Background Vector -->
                    <div
                        class="absolute top-0 right-0 -mt-8 -mr-8 w-48 h-48 rounded-wobbly border-4 border-dashed border-pencil opacity-10 transform rotate-12 group-hover:scale-110 group-hover:rotate-45 transition-transform duration-500">
                    </div>

                    <!-- Top Row: Tag and Icon -->
                    <div class="flex flex-col md:flex-row justify-between items-center md:items-start mb-8 md:mb-16 relative z-10 gap-4 md:gap-0">
                        <!-- Tag -->
                        <div class="inline-flex items-center bg-paper border-2 border-pencil rounded-wobbly px-4 py-2 shadow-wobbly-hover transform -rotate-2">
                            <i class="fas {{ $feature['tag_icon'] }} text-pencil text-sm mr-2"></i>
                            <span class="text-sm font-kalam font-bold text-pencil">{{ $feature['tag'] }}</span>
                        </div>

                        <!-- Large Icon -->
                        <div
                            class="bg-white border-[3px] border-pencil p-4 rounded-wobbly shadow-wobbly-hover transform rotate-6 group-hover:rotate-12 transition-transform duration-300">
                            <i class="fas {{ $feature['icon'] }} text-pencil text-3xl"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="relative z-10">
                        <h3 class="text-2xl font-kalam font-bold text-pencil mb-4 leading-tight">{{ $feature['title'] }}</h3>
                        <p class="text-pencil font-patrick leading-relaxed">{{ $feature['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-24 lg:py-32 bg-paper relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <svg class="absolute top-20 right-10 w-64 h-64 text-erased opacity-50 transform rotate-12" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M44.7,-76.4C58.8,-69.2,71.8,-59.1,79.6,-45.8C87.4,-32.6,90,-16.3,86.6,-2C83.2,12.4,73.8,24.8,64.2,35.6C54.6,46.4,44.8,55.6,32.7,64.2C20.6,72.8,6.2,80.8,-7.4,79.6C-21,78.5,-33.8,68.2,-46.5,59.3C-59.2,50.3,-71.8,42.7,-79.8,30.9C-87.8,19,-91.3,2.9,-86,-10.8C-80.6,-24.5,-66.4,-35.8,-53.4,-45.8C-40.4,-55.8,-28.7,-64.5,-15.8,-68.8C-2.8,-73.1,11.5,-73,30.5,-75.6C49.5,-78.2,30.5,-83.6,44.7,-76.4Z" transform="translate(100 100)" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                <!-- Left: Text -->
                <div class="about-text space-y-6 text-center md:text-left">
                    <div class="group space-y-6 cursor-default">
                        <h2 class="text-4xl md:text-5xl font-kalam font-bold text-pencil leading-tight">
                            Tentang <span class="text-correction border-b-4 border-dashed border-correction">IsyaraLearn</span>
                        </h2>
                    </div>
                    <div class="text-xl text-pencil font-patrick leading-relaxed">
                        IsyaraLearn adalah platform pertama di Indonesia yang memaknai <br>
                        <span class="font-kalam font-bold transform -rotate-2 text-2xl mt-4 mb-2 bg-postit inline-block px-4 py-2 border-[3px] border-pencil shadow-wobbly">&quot;tangan bicara, hati mendengar&quot;</span>.
                    </div>
                    <p class="text-lg text-pencil font-patrick leading-relaxed">
                        Kami menggunakan <span class="text-correction font-kalam font-bold text-xl">AI deteksi gerakan real-time</span>
                        untuk memudahkan siapa saja belajar Bahasa Isyarat Indonesia (BISINDO) secara mandiri,
                        menyenangkan, dan gratis.
                    </p>

                    <!-- Level Indicators -->
                    <h3 class="text-2xl font-kalam font-bold text-pencil mb-4 mt-8 pt-4 border-t-2 border-dashed border-pencil inline-block">Tingkatan Pembelajaran</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-2">
                        <div onclick="goToSlide(0)"
                            class="bg-white p-4 rounded-wobbly border-[3px] border-pencil text-center transition-all duration-300 cursor-pointer hover-jiggle shadow-wobbly transform -rotate-2">
                            <span class="text-pencil font-kalam font-bold text-sm block mb-1 underline">Level 1</span>
                            <h4 class="font-kalam font-bold text-pencil text-xl mb-1">Pemula</h4>
                            <p class="text-sm text-pencil font-patrick">Abjad & Angka</p>
                        </div>
                        <div onclick="goToSlide(1)"
                            class="bg-postit p-4 rounded-wobbly border-[3px] border-pencil text-center transition-all duration-300 cursor-pointer hover-jiggle shadow-wobbly transform rotate-1 md:scale-105">
                            <span class="text-pencil font-kalam font-bold text-sm block mb-1 underline">Level 2</span>
                            <h4 class="font-kalam font-bold text-pencil text-xl mb-1">Menengah</h4>
                            <p class="text-sm text-pencil font-patrick">Kata Sehari-hari</p>
                        </div>
                        <div onclick="goToSlide(2)"
                            class="bg-white p-4 rounded-wobbly border-[3px] border-pencil text-center transition-all duration-300 cursor-pointer hover-jiggle shadow-wobbly transform -rotate-1">
                            <span class="text-pencil font-kalam font-bold text-sm block mb-1 underline">Level 3</span>
                            <h4 class="font-kalam font-bold text-pencil text-xl mb-1">Mahir</h4>
                            <p class="text-sm text-pencil font-patrick">Tata Bahasa</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Photo Slider -->
                <div class="about-photo relative flex justify-center w-full max-w-md mx-auto group mt-10 lg:mt-0">
                    <div class="relative w-full overflow-hidden rounded-wobbly border-[4px] border-pencil shadow-wobbly-lg aspect-[3/4] bg-white transform rotate-2">
                        <!-- Slider Track -->
                        <div id="aboutSlider" class="flex transition-transform duration-500 ease-in-out h-full">
                            <!-- Slide 1: Beginner -->
                            <div class="w-full flex-shrink-0 relative h-full">
                                <img src="{{ asset('img/ch.png') }}" alt="Beginner Level"
                                    class="w-full h-full object-cover grayscale transition-transform duration-500 p-2 rounded-wobbly">
                                <div class="absolute bottom-6 left-6 right-6 bg-paper border-[3px] border-pencil p-4 rounded-wobbly shadow-wobbly transform -rotate-2">
                                    <span class="bg-correction text-white font-kalam text-xs font-bold px-3 py-1 border-2 border-pencil rounded-wobbly mb-2 inline-block shadow-wobbly-hover">Level 1</span>
                                    <h4 class="text-2xl font-kalam font-bold text-pencil mb-1">Pemula</h4>
                                    <p class="text-base font-patrick text-pencil leading-snug">Pelajari dasar-dasar abjad dan angka.</p>
                                </div>
                            </div>
                            <!-- Slide 2: Intermediate -->
                            <div class="w-full flex-shrink-0 relative h-full">
                                <img src="{{ asset('img/ch1.png') }}" alt="Intermediate Level"
                                    class="w-full h-full object-cover grayscale transition-transform duration-500 p-2 rounded-wobbly">
                                <div class="absolute bottom-6 left-6 right-6 bg-paper border-[3px] border-pencil p-4 rounded-wobbly shadow-wobbly transform rotate-1">
                                    <span class="bg-postit text-pencil font-kalam text-xs font-bold px-3 py-1 border-2 border-pencil rounded-wobbly mb-2 inline-block shadow-wobbly-hover">Level 2</span>
                                    <h4 class="text-2xl font-kalam font-bold text-pencil mb-1">Menengah</h4>
                                    <p class="text-base font-patrick text-pencil leading-snug">Kuasai kata-kata sehari-hari dan kalimat sederhana.</p>
                                </div>
                            </div>
                            <!-- Slide 3: Advanced -->
                            <div class="w-full flex-shrink-0 relative h-full">
                                <img src="{{ asset('img/ch2.png') }}" alt="Advanced Level"
                                    class="w-full h-full object-cover grayscale transition-transform duration-500 p-2 rounded-wobbly">
                                <div class="absolute bottom-6 left-6 right-6 bg-paper border-[3px] border-pencil p-4 rounded-wobbly shadow-wobbly transform -rotate-1">
                                    <span class="bg-blue-300 text-pencil font-kalam text-xs font-bold px-3 py-1 border-2 border-pencil rounded-wobbly mb-2 inline-block shadow-wobbly-hover">Level 3</span>
                                    <h4 class="text-2xl font-kalam font-bold text-pencil mb-1">Mahir</h4>
                                    <p class="text-base font-patrick text-pencil leading-snug">Berkomunikasi lancar dengan tata bahasa kompleks.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <button onclick="moveSlider(-1)"
                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white border-[3px] border-pencil text-pencil p-3 rounded-full shadow-wobbly transition-all duration-300 hover-jiggle focus:outline-none">
                            <i class="fas fa-chevron-left text-lg"></i>
                        </button>
                        <button onclick="moveSlider(1)"
                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white border-[3px] border-pencil text-pencil p-3 rounded-full shadow-wobbly transition-all duration-300 hover-jiggle focus:outline-none">
                            <i class="fas fa-chevron-right text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- IsyaraLearn untuk siapa -->
    <section class="py-20 lg:py-32 bg-paper relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16 relative">
                <!-- Draw loop accent -->
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-32 h-12 border-[3px] border-pencil rounded-wobbly-md opacity-20 transform -rotate-3"></div>
                <h2 class="text-4xl md:text-5xl font-kalam font-bold text-pencil mb-6 leading-tight relative inline-block">
                    <span class="text-correction">IsyaraLearn</span> untuk Siapa?
                </h2>
                <p class="text-xl text-pencil font-patrick max-w-3xl mx-auto leading-relaxed">
                    IsyaraLearn dirancang untuk siapa saja yang ingin belajar Bahasa Isyarat Indonesia dengan cara yang
                    sederhana dan fleksibel.
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-8">
                @foreach($audienceCards as $index => $card)
                <div
                    class="bg-white border-[3px] border-pencil rounded-wobbly shadow-wobbly hover-jiggle transition-all duration-300 overflow-hidden group lg:col-span-2 {{ $index === 3 ? 'lg:col-start-2' : '' }} {{ $index % 2 == 0 ? 'transform rotate-1' : 'transform -rotate-1' }}">
                    <div class="relative h-48 bg-paper border-b-[3px] border-pencil border-dashed overflow-hidden">
                        <!-- Decorative hand icon -->
                        <div
                            class="absolute top-4 right-4 opacity-10 transform rotate-12 group-hover:rotate-6 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-32 h-32 text-pencil"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23 5.5V20c0 2.2-1.8 4-4 4h-7.3c-1.08 0-2.1-.43-2.85-1.19L1 14.83s1.26-1.23 1.3-1.25c.22-.19.49-.29.79-.29.22 0 .42.06.6.16.04.01 4.31 2.46 4.31 2.46V4c0-.83.67-1.5 1.5-1.5S11 3.17 11 4v7h1V1.5c0-.83.67-1.5 1.5-1.5S15 .67 15 1.5V11h1V2.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5V11h1V5.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5z" />
                            </svg>
                        </div>
                        <div class="absolute bottom-4 left-4 bg-postit border-2 border-pencil rounded-wobbly p-3 shadow-wobbly transform -rotate-3">
                            <i class="fas {{ $card['icon'] }} text-pencil text-2xl"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-kalam font-bold text-pencil mb-3">{{ $card['title'] }}</h3>
                        <p class="text-pencil font-patrick leading-relaxed">
                            {{ $card['description'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-24 lg:py-32 bg-paper relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
                <!-- Left Column: Title and Illustration -->
                <div class="space-y-6">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-kalam font-bold text-pencil mb-6 leading-tight">
                            Pertanyaan yang Sering Diajukan
                        </h2>
                        <p class="text-xl text-pencil font-patrick leading-relaxed bg-white border-l-[4px] border-correction p-4 shadow-wobbly-hover transform -rotate-1">
                            Semua yang perlu Anda ketahui tentang IsyaraLearn,
                            dari memulai hingga belajar sesuai
                            kecepatan Anda sendiri.
                        </p>
                    </div>

                    <!-- Decorative Illustration -->
                    <div class="hidden lg:flex items-center justify-center mt-12 relative">
                        <div class="relative w-full h-full min-h-[250px]">
                            <!-- Hand drawn decoration -->
                            <div class="absolute left-10 top-0 transform -rotate-12 hover-jiggle cursor-pointer">
                                <i class="fas fa-question text-6xl text-correction"></i>
                            </div>
                            <div class="absolute right-20 top-20 transform rotate-12 hover-jiggle cursor-pointer">
                                <i class="fas fa-lightbulb text-6xl text-ballpoint"></i>
                            </div>
                            <div class="w-48 h-48 border-[4px] border-dashed border-pencil rounded-wobbly opacity-20 absolute top-10 left-10"></div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: FAQ Accordion -->
                <div class="space-y-4">
                    @foreach($faqs as $faq)
                    <div
                        class="faq-item border-[3px] border-pencil bg-white rounded-wobbly overflow-hidden transition-all duration-300 shadow-wobbly hover-jiggle mt-4">
                        <button
                            class="faq-question w-full text-left px-6 py-5 hover:bg-postit transition-colors duration-300 flex justify-between items-center group font-kalam font-bold text-pencil text-xl"
                            onclick="toggleFAQ(this)">
                            <span class="pr-4">{{ $faq['question'] }}</span>
                            <i
                                class="fas fa-plus text-correction text-xl transition-transform duration-300 group-[.active]:rotate-45 flex-shrink-0"></i>
                        </button>
                        <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300">
                            <div class="px-6 py-4 border-t-[3px] border-dashed border-pencil font-patrick text-pencil text-lg bg-gray-50/50">
                                <p class="leading-relaxed">{{ $faq['answer'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Us Section -->
    <section id="contact" class="py-24 lg:py-32 bg-paper relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

                <!-- Left Column: Content & Illustration -->
                <div class="text-left space-y-8">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-kalam font-bold text-pencil mb-6 leading-tight">
                            Mari Terhubung dengan <span class="bg-correction text-white px-2 border-2 border-pencil inline-block transform rotate-2">IsyaraLearn</span>
                        </h2>
                        <p class="text-xl text-pencil font-patrick leading-relaxed">
                            Kami siap membantu perjalanan belajarmu. Jangan ragu untuk bertanya, memberikan saran, atau
                            sekadar menyapa tim kami.
                        </p>
                        <!-- decorative element -->
                        <div class="mt-8 transform -rotate-12 hidden lg:block opacity-50">
                            <i class="fas fa-paper-plane text-5xl text-pencil ml-8"></i>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Modern Form -> Hand Drawn Form -->
                <div class="bg-white border-[4px] border-pencil rounded-wobbly shadow-wobbly-lg p-8 md:p-10 relative transform rotate-1">
                    <!-- Tack decoration -->
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-8 h-8 bg-ballpoint rounded-full shadow-md z-20 border-[3px] border-pencil"></div>
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-3 h-3 bg-white rounded-full z-20 opacity-80"></div>

                    <h3 class="text-2xl font-kalam font-bold text-pencil mb-8 underline decoration-wavy decoration-correction decoration-2 underline-offset-4">Kirim Pesan</h3>

                    <form id="contactForm" class="space-y-6" data-route="{{ route('contact.send') }}">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-lg font-kalam font-bold text-pencil ml-1">Nama Lengkap</label>
                                <input type="text" name="name" placeholder="John Doe" required
                                    class="w-full px-5 py-3 rounded-wobbly bg-white border-[3px] border-pencil text-pencil font-patrick placeholder-pencil focus:outline-none focus:ring-0 focus:border-correction focus:border-dashed focus:shadow-wobbly-hover transition-all duration-300" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-lg font-kalam font-bold text-pencil ml-1">Telepon</label>
                                <input type="tel" name="phone" placeholder="+62..." required
                                    class="w-full px-5 py-3 rounded-wobbly bg-white border-[3px] border-pencil text-pencil font-patrick placeholder-pencil focus:outline-none focus:ring-0 focus:border-correction focus:border-dashed focus:shadow-wobbly-hover transition-all duration-300" />
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-lg font-kalam font-bold text-pencil ml-1">Email</label>
                            <input type="email" name="email" placeholder="nama@email.com" required
                                class="w-full px-5 py-3 rounded-wobbly bg-white border-[3px] border-pencil text-pencil font-patrick placeholder-pencil focus:outline-none focus:ring-0 focus:border-correction focus:border-dashed focus:shadow-wobbly-hover transition-all duration-300" />
                        </div>

                        <div class="space-y-2">
                            <label class="text-lg font-kalam font-bold text-pencil ml-1">Pesan</label>
                            <textarea name="message" placeholder="Tulis pesanmu di sini..." required
                                class="w-full min-h-[160px] px-5 py-3 rounded-wobbly bg-white border-[3px] border-pencil text-pencil font-patrick placeholder-pencil focus:outline-none focus:ring-0 focus:border-correction focus:border-dashed focus:shadow-wobbly-hover transition-all duration-300 resize-y"></textarea>
                        </div>

                        <button type="submit" id="submitBtn"
                            class="w-full bg-correction text-white border-[3px] border-pencil py-4 rounded-wobbly shadow-wobbly hover-jiggle font-kalam font-bold text-xl flex items-center justify-center gap-2 group disabled:opacity-70 disabled:cursor-not-allowed">
                            <span id="btnText">Kirim Pesan</span>
                            <i class="fas fa-paper-plane text-sm group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                        </button>

                        <p id="formMsg" class="text-center font-patrick font-medium hidden mt-4"></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-paper text-pencil border-t-[4px] border-pencil py-16 relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none opacity-20">
            <div class="absolute top-10 right-10 w-64 h-64 border-[4px] border-dashed border-pencil rounded-wobbly rotate-45"></div>
            <div class="absolute bottom-10 left-10 w-64 h-64 border-[4px] border-dashed border-correction rounded-wobbly -rotate-12"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
                <!-- Column 1: Brand -->
                <div class="lg:col-span-1 lg:border-r-[3px] border-dashed border-pencil pr-4">
                    <div class="mb-6">
                        <span class="text-4xl font-kalam font-bold transition-colors duration-300 hover:text-correction cursor-pointer inline-block transform -rotate-2">IsyaraLearn</span>
                    </div>
                    <p class="text-pencil font-patrick text-lg leading-relaxed mb-6">
                        Platform pembelajaran Bahasa Isyarat Indonesia (BISINDO) untuk semua kalangan dengan teknologi
                        AI.
                    </p>
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-white border-[3px] border-pencil rounded-wobbly-md flex items-center justify-center text-pencil hover:bg-postit hover:shadow-wobbly-hover transition-all duration-300 transform hover-jiggle">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white border-[3px] border-pencil rounded-wobbly-md flex items-center justify-center text-pencil hover:bg-postit hover:shadow-wobbly-hover transition-all duration-300 transform hover-jiggle">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white border-[3px] border-pencil rounded-wobbly-md flex items-center justify-center text-pencil hover:bg-postit hover:shadow-wobbly-hover transition-all duration-300 transform hover-jiggle">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white border-[3px] border-pencil rounded-wobbly-md flex items-center justify-center text-pencil hover:bg-postit hover:shadow-wobbly-hover transition-all duration-300 transform hover-jiggle">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h3 class="text-2xl font-kalam font-bold mb-6 text-pencil underline decoration-wavy decoration-correction decoration-2">Tautan Cepat</h3>
                    <ul class="space-y-3 font-patrick text-lg">
                        <li>
                            <a href="#home"
                                class="text-pencil hover:text-correction transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:translate-x-1"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="#about"
                                class="text-pencil hover:text-correction transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:translate-x-1"></i>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="#services"
                                class="text-pencil hover:text-correction transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:translate-x-1"></i>
                                Layanan
                            </a>
                        </li>
                        <li>
                            <a href="#faq"
                                class="text-pencil hover:text-correction transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:translate-x-1"></i>
                                FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#contact"
                                class="text-pencil hover:text-correction transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:translate-x-1"></i>
                                Kontak
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Resources -->
                <div>
                    <h3 class="text-2xl font-kalam font-bold mb-6 text-pencil underline decoration-dashed decoration-correction decoration-2">Sumber Daya</h3>
                    <ul class="space-y-3 font-patrick text-lg">
                        <li>
                            <a href="#"
                                class="text-pencil hover:text-correction transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:translate-x-1"></i>
                                Kamus Video
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-pencil hover:text-correction transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:translate-x-1"></i>
                                Pelajaran
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-pencil hover:text-correction transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:translate-x-1"></i>
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-pencil hover:text-correction transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:translate-x-1"></i>
                                Bantuan
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-pencil hover:text-correction transition-colors duration-300 flex items-center group">
                                <i
                                    class="fas fa-arrow-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:translate-x-1"></i>
                                Kebijakan Privasi
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Contact Info -->
                <div>
                    <h3 class="text-2xl font-kalam font-bold mb-6 text-pencil underline decoration-wavy decoration-correction decoration-2">Hubungi Kami</h3>
                    <ul class="space-y-4 font-patrick text-lg">
                        <li class="flex items-start">
                            <div
                                class="w-10 h-10 bg-white border-2 border-pencil rounded-wobbly-md flex items-center justify-center text-pencil flex-shrink-0 mr-3 transform -rotate-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-sm text-pencil font-bold mb-1">Email</p>
                                <a href="mailto:info@isyaralearn.com"
                                    class="hover:text-correction transition-colors">
                                    info@isyaralearn.com
                                </a>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="w-10 h-10 bg-white border-2 border-pencil rounded-wobbly-md flex items-center justify-center text-pencil flex-shrink-0 mr-3 transform rotate-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <p class="text-sm text-pencil font-bold mb-1">Telepon</p>
                                <a href="tel:+62" class="hover:text-correction transition-colors">
                                    +62 XXX-XXXX-XXXX
                                </a>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="w-10 h-10 bg-white border-2 border-pencil rounded-wobbly-md flex items-center justify-center text-pencil flex-shrink-0 mr-3 transform -rotate-2">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <p class="text-sm text-pencil font-bold mb-1">Lokasi</p>
                                <p>Jakarta, Indonesia</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t-[3px] border-dashed border-pencil mt-12 pt-8 font-patrick text-lg">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-pencil font-bold tracking-wide">
                        &copy; 2024 IsyaraLearn. Dibuat dengan <i class="fas fa-heart text-correction mx-1 animate-pulse"></i>.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="hover:text-correction transition-colors hover:underline decoration-wavy">Syarat &
                            Ketentuan</a>
                        <a href="#" class="hover:text-correction transition-colors hover:underline decoration-wavy">Kebijakan
                            Privasi</a>
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
    <style>
        /* SweetAlert2 Hand-Drawn Theme Overrides */
        .swal2-popup.swal2-toast {
            background-color: #fdfbf7 !important;
            border: 3px solid #2d2d2d !important;
            border-radius: 255px 15px 225px 15px / 15px 225px 15px 255px !important;
            box-shadow: 4px 4px 0px 0px #2d2d2d !important;
            color: #2d2d2d !important;
            padding: 1rem 1.25rem !important;
            transform: rotate(1deg) !important;
            margin-top: 1rem !important;
        }
        .swal2-popup.swal2-toast .swal2-title {
            font-family: 'Kalam', cursive !important;
            font-weight: 700 !important;
            font-size: 1.25rem !important;
            color: #2d2d2d !important;
            margin-bottom: 0.25rem !important;
        }
        .swal2-popup.swal2-toast .swal2-html-container {
            font-family: 'Patrick Hand', cursive !important;
            font-size: 1rem !important;
            color: #2d2d2d !important;
            margin: 0 !important;
        }
        .swal2-popup.swal2-toast .swal2-timer-progress-bar {
            background-color: #ff4d4d !important;
        }
        .swal2-popup.swal2-toast .swal2-icon {
            border: none !important;
            margin: 0 0.75rem 0 0 !important;
            width: auto !important;
            height: auto !important;
        }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Shared Hand-Drawn Toast Configuration
        const toastConfig = {
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timerProgressBar: true,
            customClass: {
                icon: 'no-border'
            }
        };

        // Toast Notifications for Session Messages
        @if(session('success'))
        Swal.fire({
            ...toastConfig,
            iconHtml: '<span class="text-3xl transform rotate-12 inline-block">👌</span>',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            timer: 3000,
        });
        @endif

        @if(session('error'))
        Swal.fire({
            ...toastConfig,
            iconHtml: '<span class="text-3xl transform -rotate-12 inline-block">✋</span>',
            title: 'Gagal!',
            text: "{{ session('error') }}",
            timer: 5000,
        });
        @endif

        // Validation Errors Handling
        @if($errors->any())
        // Show a general toast for validation errors
        Swal.fire({
            ...toastConfig,
            iconHtml: '<span class="text-3xl transform rotate-12 inline-block">☝️</span>',
            title: 'Tunggu Dulu!',
            text: 'Terdapat kesalahan pada formulir. Silakan periksa kolom yang berwarna merah.',
            timer: 5000,
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