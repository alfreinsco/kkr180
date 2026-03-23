<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Scanner QR - KKR 180°</title>
    <meta name="description" content="Scanner QR KKR 180°">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo-gmsambon.jpg') }}">

    <!-- CSS utama event -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background: #000;
            color: #AAB1B7;
            overflow-x: hidden;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Hanya tampil untuk mobile */
        .mobile-only {
            display: none;
        }

        .scan-desktop-warning {
            display: none;
            min-height: 100vh;
            min-height: 100dvh;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            text-align: center;
        }

        @media (max-width: 767px) {
            .mobile-only {
                display: block;
            }

            header.mb-5 {
                display: none;
            }

            /* Fokus: kamera full layar */
            .scan-hero.mobile-only {
                padding: 0;
                min-height: 100vh;
                min-height: 100dvh;
                background: #000;
            }

            .scan-hero::before {
                display: none;
            }

            .scan-card {
                background: transparent;
                border: none;
                padding: 0;
            }

            .scan-hero-inner {
                padding: 0;
            }

            .scan-video-wrap {
                position: fixed;
                inset: 0;
                width: 100vw;
                height: 100vh;
                border: none;
                background: #000;
                z-index: 1;
            }

            video#videoScanner {
                position: fixed;
                inset: 0;
                width: 100vw;
                height: 100vh;
                object-fit: cover;
            }

            #scannerStatus {
                display: none;
            }
        }

        @media (min-width: 768px) {
            .scan-desktop-warning {
                display: flex;
            }

            /* Hindari tampilan pemindai di desktop */
            .scan-hero {
                display: none;
            }

            header.mb-5 {
                display: none;
            }
        }

        /* Header sticky saat scroll (konsisten dengan register/welcome) */
        #sticky-header.main-header-area.sticky {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 990;
            background: rgba(0, 0, 0, 0.95);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
            transition: background 0.3s ease, box-shadow 0.3s ease, padding 0.2s ease;
            padding-top: 4px;
            padding-bottom: 4px;
        }

        @media (max-width: 767px) {
            #sticky-header.main-header-area {
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .header-area .logo img {
                max-width: 100px;
                max-height: 100px;
                width: auto;
                height: auto;
                object-fit: contain;
            }

            .header_bottom_border>.row {
                min-height: 70px;
            }
        }

        .scan-hero {
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
            align-items: center;
            padding: 1rem 0;
            background: url('{{ asset('img/slider/slider_bg_1.jpg') }}') center center/cover no-repeat;
            position: relative;
        }

        .scan-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
        }

        .scan-hero-inner {
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .scan-card {
            background: #000;
            border: 1px solid #333;
            border-radius: 0;
            padding: 1.25rem 1rem;
        }

        .scan-card .section_title h3 {
            font-family: "Anton", sans-serif;
            color: #fff;
            letter-spacing: 1px;
            font-size: 1.75rem;
            line-height: 1.3;
            margin-bottom: 0.25rem;
        }

        .scan-card .section_title p {
            font-size: 0.95rem;
            margin-bottom: 1.25rem;
        }

        .scan-video-wrap {
            position: relative;
            width: 100%;
            background: #060606;
            border: 1px solid #333;
            border-radius: 0;
            overflow: hidden;
        }

        video#videoScanner {
            display: block;
            width: 100%;
            height: auto;
            background: #000;
            transform: none;
        }

        .scan-overlay {
            pointer-events: none;
            position: absolute;
            inset: 0;
            z-index: 2;
        }

        .scan-popup[hidden] {
            display: none !important;
        }

        .scan-popup {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .scan-popup__content {
            width: min(92vw, 560px);
            background: transparent;
            border: none;
            padding: 0;
            color: #fff;
        }

        .scan-popup__title {
            font-family: "Anton", sans-serif;
            letter-spacing: 1px;
            font-size: 1.25rem;
            margin: 0 0 10px 0;
        }

        .scan-popup__body {
            border: none;
            background: transparent;
            padding: 0;
            white-space: pre-wrap;
            word-break: break-word;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            max-height: 45vh;
            overflow: auto;
            color: #fff;
        }

        .scan-overlay .frame {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 72%;
            height: 38%;
            transform: translate(-50%, -50%);
            border: 2px solid rgba(255, 69, 51, 0.9);
            box-shadow: 0 0 0 999px rgba(0, 0, 0, 0.35);
        }

        .scan-overlay .scan-line {
            position: absolute;
            left: 50%;
            top: calc(50% - 19%);
            width: 72%;
            height: 2px;
            transform: translateX(-50%);
            background: #FF4533;
            box-shadow: 0 0 12px rgba(255, 69, 51, 0.65);
            animation: scanline 2s infinite;
        }

        @keyframes scanline {
            0% {
                transform: translate(-50%, 0);
                opacity: 0.2;
            }

            30% {
                opacity: 1;
            }

            100% {
                transform: translate(-50%, 150%);
                opacity: 0.2;
            }
        }

        .scan-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 1rem;
            align-items: center;
            justify-content: center;
        }

        .btn-scan-primary {
            background: #FF4533;
            color: #fff;
            border: 1px solid transparent;
            padding: 12px 28px;
            font-family: "Anton", sans-serif;
            font-size: 16px;
            letter-spacing: 2px;
            border-radius: 0;
            transition: 0.3s;
            min-height: 48px;
        }

        .btn-scan-primary:hover {
            background: transparent;
            color: #FF4533;
            border-color: #FF4533;
        }

        .btn-scan-secondary {
            background: transparent;
            color: #FF4533;
            border: 2px solid #FF4533;
            padding: 10px 24px;
            font-family: "Anton", sans-serif;
            font-size: 16px;
            letter-spacing: 2px;
            border-radius: 0;
            transition: 0.3s;
            min-height: 48px;
        }

        .btn-scan-secondary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .scan-alert {
            margin-top: 1rem;
            min-height: 24px;
            color: #AAB1B7;
            font-size: 0.95rem;
        }

        .result-card {
            margin-top: 1.25rem;
            border: 1px solid #333;
            background: #050505;
            padding: 1rem;
        }

        .result-card h4 {
            font-family: "Anton", sans-serif;
            letter-spacing: 1px;
            color: #fff;
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
        }

        .result-box {
            border: 1px solid #333;
            background: #000;
            padding: 0.75rem;
            border-radius: 0;
            color: #fff;
            overflow: auto;
            max-height: 220px;
            white-space: pre-wrap;
            word-break: break-word;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }
    </style>
