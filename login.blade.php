<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – STEVA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *{box-sizing:border-box;margin:0;padding:0;}
        body{font-family:'Inter',sans-serif;min-height:100vh;display:flex;background:#0a0010;}

        .auth-left{
            flex:1;
            background: linear-gradient(135deg, #5c0016 0%, #800020 50%, #a0002a 100%);
            display:flex; flex-direction:column; align-items:center; justify-content:center;
            padding:48px; position:relative; overflow:hidden;
        }
        .auth-left::before{
            content:''; position:absolute; width:400px; height:400px;
            background:rgba(255,255,255,0.04); border-radius:50%;
            top:-100px; left:-100px;
        }
        .auth-left::after{
            content:''; position:absolute; width:300px; height:300px;
            background:rgba(255,255,255,0.03); border-radius:50%;
            bottom:-80px; right:-80px;
        }

        .auth-logo{
            width:80px;height:80px;
            background:linear-gradient(135deg,#c9a84c,#f0d080);
            border-radius:50%; display:flex; align-items:center; justify-content:center;
            font-size:32px; font-weight:700; color:#5c0016;
            box-shadow:0 8px 30px rgba(201,168,76,0.5);
            margin-bottom:24px; position:relative; z-index:1;
        }

        .auth-left h1{
            color:#fff; font-size:42px; font-weight:800;
            letter-spacing:4px; position:relative; z-index:1;
        }

        .auth-left p{
            color:rgba(255,255,255,0.7); font-size:14px; letter-spacing:2px;
            text-transform:uppercase; margin-top:8px; position:relative; z-index:1;
        }

        .auth-left .tagline{
            margin-top:32px; color:rgba(255,255,255,0.6);
            font-size:13px; text-align:center; line-height:1.8;
            max-width:320px; position:relative; z-index:1;
        }

        .auth-left .features{
            margin-top:40px; display:flex; flex-direction:column; gap:14px;
            position:relative; z-index:1;
        }
        .auth-left .feature-item{
            display:flex; align-items:center; gap:12px;
            color:rgba(255,255,255,0.75); font-size:13px;
        }
        .auth-left .feature-item i{
            width:32px;height:32px;background:rgba(255,255,255,0.12);
            border-radius:8px; display:flex; align-items:center; justify-content:center;
            font-size:13px; color:#f0d080;
        }

        .auth-right{
            width:480px; background:#fff;
            display:flex; align-items:center; justify-content:center;
            padding:48px;
        }

        .auth-form-wrap{width:100%;}

        .auth-form-wrap h2{
            font-size:22px; font-weight:700; color:#1a1a2e;
            margin-bottom:6px;
        }
        .auth-form-wrap .subtitle{
            font-size:13px; color:#6c757d; margin-bottom:32px;
        }

        .form-group{margin-bottom:18px;}
        .form-label{display:block;font-size:13px;font-weight:500;color:#495057;margin-bottom:6px;}

        .input-wrap{position:relative;}
        .input-wrap .icon{
            position:absolute; left:13px; top:50%; transform:translateY(-50%);
            color:#adb5bd; font-size:13px;
        }
        .form-control{
            width:100%; padding:11px 13px 11px 38px;
            border:1.5px solid #dee2e6; border-radius:8px;
            font-size:13.5px; font-family:'Inter',sans-serif;
            color:#343a40; transition:border-color .2s, box-shadow .2s;
        }
        .form-control:focus{outline:none;border-color:#800020;box-shadow:0 0 0 3px rgba(128,0,32,0.1);}
        .form-control.is-invalid{border-color:#dc3545;}
        .invalid-feedback{color:#dc3545;font-size:12px;margin-top:4px;}

        .remember-row{
            display:flex; align-items:center; justify-content:space-between;
            margin-bottom:22px; font-size:13px;
        }
        .remember-row label{display:flex;align-items:center;gap:6px;cursor:pointer;color:#495057;}

        .btn-login{
            width:100%; padding:13px;
            background:linear-gradient(135deg,#800020,#a0002a);
            color:#fff; border:none; border-radius:8px;
            font-size:15px; font-weight:600; cursor:pointer;
            transition:all .2s; letter-spacing:0.5px;
        }
        .btn-login:hover{background:linear-gradient(135deg,#5c0016,#800020);box-shadow:0 6px 20px rgba(128,0,32,0.4);}

        .divider{
            text-align:center; margin:20px 0; position:relative;
            color:#adb5bd; font-size:12px;
        }
        .divider::before,.divider::after{
            content:''; position:absolute; top:50%; width:40%; height:1px;
            background:#dee2e6;
        }
        .divider::before{left:0;} .divider::after{right:0;}

        .register-link{
            text-align:center; font-size:13px; color:#6c757d; margin-top:16px;
        }
        .register-link a{color:#800020;font-weight:600;text-decoration:none;}
        .register-link a:hover{text-decoration:underline;}

        .alert-danger{
            background:#fdf0f0;border:1px solid #f5c6cb;color:#721c24;
            padding:10px 14px; border-radius:8px; font-size:13px; margin-bottom:16px;
            display:flex;align-items:center;gap:8px;
        }

        @media(max-width:768px){
            .auth-left{display:none;}
            .auth-right{width:100%;}
        }
    </style>
</head>
<body>
<div class="auth-left">
    <div class="auth-logo">S</div>
    <h1>STEVA</h1>
    <p>Studio Tari Eva Tannia</p>
    <div class="tagline">
        Sistem Informasi Administrasi &amp; Manajemen Pembelajaran untuk pengelolaan studio tari profesional.
    </div>
    <div class="features">
        <div class="feature-item">
            <div style="display:flex;align-items:center;justify-content:center;width:32px;height:32px;background:rgba(255,255,255,0.12);border-radius:8px;">
                <i class="fa-solid fa-calendar-days" style="color:#f0d080;font-size:13px;"></i>
            </div>
            Manajemen Jadwal Latihan
        </div>
        <div class="feature-item">
            <div style="display:flex;align-items:center;justify-content:center;width:32px;height:32px;background:rgba(255,255,255,0.12);border-radius:8px;">
                <i class="fa-solid fa-book-open" style="color:#f0d080;font-size:13px;"></i>
            </div>
            Materi & Video Koreografi
        </div>
        <div class="feature-item">
            <div style="display:flex;align-items:center;justify-content:center;width:32px;height:32px;background:rgba(255,255,255,0.12);border-radius:8px;">
                <i class="fa-solid fa-clipboard-check" style="color:#f0d080;font-size:13px;"></i>
            </div>
            Monitoring Absensi Real-time
        </div>
        <div class="feature-item">
            <div style="display:flex;align-items:center;justify-content:center;width:32px;height:32px;background:rgba(255,255,255,0.12);border-radius:8px;">
                <i class="fa-solid fa-money-bill-wave" style="color:#f0d080;font-size:13px;"></i>
            </div>
            Pengelolaan Pembayaran Iuran
        </div>
    </div>
</div>

<div class="auth-right">
    <div class="auth-form-wrap">
        <h2>Selamat Datang 👋</h2>
        <p class="subtitle">Masuk ke akun STEVA Anda untuk melanjutkan</p>

        @if($errors->any())
            <div class="alert-danger">
                <i class="fa-solid fa-circle-xmark"></i>
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div style="background:#e9f7ef;border:1px solid #c3e6cb;color:#155724;padding:10px 14px;border-radius:8px;font-size:13px;margin-bottom:16px;display:flex;align-items:center;gap:8px;">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">Alamat Email</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-envelope icon"></i>
                    <input id="email" type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        value="{{ old('email') }}" placeholder="email@contoh.com" required autofocus>
                </div>
                @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-lock icon"></i>
                    <input id="password" type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Masukkan password" required>
                </div>
                @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="remember-row">
                <label>
                    <input type="checkbox" name="remember"> Ingat saya
                </label>
            </div>

            <button type="submit" class="btn-login">
                <i class="fa-solid fa-right-to-bracket"></i> &nbsp;Masuk
            </button>
        </form>

        <div class="divider">atau</div>

        <div class="register-link">
            Belum punya akun? <a href="{{ route('register') }}">Daftar sebagai Pelatih / Murid</a>
        </div>
    </div>
</div>
</body>
</html>
