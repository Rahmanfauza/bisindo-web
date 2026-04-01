<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di BISINDO - Onboarding</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Swiper CSS for onboarding carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom Swiper Pagination - Hand-drawn style */
        .swiper-pagination-bullet {
            background-color: transparent !important;
            border: 2px solid #2d2d2d !important;
            opacity: 0.5;
            width: 12px;
            height: 12px;
            border-radius: 5px 8px 4px 6px / 6px 4px 7px 5px !important;
            /* wobbly circle */
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background-color: #ff4d4d !important;
            /* Accent Red */
            border-color: #2d2d2d !important;
            opacity: 1;
            width: 24px;
            border-radius: 8px 4px 7px 5px / 5px 8px 4px 6px !important;
            /* elongated wobbly shape */
            transform: rotate(-2deg);
        }
    </style>
</head>

<body
    class="bg-paper text-pencil font-patrick min-h-screen flex items-center justify-center antialiased overflow-x-hidden relative">

    <!-- Background Decorative Textures/Scribbles -->
    <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden opacity-30">
        <svg class="absolute top-10 left-10 w-48 h-48 text-erased transform -rotate-12" viewBox="0 0 200 200"
            xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor"
                d="M42.7,-64.1C55.9,-54.6,67.6,-42.6,73.5,-27.9C79.4,-13.3,79.5,4.1,73.6,19.3C67.7,34.5,55.9,47.4,41.9,56.8C27.9,66.2,11.7,72.1,-3.2,76.5C-18.1,81,-31.7,84,-43.8,78.2C-55.9,72.4,-66.4,57.7,-73.2,41.6C-80,25.5,-83.1,8.1,-79.8,-8.1C-76.4,-24.3,-66.7,-39.3,-53.8,-48.9C-40.9,-58.5,-24.8,-62.7,-9.6,-61.7C5.6,-60.7,29.5,-73.5,42.7,-64.1Z"
                transform="translate(100 100)" />
        </svg>
        <svg class="absolute bottom-10 right-10 w-64 h-64 text-postit transform rotate-12" viewBox="0 0 200 200"
            xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor"
                d="M36.4,-57.4C46.5,-51.2,53.4,-39.4,61.9,-26.6C70.4,-13.8,80.5,0,78.2,12.2C75.8,24.4,61,35.1,47.2,43.2C33.4,51.4,20.6,57.2,5.5,54.5C-9.6,51.8,-27.1,40.7,-42.3,31C-57.5,21.3,-70.4,13,-73.5,1.8C-76.6,-9.4,-69.9,-23.4,-59.8,-33.5C-49.8,-43.6,-36.5,-49.7,-24,-54.5C-11.5,-59.2,26.3,-63.6,36.4,-57.4Z"
                transform="translate(100 100)" />
        </svg>
    </div>

    <div class="w-full max-w-4xl mx-auto p-4 sm:p-6 relative z-10">
        <!-- Main Hand-Drawn Container -->
        <div
            class="bg-white border-[4px] border-pencil rounded-wobbly-lg shadow-wobbly-lg overflow-hidden relative transform rotate-1 transition-transform duration-500 hover:rotate-0">

            <!-- Sticky Tape Decoration -->
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-32 h-10 bg-gray-200 border-2 border-gray-300 transform -rotate-2 z-20 shadow-sm opacity-80"
                style="border-radius: 2px 2px 3px 2px / 255px 15px 225px 15px;"></div>

            <div class="relative z-10 p-8 md:p-12">

                <!-- Header -->
                <div class="text-center mb-10 transform -rotate-2">
                    <h1 class="text-4xl md:text-5xl font-kalam font-bold text-pencil inline-block relative">
                        ISYARALEARN
                        <span class="absolute -bottom-2 left-0 w-full opacity-60">
                            <svg viewBox="0 0 100 10" preserveAspectRatio="none"
                                class="w-full h-3 text-correction stroke-current">
                                <path d="M0,5 Q20,10 40,5 T80,5 T100,5" fill="none" stroke-width="3"
                                    stroke-linecap="round" />
                            </svg>
                        </span>
                    </h1>
                    <div class="mt-4">
                        <span
                            class="font-patrick text-xl text-pencil bg-postit inline-block px-4 py-1 border-2 border-pencil rounded-wobbly shadow-wobbly-hover transform rotate-3">
                            Belajar Bahasa Isyarat
                        </span>
                    </div>
                </div>

                <!-- Swiper -->
                <div class="swiper-container overflow-hidden pb-14">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide flex flex-col items-center text-center">
                            <div
                                class="mx-auto mb-8 w-48 h-48 md:w-56 md:h-56 bg-paper border-[4px] border-pencil rounded-wobbly shadow-wobbly flex items-center justify-center transform hover-jiggle">
                                <i class="fas fa-graduation-cap text-6xl md:text-7xl text-pencil"></i>
                            </div>
                            <h2 class="text-3xl font-kalam font-bold text-pencil mb-4">Belajar dengan Mudah</h2>
                            <p class="text-xl font-patrick text-pencil max-w-md mx-auto leading-relaxed px-4">
                                Akses materi pembelajaran bahasa isyarat yang terstruktur dan mudah dipahami kapan saja,
                                di mana saja.
                            </p>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide flex flex-col items-center text-center">
                            <div
                                class="mx-auto mb-8 w-48 h-48 md:w-56 md:h-56 bg-postit border-[4px] border-pencil rounded-wobbly shadow-wobbly flex items-center justify-center transform -rotate-2 hover-jiggle">
                                <i class="fas fa-comments text-6xl md:text-7xl text-pencil"></i>
                            </div>
                            <h2 class="text-3xl font-kalam font-bold text-pencil mb-4">Praktik Langsung</h2>
                            <p class="text-xl font-patrick text-pencil max-w-md mx-auto leading-relaxed px-4">
                                Latih kemampuan Anda dengan skenario percakapan nyata dan tingkatkan kepercayaan diri
                                Anda.
                            </p>
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide flex flex-col items-center text-center">
                            <div
                                class="mx-auto mb-8 w-48 h-48 md:w-56 md:h-56 bg-white border-[4px] border-pencil rounded-wobbly shadow-wobbly flex items-center justify-center transform rotate-2 hover-jiggle">
                                <i class="fas fa-trophy text-6xl md:text-7xl text-correction"></i>
                            </div>
                            <h2 class="text-3xl font-kalam font-bold text-pencil mb-4">Raih Prestasi</h2>
                            <p class="text-xl font-patrick text-pencil max-w-md mx-auto leading-relaxed px-4">
                                Kumpulkan poin, buka lencana, dan rayakan setiap pencapaian dalam perjalanan belajar
                                Anda.
                            </p>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination !bottom-2"></div>
                </div>

                <!-- Action Area -->
                <div class="mt-8 flex justify-center">
                    <form action="{{ route('onboarding.complete') }}" method="POST">
                        @csrf
                        <button id="get-started" type="submit"
                            class="bg-correction text-white border-[3px] border-pencil py-4 rounded-wobbly shadow-wobbly font-kalam font-bold text-2xl px-10 flex items-center justify-center gap-3 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed group transform translate-y-4 opacity-0 pointer-events-none">
                            <span>Mulai Sekarang</span>
                            <i
                                class="fas fa-arrow-right text-lg group-hover:translate-x-1 group-disabled:translate-x-0 transition-transform"></i>
                        </button>
                    </form>
                </div>

                <!-- Navigation Controls -->
                <div
                    class="mt-8 flex justify-between items-center px-4 md:px-8 font-kalam font-bold text-xl text-pencil">
                    <button
                        class="swiper-button-prev-custom hover:text-correction hover:underline decoration-wavy transition-colors focus:outline-none flex items-center gap-2 px-2 py-1">
                        <i class="fas fa-arrow-left text-sm"></i>
                        <span>Kembali</span>
                    </button>
                    <button
                        class="swiper-button-next-custom hover:text-correction hover:underline decoration-wavy transition-colors focus:outline-none flex items-center gap-2 px-2 py-1">
                        <span>Lanjut</span>
                        <i class="fas fa-arrow-right text-sm"></i>
                    </button>
                </div>

            </div>
        </div>

        <p class="text-center font-patrick text-pencil font-bold mt-8 transform -rotate-1">
            &copy; {{ date('Y') }} BISINDO. Dibuat dengan <i
                class="fas fa-heart text-correction mx-1 animate-pulse"></i>.
        </p>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* SweetAlert2 Hand-Drawn Theme Overrides for Toasts */
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
        document.addEventListener('DOMContentLoaded', function () {
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
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('get-started');
            let seen = 0;

            const swiper = new Swiper('.swiper-container', {
                speed: 600,
                spaceBetween: 30,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },
                on: {
                    slideChange: function () {
                        if (this.activeIndex > seen) {
                            seen = this.activeIndex;
                        }

                        if (this.activeIndex === 2) {
                            btn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4', 'disabled:opacity-50', 'disabled:cursor-not-allowed');
                            btn.classList.add('translate-y-0', 'hover-jiggle');
                            btn.removeAttribute('disabled');

                            document.querySelector('.swiper-button-next-custom').style.opacity = '0';
                            document.querySelector('.swiper-button-next-custom').style.pointerEvents = 'none';
                        } else {
                            if (seen < 2) {
                                btn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
                                btn.classList.remove('translate-y-0', 'hover-jiggle');
                                btn.setAttribute('disabled', 'true');
                            }

                            document.querySelector('.swiper-button-next-custom').style.opacity = '1';
                            document.querySelector('.swiper-button-next-custom').style.pointerEvents = 'auto';
                        }

                        if (this.activeIndex === 0) {
                            document.querySelector('.swiper-button-prev-custom').style.opacity = '0';
                            document.querySelector('.swiper-button-prev-custom').style.pointerEvents = 'none';
                        } else {
                            document.querySelector('.swiper-button-prev-custom').style.opacity = '1';
                            document.querySelector('.swiper-button-prev-custom').style.pointerEvents = 'auto';
                        }
                    },
                    init: function () {
                        document.querySelector('.swiper-button-prev-custom').style.opacity = '0';
                        document.querySelector('.swiper-button-prev-custom').style.pointerEvents = 'none';
                        btn.setAttribute('disabled', 'true');
                    }
                }
            });
        });
    </script>
</body>

</html>