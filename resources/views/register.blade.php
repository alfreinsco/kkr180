<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $pengaturan?->judul_kegiatan ?? 'KKR 180° - Register Pengingat' }}</title>
    <meta name="description" content="Form Ingatkan Saya untuk KKR 180°">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo-gmsambon.jpeg') }}">

    <!-- CSS utama event (sama seperti landing) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background: #000;
            color: #AAB1B7;
            overflow-x: hidden;
        }

        /* Header sticky saat scroll: fixed + background */
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

        /* Saat sticky, baris header sedikit lebih tipis supaya logo & link lebih rapat ke atas */
        #sticky-header.main-header-area.sticky .header_bottom_border>.row {
            min-height: 56px;
            margin-top: -80px;
        }

        /* Tulisan "Lihat selengkapnya" warna putih */
        .header-area .book_btn a,
        .header-area #navigation a {
            color: #fff !important;
        }

        .header-area .book_btn a:hover,
        .header-area #navigation a:hover {
            color: rgba(255, 255, 255, 0.85) !important;
        }

        .register-card .btn-outline-light,
        .register-card a.btn-outline-light {
            color: #fff !important;
            border-color: #fff;
        }

        .register-card .btn-outline-light:hover,
        .register-card a.btn-outline-light:hover {
            color: #000 !important;
            background-color: #fff;
            border-color: #fff;
        }

        .register-hero {
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
            align-items: center;
            padding: 1rem 0;
            background: url('{{ asset('img/slider/slider_bg_1.jpg') }}') center center/cover no-repeat;
            position: relative;
        }

        .register-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
        }

        .register-hero-inner {
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .register-card {
            background: #000;
            border: 1px solid #333;
            border-radius: 0;
            padding: 1.25rem 1rem;
        }

        .register-card .section_title h3 {
            font-family: "Anton", sans-serif;
            color: #fff;
            letter-spacing: 1px;
            font-size: 1.5rem;
            line-height: 1.3;
        }

        .register-card .section_title p {
            font-size: 0.9rem;
        }

        .register-card label {
            color: #fff;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .register-card .form-control {
            background: #1a1a1a;
            border: 1px solid #333;
            border-radius: 0;
            color: #fff;
            padding: 12px 15px;
            font-family: "Muli", sans-serif;
            min-height: 44px;
            font-size: 16px;
        }

        .register-card .form-control:focus {
            background: #222;
            border-color: #FF4533;
            color: #fff;
            box-shadow: 0 0 0 0.2rem rgba(255, 69, 51, 0.25);
        }

        .register-card .form-control::placeholder {
            color: #7e7e7e;
        }

        .register-card textarea.form-control {
            min-height: 80px;
        }

        .ingatkan-radio-wrap {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .ingatkan-radio-wrap label {
            color: #AAB1B7;
            font-weight: 400;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            min-height: 44px;
            padding: 4px 0;
        }

        .ingatkan-radio-wrap input {
            margin: 0;
            cursor: pointer;
            min-width: 18px;
            min-height: 18px;
        }

        #cglWrap {
            display: none;
            margin-top: 0.5rem;
        }

        #cglWrap.show {
            display: block;
        }

        .btn-ingatkan-submit {
            background: #FF4533;
            color: #fff;
            border: 1px solid transparent;
            padding: 12px 32px;
            font-family: "Anton", sans-serif;
            font-size: 18px;
            letter-spacing: 2px;
            border-radius: 0;
            transition: 0.3s;
            min-height: 48px;
            width: 100%;
            max-width: 280px;
        }

        .btn-ingatkan-submit:hover {
            background: transparent;
            color: #FF4533;
            border-color: #FF4533;
        }

        /* State sukses setelah kirim */
        .register-success-wrap {
            display: none;
            text-align: center;
            padding: 1rem 0;
        }

        .register-success-wrap.is-visible {
            display: block;
            animation: registerSuccessFadeIn 0.5s ease-out;
        }

        .register-form-wrap.is-hidden {
            display: none !important;
        }

        @keyframes registerSuccessFadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .register-success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: #FF4533;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: registerSuccessPop 0.6s ease-out 0.2s both;
        }

        .register-success-icon svg {
            width: 44px;
            height: 44px;
            stroke: #fff;
        }

        @keyframes registerSuccessPop {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            60% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .register-success-wrap h4 {
            font-family: "Anton", sans-serif;
            color: #fff;
            font-size: 1.5rem;
            letter-spacing: 1px;
            margin-bottom: 0.75rem;
        }

        .register-success-wrap p {
            color: #AAB1B7;
            margin-bottom: 1rem;
        }

        .btn-kirim-lagi {
            background: transparent;
            color: #FF4533;
            border: 2px solid #FF4533;
            padding: 12px 28px;
            font-family: "Anton", sans-serif;
            font-size: 16px;
            letter-spacing: 2px;
            border-radius: 0;
            transition: 0.3s;
            margin-top: 0.5rem;
        }

        .btn-kirim-lagi:hover {
            background: #FF4533;
            color: #fff;
        }

        /* Tablet (iPad portrait/landscape, 768px - 1023px) */
        @media (min-width: 768px) {
            .register-hero {
                padding: 2rem 0;
            }

            .register-card {
                padding: 2rem 2rem;
            }

            .register-card .section_title h3 {
                font-size: 1.75rem;
            }

            .register-card .section_title p {
                font-size: 1rem;
            }

            .btn-ingatkan-submit {
                width: auto;
            }
        }

        /* Desktop (992px+) */
        @media (min-width: 992px) {
            .register-hero {
                padding: 3rem 0;
            }

            .register-card {
                padding: 2rem 2.5rem;
            }

            .register-card .section_title h3 {
                font-size: 2rem;
            }
        }

        /* Mobile: sama konsep dengan welcome — logo & menu sejajar, ukuran & jarak */
        @media (max-width: 767px) {
            .register-hero .container {
                padding-left: 15px;
                padding-right: 15px;
            }

            .header-area .logo img {
                max-width: 100px;
                max-height: 100px;
                width: auto;
                height: auto;
                object-fit: contain;
            }

            #sticky-header.main-header-area {
                padding-top: 10px;
                padding-bottom: 10px;
            }

            /* Row header punya tinggi jelas agar align-items-center bekerja */
            .header_bottom_border>.row {
                min-height: 70px;
            }

            /* Logo ikut tengah vertikal */
            .header-area .logo,
            .header-area .logo a {
                display: flex;
                align-items: center;
            }

            .header-area .logo img {
                display: block;
            }

            .register-hero {
                padding-top: 110px;
            }

            .section_title.mb-40 {
                margin-bottom: 1.5rem !important;
            }
        }

        /* Very small mobile (320px - 480px) */
        @media (max-width: 480px) {
            .register-card {
                padding: 1rem 0.75rem;
            }

            .register-card .section_title h3 {
                font-size: 1.25rem;
            }

            .ingatkan-radio-wrap {
                gap: 16px;
            }
        }
    </style>
