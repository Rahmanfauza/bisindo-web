<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IsyaraLearn')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper CSS (jika onboarding butuh) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- ===== HEADER / NAVBAR ===== -->
    <header class="bg-white shadow-md">
        <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-green-600">IsyaraLearn</a>
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
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-green-700 text-white py-6 mt-10">
        <div class="max-w-7xl mx-auto px-6 text-center text-sm">
            <p>&copy; {{ date('Y') }} IsyaraLearn. All rights reserved.</p>
            <p class="text-green-100">"Tangan Bicara, Hati Mendengar"</p>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Tempat script tambahan tiap halaman -->
    @stack('scripts')
</body>
</html>