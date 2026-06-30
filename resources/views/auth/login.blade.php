<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingia | JUBITA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Work Sans', sans-serif;
            background: #f4f4f4;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-wrap {
            width: 100%;
            max-width: 420px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-header img { height: 36px; display: inline-block; margin-bottom: 12px; }
        .login-header p {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #999;
        }

        .login-card {
            background: #fff;
            border-top: 4px solid #0000ff;
            padding: 36px 40px 32px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }

        .login-card h1 {
            font-size: 22px;
            font-weight: 900;
            color: #000;
            letter-spacing: -0.5px;
            margin-bottom: 24px;
        }

        .form-group { margin-bottom: 18px; }
        .form-group label {
            display: block;
            font-size: 10px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #555;
            margin-bottom: 6px;
        }
        .form-group .input-wrap {
            display: flex;
            align-items: center;
            border: 2px solid #e0e0e0;
            background: #fff;
            transition: border-color 0.2s;
        }
        .form-group .input-wrap:focus-within { border-color: #0000ff; }
        .form-group .input-wrap i {
            padding: 0 12px;
            color: #bbb;
            font-size: 13px;
            flex-shrink: 0;
        }
        .form-group .input-wrap:focus-within i { color: #0000ff; }
        .form-group input {
            border: none;
            outline: none;
            padding: 11px 12px 11px 0;
            font-size: 14px;
            font-family: inherit;
            width: 100%;
            color: #000;
            background: transparent;
        }

        .form-error {
            font-size: 11px;
            color: #e74c3c;
            font-weight: 700;
            margin-top: 5px;
            padding-left: 2px;
        }

        .alert-error {
            background: #fff5f5;
            border: 1px solid #ffc0c0;
            border-left: 4px solid #e74c3c;
            padding: 12px 16px;
            font-size: 13px;
            color: #c0392b;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 12px;
        }
        .form-options label {
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            color: #666;
            font-weight: 600;
        }
        .form-options input[type="checkbox"] { accent-color: #0000ff; width: 14px; height: 14px; }
        .form-options a {
            color: #0000ff;
            text-decoration: none;
            font-weight: 700;
        }
        .form-options a:hover { text-decoration: underline; }

        .btn-login {
            width: 100%;
            background: #0000ff;
            color: #fff;
            border: none;
            padding: 13px;
            font-size: 13px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.2s;
        }
        .btn-login:hover { background: #0000cc; }
        .btn-login:active { background: #000099; }

        .login-back {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #999;
        }
        .login-back a {
            color: #000;
            font-weight: 700;
            text-decoration: none;
        }
        .login-back a:hover { color: #0000ff; }

        .login-footer {
            text-align: center;
            margin-top: 28px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #bbb;
        }
    </style>
</head>
<body>

<div class="login-wrap">

    <div class="login-header">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo2.png') }}" alt="JUBITA">
        </a>
        <p>Mfumo wa Usimamizi</p>
    </div>

    <div class="login-card">
        <h1>Ingia kwenye akaunti yako</h1>

        @if(session('error'))
        <div class="alert-error">{{ session('error') }}</div>
        @endif

        @if($errors->any() && !$errors->has('email') && !$errors->has('password'))
        <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('auth.login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Barua pepe</label>
                <div class="input-wrap">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           placeholder="jina@jubita.co.tz" required autocomplete="email" autofocus>
                </div>
                @error('email')
                <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Nywila</label>
                <div class="input-wrap">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password"
                           placeholder="••••••••" required autocomplete="current-password">
                </div>
                @error('password')
                <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-options">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    Nikumbuke
                </label>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt" style="margin-right:8px;"></i>Ingia
            </button>
        </form>
    </div>

    <div class="login-back">
        <a href="{{ route('home') }}"><i class="fas fa-arrow-left" style="font-size:10px; margin-right:4px;"></i>Rudi kwenye tovuti</a>
    </div>

    <div class="login-footer">
        &copy; {{ date('Y') }} JUBITA Media Group
    </div>

</div>

</body>
</html>
