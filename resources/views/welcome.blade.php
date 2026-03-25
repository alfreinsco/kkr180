<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $pengaturan?->judul_kegiatan ?? 'KKR 180°' }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo-gmsambon.jpg') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/slicknav.css">

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style>
        html {
            scroll-behavior: smooth;
        }

        #performar_area_start,
        #about_area_start,
        #cg_area_start,
        #contact_area_start {
            scroll-margin-top: 100px;
        }

        /* Connect Group — pengenalan singkat, konsisten tema */
        .cg-intro-area {
            position: relative;
            padding-top: 85px;
            padding-bottom: 95px;
            overflow: hidden;
        }

        .cg-intro-area::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, transparent 0%, #FF4533 20%, #ff7a6a 50%, #FF4533 80%, transparent 100%);
        }

        .cg-intro-area .cg-intro-kicker {
            font-family: "Anton", sans-serif;
            color: #FF4533;
            letter-spacing: 0.22em;
            font-size: 0.78rem;
            text-transform: uppercase;
            margin-bottom: 0.65rem;
        }

        .cg-intro-area .cg-intro-sub {
            color: #c8cdd2;
            font-size: 1.05rem;
            line-height: 1.65;
            max-width: 720px;
            margin-left: auto;
            margin-right: auto;
        }

        .cg-intro-area .cg-intro-body {
            color: #AAB1B7;
            font-size: 0.98rem;
            line-height: 1.75;
            max-width: 680px;
            margin-left: auto;
            margin-right: auto;
        }

        .cg-intro-area .cg-intro-body strong {
            color: #e8ecef;
            font-weight: 600;
        }

        .cg-intro-card {
            background: linear-gradient(145deg, #141414 0%, #0d0d0d 100%);
            border: 1px solid #2a2a2a;
            padding: 1.35rem 1.25rem 1.4rem;
            height: 100%;
            transition: border-color 0.3s, transform 0.3s, box-shadow 0.3s;
            position: relative;
        }

        .cg-intro-card:hover {
            border-color: rgba(255, 69, 51, 0.45);
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.35);
        }

        .cg-intro-card .cg-num {
            font-family: "Anton", sans-serif;
            font-size: 2rem;
            line-height: 1;
            color: rgba(255, 69, 51, 0.35);
            margin-bottom: 0.5rem;
        }

        .cg-intro-card h5 {
            font-family: "Anton", sans-serif;
            color: #fff;
            font-size: 1rem;
            letter-spacing: 0.04em;
            margin-bottom: 0.5rem;
            line-height: 1.35;
        }

        .cg-intro-card p {
            color: #8f969c;
            font-size: 0.88rem;
            line-height: 1.55;
            margin: 0;
        }

        .cg-intro-area .cg-quote {
            border-left: 3px solid #FF4533;
            padding: 1rem 1.25rem 1rem 1.5rem;
            background: rgba(255, 69, 51, 0.06);
            margin-top: 0.5rem;
        }

        .cg-intro-area .cg-quote p {
            color: #c8cdd2;
            font-style: italic;
            font-size: 0.95rem;
            line-height: 1.65;
            margin: 0 0 0.5rem;
        }

        .cg-intro-area .cg-quote cite {
            color: #FF8066;
            font-size: 0.82rem;
            font-style: normal;
            font-weight: 600;
        }

        .cg-intro-area .cg-cta-wrap {
            margin-top: 0.25rem;
        }

        .cg-intro-area .cg-cta-note {
            color: #7a8086;
            font-size: 0.85rem;
            margin-top: 1rem;
        }

        .cg-intro-area .cg-cta-note a {
            color: #ff8a7a;
            font-weight: 600;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .cg-intro-area .cg-cta-note a:hover {
            color: #fff;
        }

        @media (max-width: 767px) {
            .cg-intro-area {
                padding-top: 65px;
                padding-bottom: 70px;
            }

            .cg-intro-card {
                margin-bottom: 0;
            }
        }

        /* Modal Daftar Sekarang - konsisten dengan tema */
        #ingatkanModal.modal {
            z-index: 9999 !important;
        }

        .modal-backdrop {
            z-index: 9998 !important;
        }

        #ingatkanModal .modal-content {
            background: #000;
            border: 1px solid #333;
            border-radius: 0;
            font-family: "Muli", sans-serif;
        }

        #ingatkanModal .modal-header {
            border-bottom: 2px solid #FF4533;
            padding: 1.25rem 1.5rem;
        }

        #ingatkanModal .modal-title {
            font-family: "Anton", sans-serif;
            color: #fff;
            font-size: 24px;
            letter-spacing: 1px;
        }

        #ingatkanModal .close {
            color: #AAB1B7;
            opacity: 1;
            text-shadow: none;
            font-size: 28px;
        }

        #ingatkanModal .close:hover {
            color: #FF4533;
        }

        #ingatkanModal .modal-body {
            padding: 1.5rem 1.5rem 2rem;
            color: #AAB1B7;
        }

        #ingatkanModal .form-group label {
            color: #fff;
            font-size: 14px;
            margin-bottom: 6px;
        }

        #ingatkanModal .form-control {
            background: #1a1a1a;
            border: 1px solid #333;
            border-radius: 0;
            color: #fff;
            padding: 12px 15px;
            font-family: "Muli", sans-serif;
        }

        #ingatkanModal .form-control:focus {
            background: #222;
            border-color: #FF4533;
            color: #fff;
            box-shadow: 0 0 0 0.2rem rgba(255, 69, 51, 0.25);
        }

        #ingatkanModal .form-control::placeholder {
            color: #7e7e7e;
        }

        #ingatkanModal .ingatkan-radio-wrap {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        #ingatkanModal .ingatkan-radio-wrap label {
            color: #AAB1B7;
            font-weight: 400;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Link penjelasan CG di modal — kontras lebih jelas */
        #ingatkanModal .cg-connect-help {
            color: #e8e8e8;
            font-size: 0.9rem;
            line-height: 1.55;
        }

        #ingatkanModal .cg-connect-help a {
            color: #ff8a7a;
            font-weight: 600;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        #ingatkanModal .cg-connect-help a:hover {
            color: #fff;
        }

        #ingatkanModal .ingatkan-radio-wrap input {
            margin: 0;
            cursor: pointer;
        }

        #ingatkanModal #cglWrap {
            display: none;
            margin-top: 0.5rem;
        }

        #ingatkanModal #cglWrap.show {
            display: block;
        }

        #ingatkanModal .modal-footer {
            border-top: 1px solid #333;
            padding: 1rem 1.5rem 1.5rem;
        }

        #ingatkanModal .btn-ingatkan-submit {
            background: #FF4533;
            color: #fff;
            border: 1px solid transparent;
            padding: 12px 32px;
            font-family: "Anton", sans-serif;
            font-size: 18px;
            letter-spacing: 2px;
            border-radius: 0;
            transition: 0.3s;
        }

        #ingatkanModal .btn-ingatkan-submit:hover {
            background: transparent;
            color: #FF4533;
            border-color: #FF4533;
        }

        #ingatkanModal .modal-footer .btn-secondary {
            background: transparent;
            border: 1px solid #555;
            color: #AAB1B7;
            border-radius: 0;
        }

        #ingatkanModal .modal-footer .btn-secondary:hover {
            border-color: #FF4533;
            color: #FF4533;
            background: transparent;
        }

        /* Mobile: sesuaikan ukuran logo & jarak header + sejajarkan logo dengan mobile_menu */
        @media (max-width: 767px) {
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

            /* SlickNav: batalkan position absolute agar ikut alur flex & sejajar dengan logo */
            .header-area .mobile_menu {
                position: relative !important;
                right: auto !important;
                width: auto !important;
            }

            .header-area .slicknav_btn {
                position: relative !important;
                top: auto !important;
                margin: 0 !important;
                float: none !important;
            }

            .header-area .slicknav_menu {
                margin: 0;
                padding: 0;
                background: transparent;
            }
        }
    </style>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
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
                                            <li><a href="index.html">beranda</a></li>
                                            <li><a href="#performar_area_start">Performer</a></li>
                                            <li><a href="#about_area_start">tentang</a></li>
                                            <li><a href="#contact_area_start">kontak</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="buy_tkt">
                                    <div class="book_btn d-none d-lg-block">
                                        <a href="#" data-toggle="modal" data-target="#ingatkanModal">Daftar
                                            Sekarang</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 d-flex d-lg-none align-items-center justify-content-end">
                                <div class="mobile_menu"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-12">
                        <div class="slider_text text-center">
                            <div class="shape_1 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                <img src="img/shape/shape_1.svg" alt="">
                            </div>
                            <div class="shape_2 wow fadeInDown" data-wow-duration="1s" data-wow-delay=".2s">
                                <img src="img/shape/shape_2.svg" alt="">
                            </div>
                            <span class="wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay=".3s">{{ $pengaturan?->tanggal_kegiatan?->translatedFormat('d F, Y') ?? '27 Maret, 2026' }}</span>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                                {{ $pengaturan?->judul_kegiatan ?? 'KKR 180°' }}</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                {{ $pengaturan?->sub_judul_kegiatan ?? 'FREEDOM' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    @if ($performers && $performers->isNotEmpty())
        <!-- performar_area_start  -->
        <div id="performar_area_start" class="performar_area black_bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title mb-80">
                            <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">Performer</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach ($performers as $index => $p)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single_performer wow fadeInUp" data-wow-duration="1s"
                                        data-wow-delay="{{ number_format(0.3 + $index * 0.1, 1) }}s">
                                        <div data-tilt class="thumb">
                                            <img src="{{ $p->foto ? asset('storage/' . $p->foto) : asset('img/performer/hendra.jpg') }}"
                                                alt="{{ $p->nama }}">
                                        </div>
                                        <div class="performer_heading">
                                            <h4>{{ $p->nama }}</h4>
                                            <span>{{ $p->peran }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- performar_area_end  -->
    @endif

    @if ($tentang)
        <!-- about_area_start  -->
        <div id="about_area_start" class="about_area black_bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section_title text-center mb-80">
                            <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                                {{ $tentang->judul ?? 'Tentang KKR 180°' }}</h3>
                            <p class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s">
                                {{ $tentang->deskripsi }}</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="about_thumb">
                            <div class="shap_3  wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                                <img src="{{ asset('img/shape/shape_3.svg') }}" alt="">
                            </div>
                            <div class="thumb_inner  wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <img src="{{ $tentang->gambar ? asset('storage/' . $tentang->gambar) : asset('img/kkr.png') }}"
                                    alt="{{ $tentang->judul ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="about_info pl-68">
                            <h4 class=" wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                {{ $tentang->subjudul ?? 'Saatnya berubah. Saatnya berbalik 180° kepada Tuhan.' }}</h4>
                            <p class=" wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".6s">
                                {{ $tentang->deskripsi_singkat ?? 'Mari alami perubahan hidup bersama Tuhan. Waktunya berbalik 180° dan memulai yang baru!' }}
                            </p>
                            <a href="#" class="boxed-btn3  wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay=".7s" data-toggle="modal" data-target="#ingatkanModal">Ingatkan
                                Saya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about_area_end  -->
    @endif

    @if ($programDetails && $programDetails->isNotEmpty())
        <div class="program_details_area detials_bg_1 overlay2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title text-center mb-80  wow fadeInRight" data-wow-duration="1s"
                            data-wow-delay=".3s">
                            <h3>Program Details</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="program_detail_wrap">
                            @foreach ($programDetails as $index => $pd)
                                <div class="single_propram">
                                    <div class="inner_wrap">
                                        <div class="circle_img"></div>
                                        <div class="porgram_top">
                                            <span
                                                class="{{ $index % 2 === 0 ? 'wow fadeInLeft' : 'wow fadeInRight' }}"
                                                data-wow-duration="1s"
                                                data-wow-delay="{{ number_format(0.3 + $index * 0.1, 1) }}s">{{ $pd->waktu }}</span>
                                            <h4 class="{{ $index % 2 === 0 ? 'wow fadeInUp' : 'wow fadeInRight' }}"
                                                data-wow-duration="1s"
                                                data-wow-delay="{{ number_format(0.4 + $index * 0.1, 1) }}s">
                                                {{ $pengaturan?->tanggal_kegiatan?->translatedFormat('d F Y') ?? '27 Maret 2026' }}
                                            </h4>
                                        </div>
                                        <div class="thumb {{ $index % 2 === 0 ? 'wow fadeInUp' : 'wow fadeInRight' }}"
                                            data-wow-duration="1s"
                                            data-wow-delay="{{ number_format(0.5 + $index * 0.1, 1) }}s">
                                            <img src="{{ $pd->gambar ? asset('storage/' . $pd->gambar) : asset('img/program_details/worship.png') }}"
                                                alt="{{ $pd->judul }}">
                                        </div>
                                        <h4 class="{{ $index % 2 === 0 ? 'wow fadeInUp' : 'wow fadeInRight' }}"
                                            data-wow-duration="1s"
                                            data-wow-delay="{{ number_format(0.6 + $index * 0.1, 1) }}s">
                                            {{ $pd->judul }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($pengaturan && $pengaturan->peta_embed_url)
        <!-- map_area_start  -->
        <div id="contact_area_start" class="map_area">
            <iframe src="{{ $pengaturan->peta_embed_url }}" width="600" height="450"
                style="border:0; width: 100%;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- map_area_end  -->
    @endif

    @if ($sponsorLogos && $sponsorLogos->isNotEmpty())
        <!-- brand_area_start  -->
        <div class="brand_area black_bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title text-center mb-80">
                            <h4 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">Sponsor Logos
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand_wrap">
                            <div class="brand_active owl-carousel">
                                @foreach ($sponsorLogos as $sl)
                                    <div class="single_brand text-center">
                                        <img src="{{ $sl->logo ? (str_starts_with($sl->logo, 'img/') ? asset($sl->logo) : asset('storage/' . $sl->logo)) : asset('img/brand/logo-gmsambon.png') }}"
                                            alt="{{ $sl->nama ?? '' }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand_area_end  -->
    @endif
    <!-- footer_start  -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="footer_widget">
                            <div class="address_details text-center">
                                <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                    {{ $pengaturan?->tanggal_kegiatan?->translatedFormat('d F Y') ?? '27 Maret 2026' }}
                                </h4>
                                <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                    {{ $pengaturan?->lokasi_kegiatan ?? 'Aula Lantai 2 Universitas Pattimura' }}</h3>
                                <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Jangan sampai
                                    ketinggalan!</p>
                                <a href="#" class="boxed-btn3 wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay=".6s" data-toggle="modal" data-target="#ingatkanModal">Daftar
                                    Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- cg_intro_area_start — ringkasan dari https://gms.church/id/cg (sebelum baris copyright) -->
        <div id="cg_area_start" class="cg-intro-area black_bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <p class="cg-intro-kicker wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">Connect
                            Group
                            GMS</p>
                        <div class="section_title mb-50">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">Rumah rohani untuk
                                bertumbuh bersama</h3>
                            <p class="cg-intro-sub wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <strong>Connect Group (CG)</strong> adalah komunitas kecil tempat Anda dimuridkan,
                                saling menguatkan, dan bertumbuh semakin serupa dengan Kristus — dengan visi GMS untuk
                                membangun gereja lokal yang kuat lewat penginjilan, pemuridan, dan multiplikasi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-50">
                    <div class="col-lg-8 text-center">
                        <p class="cg-intro-body wow fadeInUp" data-wow-duration="1s" data-wow-delay=".35s">
                            Biasanya terdiri dari <strong>6–15 orang</strong> yang rutin berkumpul: pujian &amp;
                            penyembahan,
                            diskusi Firman, doa bersama, persekutuan hangat, hingga aktivitas seru dan pelayanan sosial.
                            <strong>Hidup iman lebih bermakna saat dijalani bersama.</strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cg-intro-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cg-num">01</div>
                            <h5>Panggilan Tuhan</h5>
                            <p>Dimuridkan secara sengaja dan dilatih untuk memuridkan orang lain.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cg-intro-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="cg-num">02</div>
                            <h5>Pertumbuhan iman</h5>
                            <p>Iman yang matang lewat pemuridan yang konsisten dan relevan.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cg-intro-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <div class="cg-num">03</div>
                            <h5>Komunitas kasih</h5>
                            <p>Lingkungan yang saling mengasihi dan selalu ada untuk satu sama lain.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="cg-intro-card wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="cg-num">04</div>
                            <h5>Dukungan rohani</h5>
                            <p>Saling mendukung lewat doa, Firman, dan kebersamaan yang tulus.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="cg-quote wow fadeInUp" data-wow-duration="1s" data-wow-delay=".35s">
                            <p>Dan marilah kita saling memperhatikan supaya kita saling mendorong dalam kasih dan dalam
                                pekerjaan baik. Janganlah kita menjauhkan diri dari pertemuan-pertemuan ibadah kita
                                &hellip;
                                marilah kita saling menasihati, dan semakin giat melakukannya menjelang hari Tuhan yang
                                mendekat.</p>
                            <cite>— Ibrani 10:24–25</cite>
                        </div>
                        <div class="text-center cg-cta-wrap wow fadeInUp" data-wow-duration="1s"
                            data-wow-delay=".45s">
                            <a href="https://gms.church/id/cg" class="boxed-btn3" target="_blank"
                                rel="noopener noreferrer">Pelajari CG &amp; cara bergabung</a>
                            <p class="cg-cta-note mb-0">Informasi lengkap, kategori usia, dan formulir <strong>Connect
                                    Me</strong> ada di situs resmi GMS Church — <a href="https://gms.church/id/cg"
                                    target="_blank" rel="noopener noreferrer">gms.church/id/cg</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cg_intro_area_end -->

        <div class="copy-right_text">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Semua hak dilindungi undang-undang | Aplikasi ini dibuat dengan <i
                                class="fa fa-heart-o" aria-hidden="true"></i> oleh <a
                                href="https://alfreinsco.vercel.app" target="_blank">Alfreinsco</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->

    <!-- Modal Daftar Sekarang -->
    <div class="modal fade" id="ingatkanModal" tabindex="-1" role="dialog" aria-labelledby="ingatkanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ingatkanModalLabel">Daftar Sekarang — KKR 180°</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formIngatkanSaya">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaLengkap">Nama lengkap</label>
                            <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap"
                                placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="noTelp">Nomor telepon / WhatsApp</label>
                            <input type="tel" class="form-control" id="noTelp" name="no_telp"
                                placeholder="Contoh: 08123456789" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="asalKampus">Asal kampus</label>
                            <input type="text" class="form-control" id="asalKampus" name="asal_kampus"
                                placeholder="Contoh: Universitas Pattimura">
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="number" class="form-control" id="umur" name="umur" min="0"
                                max="120" step="1" placeholder="Opsional">
                        </div>
                        <div class="form-group">
                            <label>Sudah pernah mengikuti CG(Connect Group) sebelumnya?</label>
                            <div class="ingatkan-radio-wrap">
                                <label>
                                    <input type="radio" name="pernah_ikut" value="sudah"> Sudah
                                </label>
                                <label>
                                    <input type="radio" name="pernah_ikut" value="belum" checked> Belum
                                </label>
                            </div>
                            <p class="mb-2 mt-1 cg-connect-help">
                                <a href="https://gms.church/id/cg" target="_blank" rel="noopener noreferrer">Belum
                                    tahu CG itu apa? Baca penjelasan Connect Group di sini.</a>
                            </p>
                            <div id="cglWrap">
                                <label for="namaCGL">Siapa nama CGL (Connect Group Leader) Anda?</label>
                                <input type="text" class="form-control mt-2" id="namaCGL" name="nama_cgl"
                                    placeholder="Nama CGL">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-ingatkan-submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/tilt.jquery.js"></script>
    <script src="js/plugins.js"></script>



    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>
    <script>
        (function() {
            var cglWrap = document.getElementById('cglWrap');
            var namaCGL = document.getElementById('namaCGL');
            var radios = document.querySelectorAll('input[name="pernah_ikut"]');
            if (cglWrap && radios.length) {
                function toggleCGL() {
                    var sudah = document.querySelector('input[name="pernah_ikut"]:checked');
                    if (sudah && sudah.value === 'sudah') {
                        cglWrap.classList.add('show');
                        namaCGL.setAttribute('required', 'required');
                    } else {
                        cglWrap.classList.remove('show');
                        namaCGL.removeAttribute('required');
                        namaCGL.value = '';
                    }
                }
                radios.forEach(function(r) {
                    r.addEventListener('change', toggleCGL);
                });
                toggleCGL();
            }
            var form = document.getElementById('formIngatkanSaya');
            if (form) {
                function openPendingTab() {
                    return window.open('about:blank', '_blank');
                }

                function redirectPendingTab(pendingTab, undanganUrl) {
                    if (!undanganUrl) return;
                    if (pendingTab && !pendingTab.closed) {
                        pendingTab.location.href = undanganUrl;
                        return;
                    }
                    var fallbackTab = window.open(undanganUrl, '_blank');
                    if (fallbackTab) return;
                    alert('Pop-up diblokir browser. Silakan buka link undangan secara manual.');
                }

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    var pendingTab = openPendingTab();
                    var submitBtn = form.querySelector('button[type="submit"]');
                    var originalText = submitBtn.textContent;
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Mengirim...';
                    var umurRaw = document.getElementById('umur').value.trim();
                    var umurParsed = umurRaw === '' ? null : parseInt(umurRaw, 10);
                    var payload = {
                        nama_lengkap: document.getElementById('namaLengkap').value.trim(),
                        no_telp: document.getElementById('noTelp').value.trim(),
                        alamat: document.getElementById('alamat').value.trim(),
                        asal_kampus: document.getElementById('asalKampus').value.trim() || null,
                        umur: isNaN(umurParsed) ? null : umurParsed,
                        pernah_ikut: (document.querySelector('input[name="pernah_ikut"]:checked') || {})
                            .value || 'belum',
                        nama_cgl: document.getElementById('namaCGL').value.trim() || null
                    };
                    if (payload.pernah_ikut !== 'sudah') payload.nama_cgl = null;
                    fetch('{{ url('/api/ingatkan-saya') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify(payload)
                        })
                        .then(function(r) {
                            return r.json().then(function(d) {
                                return {
                                    ok: r.ok,
                                    status: r.status,
                                    data: d
                                };
                            });
                        })
                        .then(function(result) {
                            if (result.ok) {
                                redirectPendingTab(pendingTab, result.data.undanganUrl);
                                alert(result.data.message ||
                                    'Terima kasih! Kami akan mengingatkan Anda untuk KKR 180°.');
                                $('#ingatkanModal').modal('hide');
                                form.reset();
                                if (cglWrap) cglWrap.classList.remove('show');
                            } else {
                                if (pendingTab && !pendingTab.closed) pendingTab.close();
                                var msg = result.data.message || 'Terjadi kesalahan. Silakan coba lagi.';
                                if (result.data.errors) {
                                    var errList = Object.values(result.data.errors).flat().join('\n');
                                    if (errList) msg = msg + '\n\n' + errList;
                                }
                                alert(msg);
                            }
                        })
                        .catch(function() {
                            if (pendingTab && !pendingTab.closed) pendingTab.close();
                            alert('Koneksi gagal. Periksa jaringan dan coba lagi.');
                        })
                        .finally(function() {
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        });
                });
            }
        })();
    </script>
</body>

</html>
