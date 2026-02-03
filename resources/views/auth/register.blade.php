<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - IsyaraLearn</title>
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    .bg-primary-green {
        background-color: #339933;
    }

    .text-primary-green {
        color: #339933;
    }

    .focus-ring {
        box-shadow: 0 0 0 4px rgba(51, 153, 51, 0.1);
    }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4 md:p-8 relative overflow-x-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
        <div
            class="absolute -top-24 -right-24 w-96 h-96 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70">
        </div>
        <div
            class="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70">
        </div>
    </div>

    <div
        class="max-w-7xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row relative z-10 my-4 md:my-0">
        <!-- Form Section -->
        <div class="w-full md:w-1/2 p-8 md:p-12 lg:p-16">
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Buat Akun Baru</h1>
                <p class="text-gray-500">Bergabunglah dengan komunitas <span
                        class="text-primary-green font-semibold">IsyaraLearn</span> hari ini.</p>
            </div>

            <form action="{{ route('register') }}" method="POST" id="registrationForm" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-2">
                        <label for="firstName" class="text-sm font-medium text-gray-700 ml-1">Nama Depan</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i
                                    class="fas fa-user text-gray-400 group-focus-within:text-primary-green transition-colors"></i>
                            </div>
                            <input type="text" id="firstName" name="firstName"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#339933] focus:ring-4 focus:ring-green-500/10 transition-all duration-300 text-gray-800 placeholder-gray-400"
                                placeholder="John">
                        </div>
                        <span class="text-xs text-red-500 hidden font-medium ml-1" id="firstNameError">Nama depan wajib
                            diisi</span>
                    </div>

                    <div class="space-y-2">
                        <label for="lastName" class="text-sm font-medium text-gray-700 ml-1">Nama Belakang</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i
                                    class="fas fa-user text-gray-400 group-focus-within:text-primary-green transition-colors"></i>
                            </div>
                            <input type="text" id="lastName" name="lastName"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#339933] focus:ring-4 focus:ring-green-500/10 transition-all duration-300 text-gray-800 placeholder-gray-400"
                                placeholder="Doe">
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium text-gray-700 ml-1">Alamat Email</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i
                                class="fas fa-envelope text-gray-400 group-focus-within:text-primary-green transition-colors"></i>
                        </div>
                        <input type="email" id="email" name="email"
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#339933] focus:ring-4 focus:ring-green-500/10 transition-all duration-300 text-gray-800 placeholder-gray-400"
                            placeholder="nama@email.com">
                    </div>
                    <span class="text-xs text-red-500 hidden font-medium ml-1" id="emailError">Format email tidak
                        valid</span>
                </div>

                <div class="space-y-2">
                    <label for="password" class="text-sm font-medium text-gray-700 ml-1">Kata Sandi</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i
                                class="fas fa-lock text-gray-400 group-focus-within:text-primary-green transition-colors"></i>
                        </div>
                        <input type="password" id="password" name="password"
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#339933] focus:ring-4 focus:ring-green-500/10 transition-all duration-300 text-gray-800 placeholder-gray-400"
                            placeholder="Minimal 8 karakter">
                    </div>
                    <span class="text-xs text-red-500 hidden font-medium ml-1" id="passwordError">Minimal 8
                        karakter</span>
                </div>

                <div class="space-y-2">
                    <label for="confirmPassword" class="text-sm font-medium text-gray-700 ml-1">Konfirmasi Sandi</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i
                                class="fas fa-lock text-gray-400 group-focus-within:text-primary-green transition-colors"></i>
                        </div>
                        <input type="password" id="confirmPassword" name="confirmPassword"
                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#339933] focus:ring-4 focus:ring-green-500/10 transition-all duration-300 text-gray-800 placeholder-gray-400"
                            placeholder="Ulangi kata sandi">
                    </div>
                    <span class="text-xs text-red-500 hidden font-medium ml-1" id="confirmPasswordError">Kata sandi
                        tidak cocok</span>
                </div>

                <div class="flex items-center pt-2">
                    <input type="checkbox" id="terms" name="terms"
                        class="h-5 w-5 text-[#339933] rounded focus:ring-[#339933] border-gray-300 cursor-pointer">
                    <label for="terms" class="ml-3 block text-sm text-gray-600">
                        Saya setuju dengan <a href="#" class="text-primary-green font-semibold hover:underline">Syarat &
                            Ketentuan</a>
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-[#339933] text-white font-bold py-4 rounded-xl hover:bg-green-700 active:scale-[0.98] transition-all duration-300 shadow-lg hover:shadow-green-500/30 flex items-center justify-center gap-2 group mt-4">
                    <span>Daftar Sekarang</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </button>

                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun?
                        <a href="/" class="text-primary-green font-bold hover:underline ml-1">Masuk di sini</a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Illustration Section -->
        <div
            class="w-full md:w-1/2 bg-[#339933]/5 relative overflow-hidden flex items-center justify-center p-8 md:p-12">
            <!-- Decorative circles -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-[#339933]/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>

            <div class="relative z-10 text-center">
                <img src="{{ asset('img/Sign up-amico.svg') }}" alt="Ilustrasi Selamat Datang"
                    class="max-w-xs md:max-w-md w-full h-auto object-contain mb-8 drop-shadow-xl transform hover:scale-105 transition-transform duration-500">

                <h2 class="text-2xl font-bold text-gray-800 mb-3">Mulai Belajar Hari Ini</h2>
                <p class="text-gray-600 max-w-sm mx-auto">
                    Akses ribuan materi pembelajaran bahasa isyarat dan bergabunglah dengan komunitas inklusif kami.
                </p>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
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

            if (!isValid) {
                e.preventDefault();
            }
        });

        // Real-time validation for password confirmation
        document.getElementById('confirmPassword').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;

            if (confirmPassword && password !== confirmPassword) {
                document.getElementById('confirmPasswordError').classList.remove('hidden');
            } else {
                document.getElementById('confirmPasswordError').classList.add('hidden');
            }
        });
    });
    </script>
</body>

</html>