<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undangan {{ $pengaturan?->judul_kegiatan ?? 'KKR 180°' }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo-gmsambon.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        :root {
            --bg-1: #f7f8fb;
            --bg-2: #eef2f7;
            --accent: #ff4533;
            --text: #1c2330;
            --muted: #5f6b7b;
            --card: rgba(255, 255, 255, 0.96);
            --line: rgba(16, 30, 54, 0.12);
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: radial-gradient(1200px circle at 20% 20%, #ffffff 0%, var(--bg-1) 55%),
                linear-gradient(140deg, var(--bg-1), var(--bg-2));
            color: var(--text);
            font-family: "Muli", sans-serif;
            padding: 24px 16px 48px;
        }

        .invite-page {
            width: min(100%, 980px);
            margin: 0 auto;
        }

        .invite-head {
            text-align: center;
            margin-bottom: 18px;
        }

        .invite-head h1 {
            margin: 0;
            font-family: "Anton", sans-serif;
            letter-spacing: 1px;
            font-size: clamp(1.5rem, 4vw, 2.1rem);
        }

        .invite-head p {
            margin: 8px 0 0;
            color: var(--muted);
        }

        .invite-card {
            border: 1px solid var(--line);
            border-radius: 22px;
            background: var(--card);
            backdrop-filter: blur(6px);
            box-shadow: 0 16px 40px rgba(15, 31, 56, 0.12);
            overflow: hidden;
        }

        .invite-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 0;
        }

        .invite-main {
            padding: 28px;
            border-right: 1px solid var(--line);
        }

        .invite-aside {
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .badge-kkr {
            display: inline-block;
            font-size: 12px;
            letter-spacing: 1.5px;
            padding: 6px 10px;
            border-radius: 999px;
            border: 1px solid rgba(255, 69, 51, 0.4);
            color: #b3362a;
            background: rgba(255, 69, 51, 0.12);
            margin-bottom: 14px;
            text-transform: uppercase;
        }

        .guest-name {
            margin: 0 0 10px;
            font-family: "Anton", sans-serif;
            letter-spacing: 1px;
            font-size: clamp(1.7rem, 3.8vw, 2.5rem);
            line-height: 1.15;
        }

        .invite-title {
            margin: 0 0 18px;
            color: var(--muted);
            font-size: 1rem;
        }

        .meta-list {
            display: grid;
            gap: 10px;
        }

        .meta-item {
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 10px 12px;
            background: rgba(255, 255, 255, 0.8);
        }

        .meta-label {
            margin: 0 0 4px;
            color: var(--muted);
            font-size: 12px;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .meta-value {
            margin: 0;
            font-size: 15px;
            line-height: 1.45;
            word-break: break-word;
        }

        .qr-box {
            width: 100%;
            max-width: 240px;
            background: #fff;
            border-radius: 14px;
            padding: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #qrcodeImage {
            width: 100% !important;
            height: auto !important;
            display: block;
        }

        .qr-note {
            text-align: center;
            margin: 0;
            color: var(--muted);
            font-size: 13px;
        }

        .invite-actions {
            margin-top: 16px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .invite-btn {
            border: 1px solid transparent;
            border-radius: 10px;
            min-height: 44px;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .invite-btn--primary {
            background: var(--accent);
            color: #fff;
        }

        .invite-btn--ghost {
            border-color: rgba(16, 30, 54, 0.2);
            color: #1c2330;
            background: rgba(255, 255, 255, 0.6);
        }

        .invite-btn--ghost:hover {
            border-color: rgba(16, 30, 54, 0.35);
            background: #fff;
            color: #111827;
        }

        .invite-foot {
            margin-top: 14px;
            text-align: center;
            color: var(--muted);
            font-size: 12px;
        }

        @media (max-width: 860px) {
            .invite-grid {
                grid-template-columns: 1fr;
            }

            .invite-main {
                border-right: none;
                border-bottom: 1px solid var(--line);
            }
        }
    </style>
</head>

<body>
    <main class="invite-page">
        <header class="invite-head">
            <h1>{{ $pengaturan?->judul_kegiatan ?? 'KKR 180°' }}</h1>
            <p>Undangan Personal</p>
        </header>

        <section class="invite-card" id="inviteCard">
            <div class="invite-grid">
                <div class="invite-main">
                    <span class="badge-kkr">Exclusive Invitation</span>
                    <h2 class="guest-name">{{ $tamu->nama_lengkap }}</h2>
                    <p class="invite-title">
                        Anda diundang untuk menghadiri {{ $pengaturan?->judul_kegiatan ?? 'KKR 180°' }}.
                    </p>

                    <div class="meta-list">
                        <div class="meta-item">
                            <p class="meta-label">Lokasi</p>
                            <p class="meta-value">{{ $pengaturan?->lokasi_kegiatan ?: '-' }}</p>
                        </div>
                        <div class="meta-item">
                            <p class="meta-label">Tanggal Acara</p>
                            <p class="meta-value">
                                {{ $pengaturan?->tanggal_kegiatan ? $pengaturan->tanggal_kegiatan->translatedFormat('d F Y') : '-' }}
                            </p>
                        </div>
                    </div>
                </div>

                <aside class="invite-aside">
                    <div class="qr-box">
                        <img id="qrcodeImage"
                            src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data={{ urlencode($qrPayload) }}"
                            alt="QR Code Undangan" width="220" height="220" loading="eager" decoding="sync">
                    </div>
                    <p class="qr-note">Scan QR ini pada pintu masuk acara.</p>
                </aside>
            </div>
        </section>

        <div class="invite-actions">
            <button type="button" id="btnDownloadInvite" class="invite-btn invite-btn--primary">
                Download Undangan
            </button>
            <a href="{{ url('/') }}" class="invite-btn invite-btn--ghost">Kembali ke Beranda</a>
        </div>

        {{-- <p class="invite-foot">ID terenkripsi: {{ $encryptedId }}</p> --}}
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        (function() {
            var btnDownload = document.getElementById('btnDownloadInvite');
            var inviteCard = document.getElementById('inviteCard');
            if (!btnDownload || !inviteCard) return;

            btnDownload.addEventListener('click', function() {
                var originalText = btnDownload.textContent;
                btnDownload.textContent = 'Menyiapkan file...';
                btnDownload.disabled = true;

                html2canvas(inviteCard, {
                        backgroundColor: null,
                        scale: 2,
                        useCORS: true
                    })
                    .then(function(canvas) {
                        var link = document.createElement('a');
                        link.download = 'undangan-{{ $tamu->id }}.png';
                        link.href = canvas.toDataURL('image/png');
                        link.click();
                    })
                    .catch(function() {
                        window.alert('Gagal membuat file undangan. Silakan coba lagi.');
                    })
                    .finally(function() {
                        btnDownload.textContent = originalText;
                        btnDownload.disabled = false;
                    });
            });
        })();
    </script>
</body>

</html>
