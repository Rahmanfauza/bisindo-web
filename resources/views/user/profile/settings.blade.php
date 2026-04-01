@extends('layouts.app')

@section('title', 'Pengaturan')

@section('content')
    <div class="min-h-screen bg-paper text-pencil pb-20 font-patrick relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20 overflow-hidden">
            <svg class="absolute top-10 right-10 w-48 h-48 text-pencil transform rotate-12" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M36.4,-57.4C46.5,-51.2,53.4,-39.4,61.9,-26.6C70.4,-13.8,80.5,0,78.2,12.2C75.8,24.4,61,35.1,47.2,43.2C33.4,51.4,20.6,57.2,5.5,54.5C-9.6,51.8,-27.1,40.7,-42.3,31C-57.5,21.3,-70.4,13,-73.5,1.8C-76.6,-9.4,-69.9,-23.4,-59.8,-33.5C-49.8,-43.6,-36.5,-49.7,-24,-54.5C-11.5,-59.2,26.3,-63.6,36.4,-57.4Z" transform="translate(100 100)" />
            </svg>
        </div>

        <div class="max-w-md mx-auto px-4 pt-8 relative z-10">
            <!-- Header -->
            <div class="flex items-center mb-10">
                <a href="{{ route('profile') }}" class="w-12 h-12 flex items-center justify-center bg-white border-[3px] border-pencil rounded-wobbly shadow-wobbly-hover text-pencil transform hover-jiggle transition cursor-pointer">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <h1 class="flex-1 text-center text-3xl font-bold text-pencil font-kalam">Pengaturan</h1>
                <div class="w-12"></div> <!-- Spacer for centering -->
            </div>

            <!-- Preferensi Section -->
            <div class="mb-10">
                <h2 class="inline-block px-3 py-1 bg-postit border-2 border-pencil rounded-wobbly text-xl font-bold font-kalam text-pencil shadow-sm transform -rotate-2 mb-4">Preferensi</h2>
                
                <div class="bg-white border-[4px] border-pencil rounded-wobbly-lg shadow-wobbly transform rotate-1 overflow-hidden p-2">
                    <!-- Dark Mode -->
                    <div class="flex items-center justify-between p-4 border-b-[3px] border-dashed border-pencil">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gray-100 border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil">
                                <i class="fas fa-moon text-xl"></i>
                            </div>
                            <div>
                                <p class="text-pencil font-kalam font-bold text-xl">Mode Gelap</p>
                                <p class="text-pencil font-patrick text-sm opacity-80">Gunakan tema gelap</p>
                            </div>
                        </div>
                        
                        <!-- Wobbly Hand-Drawn Toggle Switch -->
                        <label class="relative inline-flex items-center cursor-pointer transform hover-jiggle">
                            <!-- We disable actual functionality for now if it's just visual, but keep structure -->
                            <input type="checkbox" value="" class="sr-only peer">
                            <div class="w-14 h-8 bg-paper border-[3px] border-pencil rounded-wobbly peer-focus:outline-none transition-colors peer-checked:bg-postit"></div>
                            <div class="absolute w-6 h-6 bg-white border-[3px] border-pencil rounded-wobbly shadow-sm transform transition-transform duration-300 left-[4px] peer-checked:translate-x-[24px]"></div>
                        </label>
                    </div>

                    <!-- Language -->
                    <div class="flex items-center justify-between p-4 cursor-pointer group">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gray-100 border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil group-hover:-rotate-12 transition transform">
                                <i class="fas fa-globe text-xl"></i>
                            </div>
                            <div>
                                <p class="text-pencil font-kalam font-bold text-xl">Bahasa UI</p>
                                <p class="text-pencil font-patrick text-sm opacity-80 decoration-wavy group-hover:underline">Indonesia</p>
                            </div>
                        </div>
                        <i class="fas fa-exchange-alt text-pencil text-lg group-hover:scale-110 transition"></i>
                    </div>
                </div>
            </div>

            <!-- Data Section -->
            <div>
                <h2 class="inline-block px-3 py-1 bg-white border-2 border-pencil rounded-wobbly text-xl font-bold font-kalam text-pencil shadow-sm transform rotate-1 mb-4">Data System</h2>
                
                <div class="bg-paper border-[4px] border-pencil rounded-wobbly-lg p-2 shadow-wobbly transform -rotate-1 overflow-hidden relative">
                    <!-- Reset Progress -->
                    <button class="w-full flex items-center justify-between p-4 bg-correction text-white border-[3px] border-pencil rounded-wobbly shadow-wobbly-hover transform hover-jiggle transition group active:shadow-none active:translate-y-1 active:translate-x-1">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white border-[3px] border-pencil rounded-wobbly flex items-center justify-center text-correction group-hover:rotate-12 transition">
                                <i class="fas fa-trash-alt text-2xl"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-white font-kalam font-bold text-2xl tracking-wide">Reset Progres</p>
                                <p class="text-white font-patrick text-sm opacity-90">Hapus semua data pembelajaran</p>
                            </div>
                        </div>
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection