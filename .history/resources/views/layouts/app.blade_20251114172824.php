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
        /* Custom styles for mobile responsiveness */
        @media (max-width: 768px) {
            .header-logo {
                display: none;
            }
        }
        
        .nav-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 0.75rem;
        }
        
        .nav-icon i {
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }
        
        .progress-bar {
            height: 6px;
            background-color: #e5e7eb;
            border-radius: 3px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background-color: #10b981;
        }
        
        .chapter-card {
            border-left: 4px solid #10b981;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- ===== HEADER / NAVBAR ===== -->
    <header class="bg-white shadow-md">
        <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo - hidden on mobile -->
            <a href="{{ url('/') }}" class="text-2xl font-bold text-green-600 header-logo">IsyaraLearn</a>
            
            <!-- Icon Navigation - always visible -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="nav-icon text-green-600">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="{{ route('dashboard') }}" class="nav-icon text-gray-500">
                    <i class="fas fa-dumbbell"></i>
                    <span>Instant Translator</span>
                </a>
                <a href="{{ route('dashboard') }}" class="nav-icon text-gray-500">
                    <i class="fas fa-book"></i>
                    <span>Dictionary</span>
                </a>
                <a href="{{ route('dashboard') }}" class="nav-icon text-gray-500">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </div>
        </nav>
    </header>

 

    <!-- ===== FOOTER ===== -->
    <footer class="bg-green-700 text-white py-6 mt-10">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <!-- Logo centered in footer -->
            <div class="mb-4">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-white">IsyaraLearn</a>
            </div>
            <p class="text-sm mb-2">&copy; 2023 IsyaraLearn. All rights reserved.</p>
            <p class="text-green-100 text-sm">"Tangan Bicara, Hati Mendengar"</p>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

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