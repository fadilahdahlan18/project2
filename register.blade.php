<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi – STEVA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *{box-sizing:border-box;margin:0;padding:0;}
        body{
            font-family:'Inter',sans-serif; min-height:100vh;
            background:linear-gradient(135deg,#800020 0%,#5c0016 100%);
            display:flex; align-items:center; justify-content:center; padding:24px;
        }
        .card{
            background:#fff; border-radius:16px; width:100%; max-width:540px;
            box-shadow:0 20px 60px rgba(0,0,0,0.3); overflow:hidden;
        }
        .card-top{
            background:linear-gradient(135deg,#800020,#a0002a);
            padding:28px; text-align:center;
        }
        .card-top .logo{
            width:56px;height:56px;background:linear-gradient(135deg,#c9a84c,#f0d080);
            border-radius:50%;display:flex;align-items:center;justify-content:center;
            font-size:22px;font-weight:700;color:#5c0016;margin:0 auto 12px;
        }
        .card-top h1{color:#fff;font-size:22px;font-weight:700;letter-spacing:2px;}
        .card-top p{color:rgba(255,255,255,0.7);font-size:12px;margin-top:4px;}

        .card-body{padding:28px 32px 32px;}
        .card-body h2{font-size:18px;font-weight:700;color:#1a1a2e;margin-bottom:4px;}
        .card-body .subtitle{font-size:13px;color:#6c757d;margin-bottom:24px;}

        .form-group{margin-bottom:16px;}
        .form-label{display:block;font-size:13px;font-weight:500;color:#495057;margin-bottom:5px;}
        .input-wrap{position:relative;}
        .input-wrap .icon{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#adb5bd;font-size:12px;}
        .form-control{
            width:100%;padding:10px 12px 10px 36px;
            border:1.5px solid #dee2e6;border-radius:8px;font-size:13.5px;
            font-family:'Inter',sans-serif;color:#343a40;transition:border-color .2s,box-shadow .2s;
        }
        .form-control:focus{outline:none;border-color:#800020;box-shadow:0 0 0 3px rgba(128,0,32,0.1);}
        .form-control.is-invalid{border-color:#dc3545;}
        .invalid-feedback{color:#dc3545;font-size:12px;margin-top:3px;display:block;}

        .role-group{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:4px;}
        .role-option{
            border:2px solid #dee2e6;border-radius:10px;padding:14px;cursor:pointer;
            text-align:center;transition:all .2s;position:relative;
        }
        .role-option:hover{border-color:#800020;background:#f9e8ec;}
        .role-option input[type=radio]{position:absolute;opacity:0;width:0;}
        .role-option.selected{border-color:#800020;background:#f9e8ec;}
        .role-option i{display:block;font-size:22px;color:#800020;margin-bottom:6px;}
        .role-option span{font-size:13px;font-weight:600;color:#343a40;}
        .role-option small{display:block;font-size:11px;color:#6c757d;margin-top:2px;}

        .btn-register{
            width:100%;padding:13px;
            background:linear-gradient(135deg,#800020,#a0002a);
            color:#fff;border:none;border-radius:8px;
            font-size:15px;font-weight:600;cursor:pointer;transition:all .2s;
        }
        .btn-register:hover{box-shadow:0 6px 20px rgba(128,0,32,0.4);opacity:0.93;}

        .login-link{text-align:center;font-size:13px;color:#6c757d;margin-top:16px;}
        .login-link a{color:#800020;font-weight:600;text-decoration:none;}
    </style>
</head>
<body>
<div class="card">
    <div class="card-top">
        <div class="logo">S</div>
        <h1>STEVA</h1>
        <p>Studio Tari Eva Tannia</p>
    </div>
    <div class="card-body">
        <h2>Buat Akun Baru</h2>
        <p class="subtitle">Registrasi tersedia untuk Pelatih dan Murid</p>

        @if($errors->any())
            <div style="background:#fdf0f0;border:1px solid #f5c6cb;color:#721c24;padding:10px 14px;border-radius:8px;font-size:13px;margin-bottom:16px;display:flex;align-items:center;gap:8px;">
                <i class="fa-solid fa-circle-xmark"></i>
                <ul style="margin:0;padding-left:14px;">@foreach($errors->all() as $e)<li>{{$e}}</li>@endforeach</ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.post') }}" id="registerForm">
            @csrf
            <div class="form-group">
                <label class="form-label">Pilih Peran Anda *</label>
                <div class="role-group">
                    <label class="role-option {{ old('role')=='pelatih' ? 'selected' : '' }}" id="role-pelatih-card">
                        <input type="radio" name="role" value="pelatih" {{ old('role')=='pelatih' ? 'checked' : '' }} onchange="selectRole('pelatih')">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <span>Pelatih</span>
                        <small>Coach / Instruktur</small>
                    </label>
                    <label class="role-option {{ old('role','murid')=='murid' ? 'selected' : '' }}" id="role-murid-card">
                        <input type="radio" name="role" value="murid" {{ old('role','murid')=='murid' ? 'checked' : '' }} onchange="selectRole('murid')">
                        <i class="fa-solid fa-user-graduate"></i>
                        <span>Murid</span>
                        <small>Peserta Didik</small>
                    </label>
                </div>
                @error('role')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Nama Lengkap *</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                        value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                </div>
                @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Alamat Email *</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-envelope icon"></i>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        value="{{ old('email') }}" placeholder="email@contoh.com" required>
                </div>
                @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Nomor HP</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-phone icon"></i>
                    <input type="text" name="no_hp" class="form-control"
                        value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Password *</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Minimal 6 karakter" required>
                </div>
                @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Konfirmasi Password *</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Ulangi password" required>
                </div>
            </div>

            <button type="submit" class="btn-register">
                <i class="fa-solid fa-user-plus"></i> &nbsp;Daftar Sekarang
            </button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </div>
</div>
<script>
function selectRole(role) {
    document.getElementById('role-pelatih-card').classList.toggle('selected', role === 'pelatih');
    document.getElementById('role-murid-card').classList.toggle('selected', role === 'murid');
}
</script>
</body>
</html>
