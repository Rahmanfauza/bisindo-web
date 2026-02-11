@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
    <div class="min-h-screen bg-gray-50 pb-20 font-jakarta">
        <div class="max-w-md mx-auto px-4 pt-6">
            <!-- Back Button -->
            <a href="{{ route('profile') }}"
                class="inline-flex items-center text-gray-500 hover:text-green-600 mb-6 transition">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>

            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100">
                <h1 class="text-2xl font-bold text-gray-800 mb-6 font-outfit">Edit Profil</h1>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Avatar Upload -->
                    <div class="flex flex-col items-center mb-6">
                        <div class="w-24 h-24 relative mb-4">
                            <div
                                class="w-full h-full rounded-full overflow-hidden border-4 border-green-100 shadow-inner bg-gray-100">
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile"
                                        class="w-full h-full object-cover" id="avatarPreview">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400"
                                        id="avatarPlaceholder">
                                        <i class="fas fa-user text-4xl"></i>
                                    </div>
                                    <img src="" alt="Preview" class="w-full h-full object-cover hidden" id="avatarPreview">
                                @endif
                            </div>
                            <label for="avatar"
                                class="absolute bottom-0 right-0 w-8 h-8 flex items-center justify-center bg-white text-green-600 rounded-full shadow-md border border-gray-100 hover:bg-green-50 hover:scale-105 transition-all duration-200 group cursor-pointer">
                                <i class="fas fa-camera text-xs group-hover:text-green-700"></i>
                                <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*"
                                    onchange="previewImage(this)">
                            </label>
                        </div>
                        <p class="text-sm text-gray-500">Ketuk ikon kamera untuk mengubah foto</p>
                    </div>

                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 transition"
                            required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl shadow-md transition transform hover:scale-[1.02]">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    const preview = document.getElementById('avatarPreview');
                    const placeholder = document.getElementById('avatarPlaceholder');

                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection