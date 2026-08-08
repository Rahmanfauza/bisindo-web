@extends('layouts.app')

@section('title', 'Abjad Bisindo - Penerjemah Isyarat')
@section('hide_navbar', true)

@section('content')
<div class="min-h-screen bg-paper text-pencil pb-20 font-patrick relative overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 z-0 pointer-events-none opacity-20 overflow-hidden">
        <svg class="absolute top-10 right-20 w-48 h-48 text-pencil transform rotate-12" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M36.4,-57.4C46.5,-51.2,53.4,-39.4,61.9,-26.6C70.4,-13.8,80.5,0,78.2,12.2C75.8,24.4,61,35.1,47.2,43.2C33.4,51.4,20.6,57.2,5.5,54.5C-9.6,51.8,-27.1,40.7,-42.3,31C-57.5,21.3,-70.4,13,-73.5,1.8C-76.6,-9.4,-69.9,-23.4,-59.8,-33.5C-49.8,-43.6,-36.5,-49.7,-24,-54.5C-11.5,-59.2,26.3,-63.6,36.4,-57.4Z" transform="translate(100 100)" />
        </svg>
    </div>

    <div class="w-full px-4 lg:px-8 pt-8 relative z-10">

        <!-- Header Section -->
        <div class="mb-8 text-center transform -rotate-1">
            <h1 class="text-4xl font-bold text-pencil mb-2 font-kalam">Abjad Bisindo</h1>
            <p class="text-pencil leading-relaxed text-lg bg-gray-100 p-2 border-2 border-dashed border-pencil rounded-wobbly inline-block transform rotate-1">
                Arahkan kamera ke tangan Anda untuk menerjemahkan abjad Bisindo.
            </p>
            <br>
            <a href="{{ route('translator') }}"
                class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-white border-[3px] border-pencil rounded-wobbly shadow-wobbly-hover hover-jiggle text-pencil font-bold text-xl font-kalam transition cursor-pointer active:shadow-none active:translate-y-1 active:-rotate-2">
                <i class="fas fa-arrow-left text-correction"></i> Kembali ke Menu
            </a>
        </div>

        <!-- Detection Container -->
        <div class="flex flex-col lg:flex-row justify-center items-center lg:items-stretch gap-6 w-full">

            <!-- Left Column: Camera & Status -->
            <div class="w-full lg:w-1/2 flex flex-col items-center">
                <!-- Video/Canvas Container -->
                <div class="relative w-full aspect-[4/3] bg-paper rounded-wobbly-lg overflow-hidden border-[6px] border-pencil shadow-wobbly-lg mb-4 transform rotate-1 transition">
                    <video id="input_video"
                        class="absolute top-0 left-0 w-full h-full transform -scale-x-100 object-cover"></video>
                    <canvas id="output_canvas" width="640" height="480"
                        class="absolute top-0 left-0 w-full h-full transform -scale-x-100 object-contain"></canvas>
                </div>

                <!-- Status Indicator -->
                <div id="status"
                    class="px-6 py-3 border-[3px] border-pencil rounded-wobbly font-kalam text-xl font-bold text-center w-full shadow-wobbly bg-gray-200 text-pencil transform -rotate-1">
                    Menyala...
                </div>
            </div>

            <!-- Right Column: Prediction Result -->
            <div class="w-full lg:w-1/2 flex flex-col">
                <!-- Prediction Result -->
                <div id="prediction-container"
                    class="bg-white p-6 md:p-8 border-[4px] border-pencil rounded-wobbly-lg shadow-wobbly-lg w-full flex-1 flex flex-col text-center transition-all transform rotate-1 relative">
                    <!-- Session Tape Decoration -->
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-24 h-8 bg-gray-200 border-2 border-gray-300 transform -rotate-2 z-20 shadow-sm opacity-80" style="border-radius: 2px 2px 3px 2px / 255px 15px 225px 15px;"></div>
                
                <div class="flex justify-between items-center mb-6">
                    <div class="text-left">
                        <p class="text-xl text-pencil font-kalam underline decoration-wavy decoration-correction decoration-2 mb-1">Terdeteksi</p>
                        <span id="prediction-text" class="block text-7xl font-kalam font-bold text-pencil transform rotate-2 transition-transform duration-300 scale-100">-</span>
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
                <div class="text-left mt-6 flex-1 flex flex-col">
                    <p class="text-2xl text-pencil font-kalam font-bold mb-4 flex items-center gap-2">
                        <i class="fas fa-comment-dots text-correction transform -rotate-12 text-3xl"></i> Kalimat 
                    </p>
                    <div
                        class="bg-paper border-[3px] border-pencil rounded-wobbly p-5 min-h-[100px] flex-1 flex flex-col justify-between shadow-inner transform -rotate-1">
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
                                title="Hapus Satu Huruf">
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
</div>

@push('scripts')
    <!-- TensorFlow.js -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@4.4.0/dist/tf.min.js"></script>
    <!-- MediaPipe Hands -->
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/control_utils/control_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils/drawing_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.js" crossorigin="anonymous"></script>

    <script>
        // 1. Configuration matches Python keys
        const CONFIDENCE_THRESHOLD = 0.7;
        const CLASSES = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

        // --- NEW CONFIGURATION FOR SMOOTHING & STABILIZATION ---
        const SMOOTHING_BUFFER_SIZE = 10; // Number of frames to vote on
        const STABILIZATION_FRAMES = 15;  // Frames validation required to commit a character (~0.5s - 1s)
        const AUTO_SPACE_DELAY = 2000;    // 2 seconds of no hands -> Auto Space

        // State Variables
        let predictionsQueue = [];
        let stableCounter = 0;
        let lastStableChar = null;
        let sentence = "";
        let isSpeaking = false;
        let noHandsTime = 0; // Timestamp when hands were last lost
        let hasAddedAutoSpace = false; // Flag to prevent multiple auto-spaces

        const videoElement = document.getElementById('input_video');
        const canvasElement = document.getElementById('output_canvas');
        const canvasCtx = canvasElement.getContext('2d');
        const statusDiv = document.getElementById('status');
        const predictionText = document.getElementById('prediction-text');
        const confidenceText = document.getElementById('confidence-text');

        // New UI Elements
        const statusIndicator = document.getElementById('status-indicator');
        const sentenceText = document.getElementById('sentence-text');

        let model;

        // 2. Load Model
        async function loadModel() {
            try {
                statusDiv.innerText = 'Loading model...';
                // UPDATE: Point to the public model path
                model = await tf.loadLayersModel('/models/bisindo/model.json');

                statusDiv.className = 'mb-6 px-6 py-3 border-[3px] border-pencil rounded-wobbly font-kalam text-xl font-bold text-center w-full max-w-[600px] shadow-wobbly bg-postit text-pencil transform -rotate-1';
                statusDiv.innerText = 'Model loaded! Starting camera...';
                startCamera();
            } catch (error) {
                console.error(error);
                statusDiv.className = 'mb-6 px-6 py-3 border-[3px] border-pencil rounded-wobbly font-kalam text-xl font-bold text-center w-full max-w-[600px] shadow-wobbly bg-correction text-white transform rotate-1';
                statusDiv.innerText = 'Error loading model: ' + error.message;
            }
        }

        // 3. Preprocessing Logic (Matches Python `extract_landmarks`)
        function extractLandmarks(handLandmarks, handLabel) {
            const landmarks = [];

            // 1. Coordinates: x, y, z
            for (const landmark of handLandmarks) {
                // MIRROR LOGIC:
                // Python script uses cv2.flip(image, 1).
                // This inverts the X coordinate.
                // We must do the same here to match the model training data.
                const mirroredX = 1.0 - landmark.x;

                landmarks.push(mirroredX, landmark.y, landmark.z);
            }

            // 2. Hand Code: Right=1, Left=-1
            // Matches Python inisiasi logic: 1 if hand_type == "Right" else -1
            const handCode = (handLabel === 'Right') ? 1 : -1;

            // Insert handCode at the beginning
            landmarks.unshift(handCode);

            return landmarks;
        }

        // 4. MediaPipe Hands
        function onResults(results) {
            // Save UI
            canvasCtx.save();
            canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);

            // Draw Camera Feed
            canvasCtx.drawImage(results.image, 0, 0, canvasElement.width, canvasElement.height);

            // Logic Containers (Zeros [64])
            let leftHandData = new Array(64).fill(0);
            let rightHandData = new Array(64).fill(0);

            let handsDetected = false;

            if (results.multiHandLandmarks && results.multiHandedness) {
                handsDetected = results.multiHandLandmarks.length > 0;

                for (let i = 0; i < results.multiHandLandmarks.length; i++) {
                    const landmarks = results.multiHandLandmarks[i];
                    const classification = results.multiHandedness[i];

                    // Note on Classification:
                    // Python training data used cv2.flip(1), which makes a Right hand look like a Left hand.
                    // So Physical Right Hand -> Python detected "Left".
                    // JS MediaPipe detects Physical Right Hand as "Right".
                    // To match the model input, we must SWAP the labels.

                    const originalLabel = classification.label;
                    const effectiveLabel = (originalLabel === 'Right') ? 'Left' : 'Right';

                    // Extract Features using the EFFECTIVE label
                    const feats = extractLandmarks(landmarks, effectiveLabel);

                    // Slot Data using the EFFECTIVE label
                    if (effectiveLabel === 'Left') {
                        leftHandData = feats;
                    } else {
                        rightHandData = feats;
                    }

                    // Draw Landmarks (Visuals can stay true to original or swap, let's keep visual generic)
                    drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS, { color: '#2d2d2d', lineWidth: 5 });
                    drawLandmarks(canvasCtx, landmarks, { color: '#ff4d4d', lineWidth: 3, radius: 4 });
                }

                if (handsDetected) {
                    // Combine Data: Left + Right (Length 128)
                    const combinedData = leftHandData.concat(rightHandData);
                    // Slice to 126 (Match Training Input)
                    const inputFeatures = combinedData.slice(0, 126);
                    // Predict
                    predict(inputFeatures);
                }

            }

            if (!handsDetected) {
                // If no hands, clear local buffer to avoid stuck predictions
                // But we don't clear sentence
                statusIndicator.innerText = "Tidak ada tangan";
                statusIndicator.className = "inline-block px-4 py-1 border-[3px] border-pencil rounded-wobbly text-lg font-patrick font-bold bg-white text-pencil shadow-sm transform -rotate-1";

                // Partially decay queue or clear it? Let's clear to reset smoothing.
                predictionsQueue = [];
                stableCounter = 0;

                // --- AUTO SPACE LOGIC ---
                // If hands are gone for > 2 seconds, and we haven't added a space yet, and sentence doesn't end in space
                if (noHandsTime === 0) {
                    noHandsTime = Date.now();
                } else {
                    const elapsed = Date.now() - noHandsTime;
                    if (elapsed > AUTO_SPACE_DELAY && !hasAddedAutoSpace && sentence.length > 0 && !sentence.endsWith(" ")) {
                        addSpace();
                        hasAddedAutoSpace = true; // Lock
                        // Visual Feedback could be added here
                        statusIndicator.innerText = "Auto Spasi";
                        statusIndicator.className = "inline-block px-4 py-1 border-[3px] border-pencil rounded-wobbly text-lg font-kalam text-white font-bold bg-correction shadow-sm transform rotate-2 hover-jiggle";
                    }
                }
            } else {
                // Hands match! Reset auto-space timers
                noHandsTime = 0;
                hasAddedAutoSpace = false;
            }

            canvasCtx.restore();
        }

        async function predict(inputFeatures) {
            if (!model) return;

            // Tensor [1, 126]
            const inputTensor = tf.tensor2d([inputFeatures], [1, 126]);

            const prediction = model.predict(inputTensor);
            const result = await prediction.data(); // Float32Array

            // Dispose tensor
            inputTensor.dispose();

            // Find Max
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

            // --- SMOOTHING & STABILIZATION LOGIC ---

            if (maxScore > CONFIDENCE_THRESHOLD) {
                // 1. Add to processing queue
                predictionsQueue.push(rawLabel);
                if (predictionsQueue.length > SMOOTHING_BUFFER_SIZE) {
                    predictionsQueue.shift(); // Keep buffer size fixed
                }

                // 2. Vote (Mode)
                const smoothedLabel = getMostFrequent(predictionsQueue);

                // Visual Update for Detection
                predictionText.innerText = smoothedLabel;
                predictionText.classList.add('text-correction', 'scale-110');
                predictionText.classList.remove('text-pencil', 'scale-100');
                confidenceText.innerText = `Confidence: ${confidencePct}%`;

                // 3. Stabilization for Sentence Construction
                if (smoothedLabel === lastStableChar) {
                    stableCounter++;
                } else {
                    stableCounter = 0;
                    lastStableChar = smoothedLabel;
                }

                // Update Status
                if (stableCounter < STABILIZATION_FRAMES) {
                    statusIndicator.innerText = "Memverifikasi...";
                    statusIndicator.className = "inline-block px-4 py-1 border-[3px] border-dashed border-pencil rounded-wobbly text-lg font-kalam font-bold bg-postit text-pencil shadow-sm transform rotate-1";
                } else {
                    statusIndicator.innerText = "Terkonfirmasi";
                    statusIndicator.className = "inline-block px-4 py-1 border-[3px] border-pencil rounded-wobbly text-lg font-kalam font-bold bg-pencil text-white shadow-sm transform -rotate-2 hover-jiggle scale-110 transition";

                    // COMMIT TO SENTENCE
                    // Trigger only ONCE when threshold is reached
                    if (stableCounter === STABILIZATION_FRAMES) {
                        commitCharToSentence(smoothedLabel);
                    }
                }

            } else {
                // Low Confidence
                predictionText.innerText = "...";
                predictionText.classList.remove('text-correction', 'scale-110');
                predictionText.classList.add('text-pencil', 'scale-100');
                confidenceText.innerText = `Low Confidence`;

                statusIndicator.innerText = "Buram";
                statusIndicator.className = "inline-block px-4 py-1 border-[3px] border-dashed border-pencil rounded-wobbly text-lg font-kalam font-bold bg-gray-100 text-pencil shadow-sm transform rotate-1 opacity-80";

                predictionsQueue = [];
                stableCounter = 0;
            }
        }

        // --- HELPER FUNCTIONS ---

        function getMostFrequent(arr) {
            const hashmap = arr.reduce((acc, val) => {
                acc[val] = (acc[val] || 0) + 1;
                return acc;
            }, {});
            return Object.keys(hashmap).reduce((a, b) => hashmap[a] > hashmap[b] ? a : b);
        }

        function speakChar(text) {
            if ('speechSynthesis' in window) {
                window.speechSynthesis.cancel();
                const utterance = new SpeechSynthesisUtterance(text);
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
            }
        }

        function commitCharToSentence(char) {
            // Logic: Append character. 
            // Optional: Prevent duplicate Double-Letters if needed, but for names/words double letters exist.
            // Since we only commit once per "Stabilization Session", user has to break pose (stableCounter reset) 
            // or switch letter to add another. To add 'AA', user must do 'A' -> Relax/Other -> 'A'.

            // Allow duplicates effectively by this logic.

            sentence += char;
            updateSentenceUI();
            speakChar(char);

            // Optional: Small haptic/sound feedback could go here
        }

        function addSpace() {
            if (sentence.length > 0 && !sentence.endsWith(" ")) {
                let words = sentence.trim().split(" ");
                let lastWord = words[words.length - 1];

                sentence += " ";
                updateSentenceUI();

                if (lastWord) {
                    speakChar(lastWord);
                }
            }
        }

        function backspace() {
            if (sentence.length > 0) {
                sentence = sentence.slice(0, -1);
                updateSentenceUI();
            }
        }

        function updateSentenceUI() {
            if (sentence.length === 0) {
                sentenceText.innerHTML = '<span class="text-gray-400 italic">Belum ada kata...</span>';
            } else {
                sentenceText.innerText = sentence;
            }
        }

        function clearSentence() {
            sentence = "";
            updateSentenceUI();
        }

        function speakSentence() {
            if ('speechSynthesis' in window) {
                if (sentence.length === 0) return;
                window.speechSynthesis.cancel();
                const utterance = new SpeechSynthesisUtterance(sentence);
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

        // 5. Initialize MediaPipe
        const hands = new Hands({
            locateFile: (file) => {
                return `https://cdn.jsdelivr.net/npm/@mediapipe/hands/${file}`;
            }
        });

        hands.setOptions({
            maxNumHands: 2,
            modelComplexity: 1,
            minDetectionConfidence: 0.5,
            minTrackingConfidence: 0.5
        });

        hands.onResults(onResults);

        // 6. Camera Utils
        function startCamera() {
            const camera = new Camera(videoElement, {
                onFrame: async () => {
                    await hands.send({ image: videoElement });
                },
                width: 640,
                height: 480
            });
            camera.start();
        }

        // Trigger Init
        loadModel();
    </script>
@endpush