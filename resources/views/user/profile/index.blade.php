@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="min-h-screen bg-paper text-pencil pb-20 font-patrick relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20 overflow-hidden">
            <!-- Scribble 1 -->
            <svg class="absolute top-20 -left-10 w-48 h-48 text-pencil transform -rotate-12" viewBox="0 0 200 200"
                xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor"
                    d="M42.7,-64.1C55.9,-54.6,67.6,-42.6,73.5,-27.9C79.4,-13.3,79.5,4.1,73.6,19.3C67.7,34.5,55.9,47.4,41.9,56.8C27.9,66.2,11.7,72.1,-3.2,76.5C-18.1,81,-31.7,84,-43.8,78.2C-55.9,72.4,-66.4,57.7,-73.2,41.6C-80,25.5,-83.1,8.1,-79.8,-8.1C-76.4,-24.3,-66.7,-39.3,-53.8,-48.9C-40.9,-58.5,-24.8,-62.7,-9.6,-61.7C5.6,-60.7,29.5,-73.5,42.7,-64.1Z"
                    transform="translate(100 100)" />
            </svg>
            <!-- Scribble 2 -->
            <svg class="absolute bottom-40 -right-10 w-64 h-64 text-postit transform rotate-12" viewBox="0 0 200 200"
                xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor"
                    d="M36.4,-57.4C46.5,-51.2,53.4,-39.4,61.9,-26.6C70.4,-13.8,80.5,0,78.2,12.2C75.8,24.4,61,35.1,47.2,43.2C33.4,51.4,20.6,57.2,5.5,54.5C-9.6,51.8,-27.1,40.7,-42.3,31C-57.5,21.3,-70.4,13,-73.5,1.8C-76.6,-9.4,-69.9,-23.4,-59.8,-33.5C-49.8,-43.6,-36.5,-49.7,-24,-54.5C-11.5,-59.2,26.3,-63.6,36.4,-57.4Z"
                    transform="translate(100 100)" />
            </svg>
        </div>

        <div class="max-w-md mx-auto pt-6 px-4 relative z-10">
            <!-- Header/Profile Info -->
            <div
                class="bg-white pt-10 pb-8 px-4 text-center border-[4px] border-pencil rounded-wobbly-lg shadow-wobbly-lg mb-10 transform rotate-1 relative mt-6">
                <!-- Sticky Tape -->
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-24 h-8 bg-gray-200 border-2 border-gray-300 transform -rotate-2 z-20 shadow-sm opacity-80"
                    style="border-radius: 2px 2px 3px 2px / 255px 15px 225px 15px;"></div>

                <div class="relative w-28 h-28 mx-auto mb-6 transform -rotate-2 hover-jiggle">
                    <div
                        class="w-full h-full bg-paper border-[4px] border-pencil rounded-wobbly shadow-wobbly overflow-hidden p-1">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile"
                                class="w-full h-full object-cover rounded-wobbly hover:grayscale-100 transition-all duration-300">
                        @else
                            <div class="w-full h-full bg-white rounded-wobbly flex items-center justify-center text-pencil">
                                <i class="fas fa-user text-5xl"></i>
                            </div>
                        @endif
                    </div>
                    <!-- Customize Avatar Icon -->
                    <a href="{{ route('profile.edit') }}"
                        class="absolute bottom-[-5px] right-[-5px] w-10 h-10 flex items-center justify-center bg-postit text-pencil border-[3px] border-pencil rounded-wobbly shadow-wobbly hover-jiggle transition-all duration-300 transform rotate-12 z-10 hover:bg-white">
                        <i class="fas fa-camera text-sm"></i>
                    </a>
                </div>

                <h1 class="text-4xl font-bold text-pencil mb-2 font-kalam leading-tight">{{ Auth::user()->name }}</h1>
                <p
                    class="text-pencil font-medium bg-gray-100 px-3 py-1 inline-block border-2 border-dashed border-pencil rounded-wobbly text-lg mb-5 transform -rotate-1">
                    {{ Auth::user()->email }}
                </p>

                <!-- Level Badge -->
                <div class="mt-2">
                    <div
                        class="inline-flex items-center gap-2 px-5 py-2 bg-correction text-white border-[3px] border-pencil rounded-wobbly text-xl font-kalam font-bold shadow-wobbly transform rotate-2 hover-jiggle cursor-pointer">
                        <i class="fas fa-medal"></i>
                        <span>Pemula</span>
                    </div>
                </div>
            </div>

            <!-- Streak Card -->
            <div
                class="bg-paper border-[4px] border-pencil rounded-wobbly-lg p-6 shadow-wobbly transform -rotate-1 mb-8 relative overflow-hidden">
                <!-- Thumbtack Decoration -->
                <div
                    class="absolute -top-1 -right-1 w-6 h-6 bg-ballpoint rounded-full shadow-md z-20 border-2 border-pencil">
                </div>
                <div class="absolute -top-[1px] right-[1px] w-2 h-2 bg-white rounded-full z-20 opacity-80"></div>

                <div class="flex justify-between items-start mb-6">
                    <span
                        class="bg-white px-3 py-1 border-[3px] border-pencil rounded-wobbly text-sm font-kalam font-bold text-pencil shadow-wobbly-hover transform -rotate-2">
                        Streak Pemula
                    </span>
                    <div
                        class="flex items-center gap-2 text-pencil font-kalam font-bold text-lg bg-white px-3 py-1 border-[3px] border-pencil rounded-wobbly shadow-wobbly-hover transform rotate-2">
                        <i class="fas fa-fire text-correction"></i>
                        <span>0 Hari</span>
                    </div>
                </div>

                <div class="text-center mb-8 relative">
                    <div
                        class="w-24 h-24 mx-auto bg-white border-[4px] border-pencil rounded-wobbly flex items-center justify-center shadow-wobbly mb-4 transform rotate-3 hover-jiggle">
                        <i class="fas fa-fire text-5xl text-correction"></i>
                    </div>
                    <h3
                        class="text-pencil font-kalam font-bold text-3xl underline decoration-wavy decoration-correction decoration-2 underline-offset-4 mb-2">
                        Mulai Streak Harian!</h3>
                    <p class="text-pencil font-patrick text-xl">Belajar konsisten setiap hari</p>
                </div>

                <!-- Days -->
                <div class="flex justify-between items-center px-1 mb-2">
                    @foreach (['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] as $day)
                        <div class="flex flex-col items-center gap-2">
                            <!-- Check circle -->
                            <div
                                class="w-10 h-10 border-[3px] border-pencil rounded-wobbly flex items-center justify-center transition-all duration-300 {{ $loop->first ? 'bg-correction text-white transform -rotate-6 shadow-wobbly-hover' : 'bg-white text-transparent transform rotate-' . rand(-6, 6) }}">
                                <i class="fas fa-check text-md"></i>
                            </div>
                            <span class="text-lg text-pencil font-patrick font-bold">{{ $day }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Progress List -->
            <div class="mb-10">
                <h3
                    class="text-pencil font-kalam font-bold text-3xl mb-6 flex items-center justify-center md:justify-start">
                    <i class="fas fa-chart-line mr-3 text-correction transform -rotate-12"></i>
                    Progress Belajar
                </h3>

                <div class="space-y-4">
                    <!-- Stat Item 1 -->
                    <div
                        class="bg-white p-4 border-[3px] border-pencil border-dashed rounded-wobbly flex items-center justify-between shadow-wobbly-hover transform rotate-1 hover-jiggle transition cursor-pointer">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-postit border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil">
                                <i class="fas fa-percent text-xl"></i>
                            </div>
                            <span class="text-pencil font-kalam font-bold text-xl">Modul Selesai</span>
                        </div>
                        <span
                            class="text-pencil font-kalam font-bold text-2xl bg-white border-2 border-pencil px-3 py-1 transform -rotate-3">75%</span>
                    </div>

                    <!-- Stat Item 2 -->
                    <div
                        class="bg-white p-4 border-[3px] border-pencil rounded-wobbly flex items-center justify-between shadow-wobbly-hover transform -rotate-1 hover-jiggle transition cursor-pointer">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-paper border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil">
                                <i class="fas fa-book text-xl"></i>
                            </div>
                            <span class="text-pencil font-kalam font-bold text-xl">Modul Terakhir</span>
                        </div>
                        <span
                            class="text-pencil font-patrick font-bold text-xl underline decoration-dashed decoration-2 underline-offset-4">Dasar
                            Bisindo</span>
                    </div>

                    <!-- Stat Item 3 -->
                    <div
                        class="bg-white p-4 border-[3px] border-pencil border-dashed rounded-wobbly flex items-center justify-between shadow-wobbly-hover transform rotate-2 hover-jiggle transition cursor-pointer">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-gray-100 border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil">
                                <i class="fas fa-question text-xl"></i>
                            </div>
                            <span class="text-pencil font-kalam font-bold text-xl">Skor Rata-rata</span>
                        </div>
                        <span
                            class="text-pencil font-kalam font-bold text-2xl bg-postit border-2 border-pencil px-3 py-1 transform rotate-3">85</span>
                    </div>

                    <!-- Stat Item 4 -->
                    <div
                        class="bg-white p-4 border-[3px] border-pencil rounded-wobbly flex items-center justify-between shadow-wobbly-hover transform -rotate-2 hover-jiggle transition cursor-pointer">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-paper border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil">
                                <i class="fas fa-stopwatch text-xl transform -rotate-12"></i>
                            </div>
                            <span class="text-pencil font-kalam font-bold text-xl">Waktu Belajar</span>
                        </div>
                        <span class="text-pencil font-patrick font-bold text-xl">12j 30m</span>
                    </div>
                </div>
            </div>

            <!-- Profile Actions -->
            <div class="space-y-4 mb-8">
                <!-- Edit Profile Button -->
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center p-4 bg-white border-[3px] border-pencil rounded-wobbly shadow-wobbly transform rotate-1 hover-jiggle hover:bg-postit transition group">
                    <div
                        class="w-12 h-12 bg-gray-100 border-2 border-pencil rounded-wobbly flex items-center justify-center mr-4 text-pencil transform group-hover:-rotate-12 transition">
                        <i class="fas fa-user-edit text-xl"></i>
                    </div>
                    <span class="text-pencil font-bold font-kalam text-2xl flex-1 mt-1">Edit Profil</span>
                    <i class="fas fa-arrow-right text-pencil transform group-hover:translate-x-1 transition"></i>
                </a>

                <!-- Settings Button -->
                <a href="{{ route('settings') }}"
                    class="flex items-center p-4 bg-white border-[3px] border-pencil rounded-wobbly shadow-wobbly transform -rotate-1 hover-jiggle hover:bg-postit transition group">
                    <div
                        class="w-12 h-12 bg-gray-100 border-2 border-pencil rounded-wobbly flex items-center justify-center mr-4 text-pencil transform group-hover:rotate-12 transition">
                        <i class="fas fa-cog text-xl"></i>
                    </div>
                    <span class="text-pencil font-bold font-kalam text-2xl flex-1 mt-1">Pengaturan</span>
                    <i class="fas fa-arrow-right text-pencil transform group-hover:translate-x-1 transition"></i>
                </a>
            </div>

            <!-- Action Buttons Grid -->
            <div class="grid grid-cols-2 gap-4 pb-6">
                <!-- Back to Home -->
                <a href="{{ route('dashboard') }}"
                    class="flex flex-col items-center justify-center py-6 px-4 bg-white border-[3px] border-pencil rounded-wobbly shadow-wobbly transform rotate-2 hover-jiggle hover:bg-postit transition group">
                    <div
                        class="w-14 h-14 bg-paper border-2 border-pencil rounded-wobbly flex items-center justify-center mb-3 text-pencil group-hover:-rotate-6 transition">
                        <i class="fas fa-home text-3xl"></i>
                    </div>
                    <span class="text-2xl font-kalam font-bold text-pencil">Beranda</span>
                </a>

                <!-- Log Out -->
                <form action="{{ route('logout') }}" method="POST" class="w-full block">
                    @csrf
                    <button type="submit"
                        class="w-full h-full flex flex-col items-center justify-center py-6 px-4 bg-correction border-[3px] border-pencil rounded-wobbly shadow-wobbly transform -rotate-2 hover-jiggle transition group active:shadow-none active:translate-y-1 active:translate-x-1">
                        <div
                            class="w-14 h-14 bg-white border-2 border-pencil rounded-wobbly flex items-center justify-center mb-3 text-correction group-hover:rotate-6 transition shadow-wobbly-hover">
                            <i class="fas fa-sign-out-alt text-3xl"></i>
                        </div>
                        <span class="text-2xl font-kalam font-bold text-white tracking-wider">Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection