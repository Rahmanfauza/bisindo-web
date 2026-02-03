<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di BISINDO - Onboarding</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .swiper-pagination-bullet-active {
            background-color: #10B981 !important; /* Emerald 500 */
            width: 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center font-sans text-gray-800 antialiased">

    <div class="w-full max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden relative">
            
            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-32 h-32 bg-green-100 rounded-br-full opacity-50 z-0"></div>
            <div class="absolute bottom-0 right-0 w-40 h-40 bg-blue-50 rounded-tl-full opacity-50 z-0"></div>

            <div class="relative z-10 p-8 md:p-12">
                
                <!-- Header Logo (Optional) -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-800">
                        BISINDO
                    </h1>
                    <p class="text-gray-500 text-sm tracking-widest uppercase mt-1">Belajar Bahasa Isyarat</p>
                </div>

                {{-- Swiper --}}
                <div class="swiper-container overflow-hidden pb-12">
                    <div class="swiper-wrapper">
                        {{-- Slide 1 --}}
                        <div class="swiper-slide flex flex-col items-center text-center">
                            <div class="mb-8 w-64 h-64 bg-green-50 rounded-full flex items-center justify-center shadow-inner">
                                <span class="text-6xl">🎓</span>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Belajar dengan Mudah</h2>
                            <p class="text-gray-600 max-w-md mx-auto leading-relaxed">
                                Akses materi pembelajaran bahasa isyarat yang terstruktur dan mudah dipahami kapan saja, di mana saja.
                            </p>
                        </div>

                        {{-- Slide 2 --}}
                        <div class="swiper-slide flex flex-col items-center text-center">
                            <div class="mb-8 w-64 h-64 bg-blue-50 rounded-full flex items-center justify-center shadow-inner">
                                <span class="text-6xl">💬</span>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Praktik Langsung</h2>
                            <p class="text-gray-600 max-w-md mx-auto leading-relaxed">
                                Latih kemampuan Anda dengan skenario percakapan nyata dan tingkatkan kepercayaan diri Anda.
                            </p>
                        </div>

                        {{-- Slide 3 --}}
                        <div class="swiper-slide flex flex-col items-center text-center">
                            <div class="mb-8 w-64 h-64 bg-yellow-50 rounded-full flex items-center justify-center shadow-inner">
                                <span class="text-6xl">🏆</span>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Raih Prestasi</h2>
                            <p class="text-gray-600 max-w-md mx-auto leading-relaxed">
                                Kumpulkan poin, buka lencana, dan rayakan setiap pencapaian dalam perjalanan belajar Anda.
                            </p>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination !bottom-0"></div>
                </div>

                <!-- Action Area -->
                <div class="mt-10 flex justify-center">
                    <form action="{{ route('onboarding.complete') }}" method="POST">
                        @csrf
                        <button id="get-started" type="submit" class="group relative inline-flex items-center justify-center px-8 py-3 text-base font-medium text-white bg-emerald-600 rounded-full overflow-hidden shadow-lg transition-all duration-300 ease-in-out hover:bg-emerald-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 opacity-50 cursor-not-allowed pointer-events-none transform translate-y-2">
                            <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-10"></span>
                            <span class="relative flex items-center gap-2">
                                Mulai Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </button>
                    </form>
                </div>

                <!-- Skip/Navigation Controls (Optional) -->
                <div class="mt-6 flex justify-between items-center px-4 text-sm text-gray-400">
                    <button class="swiper-button-prev-custom hover:text-gray-600 transition">Kembali</button>
                    <button class="swiper-button-next-custom hover:text-gray-600 transition">Lanjut</button>
                </div>

            </div>
        </div>
        
        <p class="text-center text-gray-400 text-xs mt-8">
            &copy; {{ date('Y') }} BISINDO. All rights reserved.
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    timer: 3000,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top'
                });
            @endif
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('get-started');
            let seen = 0; // Track max slide index seen

            const swiper = new Swiper('.swiper-container', {
                speed: 500,
                spaceBetween: 30,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },
                on: {
                    slideChange: function () {
                        // Update seen state
                        if (this.activeIndex > seen) {
                            seen = this.activeIndex;
                        }

                        // Check if we are on the last slide (index 2)
                        if (this.activeIndex === 2) {
                            // Enable button with animation
                            btn.classList.remove('opacity-50', 'cursor-not-allowed', 'pointer-events-none', 'translate-y-2');
                            btn.classList.add('translate-y-0');
                            
                            // Hide "Next" button on last slide
                            document.querySelector('.swiper-button-next-custom').style.opacity = '0';
                            document.querySelector('.swiper-button-next-custom').style.pointerEvents = 'none';
                        } else {
                            // Disable button if going back
                            // Optional: Keep it enabled if they've already seen the end? 
                            // Requirements say "when registered onboarding appears", usually implies completing it once.
                            // Let's keep it disabled until they reach the end again to encourage reading?
                            // Or better UX: once unlocked, stay unlocked.
                            if (seen < 2) {
                                btn.classList.add('opacity-50', 'cursor-not-allowed', 'pointer-events-none', 'translate-y-2');
                                btn.classList.remove('translate-y-0');
                            }
                            
                            // Show "Next" button
                            document.querySelector('.swiper-button-next-custom').style.opacity = '1';
                            document.querySelector('.swiper-button-next-custom').style.pointerEvents = 'auto';
                        }

                        // Hide "Prev" button on first slide
                        if (this.activeIndex === 0) {
                            document.querySelector('.swiper-button-prev-custom').style.opacity = '0';
                            document.querySelector('.swiper-button-prev-custom').style.pointerEvents = 'none';
                        } else {
                            document.querySelector('.swiper-button-prev-custom').style.opacity = '1';
                            document.querySelector('.swiper-button-prev-custom').style.pointerEvents = 'auto';
                        }
                    },
                    init: function() {
                        // Initial check
                        document.querySelector('.swiper-button-prev-custom').style.opacity = '0';
                        document.querySelector('.swiper-button-prev-custom').style.pointerEvents = 'none';
                    }
                }
            });
        });
    </script>
</body>
</html>