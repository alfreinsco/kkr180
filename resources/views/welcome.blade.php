<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EventCon</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
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
        html { scroll-behavior: smooth; }
        #performar_area_start, #about_area_start, #contact_area_start { scroll-margin-top: 100px; }
        /* Modal Ingatkan Saya - konsisten dengan tema */
        #ingatkanModal.modal { z-index: 9999 !important; }
        .modal-backdrop { z-index: 9998 !important; }
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
        #ingatkanModal .close:hover { color: #FF4533; }
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
        #ingatkanModal .form-control::placeholder { color: #7e7e7e; }
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
        #ingatkanModal .ingatkan-radio-wrap input { margin: 0; cursor: pointer; }
        #ingatkanModal #cglWrap {
            display: none;
            margin-top: 0.5rem;
        }
        #ingatkanModal #cglWrap.show { display: block; }
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
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-3">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="img/logo.png" alt="" width="150" height="150">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
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
                                        <a href="#" data-toggle="modal" data-target="#ingatkanModal">Ingatkan Saya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
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
                            <span class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">27 Maret, 2026</span>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">KKR 180&deg;</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">FREEDOM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

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
                        <div class="col-lg-6 col-md-6">
                            <div  class="single_performer wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                <div data-tilt class="thumb">
                                    <img src="img/performer/hendra.jpg" alt="">
                                </div>
                                <div class="performer_heading">
                                    <h4>PDT. Hendra Stefanus</h4>
                                    <span>Pelayan Firman</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div  class="single_performer wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                <div data-tilt class="thumb">
                                    <img src="img/performer/rian.png" alt="">
                                </div>
                                <div class="performer_heading">
                                    <h4>PDT. Fedrian Tjeleni</h4>
                                    <span>Worship Leader</span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6">
                            <div  class="single_performer wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                <div data-tilt class="thumb">
                                    <img src="img/performer/3.png" alt="">
                                </div>
                                <div class="performer_heading">
                                    <h4>Salmon Vicky</h4>
                                    <span>Acoustic drum</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div   class="single_performer wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                                <div data-tilt class="thumb">
                                    <img src="img/performer/4.png" alt="">
                                </div>
                                <div class="performer_heading">
                                    <h4>Filaris Habol</h4>
                                    <span>Acoustic drum</span>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- performar_area_end  -->

    <!-- about_area_start  -->
    <div id="about_area_start" class="about_area black_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_title text-center mb-80">
                        <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s" >Tentang KKR 180&deg;</h3>
                        <p class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s" >Kebaktian Kebangunan Rohani 180&deg; adalah momen untuk mengalami perubahan hidup bersama Tuhan. Melalui pujian, firman Tuhan, dan doa, setiap orang diajak untuk berbalik dari kehidupan lama dan melangkah dalam hidup yang baru bersama Tuhan. Saatnya berubah. Saatnya berbalik 180° kepada Tuhan. ✨🙏</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="about_thumb">
                        <div class="shap_3  wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                            <img src="img/shape/shape_3.svg" alt="">
                        </div>
                        <div class="thumb_inner  wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <img src="img/kkr.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="about_info pl-68">
                        <h4 class=" wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">Saatnya berubah. Saatnya berbalik 180° kepada Tuhan.</h4>
                        <p  class=" wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".6s">Mari alami perubahan hidup bersama Tuhan. Waktunya berbalik 180° dan memulai yang baru!</p>
                        <a href="#" class="boxed-btn3  wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".7s" data-toggle="modal" data-target="#ingatkanModal">Ingatkan Saya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end  -->

    <div class="program_details_area detials_bg_1 overlay2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80  wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                        <h3>Program Details</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="program_detail_wrap">
                        <div class="single_propram">
                            <div class="inner_wrap">
                                <div class="circle_img"></div>
                                <div class="porgram_top">
                                    <span class=" wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">18:30-19:30 WIT</span>
                                    <h4 class=" wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">27 Maret 2026</h4>
                                </div>
                                <div class="thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                    <img src="img/program_details/worship.png" alt="">
                                </div>
                                <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">Praise and Worship</h4>
                            </div>
                        </div>
                        <div class="single_propram">
                            <div class="inner_wrap">
                                <div class="circle_img"></div>
                                <div class="porgram_top">
                                    <span class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">19:30-20:30 WIT</span>
                                    <h4 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s">27 Maret 2026</h4>
                                </div>
                                <div class="thumb wow fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
                                    <img src="img/program_details/khotbah.png" alt="">
                                </div>
                                <h4 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Khotbah</h4>
                            </div>
                        </div>
                        <!-- <div class="single_propram">
                            <div class="inner_wrap">
                                <div class="circle_img"></div>
                                <div class="porgram_top">
                                    <span class=" wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">3.00-4.00pm</span>
                                    <h4 class=" wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">12 Feb 2020</h4>
                                </div>
                                <div class="thumb  wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                    <img src="img/program_details/3.png" alt="">
                                </div>
                                <h4 class=" wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">Mr. Zosoldos</h4>
                            </div>
                        </div>
                        <div class="single_propram">
                            <div class="inner_wrap">
                                <div class="circle_img"></div>
                                <div class="porgram_top">
                                    <span class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">3.00-4.00pm</span>
                                    <h4 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s">12 Feb 2020</h4>
                                </div>
                                <div class="thumb wow fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
                                    <img src="img/program_details/4.png" alt="">
                                </div>
                                <h4 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">Mr. Zosoldos</h4>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- map_area_start  -->
    <div id="contact_area_start" class="map_area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2286.8880530082747!2d128.19522359018464!3d-3.654800454752591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce83ff583b5bd%3A0x858f6d233ae4bb72!2sUniversitas%20Pattimura!5e0!3m2!1sid!2sid!4v1773647006120!5m2!1sid!2sid" width="600" height="450" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!-- <div class="location_information black_bg wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
            <h3>KKR 180&deg;</h3>
            <div class="info_wrap">
                <div class="single_info">
                    <span>Vanue:</span>
                    <p>Aula Lantai 2, Gedung Rektorat Universitas Pattimura</p>
                </div>
                <div class="single_info">
                    <span>Phone:</span>
                    <a href="https://wa.me/6281318812027" target="_blank"><p>081318812027</p></a>
                </div>
                <div class="single_info">
                    <span>Email:</span>
                    <p>alfreinsco@gmail.com</p>
                </div>
            </div>
        </div> -->
    </div>
    <!-- map_area_end  -->

    <!-- brand_area_start  -->
    <div class="brand_area black_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <h4 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">Sponsor Logos</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand_wrap">
                        <div class="brand_active owl-carousel">
                            <div class="single_brand text-center">
                                <img src="img/brand/logo-gmsambon.png" alt="">
                            </div>
                            <div class="single_brand text-center">
                                <img src="img/brand/logo-aog.jpg" alt="">
                            </div>
                            <div class="single_brand text-center">
                                <img src="img/brand/logo-unpatti.png" alt="">
                            </div>
                            <!-- <div class="single_brand text-center">
                                <img src="img/brand/4.png" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand_area_end  -->
    <!-- footer_start  -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="footer_widget">
                            <div class="address_details text-center">
                                <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">27 Maret 2026</h4>
                                <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">Aula Lantai 2 Universitas Pattimura</h3>
                                <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Jangan sampai ketinggalan!</p>
                                <a href="#" class="boxed-btn3 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" data-toggle="modal" data-target="#ingatkanModal">Ingatkan Saya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center wow fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Semua hak dilindungi undang-undang | Aplikasi ini dibuat dengan <i class="fa fa-heart-o" aria-hidden="true"></i> oleh <a href="https://alfreinsco.vercel.app" target="_blank">Alfreinsco</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->

    <!-- Modal Ingatkan Saya -->
    <div class="modal fade" id="ingatkanModal" tabindex="-1" role="dialog" aria-labelledby="ingatkanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ingatkanModalLabel">Ingatkan Saya — KKR 180°</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formIngatkanSaya">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaLengkap">Nama lengkap</label>
                            <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="noTelp">Nomor telepon / WhatsApp</label>
                            <input type="tel" class="form-control" id="noTelp" name="no_telp" placeholder="Contoh: 08123456789" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required></textarea>
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
                            <div id="cglWrap">
                                <label for="namaCGL">Siapa nama CGL (Connect Group Leader) Anda?</label>
                                <input type="text" class="form-control mt-2" id="namaCGL" name="nama_cgl" placeholder="Nama CGL">
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
                radios.forEach(function(r) { r.addEventListener('change', toggleCGL); });
                toggleCGL();
            }
            var form = document.getElementById('formIngatkanSaya');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    var submitBtn = form.querySelector('button[type="submit"]');
                    var originalText = submitBtn.textContent;
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Mengirim...';
                    var payload = {
                        nama_lengkap: document.getElementById('namaLengkap').value.trim(),
                        no_telp: document.getElementById('noTelp').value.trim(),
                        alamat: document.getElementById('alamat').value.trim(),
                        pernah_ikut: (document.querySelector('input[name="pernah_ikut"]:checked') || {}).value || 'belum',
                        nama_cgl: document.getElementById('namaCGL').value.trim() || null
                    };
                    if (payload.pernah_ikut !== 'sudah') payload.nama_cgl = null;
                    fetch('{{ url("/api/ingatkan-saya") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(function(r) { return r.json().then(function(d) { return { ok: r.ok, status: r.status, data: d }; }); })
                    .then(function(result) {
                        if (result.ok) {
                            alert(result.data.message || 'Terima kasih! Kami akan mengingatkan Anda untuk KKR 180°.');
                            $('#ingatkanModal').modal('hide');
                            form.reset();
                            if (cglWrap) cglWrap.classList.remove('show');
                        } else {
                            var msg = result.data.message || 'Terjadi kesalahan. Silakan coba lagi.';
                            if (result.data.errors) {
                                var errList = Object.values(result.data.errors).flat().join('\n');
                                if (errList) msg = msg + '\n\n' + errList;
                            }
                            alert(msg);
                        }
                    })
                    .catch(function() {
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
