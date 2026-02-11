@extends('layouts.app')

@section('title', 'Pengaturan')

@section('content')
    <div class="min-h-screen bg-gray-50 pb-20 font-jakarta">
        <div class="max-w-md mx-auto px-4 pt-6">
            <!-- Header -->
            <div class="flex items-center mb-8">
                <a href="{{ route('profile') }}" class="text-gray-800 hover:text-green-600 transition">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <h1 class="flex-1 text-center text-xl font-bold text-gray-800 font-outfit">Pengaturan</h1>
                <div class="w-5"></div> <!-- Spacer for centering -->
            </div>

            <!-- Preferences Section -->
            <div class="mb-8">
                <h2 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4 px-2 font-outfit">Preferensi</h2>
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                    <!-- Dark Mode -->
                    <div class="flex items-center justify-between p-5 border-b border-gray-50">
                        <div class="flex items-center gap-4">
                            <i class="fas fa-moon text-gray-600 text-lg"></i>
                            <div>
                                <p class="text-gray-800 font-medium">Mode Gelap</p>
                                <p class="text-xs text-gray-500">Gunakan tema gelap</p>
                            </div>
                        </div>
                        <!-- Toggle Switch -->
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                            </div>
                        </label>
                    </div>

                    <!-- Language -->
                    <div class="flex items-center justify-between p-5">
                        <div class="flex items-center gap-4">
                            <i class="fas fa-globe text-gray-600 text-lg"></i>
                            <div>
                                <p class="text-gray-800 font-medium">Bahasa UI</p>
                                <p class="text-xs text-gray-500">Indonesia</p>
                            </div>
                        </div>
                        <i class="fas fa-right-left text-gray-400 text-sm"></i>
                    </div>
                </div>
            </div>

            <!-- Data Section -->
            <div>
                <h2 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4 px-2 font-outfit">Data</h2>
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                    <!-- Reset Progress -->
                    <button class="w-full flex items-center justify-between p-5 hover:bg-red-50 transition text-left group">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center text-red-500 group-hover:bg-red-100 transition">
                                <i class="fas fa-trash-alt"></i>
                            </div>
                            <div>
                                <p class="text-red-500 font-bold">Reset Progres</p>
                                <p class="text-xs text-gray-500">Hapus semua data pembelajaran</p>
                            </div>
                        </div>
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection