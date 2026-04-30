<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STEVA - Studio Tari Eva Tannia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
            border: none;
            cursor: pointer;
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
            margin-top: 70px;
            min-height: 85vh;
            background: linear-gradient(135deg, rgba(92,0,22,0.9) 0%, rgba(128,0,32,0.9) 100%), url('image_f1f957.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
            position: relative;
        }

        .hero h1 {
            color: var(--white);
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 20px;
            text-transform: uppercase;
            text-shadow: 0 4px 10px rgba(0,0,0,0.5);
        }

        .hero h1 span { color: var(--gold-light); }

        .hero p {
            color: rgba(255,255,255,0.9);
            font-size: 18px;
            margin-bottom: 40px;
            max-width: 800px;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn-mega {
            padding: 15px 35px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary-mega {
            background-color: var(--gold);
            color: var(--burgundy-dark);
            box-shadow: 0 4px 15px rgba(201,168,76,0.5);
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
        }

        /* Sections */
        .section-about, .section-contact {
            padding: 80px 20px;
            background-color: var(--white);
            text-align: center;
        }

        .section-title {
            font-size: 32px;
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
        }

        .about-text {
            max-width: 750px;
            margin: 40px auto;
            color: var(--gray-800);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1100px;
            margin: 50px auto 0;
        }

        .feature-card {
            background-color: var(--gray-100);
            padding: 40px 25px;
            border-radius: 15px;
            transition: all 0.3s;
            border: 1px solid transparent;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: var(--gold);
            background-color: var(--white);
            box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        }

        .feature-icon {
            font-size: 40px;
            color: var(--burgundy);
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 40px;
        }

        .social-link {
            width: 60px;
            height: 60px;
            background-color: var(--gray-100);
            color: var(--burgundy);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-link:hover { transform: scale(1.1); color: var(--white); }
        .social-link.instagram:hover { background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 45%, #d6249f 60%, #285AEB 90%); }
        .social-link.whatsapp:hover { background-color: #25D366; }
        .social-link.tiktok:hover { background-color: #000; }

        .footer {
            background-color: var(--burgundy-dark);
            color: rgba(255,255,255,0.7);
            padding: 40px 30px 20px;
            text-align: center;
            font-size: 14px;
        }

        /* Link Pelatih yang disamarkan */
        .pelatih-access {
            margin-top: 25px;
            font-size: 13px;
            opacity: 0.6;
        }
        .pelatih-access a {
            color: var(--gold-light);
            text-decoration: none;
            font-weight: 500;
        }
        .pelatih-access a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 32px; }
            .navbar-nav .nav-link:not(.btn-nav-login, .btn-nav-register) { display: none; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="/" class="navbar-brand">
            <div class="navbar-logo">S</div>
            <span class="navbar-title">STEVA</span>
        </a>
        <div class="navbar-nav">
            <a href="#tentang" class="nav-link">Tentang</a>
            <a href="#kontak" class="nav-link">Kontak</a>

            @auth
                <span class="nav-link" style="color: var(--burgundy); font-weight: 700;">Halo, {{ explode(' ', auth()->user()->name)[0] }}!</span>
                <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="btn-nav-register" style="border-color: var(--gold); color: var(--gold);">Dashboard</a>
                <a href="{{ route('logout') }}" class="btn-nav-login"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Keluar
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            @else
                <a href="{{ route('login') }}" class="btn-nav-login">Masuk</a>
                <div style="position: relative; display: inline-block;">
                    <a href="#" class="btn-nav-register" id="regBtn">Daftar</a>
                    <div id="regDropdown" style="display: none; position: absolute; background: white; min-width: 150px; box-shadow: 0 8px 16px rgba(0,0,0,0.1); border-radius: 8px; top: 120%; right: 0; z-index: 1001; overflow: hidden;">
                        <a href="{{ route('register.murid') }}" style="display: block; padding: 12px 16px; text-decoration: none; color: #333; font-size: 13px; border-bottom: 1px solid #eee;">Daftar Murid</a>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Studio Tari <span>Eva Tannia</span></h1>
            <p>Sistem Informasi Administrasi & Manajemen Pembelajaran terpadu. Bergabunglah untuk melestarikan budaya dan kembangkan bakat menarimu bersama pengajar profesional.</p>
            <div class="hero-buttons">
                @auth
                    <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="btn-mega btn-primary-mega">
                        <i class="fa-solid fa-gauge-high"></i> Buka Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn-mega btn-primary-mega">
                        <i class="fa-solid fa-right-to-bracket"></i> Masuk Sekarang
                    </a>
                    <a href="{{ route('register.murid') }}" class="btn-mega btn-secondary-mega">
                        <i class="fa-solid fa-user-graduate"></i> Jadi Murid
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <section id="tentang" class="section-about">
        <h2 class="section-title">Tentang STEVA</h2>
        <p class="about-text">
            Studio Tari Eva Tannia (STEVA) adalah wadah kreatif untuk melestarikan seni tari. Kami memadukan metode pelatihan tradisional dengan manajemen modern berbasis digital untuk pengalaman belajar yang lebih baik.
        </p>

        <div class="features-grid">
            <div class="feature-card" style="cursor: pointer;" onclick="window.location='{{ auth()->check() ? route(auth()->user()->role . '.jadwal') : route('login') }}'">
                <i class="fa-solid fa-calendar-alt feature-icon"></i>
                <h3>Jadwal Latihan</h3>
                <p>Pantau jadwal latihan rutin dan kelas intensif dalam satu tampilan terpadu.</p>
            </div>
            <div class="feature-card" style="cursor: pointer;" onclick="window.location='{{ auth()->check() ? route(auth()->user()->role . '.materi') : route('login') }}'">
                <i class="fa-solid fa-play-circle feature-icon"></i>
                <h3>Materi Digital</h3>
                <p>Akses video koreografi dan modul PDF kapan saja untuk latihan mandiri.</p>
            </div>
            <div class="feature-card" style="cursor: pointer;" onclick="window.location='{{ auth()->check() ? (auth()->user()->role == 'pelatih' ? route('pelatih.dashboard') : route(auth()->user()->role . '.pembayaran')) : route('login') }}'">
                <i class="fa-solid fa-wallet feature-icon"></i>
                <h3>Pembayaran</h3>
                <p>Sistem iuran transparan dengan riwayat transaksi yang tersimpan otomatis.</p>
            </div>
        </div>
    </section>

    <section id="kontak" class="section-contact">
        <h2 class="section-title">Hubungi Kami</h2>
        <div class="social-links">
            <a href="https://instagram.com/studiotarievatania" target="_blank" class="social-link instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://tiktok.com/@studiotarievatannia" target="_blank" class="social-link tiktok"><i class="fa-brands fa-tiktok"></i></a>
            <a href="https://wa.me/6281903420870" target="_blank" class="social-link whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
        <div class="contact-info" style="margin-top: 30px;">
            <p><i class="fa-solid fa-location-dot"></i> Pendopo Subagio, Soklat, Subang, Jawa Barat</p>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Studio Tari Eva Tannia (STEVA). All Rights Reserved.</p>

        <!-- Akses pelatih diletakkan di bawah sini secara samar -->
        @guest
        <div class="pelatih-access">
            Khusus Staf Pengajar: <a href="{{ route('register.pelatih') }}">Registrasi Pelatih</a>
        </div>
        @endguest
    </footer>

    <script>
        // Dropdown Logic
        const regBtn = document.getElementById('regBtn');
        const regDropdown = document.getElementById('regDropdown');
        if(regBtn) {
            regBtn.addEventListener('click', function(e) {
                e.preventDefault();
                regDropdown.style.display = regDropdown.style.display === 'none' ? 'block' : 'none';
            });
            window.addEventListener('click', function(e) {
                if (!regBtn.contains(e.target)) regDropdown.style.display = 'none';
            });
        }
    </script>
</body>
</html>
