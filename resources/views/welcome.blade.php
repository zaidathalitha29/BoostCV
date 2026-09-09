<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BoostCV — Jasa Pembuatan CV Profesional</title>
    <meta name="description" content="BoostCV mempertemukan kamu dengan creator berpengalaman untuk membuat CV yang benar-benar mewakili perjalanan kariermu.">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        :root {
            --ink: #1C2434;
            --ink-soft: #4B5468;
            --paper: #FBFAF7;
            --paper-raised: #FFFFFF;
            --line: #E4E1D8;
            --navy: #223A66;
            --navy-deep: #16264A;
            --gold: #C98A2C;
            --gold-soft: #F3E2C2;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--paper);
            color: var(--ink);
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, .display {
            font-family: 'Fraunces', serif;
            color: var(--ink);
            letter-spacing: -0.01em;
        }

        a { color: var(--navy); }
        a:hover { color: var(--navy-deep); }

        .container-narrow {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ---------- NAVBAR ---------- */
        .navbar {
            background: var(--paper) !important;
            border-bottom: 1px solid var(--line);
            padding: 18px 0;
        }

        .navbar-brand {
            font-family: 'Fraunces', serif;
            font-size: 23px;
            font-weight: 600;
            color: var(--ink) !important;
        }

        .navbar-brand span { color: var(--navy); }

        .navbar-nav .nav-link {
            color: var(--ink-soft) !important;
            font-weight: 500;
            font-size: 15px;
            padding: 8px 16px !important;
        }

        .navbar-nav .nav-link:hover { color: var(--ink) !important; }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 22px;
        }

        .btn-primary {
            background: var(--navy);
            border-color: var(--navy);
        }

        .btn-primary:hover {
            background: var(--navy-deep);
            border-color: var(--navy-deep);
        }

        .btn-outline-primary {
            color: var(--navy);
            border-color: var(--navy);
        }

        .btn-outline-primary:hover {
            background: var(--navy);
            border-color: var(--navy);
        }

        .btn-light {
            background: var(--paper-raised);
            color: var(--navy-deep);
        }

        .btn-light:hover {
            background: var(--gold-soft);
            color: var(--navy-deep);
        }

        /* ---------- HERO ---------- */
        .hero {
            padding: 100px 0 90px;
            background: var(--paper);
            border-bottom: 1px solid var(--line);
        }

        .hero h1 {
            font-size: 50px;
            font-weight: 600;
            line-height: 1.15;
            max-width: 560px;
        }

        .hero h1 em {
            font-style: italic;
            color: var(--navy);
        }

        .hero p.lede {
            font-size: 18px;
            color: var(--ink-soft);
            margin-top: 24px;
            margin-bottom: 34px;
            max-width: 460px;
            line-height: 1.6;
        }

        .hero-actions .btn { margin-right: 12px; }

        /* CV mockup: the hero visual is a literal CV, not a generic icon */
        .cv-mock {
            background: var(--paper-raised);
            border: 1px solid var(--line);
            border-radius: 6px;
            box-shadow: 0 24px 48px -20px rgba(22, 38, 74, 0.22);
            padding: 32px 30px;
            max-width: 360px;
            margin-left: auto;
            transform: rotate(1.2deg);
            position: relative;
        }

        .cv-mock::before {
            content: "";
            position: absolute;
            inset: 14px;
            border: 1px solid var(--line);
            border-radius: 3px;
            pointer-events: none;
        }

        .cv-mock-head {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
        }

        .cv-mock-avatar {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--navy), var(--navy-deep));
            flex-shrink: 0;
        }

        .cv-mock-name { height: 12px; width: 62%; background: var(--ink); opacity: 0.85; border-radius: 2px; margin-bottom: 8px; }
        .cv-mock-role { height: 8px; width: 42%; background: var(--gold); border-radius: 2px; }

        .cv-mock-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.04em;
            color: var(--navy);
            margin: 18px 0 10px;
        }

        .cv-mock-line { height: 7px; background: var(--line); border-radius: 2px; margin-bottom: 8px; }
        .cv-mock-line.w-90 { width: 90%; }
        .cv-mock-line.w-70 { width: 70%; }
        .cv-mock-line.w-55 { width: 55%; }

        .cv-mock-tags { display: flex; gap: 6px; margin-top: 6px; flex-wrap: wrap; }
        .cv-mock-tag {
            font-size: 9px;
            padding: 4px 9px;
            border-radius: 20px;
            background: var(--gold-soft);
            color: #7A5714;
            font-weight: 600;
        }

        .cv-mock-badge {
            position: absolute;
            top: -16px;
            left: -18px;
            background: var(--navy-deep);
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: 30px;
            box-shadow: 0 8px 20px -6px rgba(22, 38, 74, 0.5);
        }

        /* ---------- SECTIONS ---------- */
        .section { padding: 88px 0; }

        .section-title {
            max-width: 560px;
            margin-bottom: 48px;
        }

        .section-title h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .section-title p {
            color: var(--ink-soft);
            font-size: 16px;
            line-height: 1.6;
        }

        .bg-alt { background: var(--paper-raised); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line); }

        /* ---------- FEATURE / SERVICE CARDS ---------- */
        .feature-card {
            background: var(--paper-raised);
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 30px 28px;
            height: 100%;
        }

        .feature-icon {
            width: 44px;
            height: 44px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            background: var(--gold-soft);
            margin-bottom: 18px;
        }

        .feature-card h5 {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            font-size: 19px;
            margin-bottom: 10px;
        }

        .feature-card p {
            color: var(--ink-soft);
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* ---------- CARA KERJA ---------- */
        .timeline {
            display: flex;
            position: relative;
            padding-top: 6px;
        }

        .timeline::before {
            content: "";
            position: absolute;
            top: 6px;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--line);
        }

        .timeline-step {
            flex: 1;
            position: relative;
            padding: 30px 26px 0 0;
        }

        .timeline-step:last-child { padding-right: 0; }

        .timeline-node {
            position: absolute;
            top: 0;
            left: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--paper);
            border: 2px solid var(--gold);
            z-index: 2;
        }

        .timeline-step h5 {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .timeline-step p {
            color: var(--ink-soft);
            font-size: 14.5px;
            line-height: 1.6;
            margin-bottom: 0;
        }

        @media (max-width: 767px) {
            .timeline {
                flex-direction: column;
                gap: 30px;
                padding-top: 0;
            }
            .timeline::before {
                top: 0;
                bottom: 0;
                left: 5px;
                right: auto;
                width: 1px;
                height: auto;
            }
            .timeline-step {
                padding: 0 0 0 28px;
            }
            .timeline-node { top: 3px; left: 0; }
        }

        /* ---------- CTA ---------- */
        .cta {
            padding: 90px 0;
            background: var(--navy-deep);
            color: #fff;
            text-align: left;
        }

        .cta h2 {
            color: #fff;
            font-size: 34px;
            font-weight: 600;
            margin-bottom: 14px;
            max-width: 500px;
        }

        .cta p {
            font-size: 17px;
            margin-bottom: 30px;
            color: #C9D3E6;
            max-width: 460px;
        }

        /* ---------- FOOTER ---------- */
        footer {
            background: var(--navy-deep);
            color: #A9B6D1;
        }

        .footer-main {
            padding: 64px 0 48px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr 1.2fr;
            gap: 40px;
        }

        .footer-brand {
            font-family: 'Fraunces', serif;
            font-size: 22px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 14px;
            display: inline-block;
        }

        .footer-brand span { color: var(--gold); }

        .footer-col p {
            font-size: 14.5px;
            line-height: 1.7;
            color: #93A1C2;
            max-width: 280px;
            margin-bottom: 20px;
        }

        .footer-col h6 {
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 16px;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-col ul li { margin-bottom: 11px; }

        .footer-col ul a {
            color: #A9B6D1;
            font-size: 14.5px;
            text-decoration: none;
        }

        .footer-col ul a:hover { color: #fff; }

        .footer-col .contact-item {
            font-size: 14.5px;
            color: #A9B6D1;
            margin-bottom: 11px;
        }

        .footer-social {
            display: flex;
            gap: 10px;
            margin-top: 22px;
        }

        .footer-social a {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #fff;
            text-decoration: none;
        }

        .footer-social a:hover {
            background: var(--gold);
            border-color: var(--gold);
        }

        .footer-bottom {
            padding: 20px 0;
            border-top: 1px solid rgba(255,255,255,0.08);
            font-size: 13px;
            color: #7787A8;
            display: flex;
            flex-wrap: wrap;
            gap: 14px 24px;
            align-items: center;
            justify-content: space-between;
        }

        .footer-bottom .legal-links a {
            color: #7787A8;
            text-decoration: none;
            margin-left: 20px;
        }

        .footer-bottom .legal-links a:first-child { margin-left: 0; }
        .footer-bottom .legal-links a:hover { color: #fff; }

        @media (max-width: 767px) {
            .hero { padding: 64px 0 56px; text-align: left; }
            .hero h1 { font-size: 36px; max-width: 100%; }
            .cv-mock { margin: 44px auto 0; transform: none; }
            .section { padding: 60px 0; }
            .cta { text-align: left; }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 32px; }
            .footer-bottom { flex-direction: column; align-items: flex-start; }
            .footer-bottom .legal-links a:first-child { margin-left: 0; }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-narrow d-flex align-items-center justify-content-between w-100">
            <a class="navbar-brand" href="{{ url('/') }}">
                Boost<span>CV</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mr-auto ml-md-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cara-kerja">Cara Kerja</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Masuk
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-primary ml-md-2" href="{{ route('register') }}">
                                    Daftar
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    {{-- HERO --}}
    <section class="hero" id="home">
        <div class="container-narrow">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h1>
                        CV yang bercerita, <em>bukan sekadar daftar</em> riwayat kerja.
                    </h1>
                    <p class="lede">
                        BoostCV mempertemukan kamu dengan creator berpengalaman
                        yang tahu cara menyusun CV supaya pengalamanmu benar-benar
                        terlihat oleh recruiter.
                    </p>
                    <div class="hero-actions">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                            Mulai Sekarang
                        </a>
                        <a href="#layanan" class="btn btn-outline-primary btn-lg">
                            Lihat Layanan
                        </a>
                    </div>
                </div>
                <div class="col-md-5 mt-5 mt-md-0">
                    <div class="cv-mock">
                        <div class="cv-mock-badge">Siap dikirim ✓</div>
                        <div class="cv-mock-head">
                            <div class="cv-mock-avatar"></div>
                            <div>
                                <div class="cv-mock-name"></div>
                                <div class="cv-mock-role"></div>
                            </div>
                        </div>
                        <div class="cv-mock-label">PENGALAMAN</div>
                        <div class="cv-mock-line w-90"></div>
                        <div class="cv-mock-line w-70"></div>
                        <div class="cv-mock-line w-55"></div>
                        <div class="cv-mock-label">KEAHLIAN</div>
                        <div class="cv-mock-tags">
                            <span class="cv-mock-tag">Komunikasi</span>
                            <span class="cv-mock-tag">Excel</span>
                            <span class="cv-mock-tag">Figma</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- KEUNGGULAN --}}
    <section class="section" id="tentang">
        <div class="container-narrow">
            <div class="section-title">
                <h2>Kenapa orang memilih BoostCV</h2>
                <p>
                    Bukan template generik — kamu bekerja langsung dengan
                    orang yang paham cara membuat CV benar-benar dibaca.
                </p>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">🎯</div>
                        <h5>Sesuai kebutuhanmu</h5>
                        <p>
                            CV disusun dari cerita dan datamu sendiri, bukan
                            ditempel dari template yang sama untuk semua orang.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">👩‍💻</div>
                        <h5>Pilih creator sendiri</h5>
                        <p>
                            Bandingkan gaya dan spesialisasi tiap creator, lalu
                            pilih yang paling cocok dengan bidangmu.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">⚡</div>
                        <h5>Prosesnya ringkas</h5>
                        <p>
                            Dari pemesanan sampai CV jadi, semuanya berjalan
                            dalam satu platform tanpa bolak-balik chat terpisah.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">💰</div>
                        <h5>Harga jelas di depan</h5>
                        <p>
                            Setiap layanan mencantumkan harganya, jadi kamu
                            tahu persis apa yang dibayar sebelum memesan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- LAYANAN --}}
    <section class="section bg-alt" id="layanan">
        <div class="container-narrow">
            <div class="section-title">
                <h2>Layanan BoostCV</h2>
                <p>
                    Setiap tahap karier butuh pendekatan CV yang berbeda —
                    pilih yang paling sesuai dengan posisimu sekarang.
                </p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">📄</div>
                        <h5>CV Profesional</h5>
                        <p>
                            Untuk kamu yang melamar posisi spesifik dan ingin
                            CV yang selaras dengan target pekerjaan tersebut.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">🎓</div>
                        <h5>CV Fresh Graduate</h5>
                        <p>
                            Menonjolkan organisasi, magang, dan proyek kuliah
                            supaya tetap kuat meski pengalaman kerja masih sedikit.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">💼</div>
                        <h5>CV Profesional Berpengalaman</h5>
                        <p>
                            Merangkum karier panjang jadi ringkas dan tetap
                            menonjolkan pencapaian yang paling relevan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- CARA KERJA --}}
    <section class="section" id="cara-kerja">
        <div class="container-narrow">
            <div class="section-title">
                <h2>Cara kerja BoostCV</h2>
                <p>
                    Empat langkah singkat dari mencari layanan sampai CV
                    siap dikirim ke recruiter.
                </p>
            </div>
            <div class="timeline">
                <div class="timeline-step">
                    <div class="timeline-node"></div>
                    <h5>Pilih layanan</h5>
                    <p>Tentukan jenis CV yang paling sesuai dengan tahap kariermu saat ini.</p>
                </div>
                <div class="timeline-step">
                    <div class="timeline-node"></div>
                    <h5>Pilih creator</h5>
                    <p>Lihat portofolio dan spesialisasi tiap creator, lalu pilih yang paling cocok.</p>
                </div>
                <div class="timeline-step">
                    <div class="timeline-node"></div>
                    <h5>Kirim kebutuhanmu</h5>
                    <p>Ceritakan pengalaman dan tujuan kariermu supaya creator bisa menyusun CV yang tepat.</p>
                </div>
                <div class="timeline-step">
                    <div class="timeline-node"></div>
                    <h5>CV kamu selesai</h5>
                    <p>Creator memproses pesanan dan mengirimkan CV yang siap kamu pakai melamar kerja.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-main">
            <div class="container-narrow">
                <div class="footer-grid">
                    <div class="footer-col">
                        <a href="{{ url('/') }}" class="footer-brand">Boost<span>CV</span></a>
                        <p>
                            Platform yang mempertemukan pencari kerja dengan
                            creator berpengalaman untuk membuat CV yang
                            benar-benar mewakili perjalanan kariermu.
                        </p>
                        <div class="footer-social">
                            <a href="#" aria-label="Instagram">IG</a>
                            <a href="#" aria-label="TikTok">TT</a>
                            <a href="#" aria-label="LinkedIn">in</a>
                        </div>
                    </div>
                    <div class="footer-col">
                        <h6>Navigasi</h6>
                        <ul>
                            <li><a href="#home">Beranda</a></li>
                            <li><a href="#layanan">Layanan</a></li>
                            <li><a href="#tentang">Tentang Kami</a></li>
                            <li><a href="#cara-kerja">Cara Kerja</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h6>Layanan</h6>
                        <ul>
                            <li><a href="#layanan">CV Profesional</a></li>
                            <li><a href="#layanan">CV Fresh Graduate</a></li>
                            <li><a href="#layanan">CV Berpengalaman</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h6>Hubungi Kami</h6>
                        <div class="contact-item">halo@boostcv.id</div>
                        <div class="contact-item">+62 812-3456-7890</div>
                        <div class="contact-item">Jakarta, Indonesia</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-narrow">
            <div class="footer-bottom">
                <span>&copy; {{ date('Y') }} BoostCV. All rights reserved.</span>
                <span class="legal-links">
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Syarat & Ketentuan</a>
                </span>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>