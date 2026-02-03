@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Profile Card -->
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-12 text-center">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-lg mb-4">
                    <i class="fas fa-user text-5xl text-green-600"></i>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Profil Pengguna</h1>
                <p class="text-green-100">Informasi akun Anda</p>
            </div>

            <!-- Profile Information -->
            <div class="px-8 py-10">
                <div class="space-y-6">
                    <!-- Username -->
                    <div
                        class="bg-gray-50 rounded-xl p-6 border border-gray-200 hover:border-green-300 transition-colors">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user text-green-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <label
                                    class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Username</label>
                                <p class="mt-1 text-xl font-bold text-gray-800">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div
                        class="bg-gray-50 rounded-xl p-6 border border-gray-200 hover:border-green-300 transition-colors">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-envelope text-blue-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <label
                                    class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Email</label>
                                <p class="mt-1 text-xl font-bold text-gray-800 break-all">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Account Info -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-calendar text-purple-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <label class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Bergabung
                                    Sejak</label>
                                <p class="mt-1 text-lg font-semibold text-gray-800">
                                    {{ Auth::user()->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <!-- Back to Dashboard -->
                    <a href="{{ route('dashboard') }}"
                        class="flex-1 inline-flex items-center justify-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Dashboard
                    </a>

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent shadow-sm text-base font-medium rounded-xl text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Additional Info Card -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-6">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-500 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-semibold text-blue-900">Informasi</h3>
                    <p class="mt-1 text-sm text-blue-700">
                        Halaman ini menampilkan informasi profil Anda. Untuk mengubah informasi akun, silakan hubungi
                        administrator.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection