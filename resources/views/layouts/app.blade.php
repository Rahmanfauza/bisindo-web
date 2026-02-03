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

<body class="bg-gray-50 text-gray-800">

    <!-- ===== HEADER / NAVBAR ===== -->
    <header class="bg-white shadow-md sticky top-0 z-10">
        <nav class="w-full px-4 py-3">
            <div class="flex justify-center items-center gap-6">

                <a href="{{ route('dashboard') }}" class="flex flex-col items-center {{ Route::is('dashboard') ? 'text-green-600' : 'text-gray-500' }} text-sm hover:text-green-600 transition">
                    <i class="fas fa-home text-lg"></i>
                    <span>Home</span>
                </a>

                <a href="{{ route('translator') }}" class="flex flex-col items-center {{ Route::is('translator') ? 'text-green-600' : 'text-gray-500' }} text-sm hover:text-green-600 transition">
                    <i class="fas fa-language text-lg"></i>
                    <span>Translator</span>
                </a>

                <a href="{{ route('dictionary') }}" class="flex flex-col items-center {{ Route::is('dictionary') ? 'text-green-600' : 'text-gray-500' }} text-sm hover:text-green-600 transition">
                    <i class="fas fa-book text-lg"></i>
                    <span>Dictionary</span>
                </a>

                <!-- Profile Dropdown -->
                <a href="{{ route('profile') }}" id="profileMenuBtn"
                    class="flex flex-col items-center {{ Route::is('profile') ? 'text-green-600' : 'text-gray-500' }} text-sm focus:outline-none hover:text-green-600 transition">
                    <i class="fas fa-user text-lg"></i>
                    <span>Profile</span>
                </a>
            </div>
        </nav>
    </header>


    <!-- ===== MAIN CONTENT ===== -->
    <main>
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-green-700 text-white py-6">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-sm mb-2">&copy; 2023 IsyaraLearn. All rights reserved.</p>
            <p class="text-green-100 text-sm">"Tangan Bicara, Hati Mendengar"</p>
        </div>
    </footer>

    <!-- Simple script to handle navigation active state -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Profile Dropdown Logic
        const profileBtn = document.getElementById('profileMenuBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileBtn && profileDropdown) {
            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
        Swal.fire({
            iconHtml: "{{ str_contains(strtolower(session('success')), 'keluar') ? '👋' : '👌' }}",
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top',
            color: "{{ str_contains(strtolower(session('success')), 'keluar') ? '#EF4444' : '#10B981' }}",
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
    });
    </script>

    <!-- Stack for child view scripts -->
    @stack('scripts')
</body>

</html>