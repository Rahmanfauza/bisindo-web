@extends('layouts.app')

@section('title', 'Abjad SIBI - Penerjemah Isyarat')

@section('content')
<div class="min-h-screen bg-gray-50 pb-20 font-jakarta">
    <div class="max-w-4xl mx-auto px-4 pt-8">

        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-green-800 mb-2 font-outfit">Abjad SIBI</h1>
            <p class="text-gray-500 leading-relaxed text-sm">
                Arahkan kamera ke tangan Anda untuk menerjemahkan abjad SIBI.
            </p>
            <a href="{{ route('translator') }}"
                class="inline-flex items-center gap-2 mt-4 text-green-600 hover:text-green-700 font-medium text-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Menu
            </a>
        </div>

        <!-- Detection Container -->
        <div class="flex flex-col items-center">

            <!-- Video/Canvas Container -->
            <div class="relative w-[640px] h-[480px] bg-black rounded-xl overflow-hidden shadow-lg mb-6 max-w-full">
                <video id="input_video"
                    class="absolute top-0 left-0 w-full h-full transform -scale-x-100 object-cover"></video>
                <canvas id="output_canvas" width="640" height="480"
                    class="absolute top-0 left-0 w-full h-full transform -scale-x-100 object-contain"></canvas>
            </div>

            <!-- Status Indicator -->
            <div id="status"
                class="mb-6 px-6 py-3 rounded-lg font-bold text-center w-full max-w-[600px] bg-gray-200 text-gray-700">
                Initializing...
            </div>

            <!-- Prediction Result -->
            <div id="prediction-container"
                class="bg-white p-6 rounded-2xl shadow-md w-full max-w-[640px] text-center mb-6 transition-all">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-left">
                        <p class="text-xs text-gray-400 uppercase tracking-wider font-bold">Terdeteksi</p>
                        <span id="prediction-text" class="block text-6xl font-black text-gray-800">-</span>
                        <div id="confidence-text" class="text-gray-400 text-sm font-medium mt-1">Confidence: 0%</div>
                    </div>

                    <div class="text-right">
                        <p class="text-xs text-gray-400 uppercase tracking-wider font-bold mb-1">Status</p>
                        <div id="status-indicator"
                            class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">
                            Menunggu...
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100 my-4">

                <!-- Sentence Construction -->
                <div class="text-left">
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-bold mb-2">Kalimat (Hasil Terjemahan)
                    </p>
                    <div
                        class="bg-gray-50 border border-gray-200 rounded-xl p-4 min-h-[80px] flex flex-col justify-between">
                        <p id="sentence-text" class="text-lg text-gray-700 font-medium break-words leading-relaxed">
                            <span class="text-gray-400 italic">Belum ada kata...</span>
                        </p>

                        <div class="flex gap-2 justify-end mt-4">
                            <button onclick="clearSentence()"
                                class="p-2 text-gray-500 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors"
                                title="Hapus Kalimat">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <!-- NEW BUTTONS -->
                            <button onclick="backspace()"
                                class="p-2 text-gray-500 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition-colors"
                                title="Hapus Satu Huruf">
                                <i class="fas fa-backspace"></i>
                            </button>
                            <button onclick="addSpace()"
                                class="p-2 text-gray-500 hover:text-blue-500 hover:bg-blue-50 rounded-lg transition-colors"
                                title="Tambah Spasi">
                                <i class="fas fa-ruler-horizontal"></i> Spasi
                            </button>

                            <button onclick="speakSentence()"
                                class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-bold text-sm shadow-md transition-transform active:scale-95 flex items-center gap-2">
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
    <!-- MediaPipe Hands -->
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/control_utils/control_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils/drawing_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.js" crossorigin="anonymous"></script>

    <script>
        // 1. Configuration matches Python keys
        // TUNED PARAMETERS FOR SIBI (More forgiving)
        const CONFIDENCE_THRESHOLD = 0.6; // Lowered from 0.7
        const CLASSES = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

        // --- NEW CONFIGURATION FOR SMOOTHING & STABILIZATION ---
        const SMOOTHING_BUFFER_SIZE = 10; // Back to 10 (Matches Bisindo)
        const STABILIZATION_FRAMES = 15;  // Back to 15 (Matches Bisindo)
        const AUTO_SPACE_DELAY = 2000;    // 2 seconds of no hands -> Auto Space

        // State Variables
        let predictionsQueue = [];
        let stableCounter = 0;
        let lastStableChar = null;
        let sentence = "";
        let isSpeaking = false;
        let noHandsTime = 0; // Timestamp when hands were last lost
        let hasAddedAutoSpace = false; // Flag to prevent multiple auto-spaces
        let debugMode = false;
        let lastFrameTime = 0;

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
                // UPDATE: Point to the public model path for SIBI
                model = await tf.loadLayersModel('/models/sibi/model.json');

                statusDiv.className = 'mb-6 px-6 py-3 rounded-lg font-bold text-center w-full max-w-[600px] bg-green-100 text-green-800';
                statusDiv.innerText = 'Model loaded! Starting camera...';
                startCamera();
            } catch (error) {
                console.error(error);
                statusDiv.className = 'mb-6 px-6 py-3 rounded-lg font-bold text-center w-full max-w-[600px] bg-red-100 text-red-800';
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
                    drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS, { color: '#00FF00', lineWidth: 5 });
                    drawLandmarks(canvasCtx, landmarks, { color: '#FF0000', lineWidth: 2 });
                }

                // Combine Data: Left + Right (Length 128)
                const combinedData = leftHandData.concat(rightHandData);

                // Slice to 126 (Match Training Input)
                const inputFeatures = combinedData.slice(0, 126);

                // Predict
                predict(inputFeatures);

            }

            if (!handsDetected) {
                // If no hands, clear local buffer to avoid stuck predictions
                // But we don't clear sentence
                statusIndicator.innerText = "Tidak ada tangan";
                statusIndicator.className = "inline-block px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-500";

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
                predictionText.classList.add('text-green-600');
                predictionText.classList.remove('text-gray-800');
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
                    statusIndicator.className = "inline-block px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700";
                } else {
                    statusIndicator.innerText = "Terkonfirmasi";
                    statusIndicator.className = "inline-block px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700";

                    // COMMIT TO SENTENCE
                    // Trigger only ONCE when threshold is reached
                    if (stableCounter === STABILIZATION_FRAMES) {
                        commitCharToSentence(smoothedLabel);
                    }
                }

            } else {
                // Low Confidence
                predictionText.innerText = "...";
                predictionText.classList.remove('text-green-600');
                predictionText.classList.add('text-gray-800');
                confidenceText.innerText = `Low Confidence`;

                statusIndicator.innerText = "Buram";
                statusIndicator.className = "inline-block px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-500";

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

        function commitCharToSentence(char) {
            // Logic: Append character. 
            // Optional: Prevent duplicate Double-Letters if needed, but for names/words double letters exist.
            // Since we only commit once per "Stabilization Session", user has to break pose (stableCounter reset) 
            // or switch letter to add another. To add 'AA', user must do 'A' -> Relax/Other -> 'A'.

            // Allow duplicates effectively by this logic.

            sentence += char;
            updateSentenceUI();

            // Pulse effect to indicate add
            sentenceText.classList.add('text-green-600');
            setTimeout(() => sentenceText.classList.remove('text-green-600'), 200);

            // Optional: Small haptic/sound feedback could go here
        }

        function addSpace() {
            if (sentence.length > 0 && !sentence.endsWith(" ")) {
                sentence += " ";
                updateSentenceUI();

                // Pulse effect
                sentenceText.classList.add('text-blue-600');
                setTimeout(() => sentenceText.classList.remove('text-blue-600'), 200);
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

                const utterance = new SpeechSynthesisUtterance(sentence);
                utterance.lang = 'id-ID'; // Indonesian
                utterance.rate = 0.9;

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
            minDetectionConfidence: 0.7, // Increased to reduce ghost detections
            minTrackingConfidence: 0.7
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