@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="min-h-screen bg-gray-50 pb-20 font-jakarta">
        <!-- Header/Profile Info -->
        <div class="max-w-md mx-auto bg-white pt-8 pb-6 px-4 text-center rounded-b-[2rem] shadow-sm mb-6">
            <div class="relative w-24 h-24 mx-auto mb-4">
                <div class="w-full h-full rounded-full overflow-hidden border-4 border-green-100 shadow-inner">
                    <!-- Fallback Avatar -->
                    @if(Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                            <i class="fas fa-user text-4xl"></i>
                        </div>
                    @endif
                </div>
                <!-- Edit Icon -->
                <a href="{{ route('profile.edit') }}"
                    class="absolute bottom-0 right-0 w-8 h-8 flex items-center justify-center bg-white text-green-600 rounded-full shadow-md border border-gray-100 hover:bg-green-50 hover:scale-105 transition-all duration-200 group">
                    <i class="fas fa-camera text-xs group-hover:text-green-700"></i>
                </a>
            </div>

            <h1 class="text-2xl font-bold text-gray-800 mb-1 font-outfit">{{ Auth::user()->name }}</h1>
            <p class="text-gray-500 text-sm mb-4">{{ Auth::user()->email }}</p>

            <!-- Level Badge -->
            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 bg-green-50 text-green-700 rounded-full text-sm font-medium border border-green-100">
                <i class="fas fa-medal"></i>
                <span>Beginner</span>
            </div>
        </div>

        <div class="max-w-md mx-auto px-4 space-y-6">
            <!-- Streak Card -->
            <div class="bg-green-50 rounded-[2rem] p-6 shadow-sm border border-green-100">
                <div class="flex justify-between items-start mb-6">
                    <span
                        class="bg-white/80 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-green-800 shadow-sm">
                        Beginner
                    </span>
                    <div class="flex items-center gap-1 text-green-700 font-bold">
                        <i class="fas fa-tint"></i>
                        <span>0</span>
                    </div>
                </div>

                <div class="text-center mb-8">
                    <div class="w-20 h-20 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-3">
                        <i class="fas fa-fire text-4xl text-green-500"></i>
                    </div>
                    <h3 class="text-green-800 font-bold text-lg">Mulai streak harian!</h3>
                    <p class="text-green-600 text-xs mt-1">Belajar konsisten setiap hari</p>
                </div>

                <!-- Days -->
                <div class="flex justify-between items-center px-1">
                    @foreach (['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] as $day)
                        <div class="flex flex-col items-center gap-2">
                            <!-- Check circle -->
                            <div
                                class="w-8 h-8 rounded-full border-2 {{ $loop->first ? 'bg-green-500 border-green-500 text-white' : 'border-green-200 bg-white text-transparent' }} flex items-center justify-center transition-all">
                                <i class="fas fa-check text-xs"></i>
                            </div>
                            <span class="text-xs text-gray-500 font-medium">{{ $day }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="h-px bg-green-200 w-full my-6"></div>

                <!-- Progress List -->
                <h3 class="text-gray-700 font-bold text-lg mb-4 font-outfit">Progress Pembelajaran</h3>

                <div class="space-y-3">
                    <!-- Stat Item 1 -->
                    <div
                        class="bg-white p-3 rounded-2xl flex items-center justify-between shadow-sm border border-green-50/50">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center text-green-600">
                                <i class="fas fa-percent"></i>
                            </div>
                            <span class="text-gray-600 font-medium">Modul Selesai</span>
                        </div>
                        <span class="text-green-600 font-bold">75%</span>
                    </div>

                    <!-- Stat Item 2 -->
                    <div
                        class="bg-white p-3 rounded-2xl flex items-center justify-between shadow-sm border border-green-50/50">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600">
                                <i class="fas fa-book"></i>
                            </div>
                            <span class="text-gray-600 font-medium">Modul Terakhir</span>
                        </div>
                        <span class="text-green-600 font-semibold text-sm">Dasar Bisindo</span>
                    </div>

                    <!-- Stat Item 3 -->
                    <div
                        class="bg-white p-3 rounded-2xl flex items-center justify-between shadow-sm border border-green-50/50">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600">
                                <i class="fas fa-question"></i>
                            </div>
                            <span class="text-gray-600 font-medium">Skor Kuis Rata-rata</span>
                        </div>
                        <span class="text-green-600 font-bold">85</span>
                    </div>

                    <!-- Stat Item 4 -->
                    <div
                        class="bg-white p-3 rounded-2xl flex items-center justify-between shadow-sm border border-green-50/50">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600">
                                <i class="fas fa-stopwatch"></i>
                            </div>
                            <span class="text-gray-600 font-medium">Total Waktu Belajar</span>
                        </div>
                        <span class="text-green-600 font-bold">12j 30m</span>
                    </div>
                </div>
            </div>
            <!-- Profile Actions -->
            <div class="space-y-4">
                <!-- Edit Profile Button -->
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center p-4 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition group">
                    <div
                        class="w-10 h-10 bg-green-50 rounded-full flex items-center justify-center mr-4 text-green-600 group-hover:bg-green-100 transition">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <span class="text-gray-700 font-medium font-outfit text-lg flex-1">Edit Profil</span>
                    <i class="fas fa-chevron-right text-gray-300 group-hover:text-green-500 transition"></i>
                </a>

                <!-- Settings Button -->
                <a href="{{ route('settings') }}"
                    class="flex items-center p-4 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition group">
                    <div
                        class="w-10 h-10 bg-green-50 rounded-full flex items-center justify-center mr-4 text-green-600 group-hover:bg-green-100 transition">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span class="text-gray-700 font-medium font-outfit text-lg flex-1">Pengaturan</span>
                    <i class="fas fa-chevron-right text-gray-300 group-hover:text-green-500 transition"></i>
                </a>
            </div>
            <!-- Action Buttons -->
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('dashboard') }}"
                    class="flex flex-col items-center justify-center p-4 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center mb-2 text-gray-600">
                        <i class="fas fa-home"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-600">Beranda</span>
                </a>

                <form action="{{ route('logout') }}" method="POST" class="w-full block">
                    @csrf
                    <button type="submit"
                        class="w-full h-full flex flex-col items-center justify-center p-4 bg-white border border-red-50 rounded-2xl shadow-sm hover:shadow-md hover:bg-red-50 transition group">
                        <div
                            class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center mb-2 text-red-500 group-hover:bg-red-100 transition">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <span class="text-sm font-medium text-red-500">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection