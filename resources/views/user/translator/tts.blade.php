@extends('layouts.app')

@section('title', 'Komunikasi Teks (TTS)')

@section('content')
    <div class="min-h-screen bg-gray-50 pb-20 font-jakarta">
        <div class="max-w-md mx-auto px-4 pt-8">

            <!-- Header Section -->
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-green-800 mb-2 font-outfit">Komunikasi Teks</h1>
                <p class="text-gray-500 leading-relaxed text-sm">
                    Ketik pesan Anda di bawah ini dan aplikasi akan membacakannya (Text-to-Speech).
                </p>
                <a href="{{ route('translator') }}"
                    class="inline-flex items-center gap-2 mt-4 text-green-600 hover:text-green-700 font-medium text-sm">
                    <i class="fas fa-arrow-left"></i> Kembali ke Menu
                </a>
            </div>

            <!-- TTS Input Section -->
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-green-50">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <i class="fas fa-comment-alt"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 text-lg font-outfit">Input Pesan</h3>
                        <p class="text-xs text-gray-500">Suara bahasa Indonesia</p>
                    </div>
                </div>

                <textarea id="tts-input" rows="5"
                    class="w-full p-4 bg-gray-50 rounded-xl border border-gray-100 focus:border-green-500 focus:ring-2 focus:ring-green-100 text-gray-700 resize-none font-medium transition-all outline-none"
                    placeholder="Tulis pesan anda disini..."></textarea>

                <div class="flex gap-3 mt-4 justify-end">
                    <button onclick="clearText()"
                        class="px-4 py-2 text-gray-400 hover:text-red-500 font-medium transition text-sm">
                        Hapus
                    </button>
                    <button onclick="speakText()"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-xl font-bold shadow-md shadow-green-200 transition-transform active:scale-95 flex items-center gap-2">
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