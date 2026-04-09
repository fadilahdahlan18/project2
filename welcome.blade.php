<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STEVA - Studio Tari Eva Tannia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --burgundy:       #800020;
            --burgundy-dark:  #5c0016;
            --burgundy-light: #a0002a;
            --gold:           #c9a84c;
            --gold-light:     #f0d080;
            --white:          #ffffff;
            --gray-100:       #f1f3f5;
            --gray-800:       #343a40;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gray-100);
            color: var(--gray-800);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background-color: var(--white);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .navbar-logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
            color: var(--burgundy-dark);
        }

        .navbar-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--burgundy-dark);
            letter-spacing: 1px;
        }

        .navbar-nav {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: var(--gray-800);
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s;
        }

        .nav-link:hover { color: var(--burgundy); }

        .btn-nav-login {
            background-color: var(--burgundy);
            color: var(--white);
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: background 0.3s;
        }

        .btn-nav-login:hover { background-color: var(--burgundy-dark); }

        .btn-nav-register {
            background-color: var(--white);
            border: 2px solid var(--burgundy);
            color: var(--burgundy);
            padding: 6px 18px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-nav-register:hover {
            background-color: var(--burgundy-light);
            color: var(--white);
            border-color: var(--burgundy-light);
        }

        /* Hero Section */
        .hero {
            margin-top: 70px; /* Offset for fixed navbar */
            min-height: 80vh;
            background: linear-gradient(135deg, rgba(92,0,22,0.9) 0%, rgba(128,0,32,0.9) 100%), url('https://images.unsplash.com/photo-1547153760-18fc86324498?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
            position: relative;
        }

        .hero-content {
            max-width: 800px;
            position: relative;
            z-index: 10;
        }

        .hero h1 {
            color: var(--white);
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-shadow: 0 4px 10px rgba(0,0,0,0.5);
        }

        .hero h1 span { color: var(--gold-light); }

        .hero p {
            color: rgba(255,255,255,0.9);
            font-size: 18px;
            margin-bottom: 40px;
            line-height: 1.8;
            font-weight: 300;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn-mega {
            padding: 15px 40px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary-mega {
            background-color: var(--gold);
            color: var(--burgundy-dark);
            box-shadow: 0 4px 15px rgba(201,168,76,0.5);
        }

        .btn-primary-mega:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(201,168,76,0.6);
            background-color: var(--gold-light);
        }

        .btn-secondary-mega {
            background-color: rgba(255,255,255,0.1);
            color: var(--white);
            border: 2px solid var(--white);
            backdrop-filter: blur(5px);
        }

        .btn-secondary-mega:hover {
            background-color: var(--white);
            color: var(--burgundy-dark);
            transform: translateY(-3px);
        }

        /* About Section */
        .section-about {
            padding: 80px 20px;
            background-color: var(--white);
            text-align: center;
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--burgundy-dark);
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            width: 60px;
            height: 4px;
            background-color: var(--gold);
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .about-text {
            max-width: 700px;
            margin: 40px auto 0;
            font-size: 16px;
            color: var(--gray-800);
            line-height: 1.8;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 50px auto 0;
        }

        .feature-card {
            background-color: var(--gray-100);
            padding: 30px 20px;
            border-radius: 12px;
            transition: transform 0.3s;
        }

        .feature-card:hover { transform: translateY(-5px); }

        .feature-icon {
            font-size: 36px;
            color: var(--burgundy);
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--burgundy-dark);
        }

        .feature-card p {
            font-size: 14px;
            color: var(--gray-800);
        }

        /* Contact Section */
        .section-contact {
            padding: 80px 20px;
            background-color: var(--burgundy-pale);
            text-align: center;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 40px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background-color: var(--white);
            color: var(--burgundy);
            border-radius: 50%;
            text-decoration: none;
            font-size: 28px;
            box-shadow: 0 4px 15px rgba(128,0,32,0.1);
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background-color: var(--burgundy);
            color: var(--white);
            transform: scale(1.1);
        }

        .social-link.whatsapp:hover { background-color: #25D366; color: white; border-color: #25D366; }
        .social-link.instagram:hover { background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%); color: white; border-color: transparent;}
        .social-link.tiktok:hover { background-color: #000; color: white; border-color: #000; }

        .contact-info {
            margin-top: 30px;
            font-size: 16px;
            color: var(--burgundy-dark);
            font-weight: 500;
        }

        /* Footer */
        .footer {
            background-color: var(--burgundy-dark);
            color: rgba(255,255,255,0.7);
            padding: 24px;
            text-align: center;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 32px; }
            .hero-buttons { flex-direction: column; }
            .navbar-nav .nav-link:not(.btn-nav-login, .btn-nav-register) { display: none; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="navbar-brand">
            <div class="navbar-logo">S</div>
            <span class="navbar-title">STEVA</span>
        </a>
        <div class="navbar-nav">
            <a href="#tentang" class="nav-link">Tentang</a>
            <a href="#kontak" class="nav-link">Kontak</a>
            @auth
                <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="btn-nav-login">Ke Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-nav-login">Masuk</a>
                <a href="{{ route('register') }}" class="btn-nav-register">Daftar</a>
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Studio Tari <span>Eva Tannia</span></h1>
            <p>Sistem Informasi Administrasi & Manajemen Pembelajaran terpadu. Bergabunglah bersama kami untuk mengembangkan bakat dan potensi senimu dalam menari dengan fasilitas dan pengajar profesional.</p>
            <div class="hero-buttons">
                @auth
                    <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="btn-mega btn-primary-mega">
                        <i class="fa-solid fa-gauge-high"></i> Buka Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn-mega btn-primary-mega">
                        <i class="fa-solid fa-right-to-bracket"></i> Masuk Akun
                    </a>
                    <a href="{{ route('register') }}" class="btn-mega btn-secondary-mega">
                        <i class="fa-solid fa-user-plus"></i> Daftar Murid / Pelatih
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="section-about">
        <h2 class="section-title">Tentang STEVA</h2>
        <p class="about-text">
            Studio Tari Eva Tannia (STEVA) adalah pusat pelatihan seni tari yang didedikasikan untuk melestarikan dan mengembangkan bakat menari. Kami memiliki pelatih profesional dan jadwal pelatihan yang disusun khusus untuk membantu setiap murid mencapai potensi maksimal mereka. Melalui platform digital ini, kami mempermudah akses materi, administrasi, dan pemantauan perkembangan setiap anggota.
        </p>

        <div class="features-grid">
            <div class="feature-card">
                <i class="fa-solid fa-calendar-check feature-icon"></i>
                <h3>Jadwal Terjadwal</h3>
                <p>Akses jadwal latihan dengan mudah dan terstruktur untuk semua kelas tari.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-video feature-icon"></i>
                <h3>Materi Interaktif</h3>
                <p>Unduh dokumen PDF atau tonton video koreografi langsung dari pelatih secara online.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-money-check-dollar feature-icon"></i>
                <h3>Kemudahan Administrasi</h3>
                <p>Sistem pembayaran iuran dan riwayat transaksi yang transparan dan mudah digunakan.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="section-contact">
        <h2 class="section-title">Hubungi Kami</h2>
        <p class="about-text" style="margin-top: 20px;">
            Terhubunglah dengan kami di media sosial atau hubungi kami secara langsung untuk informasi pendaftaran dan kelas.
        </p>

        <div class="social-links">
            <a href="https://instagram.com/studiotarievatania" target="_blank" class="social-link instagram" title="Instagram">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://tiktok.com/@studiotarievatannia" target="_blank" class="social-link tiktok" title="TikTok">
                <i class="fa-brands fa-tiktok"></i>
            </a>
            <a href="https://wa.me/6281903420870" target="_blank" class="social-link whatsapp" title="WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
        </div>

        <div class="contact-info">
            <p><i class="fa-solid fa-location-dot"></i> Pendopo Subagio, Soklat, SUBANG, JAWA BARAT</p>
            <p style="margin-top: 10px;"><i class="fa-solid fa-phone"></i> 0819-0342-0870</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Sistem Informasi Administrasi & Manajemen Pembelajaran. Studio Tari Eva Tannia.</p>
    </footer>

</body>
</html>
