@extends('layouts.app')

@section('title', 'Komunikasi Teks (TTS)')

@section('content')
<div class="min-h-screen bg-paper text-pencil pb-20 font-patrick relative overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 z-0 pointer-events-none opacity-20 overflow-hidden">
        <svg class="absolute top-10 left-10 w-48 h-48 text-pencil transform -rotate-12" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M36.4,-57.4C46.5,-51.2,53.4,-39.4,61.9,-26.6C70.4,-13.8,80.5,0,78.2,12.2C75.8,24.4,61,35.1,47.2,43.2C33.4,51.4,20.6,57.2,5.5,54.5C-9.6,51.8,-27.1,40.7,-42.3,31C-57.5,21.3,-70.4,13,-73.5,1.8C-76.6,-9.4,-69.9,-23.4,-59.8,-33.5C-49.8,-43.6,-36.5,-49.7,-24,-54.5C-11.5,-59.2,26.3,-63.6,36.4,-57.4Z" transform="translate(100 100)" />
        </svg>
    </div>

    <div class="max-w-md mx-auto px-4 pt-10 relative z-10">

        <!-- Header Section -->
        <div class="mb-10 text-center transform rotate-1">
            <h1 class="text-4xl font-bold text-pencil mb-2 font-kalam">Komunikasi Teks</h1>
            <p class="text-pencil leading-relaxed text-lg bg-gray-100 p-2 border-2 border-dashed border-pencil rounded-wobbly inline-block transform -rotate-1">
                Ketik pesan Anda di bawah ini dan aplikasi akan membacakannya (Text-to-Speech).
            </p>
            <br>
            <a href="{{ route('translator') }}"
                class="inline-flex items-center gap-2 mt-6 px-4 py-2 bg-white border-[3px] border-pencil rounded-wobbly shadow-wobbly-hover hover-jiggle text-pencil font-bold text-xl font-kalam transition cursor-pointer active:shadow-none active:translate-y-1 active:rotate-2">
                <i class="fas fa-arrow-left text-correction"></i> Kembali ke Menu
            </a>
        </div>

        <!-- TTS Input Section -->
        <div class="bg-white p-6 rounded-wobbly-lg shadow-wobbly border-[4px] border-pencil transform -rotate-1 relative">
            <!-- Sketchy corner pin -->
            <div class="absolute -top-3 -left-3 w-8 h-8 bg-ballpoint rounded-full shadow-md z-20 border-2 border-pencil"></div>
            <div class="absolute -top-[10px] left-[10px] w-3 h-3 bg-white rounded-full z-20 opacity-80"></div>

            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-postit border-2 border-pencil rounded-wobbly flex items-center justify-center text-pencil shadow-inner transform rotate-3">
                    <i class="fas fa-comment-alt text-2xl text-correction"></i>
                </div>
                <div>
                    <h3 class="font-bold text-pencil text-2xl font-kalam underline decoration-wavy decoration-correction decoration-2">Input Pesan</h3>
                    <p class="text-lg text-pencil font-patrick">Suara bahasa Indonesia</p>
                </div>
            </div>

            <!-- Text Area -->
            <div class="relative transform rotate-1">
                <textarea id="tts-input" rows="6"
                    class="w-full p-4 bg-paper rounded-wobbly border-[3px] border-pencil shadow-inner text-pencil font-patrick text-xl font-bold resize-none transition-all outline-none focus:ring-4 focus:ring-correction/30 placeholder-gray-400"
                    placeholder="Tulis pesan anda disini..."></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-4 mt-6 justify-end transform -rotate-1">
                <button onclick="clearText()"
                    class="px-5 py-2 bg-white border-2 border-pencil text-pencil hover:bg-correction hover:text-white rounded-wobbly shadow-wobbly-hover font-kalam font-bold text-xl transition hover-jiggle active:shadow-none active:translate-y-1 active:translate-x-1 cursor-pointer">
                    <i class="fas fa-trash-alt text-lg mr-1"></i> Hapus
                </button>
                <button onclick="speakText()"
                    class="px-6 py-2 bg-correction border-[3px] border-pencil text-white rounded-wobbly shadow-wobbly font-kalam font-bold text-2xl hover-jiggle transition active:shadow-none active:translate-y-1 active:translate-x-1 flex items-center gap-2 cursor-pointer relative top-[-2px]">
                    <i class="fas fa-volume-up"></i> Putar Suara
                </button>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        function speakText() {
            const input = document.getElementById('tts-input');
            const text = input.value.trim();
            if (!text) return;

            if ('speechSynthesis' in window) {
                // Cancel any current speech
                window.speechSynthesis.cancel();

                const utterance = new SpeechSynthesisUtterance(text);
                utterance.lang = 'id-ID'; // Indonesian
                utterance.rate = 0.9;

                window.speechSynthesis.speak(utterance);
            } else {
                alert("Browser anda tidak mendukung fitur ini.");
            }
        }

        function clearText() {
            const input = document.getElementById('tts-input');
            input.value = '';
            input.focus();
        }
    </script>
@endpush
@endsection