</head>

<body>
    <!-- header-start (disederhanakan, tetap konsisten) -->
    <header class="mb-5">
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center h-100">
                            <div class="col-8 col-sm-8 col-md-3 col-lg-3 d-flex align-items-center h-100">
                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ $pengaturan?->logo ? asset('storage/' . $pengaturan->logo) : asset('img/logo.png') }}"
                                            alt="" width="{{ $pengaturan?->lebar_logo ?? 150 }}"
                                            height="{{ $pengaturan?->tinggi_logo ?? 150 }}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 d-none d-lg-block">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ url('/') }}">Lihat selengkapnya</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="buy_tkt">
                                    <div class="book_btn d-none d-lg-block">
                                        <a href="{{ url('/') }}">Lihat selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 d-flex d-lg-none align-items-center justify-content-end h-100">
                                <div class="book_btn">
                                    <a href="{{ url('/') }}">Lihat selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <section class="register-hero" id="form_register">
        <div class="container register-hero-inner">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="register-card">
                        <div class="section_title text-center mb-40">
                            <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                                Ingatkan Saya — {{ $pengaturan?->judul_kegiatan ?? 'KKR 180°' }}
                            </h3>
                            <p class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s">
                                Daftarkan diri Anda dan kami akan mengingatkan menjelang acara.
                            </p>
                        </div>

                        <div class="register-success-wrap" id="registerSuccessWrap">
                            <div class="register-success-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <h4>Data Anda sudah disimpan</h4>
                            <p>Terima kasih! Kami akan mengingatkan Anda menjelang acara KKR 180°.</p>
                            <p class="small text-muted">Sampai jumpa di acara. Jangan lupa hadir ya!</p>
                            <button type="button" class="btn btn-kirim-lagi" id="btnKirimJawabanLagi">Kirim Jawaban
                                Lagi</button>
                        </div>

                        <div class="register-form-wrap" id="registerFormWrap">
                            <form id="formIngatkanSayaRegister">
                                <div class="form-group">
                                    <label for="namaLengkapRegister">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namaLengkapRegister"
                                        name="nama_lengkap" placeholder="Nama lengkap Anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="noTelpRegister">Nomor Telepon / WhatsApp</label>
                                    <input type="tel" class="form-control" id="noTelpRegister" name="no_telp"
                                        placeholder="Contoh: 08123456789" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamatRegister">Alamat</label>
                                    <textarea class="form-control" id="alamatRegister" name="alamat" rows="3" placeholder="Alamat lengkap Anda"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="asalKampusRegister">Asal kampus</label>
                                    <input type="text" class="form-control" id="asalKampusRegister"
                                        name="asal_kampus" placeholder="Contoh: Universitas Pattimura">
                                </div>
                                <div class="form-group">
                                    <label>Sudah pernah mengikuti CG (Connect Group) sebelumnya?</label>
                                    <div class="ingatkan-radio-wrap">
                                        <label>
                                            <input type="radio" name="pernah_ikut" value="sudah"> Sudah
                                        </label>
                                        <label>
                                            <input type="radio" name="pernah_ikut" value="belum" checked> Belum
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group" id="cglWrap">
                                    <label for="namaCglRegister">Nama CGL (Connect Group Leader)</label>
                                    <input type="text" class="form-control" id="namaCglRegister" name="nama_cgl"
                                        placeholder="Nama CGL Anda">
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-ingatkan-submit">
                                        Kirim
                                    </button>
                                    <div class="mt-3">
                                        <a href="{{ url('/') }}" class="btn btn-outline-light">
                                            Lihat selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script>
        (function() {
            var header = document.getElementById('sticky-header');
            if (header) {
                function onScroll() {
                    if (window.scrollY > 50) {
                        header.classList.add('sticky');
                    } else {
                        header.classList.remove('sticky');
                    }
                }
                window.addEventListener('scroll', onScroll, {
                    passive: true
                });
                onScroll();
            }
        })();
    </script>
    <script>
        (function() {
            var form = document.getElementById('formIngatkanSayaRegister');
            if (!form) return;

            var formWrap = document.getElementById('registerFormWrap');
            var successWrap = document.getElementById('registerSuccessWrap');
            var btnKirimLagi = document.getElementById('btnKirimJawabanLagi');
            var LOCAL_KEY = 'ingatkan_saya_register_success';
            var cglWrap = document.getElementById('cglWrap');
            var pernahIkutRadios = document.querySelectorAll('input[name="pernah_ikut"]');

            function showSuccess() {
                if (formWrap) formWrap.classList.add('is-hidden');
                if (successWrap) successWrap.classList.add('is-visible');
                try {
                    localStorage.setItem(LOCAL_KEY, '1');
                } catch (e) {}
                form.reset();
                if (cglWrap) cglWrap.classList.remove('show');
            }

            function showForm() {
                if (successWrap) successWrap.classList.remove('is-visible');
                if (formWrap) formWrap.classList.remove('is-hidden');
                try {
                    localStorage.removeItem(LOCAL_KEY);
                } catch (e) {}
                form.reset();
                if (cglWrap) cglWrap.classList.remove('show');
            }

            if (btnKirimLagi) {
                btnKirimLagi.addEventListener('click', showForm);
            }

            // Saat halaman dibuka / di-refresh, cek status di localStorage
            try {
                if (localStorage.getItem(LOCAL_KEY) === '1') {
                    if (formWrap) formWrap.classList.add('is-hidden');
                    if (successWrap) successWrap.classList.add('is-visible');
                }
            } catch (e) {}

            pernahIkutRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (this.value === 'sudah') {
                        cglWrap.classList.add('show');
                    } else {
                        cglWrap.classList.remove('show');
                    }
                });
            });

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                var payload = {
                    nama_lengkap: document.getElementById('namaLengkapRegister').value.trim(),
                    no_telp: document.getElementById('noTelpRegister').value.trim(),
                    alamat: document.getElementById('alamatRegister').value.trim(),
                    asal_kampus: document.getElementById('asalKampusRegister').value.trim() || null,
                    pernah_ikut: (document.querySelector('input[name="pernah_ikut"]:checked') || {})
                        .value || 'belum',
                    nama_cgl: document.getElementById('namaCglRegister').value.trim() || null,
                };

                if (payload.pernah_ikut !== 'sudah') {
                    payload.nama_cgl = null;
                }

                fetch('{{ url('/api/ingatkan-saya') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify(payload),
                    })
                    .then(function(response) {
                        return response.json().then(function(data) {
                            return {
                                ok: response.ok,
                                status: response.status,
                                data: data
                            };
                        });
                    })
                    .then(function(result) {
                        if (result.ok) {
                            showSuccess();
                        } else {
                            var msg = result.data.message || 'Terjadi kesalahan. Silakan coba lagi.';
                            if (result.data.errors) {
                                var errList = Object.values(result.data.errors).flat().join('\n');
                                msg += '\n\n' + errList;
                            }
                            alert(msg);
                        }
                    })
                    .catch(function() {
                        alert('Terjadi kesalahan jaringan. Silakan coba lagi.');
                    });
            });
        })();
    </script>
</body>

</html>
