<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IsyaraLearn</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Swiper CSS for onboarding carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        /* Mobile-first responsive design */
        .nav-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .nav-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 0.7rem;
            padding: 0.5rem;
            flex: 1;
            max-width: 25%;
        }

        .nav-icon i {
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        /* Desktop adjustments */
        @media (min-width: 769px) {
            .nav-icon {
                font-size: 0.8rem;
                padding: 0.5rem 1rem;
            }

            .nav-icon i {
                font-size: 1.4rem;
            }
        }

        /* Content styling */
        .content-section {
            min-height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem 1rem;
        }

        .welcome-text {
            max-width: 500px;
        }
    </style>
</head>

<body class="bg-paper text-pencil font-patrick overflow-x-hidden">

    <!-- ===== HEADER / NAVBAR ===== -->
    <header class="bg-paper border-b-4 border-pencil shadow-wobbly sticky top-0 z-50">
        <nav class="w-full px-4 py-3">
            <div class="flex justify-center items-center gap-6">

                <a href="{{ route('dashboard') }}"
                    class="flex flex-col items-center {{ Route::is('dashboard') ? 'text-correction transform -rotate-2' : 'text-pencil' }} text-sm hover:text-correction hover-jiggle transition group">
                    <i class="fas fa-home text-2xl mb-1 group-hover:scale-110 transition-transform"></i>
                    <span class="font-kalam font-bold text-lg">Beranda</span>
                </a>

                <a href="{{ route('translator') }}"
                    class="flex flex-col items-center {{ Route::is('translator') ? 'text-correction transform rotate-2' : 'text-pencil' }} text-sm hover:text-correction hover-jiggle transition group">
                    <i class="fas fa-language text-2xl mb-1 group-hover:scale-110 transition-transform"></i>
                    <span class="font-kalam font-bold text-lg">Terjemahkan</span>
                </a>

                <a href="{{ route('dictionary') }}"
                    class="flex flex-col items-center {{ Route::is('dictionary') ? 'text-correction transform -rotate-1' : 'text-pencil' }} text-sm hover:text-correction hover-jiggle transition group">
                    <i class="fas fa-book text-2xl mb-1 group-hover:scale-110 transition-transform"></i>
                    <span class="font-kalam font-bold text-lg">Kamus</span>
                </a>

                <!-- Profile Dropdown -->
                <a href="{{ route('profile') }}" id="profileMenuBtn"
                    class="flex flex-col items-center {{ Route::is('profile') ? 'text-correction transform rotate-2' : 'text-pencil' }} text-sm focus:outline-none hover:text-correction hover-jiggle transition group">
                    <i class="fas fa-user text-2xl mb-1 group-hover:scale-110 transition-transform"></i>
                    <span class="font-kalam font-bold text-lg">Profil</span>
                </a>
            </div>
        </nav>
    </header>


    <!-- ===== MAIN CONTENT ===== -->
    <main>
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-paper text-pencil py-8 border-t-[4px] border-pencil shadow-wobbly mt-10 relative">
        <!-- Sticky tape decoration -->
        <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-16 h-6 bg-gray-200 border-2 border-gray-300 transform rotate-3 z-10 shadow-sm opacity-70"
            style="border-radius: 2px 2px 3px 2px / 255px 15px 225px 15px;"></div>

        <div class="max-w-7xl mx-auto px-6 text-center transform -rotate-1">
            <p class="font-patrick text-lg mb-2 font-bold opacity-80">&copy; 2023 IsyaraLearn. Hak cipta dilindungi.</p>
            <p
                class="text-correction font-kalam text-2xl underline decoration-wavy underline-offset-4 leading-relaxed mt-2">
                "Tangan Bicara, Hati Mendengar"</p>
        </div>
    </footer>

    <!-- Simple script to handle navigation active state -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Profile Dropdown Logic
            const profileBtn = document.getElementById('profileMenuBtn');
            const profileDropdown = document.getElementById('profileDropdown');

            if (profileBtn && profileDropdown) {
                profileBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    profileDropdown.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function (e) {
                    if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                        profileDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>

    <!-- Swiper JS for onboarding carousel -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- SweetAlert2 -->
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
                    iconHtml: "<span class='text-3xl transform {{ str_contains(strtolower(session('success')), 'keluar') ? '-rotate-12' : 'rotate-12' }} inline-block'>{{ str_contains(strtolower(session('success')), 'keluar') ? '👋' : '👌' }}</span>",
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

    <!-- Stack for child view scripts -->
    @stack('scripts')
</body>

</html>