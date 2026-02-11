@extends('layouts.app')

@section('title', 'Terjemahkan')

@section('content')
    <div class="min-h-screen bg-gray-50 pb-20 font-jakarta">
        <div class="max-w-md mx-auto px-4 pt-8">

            <!-- Header Section -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-green-800 mb-2 font-outfit">Penerjemah Isyarat</h1>
                <p class="text-gray-500 leading-relaxed text-sm">
                    Menu ini adalah penerjemah bahasa isyarat menggunakan kamera. Silakan pilih kategori di bawah ini untuk
                    memulai.
                </p>
            </div>

            <!-- Menu Cards -->
            <div class="space-y-4">

                <!-- Abjad Bisindo -->
                <a href="{{ route('translator.bisindo') }}"
                    class="block bg-white p-5 rounded-3xl shadow-sm border border-green-50 hover:border-green-200 hover:shadow-md transition-all group">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-5">
                            <div
                                class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 group-hover:bg-green-100 transition shadow-inner">
                                <i class="fas fa-hand-paper text-2xl"></i>
                            </div>
                            <div>
                                <h3
                                    class="font-bold text-gray-800 text-lg group-hover:text-green-700 transition font-outfit">
                                    Abjad Bisindo</h3>
                                <p class="text-gray-500 text-xs mt-0.5">Terjemahkan isyarat abjad Bisindo</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-300 group-hover:text-green-500 transition"></i>
                    </div>
                </a>

                <!-- Abjad Sibi -->
                <a href="{{ route('translator.sibi') }}"
                    class="block bg-white p-5 rounded-3xl shadow-sm border border-green-50 hover:border-green-200 hover:shadow-md transition-all group">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-5">
                            <div
                                class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 group-hover:bg-green-100 transition shadow-inner">
                                <i class="fas fa-sign-language text-2xl"></i>
                            </div>
                            <div>
                                <h3
                                    class="font-bold text-gray-800 text-lg group-hover:text-green-700 transition font-outfit">
                                    Abjad Sibi</h3>
                                <p class="text-gray-500 text-xs mt-0.5">Terjemahkan isyarat abjad Sibi</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-300 group-hover:text-green-500 transition"></i>
                    </div>
                </a>

                <!-- Kata Perkata -->
                <a href="#"
                    class="block bg-white p-5 rounded-3xl shadow-sm border border-green-50 hover:border-green-200 hover:shadow-md transition-all group">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-5">
                            <div
                                class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center text-green-600 group-hover:bg-green-100 transition shadow-inner">
                                <i class="fas fa-language text-2xl"></i>
                            </div>
                            <div>
                                <h3
                                    class="font-bold text-gray-800 text-lg group-hover:text-green-700 transition font-outfit">
                                    Kata Perkata</h3>
                                <p class="text-gray-500 text-xs mt-0.5">Terjemahkan bahasa isyarat kata demi kata</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-300 group-hover:text-green-500 transition"></i>
                    </div>
                </a>
                <!-- Komunikasi Teks (TTS) -->
                <a href="{{ route('translator.tts') }}"
                    class="block bg-white p-5 rounded-3xl shadow-sm border border-green-50 hover:border-green-200 hover:shadow-md transition-all group">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-5">
                            <div
                                class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 group-hover:bg-green-100 transition shadow-inner">
                                <i class="fas fa-comment-alt text-2xl"></i>
                            </div>
                            <div>
                                <h3
                                    class="font-bold text-gray-800 text-lg group-hover:text-green-700 transition font-outfit">
                                    Komunikasi Teks</h3>
                                <p class="text-gray-500 text-xs mt-0.5">Ketik pesan untuk diucapkan (TTS)</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-300 group-hover:text-green-500 transition"></i>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection