<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IsyaraLearn</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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

            <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-green-600 text-sm">
                <i class="fas fa-home text-lg"></i>
                <span>Home</span>
            </a>

            <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-gray-500 text-sm">
                <i class="fas fa-language text-lg"></i>
                <span>Translator</span>
            </a>

            <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-gray-500 text-sm">
                <i class="fas fa-book text-lg"></i>
                <span>Dictionary</span>
            </a>

            <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-gray-500 text-sm">
                <i class="fas fa-user text-lg"></i>
                <span>Profile</span>
            </a>

        </div>
    </nav>
</header>


    <!-- ===== MAIN CONTENT ===== -->
    <main>
        <div class="content-section">
            <div class="welcome-text">
                <h1 class="text-3xl font-bold text-green-700 mb-4">Selamat Datang di IsyaraLearn</h1>
                <p class="text-lg text-gray-600 mb-6">
                    Platform pembelajaran bahasa isyarat Indonesia yang lengkap dan mudah diakses.
                </p>
                <div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
                    <h2 class="text-xl font-semibold mb-4 text-green-700">Fitur Utama</h2>
                    <ul class="space-y-3 text-left">
                        <li class="flex items-start">
                            <i class="fas fa-graduation-cap text-green-500 mt-1 mr-3"></i>
                            <span>Kursus bahasa isyarat interaktif</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-language text-green-500 mt-1 mr-3"></i>
                            <span>Penerjemah instan bahasa isyarat</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-book-open text-green-500 mt-1 mr-3"></i>
                            <span>Kamus bahasa isyarat visual</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-users text-green-500 mt-1 mr-3"></i>
                            <span>Komunitas untuk berbagi pengalaman</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-green-700 text-white py-6">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <!-- Logo centered in footer -->
            <div class="mb-4">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-white">IsyaraLearn</a>
            </div>
            <p class="text-sm mb-2">&copy; 2023 IsyaraLearn. All rights reserved.</p>
            <p class="text-green-100 text-sm">"Tangan Bicara, Hati Mendengar"</p>
        </div>
    </footer>

    <!-- Simple script to handle navigation active state -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set active navigation item
            const navItems = document.querySelectorAll('.nav-icon');
            
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all items
                    navItems.forEach(nav => {
                        nav.classList.remove('text-green-600');
                        nav.classList.add('text-gray-500');
                    });
                    
                    // Add active class to clicked item
                    this.classList.remove('text-gray-500');
                    this.classList.add('text-green-600');
                });
            });
        });
    </script>
</body>
</html>