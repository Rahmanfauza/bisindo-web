<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#339933',
                        'primary-light': '#4CAF50',
                        'primary-dark': '#2E7D32',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .btn-primary {
            background: #339933;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #2E7D32;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(51, 153, 51, 0.3);
        }

        .input-focus:focus {
            border-color: #339933;
            box-shadow: 0 0 0 2px rgba(51, 153, 51, 0.2);
        }

        .illustration-container {
            background: linear-gradient(135deg, #f9f9f9, #f0f7f0);
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-4xl w-full form-container bg-white rounded-xl overflow-hidden flex flex-col md:flex-row">
        <!-- Form Section -->
        <div class="w-full md:w-1/2 p-6 md:p-8">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold mb-2">Register ke <span class="text-green-600 text-3xl font-extrabold">IsyaraLearn</span></h1>
                <p class="text-gray-600 text-sm"></p>
            </div>

            <form action="{{ route('register') }}" method="POST" id="registrationForm" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">Nama Depan</label>
                        <div class="relative">
                            <input type="text" id="firstName" name="firstName" class="w-full px-3 py-2 border border-gray-300 rounded-lg input-focus focus:outline-none transition duration-300" placeholder="Nama depan">
                            <i class="fas fa-user absolute right-3 top-2.5 text-gray-400 text-sm"></i>
                        </div>
                        <span class="text-xs text-red-500 hidden" id="firstNameError">Nama depan harus diisi</span>
                    </div>

                    <div>
                        <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Nama Belakang</label>
                        <div class="relative">
                            <input type="text" id="lastName" name="lastName" class="w-full px-3 py-2 border border-gray-300 rounded-lg input-focus focus:outline-none transition duration-300" placeholder="Nama belakang">
                            <i class="fas fa-user absolute right-3 top-2.5 text-gray-400 text-sm"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg input-focus focus:outline-none transition duration-300" placeholder="nama@contoh.com">
                        <i class="fas fa-envelope absolute right-3 top-2.5 text-gray-400 text-sm"></i>
                    </div>
                    <span class="text-xs text-red-500 hidden" id="emailError">Format email tidak valid</span>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg input-focus focus:outline-none transition duration-300" placeholder="Minimal 8 karakter">
                        <i class="fas fa-lock absolute right-3 top-2.5 text-gray-400 text-sm"></i>
                    </div>
                    <span class="text-xs text-red-500 hidden" id="passwordError">Kata sandi minimal 8 karakter</span>
                </div>

                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                    <div class="relative">
                        <input type="password" id="confirmPassword" name="confirmPassword" class="w-full px-3 py-2 border border-gray-300 rounded-lg input-focus focus:outline-none transition duration-300" placeholder="Ulangi kata sandi">
                        <i class="fas fa-lock absolute right-3 top-2.5 text-gray-400 text-sm"></i>
                    </div>
                    <span class="text-xs text-red-500 hidden" id="confirmPasswordError">Kata sandi tidak cocok</span>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-primary rounded focus:ring-primary border-gray-300">
                    <label for="terms" class="ml-2 block text-xs text-gray-700">
                        Saya setuju dengan <a href="#" class="text-primary font-medium hover:underline">Syarat & Ketentuan</a>
                    </label>
                </div>

                <button type="submit" class="w-full btn-primary text-white font-medium py-2.5 px-4 rounded-lg transition duration-300">
                    Daftar Sekarang
                </button>

                <div class="text-center text-xs text-gray-600">
                    Sudah punya akun?
                    <!-- PERBAIKAN: Ganti route('home') dengan '/' -->
                    <a href="/" class="text-primary font-medium hover:underline">Masuk di sini</a>
                </div>
            </form>

            <div class="mt-6 pt-4 border-t border-gray-200">
                <p class="text-center text-xs text-gray-600 mb-3">Atau daftar dengan</p>
                <div class="flex justify-center space-x-3">
                    <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:bg-gray-50 transition duration-300">
                        <i class="fab fa-google text-sm text-red-500"></i>
                    </button>
                    <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:bg-gray-50 transition duration-300">
                        <i class="fab fa-facebook-f text-sm text-blue-600"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Illustration Section -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6 md:p-8 bg-green-50 rounded-l-3xl">
            <img src="{{ asset('img/Sign up-amico.svg') }}"
                alt="Ilustrasi Selamat Datang"
                class="max-w-xs md:max-w-md w-full h-auto object-contain">
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('registrationForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Reset errors
                document.querySelectorAll('.text-red-500').forEach(el => {
                    el.classList.add('hidden');
                });

                let isValid = true;

                // Validate first name
                const firstName = document.getElementById('firstName').value;
                if (!firstName.trim()) {
                    document.getElementById('firstNameError').classList.remove('hidden');
                    isValid = false;
                }

                // Validate email
                const email = document.getElementById('email').value;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    document.getElementById('emailError').classList.remove('hidden');
                    isValid = false;
                }

                // Validate password
                const password = document.getElementById('password').value;
                if (password.length < 8) {
                    document.getElementById('passwordError').classList.remove('hidden');
                    isValid = false;
                }

                // Validate confirm password
                const confirmPassword = document.getElementById('confirmPassword').value;
                if (password !== confirmPassword) {
                    document.getElementById('confirmPasswordError').classList.remove('hidden');
                    isValid = false;
                }

                // Validate terms
                const terms = document.getElementById('terms').checked;
                if (!terms) {
                    alert('Anda harus menyetujui syarat dan ketentuan');
                    isValid = false;
                }

                if (isValid) {
                    this.submit();
                }
            });
        });
    </script>
</body>
</html>