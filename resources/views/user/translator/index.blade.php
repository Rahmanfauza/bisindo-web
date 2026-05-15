@extends('layouts.app')

@section('title', 'Terjemahkan')

@section('content')
    <div class="min-h-screen bg-paper text-pencil pb-20 font-patrick relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20 overflow-hidden">
            <!-- Scribble 1 -->
            <svg class="absolute top-10 -left-20 w-64 h-64 text-pencil transform -rotate-12" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M42.7,-64.1C55.9,-54.6,67.6,-42.6,73.5,-27.9C79.4,-13.3,79.5,4.1,73.6,19.3C67.7,34.5,55.9,47.4,41.9,56.8C27.9,66.2,11.7,72.1,-3.2,76.5C-18.1,81,-31.7,84,-43.8,78.2C-55.9,72.4,-66.4,57.7,-73.2,41.6C-80,25.5,-83.1,8.1,-79.8,-8.1C-76.4,-24.3,-66.7,-39.3,-53.8,-48.9C-40.9,-58.5,-24.8,-62.7,-9.6,-61.7C5.6,-60.7,29.5,-73.5,42.7,-64.1Z" transform="translate(100 100)" />
            </svg>
            <!-- Scribble 2 -->
            <svg class="absolute bottom-20 -right-10 w-48 h-48 text-postit transform rotate-12" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M36.4,-57.4C46.5,-51.2,53.4,-39.4,61.9,-26.6C70.4,-13.8,80.5,0,78.2,12.2C75.8,24.4,61,35.1,47.2,43.2C33.4,51.4,20.6,57.2,5.5,54.5C-9.6,51.8,-27.1,40.7,-42.3,31C-57.5,21.3,-70.4,13,-73.5,1.8C-76.6,-9.4,-69.9,-23.4,-59.8,-33.5C-49.8,-43.6,-36.5,-49.7,-24,-54.5C-11.5,-59.2,26.3,-63.6,36.4,-57.4Z" transform="translate(100 100)" />
            </svg>
        </div>

        <div class="max-w-md mx-auto px-4 pt-10 relative z-10">

            <!-- Header Section -->
            <div class="mb-10 text-center transform -rotate-1">
                <h1 class="text-4xl font-bold text-pencil mb-3 font-kalam">Penerjemah Isyarat</h1>
                <p class="text-pencil leading-relaxed text-xl bg-gray-100 p-2 border-2 border-dashed border-pencil rounded-wobbly transform rotate-1 inline-block">
                    Menu ini adalah penerjemah bahasa isyarat menggunakan kamera. Silakan pilih kategori di bawah ini untuk memulai.
                </p>
            </div>

            <!-- Menu Cards -->
            <div class="space-y-6">

                <!-- Abjad Bisindo -->
                <a href="{{ route('translator.bisindo') }}"
                    class="block bg-white p-5 border-[4px] border-pencil rounded-wobbly shadow-wobbly-hover hover-jiggle transition group transform rotate-1 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-5">
                            <div class="w-16 h-16 bg-postit border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil group-hover:-rotate-12 transition">
                                <i class="fas fa-hand-paper text-3xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-pencil text-2xl font-kalam group-hover:underline decoration-wavy decoration-correction decoration-2">
                                    Abjad Bisindo
                                </h3>
                                <p class="text-pencil font-patrick text-md mt-1 opacity-80">Terjemahkan isyarat abjad Bisindo</p>
                            </div>
                        </div>
                        <i class="fas fa-arrow-right text-pencil text-xl group-hover:translate-x-1 transition"></i>
                    </div>
                </a>

                <!-- Abjad Sibi -->
                <a href="{{ route('translator.sibi') }}"
                    class="block bg-white p-5 border-[4px] border-pencil rounded-wobbly shadow-wobbly-hover hover-jiggle transition group transform -rotate-1 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-5">
                            <div class="w-16 h-16 bg-paper border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil group-hover:rotate-12 transition">
                                <i class="fas fa-sign-language text-3xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-pencil text-2xl font-kalam group-hover:underline decoration-wavy decoration-correction decoration-2">
                                    Abjad Sibi
                                </h3>
                                <p class="text-pencil font-patrick text-md mt-1 opacity-80">Terjemahkan isyarat abjad Sibi</p>
                            </div>
                        </div>
                        <i class="fas fa-arrow-right text-pencil text-xl group-hover:translate-x-1 transition"></i>
                    </div>
                </a>

                <!-- Kata Perkata -->
                <a href="{{ route('translator.bisindo_kata') }}"
                    class="block bg-white p-5 border-[4px] border-pencil rounded-wobbly shadow-wobbly-hover hover-jiggle transition group transform rotate-2 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-5">
                            <div class="w-16 h-16 bg-gray-100 border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil group-hover:-rotate-12 transition">
                                <i class="fas fa-language text-3xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-pencil text-2xl font-kalam group-hover:underline decoration-wavy decoration-correction decoration-2">
                                    Kata Perkata
                                </h3>
                                <p class="text-pencil font-patrick text-md mt-1 opacity-80">Terjemahkan isyarat kata demi kata</p>
                            </div>
                        </div>
                        <i class="fas fa-arrow-right text-pencil text-xl group-hover:translate-x-1 transition"></i>
                    </div>
                </a>

                <!-- Komunikasi Teks (TTS) -->
                <a href="{{ route('translator.tts') }}"
                    class="block bg-white p-5 border-[4px] border-pencil rounded-wobbly shadow-wobbly-hover hover-jiggle transition group transform -rotate-2 cursor-pointer">
                    <!-- Sticky tape for one distinct card -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-12 h-6 bg-gray-200 border-2 border-gray-300 transform rotate-4 shadow-sm opacity-80" style="border-radius: 2px 2px 3px 2px / 255px 15px 225px 15px;"></div>
                    
                    <div class="flex items-center justify-between relative z-10">
                        <div class="flex items-center gap-5">
                            <div class="w-16 h-16 bg-white border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil group-hover:rotate-12 transition">
                                <i class="fas fa-comment-alt text-3xl text-correction"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-pencil text-2xl font-kalam group-hover:underline decoration-wavy decoration-correction decoration-2">
                                    Komunikasi Teks
                                </h3>
                                <p class="text-pencil font-patrick text-md mt-1 opacity-80">Ketik pesan untuk diucapkan (TTS)</p>
                            </div>
                        </div>
                        <i class="fas fa-arrow-right text-pencil text-xl group-hover:translate-x-1 transition"></i>
                    </div>
                </a>

            </div>

        </div>
    </div>
@endsection