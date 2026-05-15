@extends('layouts.app')

@section('title', 'Kata Bisindo - Penerjemah Isyarat Kata')

@section('content')
<div class="min-h-screen bg-paper text-pencil pb-20 font-patrick relative overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 z-0 pointer-events-none opacity-20 overflow-hidden">
        <svg class="absolute top-10 right-20 w-48 h-48 text-pencil transform rotate-12" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M36.4,-57.4C46.5,-51.2,53.4,-39.4,61.9,-26.6C70.4,-13.8,80.5,0,78.2,12.2C75.8,24.4,61,35.1,47.2,43.2C33.4,51.4,20.6,57.2,5.5,54.5C-9.6,51.8,-27.1,40.7,-42.3,31C-57.5,21.3,-70.4,13,-73.5,1.8C-76.6,-9.4,-69.9,-23.4,-59.8,-33.5C-49.8,-43.6,-36.5,-49.7,-24,-54.5C-11.5,-59.2,26.3,-63.6,36.4,-57.4Z" transform="translate(100 100)" />
        </svg>
    </div>

    <div class="max-w-4xl mx-auto px-4 pt-8 relative z-10">

        <!-- Header Section -->
        <div class="mb-10 text-center transform -rotate-1">
            <h1 class="text-4xl font-bold text-pencil mb-2 font-kalam">Kata Bisindo</h1>
            <p class="text-pencil leading-relaxed text-lg bg-gray-100 p-2 border-2 border-dashed border-pencil rounded-wobbly inline-block transform rotate-1">
                Arahkan kamera ke tubuh dan tangan Anda untuk menerjemahkan kata Bisindo secara real-time.
            </p>
            <br>
            <a href="{{ route('translator') }}"
                class="inline-flex items-center gap-2 mt-6 px-4 py-2 bg-white border-[3px] border-pencil rounded-wobbly shadow-wobbly-hover hover-jiggle text-pencil font-bold text-xl font-kalam transition cursor-pointer active:shadow-none active:translate-y-1 active:-rotate-2">
                <i class="fas fa-arrow-left text-correction"></i> Kembali ke Menu
            </a>
        </div>

        <!-- Detection Container -->
        <div class="flex flex-col items-center">

            <!-- Video/Canvas Container -->
            <div class="relative w-[640px] h-[480px] bg-paper rounded-wobbly-lg overflow-hidden border-[6px] border-pencil shadow-wobbly-lg mb-8 max-w-full transform rotate-1 transition">
                <video id="input_video"
                    class="absolute top-0 left-0 w-full h-full object-cover"></video>
                <canvas id="output_canvas" width="640" height="480"
                    class="absolute top-0 left-0 w-full h-full object-contain"></canvas>
            </div>

            <!-- Status Indicator -->
            <div id="status"
                class="mb-6 px-6 py-3 border-[3px] border-pencil rounded-wobbly font-kalam text-xl font-bold text-center w-full max-w-[600px] shadow-wobbly bg-gray-200 text-pencil transform -rotate-1">
                Menyala...
            </div>

            <!-- Prediction Result -->
            <div id="prediction-container"
                class="bg-white p-6 md:p-8 border-[4px] border-pencil rounded-wobbly-lg shadow-wobbly-lg w-full max-w-[640px] text-center mb-8 transition-all transform rotate-1 relative">
                <!-- Session Tape Decoration -->
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-24 h-8 bg-gray-200 border-2 border-gray-300 transform -rotate-2 z-20 shadow-sm opacity-80" style="border-radius: 2px 2px 3px 2px / 255px 15px 225px 15px;"></div>
                
                <div class="flex justify-between items-center mb-6">
                    <div class="text-left">
                        <p class="text-xl text-pencil font-kalam underline decoration-wavy decoration-correction decoration-2 mb-1">Terdeteksi</p>
                        <span id="prediction-text" class="block text-5xl font-kalam font-bold text-pencil transform rotate-2 transition-transform duration-300 scale-100">-</span>
                        <div id="confidence-text" class="text-pencil font-patrick text-md font-bold mt-2 bg-gray-100 px-2 py-1 border-2 border-dashed border-pencil rounded-wobbly inline-block transform -rotate-2">Confidence: 0%</div>
                    </div>

                    <div class="text-right">
                        <p class="text-xl text-pencil font-kalam underline decoration-wavy decoration-correction decoration-2 mb-2">Status</p>
                        <div id="status-indicator"
                            class="inline-block px-4 py-1 border-2 border-pencil rounded-wobbly text-lg font-patrick font-bold bg-postit text-pencil shadow-sm transform rotate-2">
                            Menunggu...
                        </div>
                    </div>
                </div>

                <div class="h-1 bg-pencil w-full my-6 rounded-wobbly transform -rotate-1"></div>

                <!-- Sentence Construction -->
                <div class="text-left mt-6">
                    <p class="text-2xl text-pencil font-kalam font-bold mb-4 flex items-center gap-2">
                        <i class="fas fa-comment-dots text-correction transform -rotate-12 text-3xl"></i> Kalimat 
                    </p>
                    <div
                        class="bg-paper border-[3px] border-pencil rounded-wobbly p-5 min-h-[100px] flex flex-col justify-between shadow-inner transform -rotate-1">
                        <p id="sentence-text" class="text-2xl text-pencil font-kalam font-bold break-words leading-relaxed tracking-wide min-h-[40px]">
                            <span class="text-gray-400 italic font-patrick font-normal text-lg">Belum ada kata...</span>
                        </p>

                        <div class="flex flex-wrap gap-3 justify-end mt-6">
                            <button onclick="clearSentence()"
                                class="px-4 py-2 bg-white border-2 border-pencil text-pencil hover:bg-correction hover:text-white rounded-wobbly shadow-wobbly-hover transform hover-jiggle transition cursor-pointer active:shadow-none active:translate-y-1 active:translate-x-1"
                                title="Hapus Kalimat">
                                <i class="fas fa-trash-alt text-lg"></i>
                            </button>
                            <button onclick="backspace()"
                                class="px-4 py-2 bg-white border-2 border-pencil text-pencil hover:bg-postit rounded-wobbly shadow-wobbly-hover transform hover-jiggle transition cursor-pointer active:shadow-none active:translate-y-1 active:translate-x-1"
                                title="Hapus Satu Kata">
                                <i class="fas fa-backspace text-lg"></i>
                            </button>
                            <button onclick="addSpace()"
                                class="px-5 py-2 bg-white border-[3px] border-pencil text-pencil hover:bg-postit rounded-wobbly shadow-wobbly-hover transform hover-jiggle transition font-kalam font-bold cursor-pointer active:shadow-none active:translate-y-1 active:translate-x-1 text-lg flex items-center gap-2"
                                title="Tambah Spasi">
                                <i class="fas fa-level-down-alt transform rotate-90"></i> Spasi
                            </button>

                            <button onclick="speakSentence()"
                                class="px-6 py-2 bg-correction border-[3px] border-pencil text-white rounded-wobbly shadow-wobbly font-kalam font-bold text-xl hover-jiggle transition transform cursor-pointer active:shadow-none active:translate-y-1 active:translate-x-1 flex items-center gap-2 ml-2 tracking-wide">
                                <i class="fas fa-volume-up"></i> Putar Suara
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@push('scripts')
    <!-- TensorFlow.js -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@4.4.0/dist/tf.min.js"></script>
    <!-- MediaPipe Holistic -->
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/control_utils/control_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils/drawing_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/holistic/holistic.js" crossorigin="anonymous"></script>

    <script>
        const CONFIDENCE_THRESHOLD = 0.6;
        const CLASSES = ['makan', 'idle', 'hallo']; // Sesuaikan dengan output os.listdir('dataset')

        // Stabilizer configuration
        const SEQUENCE_LENGTH = 30; // LSTM requires exactly 30 frames
        
        let sequence = [];
        let sentenceList = [];
        let lastDetectedLabel = null;
        let model;

        const videoElement = document.getElementById('input_video');
        const canvasElement = document.getElementById('output_canvas');
        const canvasCtx = canvasElement.getContext('2d');
        const statusDiv = document.getElementById('status');
        const predictionText = document.getElementById('prediction-text');
        const confidenceText = document.getElementById('confidence-text');

        const statusIndicator = document.getElementById('status-indicator');
        const sentenceText = document.getElementById('sentence-text');

        async function loadModel() {
            try {
                statusDiv.innerText = 'Loading model...';
                // URL Model Bisindo Kata
                model = await tf.loadLayersModel('/models/kata_bisindo/model.json');

                statusDiv.className = 'mb-6 px-6 py-3 border-[3px] border-pencil rounded-wobbly font-kalam text-xl font-bold text-center w-full max-w-[600px] shadow-wobbly bg-postit text-pencil transform -rotate-1';
                statusDiv.innerText = 'Model loaded! Starting camera...';
                startCamera();
            } catch (error) {
                console.error(error);
                statusDiv.className = 'mb-6 px-6 py-3 border-[3px] border-pencil rounded-wobbly font-kalam text-xl font-bold text-center w-full max-w-[600px] shadow-wobbly bg-correction text-white transform rotate-1';
                statusDiv.innerText = 'Error loading model: ' + error.message;
            }
        }

        // Feature extraction (258 points) matches python script
        function extractKeypoints(results) {
            let pose = new Array(33 * 4).fill(0);
            if (results.poseLandmarks) {
                for (let i = 0; i < results.poseLandmarks.length; i++) {
                    const res = results.poseLandmarks[i];
                    pose[i * 4] = res.x;
                    pose[i * 4 + 1] = res.y;
                    pose[i * 4 + 2] = res.z;
                    pose[i * 4 + 3] = res.visibility !== undefined ? res.visibility : 0;
                }
            }

            let lh = new Array(21 * 3).fill(0);
            if (results.leftHandLandmarks) {
                for (let i = 0; i < results.leftHandLandmarks.length; i++) {
                    const res = results.leftHandLandmarks[i];
                    lh[i * 3] = res.x;
                    lh[i * 3 + 1] = res.y;
                    lh[i * 3 + 2] = res.z;
                }
            }

            let rh = new Array(21 * 3).fill(0);
            if (results.rightHandLandmarks) {
                for (let i = 0; i < results.rightHandLandmarks.length; i++) {
                    const res = results.rightHandLandmarks[i];
                    rh[i * 3] = res.x;
                    rh[i * 3 + 1] = res.y;
                    rh[i * 3 + 2] = res.z;
                }
            }

            return pose.concat(lh).concat(rh);
        }

        function onResults(results) {
            canvasCtx.save();
            canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);
            canvasCtx.drawImage(results.image, 0, 0, canvasElement.width, canvasElement.height);

            // Draw Landmarks
            if (results.poseLandmarks) {
                drawConnectors(canvasCtx, results.poseLandmarks, POSE_CONNECTIONS, {color: '#2d2d2d', lineWidth: 5});
                drawLandmarks(canvasCtx, results.poseLandmarks, {color: '#ff4d4d', lineWidth: 3, radius: 4});
            }
            if (results.leftHandLandmarks) {
                drawConnectors(canvasCtx, results.leftHandLandmarks, HAND_CONNECTIONS, {color: '#2d2d2d', lineWidth: 5});
                drawLandmarks(canvasCtx, results.leftHandLandmarks, {color: '#ff4d4d', lineWidth: 3, radius: 4});
            }
            if (results.rightHandLandmarks) {
                drawConnectors(canvasCtx, results.rightHandLandmarks, HAND_CONNECTIONS, {color: '#2d2d2d', lineWidth: 5});
                drawLandmarks(canvasCtx, results.rightHandLandmarks, {color: '#ff4d4d', lineWidth: 3, radius: 4});
            }

            const keypoints = extractKeypoints(results);
            sequence.push(keypoints);
            
            // Keep length to 30
            if (sequence.length > SEQUENCE_LENGTH) {
                sequence.shift();
            }

            if (sequence.length === SEQUENCE_LENGTH) {
                predict([...sequence]); // Clone sequence for prediction
            } else {
                statusIndicator.innerText = `Menyiapkan ${sequence.length}/${SEQUENCE_LENGTH}...`;
                statusIndicator.className = "inline-block px-4 py-1 border-[3px] border-dashed border-pencil rounded-wobbly text-lg font-kalam font-bold bg-postit text-pencil shadow-sm transform rotate-1";
            }

            canvasCtx.restore();
        }

        async function predict(inputSequence) {
            if (!model) return;

            // sequence is [30, 258]
            const inputTensor = tf.tensor3d([inputSequence], [1, 30, 258]);

            const prediction = model.predict(inputTensor);
            const result = await prediction.data(); 

            inputTensor.dispose();

            let maxScore = -1;
            let maxIndex = -1;

            for (let i = 0; i < result.length; i++) {
                if (result[i] > maxScore) {
                    maxScore = result[i];
                    maxIndex = i;
                }
            }

            const rawLabel = CLASSES[maxIndex];
            const confidencePct = (maxScore * 100).toFixed(1);

            if (maxScore > CONFIDENCE_THRESHOLD) {
                predictionText.innerText = rawLabel;
                predictionText.classList.add('text-correction', 'scale-110');
                predictionText.classList.remove('text-pencil', 'scale-100');
                confidenceText.innerText = `Confidence: ${confidencePct}%`;

                statusIndicator.innerText = "Terkonfirmasi";
                statusIndicator.className = "inline-block px-4 py-1 border-[3px] border-pencil rounded-wobbly text-lg font-kalam font-bold bg-pencil text-white shadow-sm transform -rotate-2 hover-jiggle scale-110 transition";

                if (rawLabel !== lastDetectedLabel) {
                    lastDetectedLabel = rawLabel;
                    
                    if (rawLabel !== 'idle') {
                        sentenceList.push(rawLabel);
                        updateSentenceUI();
                    }
                }
            } else {
                predictionText.innerText = "...";
                predictionText.classList.remove('text-correction', 'scale-110');
                predictionText.classList.add('text-pencil', 'scale-100');
                confidenceText.innerText = `Low Confidence`;

                statusIndicator.innerText = "Buram";
                statusIndicator.className = "inline-block px-4 py-1 border-[3px] border-dashed border-pencil rounded-wobbly text-lg font-kalam font-bold bg-gray-100 text-pencil shadow-sm transform rotate-1 opacity-80";
            }
        }

        function addSpace() {
            // Karena ini list kata, "spasi" kita asumsikan koma atau jeda
            if (sentenceList.length > 0 && sentenceList[sentenceList.length - 1] !== " ") {
                sentenceList.push(" ");
                updateSentenceUI();
            }
        }

        function backspace() {
            if (sentenceList.length > 0) {
                sentenceList.pop();
                updateSentenceUI();
            }
        }

        function updateSentenceUI() {
            if (sentenceList.length === 0) {
                sentenceText.innerHTML = '<span class="text-gray-400 italic">Belum ada kata...</span>';
            } else {
                // Filter spasi dan gabungkan kata
                let display = sentenceList.join(" ").replace(/ \s+/g, " ");
                sentenceText.innerText = display;
            }
        }

        function clearSentence() {
            sentenceList = [];
            updateSentenceUI();
        }

        function speakSentence() {
            if ('speechSynthesis' in window) {
                if (sentenceList.length === 0) return;
                window.speechSynthesis.cancel();
                
                let textToSpeak = sentenceList.join(" ");
                const utterance = new SpeechSynthesisUtterance(textToSpeak);
                utterance.lang = 'id-ID'; 
                utterance.rate = 1.0;
                utterance.pitch = 1.0;
                
                const voices = window.speechSynthesis.getVoices();
                const idVoices = voices.filter(v => v.lang.includes('id'));
                const maleVoice = idVoices.find(v => (v.name.toLowerCase().includes('male') && !v.name.toLowerCase().includes('female')) || v.name.includes('Andika') || v.name.toLowerCase().includes('pria') || v.name.toLowerCase().includes('laki'));
                
                if (maleVoice) {
                    utterance.voice = maleVoice;
                } else if (idVoices.length > 0) {
                    utterance.voice = idVoices[0];
                }

                window.speechSynthesis.speak(utterance);
            } else {
                alert("Browser anda tidak mendukung Text-to-Speech");
            }
        }

        // Initialize Holistic Model
        const holistic = new Holistic({
            locateFile: (file) => {
                return `https://cdn.jsdelivr.net/npm/@mediapipe/holistic/${file}`;
            }
        });

        holistic.setOptions({
            modelComplexity: 1,
            smoothLandmarks: true,
            enableSegmentation: false,
            smoothSegmentation: true,
            refineFaceLandmarks: false,
            minDetectionConfidence: 0.5,
            minTrackingConfidence: 0.5,
            selfieMode: true // IMPORTANT: Mirip dengan cv2.flip(1) di OpenCV
        });

        holistic.onResults(onResults);

        function startCamera() {
            const camera = new Camera(videoElement, {
                onFrame: async () => {
                    await holistic.send({ image: videoElement });
                },
                width: 640,
                height: 480
            });
            camera.start();
        }

        loadModel();
    </script>
@endpush