</head>

<body>
    <header class="mb-5">
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center h-100">
                            <div class="col-8 col-sm-8 col-md-3 col-lg-3 d-flex align-items-center h-100">
                                <div class="logo">
                                    <img src="{{ asset('img/logo.png') }}" alt="KKR 180°" width="150"
                                        height="150">
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <section class="scan-desktop-warning">
        <div>
            <h3 style="font-family: Anton, sans-serif; letter-spacing: 1px; color: #fff; margin-bottom: 0.75rem;">
                Scanner QR hanya untuk perangkat mobile
            </h3>
            <p style="margin: 0; color: #AAB1B7;">Gunakan ponsel untuk mengaktifkan kamera.</p>
        </div>
    </section>

    <section class="scan-hero mobile-only">
        <div class="container scan-hero-inner">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="scan-card">
                        <div class="scan-video-wrap">
                            <video id="videoScanner" playsinline muted></video>
                        </div>

                        <div class="scan-alert" id="scannerStatus" role="status" aria-live="polite"></div>

                        <!-- Popup hanya muncul saat ada QR terbaca -->
                        <div id="scanResultPopup" class="scan-popup" role="dialog" aria-modal="true" aria-live="polite"
                            hidden>
                            <div class="scan-popup__content">
                                <div class="scan-popup__title">Hasil QR</div>
                                <div class="scan-popup__body" id="hasilQrPopup">Menunggu scan...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/scrollIt.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Barcode decoding (frontend only) -->
    <script src="https://unpkg.com/@zxing/library@0.21.3/umd/index.min.js"></script>

    <script>
        (function() {
            var statusEl = document.getElementById('scannerStatus');
            var hasilEl = document.getElementById('hasilQrPopup');
            var popupEl = document.getElementById('scanResultPopup');
            var videoEl = document.getElementById('videoScanner');

            var stream = null;
            var timerId = null;
            var hasResult = false;

            function setStatus(text) {
                statusEl.textContent = text || '';
            }

            function showPopup() {
                if (!popupEl) return;
                popupEl.hidden = false;
            }

            function hidePopup() {
                if (!popupEl) return;
                popupEl.hidden = true;
            }

            function stopStream() {
                try {
                    if (timerId) {
                        clearInterval(timerId);
                        timerId = null;
                    }
                    if (videoEl && videoEl.srcObject) {
                        var tracks = videoEl.srcObject.getTracks ? videoEl.srcObject.getTracks() : [];
                        tracks.forEach(function(t) {
                            t.stop();
                        });
                        videoEl.srcObject = null;
                    }
                } catch (e) {}
            }

            function stopZXing() {
                if (window.__zxingReader && window.__zxingReader.reset) {
                    try {
                        window.__zxingReader.reset();
                    } catch (e) {}
                }
                window.__zxingReader = null;
            }

            async function getBackCameraStream() {
                // Fokus: kamera belakang (lebih ketat via `exact` jika didukung).
                var baseConstraints = {
                    video: {
                        facingMode: {
                            ideal: 'environment'
                        }
                    },
                    audio: false
                };

                var exactConstraints = {
                    video: {
                        facingMode: {
                            exact: 'environment'
                        }
                    },
                    audio: false
                };

                try {
                    return await navigator.mediaDevices.getUserMedia(exactConstraints);
                } catch (e) {
                    return await navigator.mediaDevices.getUserMedia(baseConstraints);
                }
            }

            async function startWithBarcodeDetector() {
                if (!('BarcodeDetector' in window)) {
                    return false;
                }
                if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                    setStatus('Browser tidak mendukung akses kamera.');
                    return false;
                }

                setStatus('Meminta izin kamera...');

                stream = await getBackCameraStream();

                videoEl.srcObject = stream;
                await videoEl.play();

                var detector = new BarcodeDetector({
                    formats: ['qr_code']
                });
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d', {
                    willReadFrequently: true
                });

                hasResult = false;
                setStatus('Scanning aktif...');

                var inFlight = false;
                timerId = setInterval(function() {
                    if (hasResult) return;
                    if (inFlight) return;
                    inFlight = true;

                    try {
                        var vw = videoEl.videoWidth || 640;
                        var vh = videoEl.videoHeight || 480;
                        canvas.width = vw;
                        canvas.height = vh;
                        ctx.drawImage(videoEl, 0, 0, vw, vh);
                        detector.detect(canvas)
                            .then(function(codes) {
                                if (!codes || !codes.length) return;
                                var raw = codes[0].rawValue || '';
                                if (!raw) return;
                                hasResult = true;
                                hasilEl.textContent = raw;
                                setStatus('QR berhasil dibaca. Scanner berhenti.');
                                stopStream();
                                showPopup();
                            })
                            .catch(function() {
                                // Abaikan error deteksi sporadis
                            })
                            .finally(function() {
                                inFlight = false;
                            });
                    } catch (e) {
                        inFlight = false;
                    }
                }, 220);

                return true;
            }

            async function startWithZXing() {
                if (!window.ZXing || !window.ZXing.BrowserMultiFormatReader) {
                    return false;
                }

                setStatus('Meminta izin kamera...');
                hasResult = false;

                stopStream();
                stopZXing();

                try {
                    // Minta kamera belakang dulu supaya kita bisa ambil deviceId-nya.
                    stream = await getBackCameraStream();

                    var deviceId = null;
                    try {
                        var tracks = stream && stream.getVideoTracks ? stream.getVideoTracks() : [];
                        var track = tracks && tracks.length ? tracks[0] : null;
                        if (track && track.getSettings) {
                            var settings = track.getSettings();
                            deviceId = settings && settings.deviceId ? settings.deviceId : null;
                        }
                    } catch (e) {}

                    // ZXing akan mengatur capture video sendiri dari deviceId.
                    stopStream();

                    if (!deviceId) {
                        setStatus('Tidak bisa memastikan kamera belakang di browser ini.');
                        return false;
                    }

                    window.__zxingReader = new ZXing.BrowserMultiFormatReader();

                    var callback = function(result, err) {
                        if (result && !hasResult) {
                            hasResult = true;
                            hasilEl.textContent = result.getText ? result.getText() : (result.text || '');
                            setStatus('QR berhasil dibaca. Scanner berhenti.');
                            try {
                                stopZXing();
                            } catch (e) {}
                            try {
                                stopStream();
                            } catch (e) {}
                            showPopup();
                        }
                        if (err) {
                            var isNotFound = err.name === 'NotFoundException' || (window.ZXing
                                .NotFoundException &&
                                err instanceof window.ZXing.NotFoundException);
                            if (!isNotFound) {
                                // Tidak tampilkan error detail agar UI tetap bersih
                            }
                        }
                    };

                    // Decoder berjalan di kamera tanpa mengirim data ke backend.
                    var p = window.__zxingReader.decodeFromVideoDevice(deviceId, videoEl, callback);
                    if (p && p.catch) {
                        p.catch(function() {
                            setStatus('Gagal memulai scanner. Silakan cek izin kamera/perangkat.');
                        });
                    }
                } catch (e) {
                    setStatus('Gagal memulai scanner: ' + (e && e.message ? e.message : 'tidak diketahui'));
                    return false;
                }

                return true;
            }

            async function startScanner() {
                hidePopup();
                if (hasilEl) hasilEl.textContent = '';
                setStatus('');

                try {
                    stopStream();
                    stopZXing();

                    var ok = await startWithBarcodeDetector();
                    if (!ok) {
                        ok = await startWithZXing();
                    }

                    if (!ok) {
                        setStatus('Scanner tidak didukung pada browser ini.');
                    }
                } catch (e) {
                    setStatus('Gagal memulai scanner: ' + (e && e.message ? e.message : 'tidak diketahui'));
                }
            }

            if (popupEl) {
                popupEl.addEventListener('click', function(e) {
                    hidePopup();
                    hasResult = false;
                    startScanner();
                });
            }

            document.addEventListener('keydown', function(e) {
                if (!popupEl || popupEl.hidden) return;
                if (e.key === 'Escape') {
                    hidePopup();
                    hasResult = false;
                    startScanner();
                }
            });

            // Autostart agar tidak ada tombol apapun.
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', startScanner);
            } else {
                startScanner();
            }
        })();
    </script>
</body>

</html>
