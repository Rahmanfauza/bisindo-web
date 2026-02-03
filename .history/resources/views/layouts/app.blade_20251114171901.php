<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IsyaraLearn</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    
    <style>
        /* Custom styles for mobile responsiveness */
        @media (max-width: 768px) {
            .header-logo {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- ===== HEADER / NAVBAR ===== -->
    <header class="bg-white shadow-md">
        <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo - hidden on mobile -->
            <a href="{{ url('/') }}" class="text-2xl font-bold text-green-600 header-logo">IsyaraLearn</a>
            
            <!-- Navigation links -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-green-600">Dashboard</a>
                <a href="{{ route('profile') }}" class="text-gray-700 hover:text-green-600">Profile</a>

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Logout</button>
                    </form>
                @endauth
            </div>
        </nav>
    </header>

    <!-- ===== KONTEN DINAMIS ===== -->
    <main class="min-h-[80vh]">
        <!-- Sample content for demonstration -->
        <div class="max-w-7xl mx-auto px-6 py-10">
            <h1 class="text-3xl font-bold mb-6">Selamat Datang di IsyaraLearn</h1>
            <p class="text-lg mb-4">Platform pembelajaran bahasa isyarat Indonesia yang lengkap dan mudah diakses.</p>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Fitur Utama</h2>
                <ul class="list-disc pl-5 space-y-2">
                    <li>Kursus bahasa isyarat interaktif</li>
                    <li>Kamus bahasa isyarat visual</li>
                    <li>Komunitas untuk berbagi pengalaman</li>
                    <li>Kuis dan evaluasi pembelajaran</li>
                </ul>
            </div>
        </div>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-green-700 text-white py-6 mt-10">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <!-- Logo centered in footer -->
            <div class="mb-4">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-white">IsyaraLearn</a>
            </div>
            <p class="text-sm mb-2">&copy; {{ date('Y') }} IsyaraLearn. All rights reserved.</p>
            <p class="text-green-100 text-sm">"Tangan Bicara, Hati Mendengar"</p>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Tempat script tambahan tiap halaman -->
    @stack('scripts')
</body>
</html>