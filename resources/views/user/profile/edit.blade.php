@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
    <div class="min-h-screen bg-paper pb-20 font-patrick relative overflow-hidden text-pencil">
        <!-- Decorative Background -->
        <div class="absolute inset-0 z-0 pointer-events-none opacity-20 overflow-hidden">
            <svg class="absolute top-10 right-10 w-48 h-48 text-pencil transform rotate-12" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M36.4,-57.4C46.5,-51.2,53.4,-39.4,61.9,-26.6C70.4,-13.8,80.5,0,78.2,12.2C75.8,24.4,61,35.1,47.2,43.2C33.4,51.4,20.6,57.2,5.5,54.5C-9.6,51.8,-27.1,40.7,-42.3,31C-57.5,21.3,-70.4,13,-73.5,1.8C-76.6,-9.4,-69.9,-23.4,-59.8,-33.5C-49.8,-43.6,-36.5,-49.7,-24,-54.5C-11.5,-59.2,26.3,-63.6,36.4,-57.4Z" transform="translate(100 100)" />
            </svg>
        </div>

        <div class="max-w-md mx-auto px-4 pt-8 relative z-10">
            <!-- Header -->
            <div class="flex items-center mb-10">
                <!-- Back Button -->
                <a href="{{ route('profile') }}" class="w-12 h-12 flex items-center justify-center bg-white border-[3px] border-pencil rounded-wobbly shadow-wobbly-hover text-pencil transform hover-jiggle transition cursor-pointer">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <h1 class="flex-1 text-center text-3xl font-bold text-pencil font-kalam">Edit Profil</h1>
                <div class="w-12"></div> <!-- Spacer for centering -->
            </div>

            <!-- Edit Form Card -->
            <div class="bg-white rounded-wobbly-lg border-[4px] border-pencil p-6 md:p-8 shadow-wobbly transform rotate-1">
                
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Avatar Upload -->
                    <div class="flex flex-col items-center mb-6">
                        <div class="w-28 h-28 relative mb-6 transform -rotate-2 hover-jiggle transition group">
                            <!-- Avatar Circle -->
                            <div class="w-full h-full bg-paper border-[4px] border-pencil rounded-wobbly overflow-hidden shadow-inner p-1">
                                <!-- Existing Avatar Display -->
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile"
                                        class="w-full h-full object-cover rounded-wobbly" id="avatarPreview">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-pencil bg-white rounded-wobbly" id="avatarPlaceholder">
                                        <i class="fas fa-user text-5xl"></i>
                                    </div>
                                    <img src="" alt="Preview" class="w-full h-full object-cover hidden rounded-wobbly" id="avatarPreview">
                                @endif
                            </div>
                            
                            <!-- Edit Camera Overlay Icon -->
                            <label for="avatar"
                                class="absolute bottom-[-5px] right-[-5px] w-12 h-12 flex items-center justify-center bg-postit text-pencil border-[3px] border-pencil rounded-wobbly shadow-wobbly hover-jiggle transition-all transform rotate-12 cursor-pointer group-hover:bg-white z-10">
                                <i class="fas fa-camera text-xl"></i>
                                <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*"
                                    onchange="previewImage(this)">
                            </label>
                        </div>
                        <p class="text-lg text-pencil font-patrick font-bold bg-white underline decoration-wavy decoration-correction underline-offset-4 transform rotate-1 px-2">Ketuk kamera untuk mengubah foto</p>
                    </div>

                    <!-- Name Input -->
                    <div class="transform -rotate-1">
                        <label for="name" class="block text-xl font-kalam font-bold text-pencil mb-2 ml-1">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                            class="w-full px-5 py-3 bg-white text-pencil text-xl font-patrick font-bold border-[3px] border-pencil rounded-wobbly shadow-inner focus:outline-none focus:ring-4 focus:ring-correction/30 transition placeholder-gray-400"
                            placeholder="Tulis nama anda disini..."
                            required>
                        @error('name')
                            <div class="mt-2 inline-block px-3 py-1 bg-red-100 border-2 border-correction rounded-wobbly text-correction text-sm font-bold font-patrick transform rotate-1">
                                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4 transform rotate-1">
                        <button type="submit"
                            class="w-full text-center py-4 bg-correction text-white border-[3px] border-pencil rounded-wobbly shadow-wobbly font-kalam font-bold text-2xl hover-jiggle transition duration-300 active:shadow-none active:translate-y-1 active:translate-x-1">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Image Preview Script -->
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