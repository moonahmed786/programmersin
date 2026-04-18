<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login — ProgrammersIn</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('uploads/assets/logo.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Inter', sans-serif; }

        @keyframes blob-float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%  { transform: translate(20px, -30px) scale(1.05); }
            66%  { transform: translate(-15px, 15px) scale(0.97); }
        }
        @keyframes shimmer {
            0%   { background-position: -200% center; }
            100% { background-position:  200% center; }
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes spin-slow { to { transform: rotate(360deg); } }

        .blob { position: absolute; border-radius: 50%; pointer-events: none; filter: blur(80px); }
        .blob-1 { width: 560px; height: 560px; background: radial-gradient(circle, rgba(0,118,255,0.22), transparent 70%); top: -180px; left: -160px; animation: blob-float 9s ease-in-out infinite; }
        .blob-2 { width: 640px; height: 640px; background: radial-gradient(circle, rgba(124,77,255,0.18), transparent 70%); bottom: -220px; right: -180px; animation: blob-float 11s ease-in-out infinite reverse; }
        .blob-3 { width: 360px; height: 360px; background: radial-gradient(circle, rgba(0,229,255,0.15), transparent 70%); top: 50%; left: 30%; animation: blob-float 14s ease-in-out infinite 3s; }

        .dot-grid {
            background-image: radial-gradient(circle, rgba(0,118,255,0.07) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        .login-card {
            background: rgba(255,255,255,0.88);
            backdrop-filter: blur(40px);
            -webkit-backdrop-filter: blur(40px);
            border: 1px solid rgba(255,255,255,0.95);
            box-shadow: 0 24px 80px rgba(0,0,0,0.09), 0 0 0 1px rgba(255,255,255,0.6) inset, 0 1px 0 rgba(255,255,255,0.9) inset;
            border-radius: 28px;
            animation: fadeUp 0.7s cubic-bezier(0.16,1,0.3,1) both;
        }

        .logo-ring {
            box-shadow: 0 0 0 4px rgba(255,255,255,1), 0 0 0 6px rgba(0,118,255,0.15), 0 12px 40px rgba(0,118,255,0.25);
            animation: spin-slow 0s linear infinite; /* removed spin, keep glow */
        }

        .field-input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            background: rgba(248,250,252,0.9);
            border: 1.5px solid rgba(203,213,225,0.7);
            border-radius: 16px;
            font-size: 0.875rem;
            font-weight: 600;
            color: #1e293b;
            letter-spacing: -0.01em;
            transition: all 0.25s cubic-bezier(0.16,1,0.3,1);
            outline: none;
        }
        .field-input:focus {
            background: #fff;
            border-color: #0076FF;
            box-shadow: 0 0 0 4px rgba(0,118,255,0.1);
        }
        .field-input.has-toggle { padding-right: 48px; }

        .field-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #94a3b8;
            pointer-events: none;
            transition: color 0.25s;
            font-family: 'Material Symbols Outlined';
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0;
        }

        .btn-login {
            width: 100%;
            padding: 15px 24px;
            background: linear-gradient(135deg, #0076FF 0%, #5B3EFF 60%, #7C4DFF 100%);
            border: none;
            border-radius: 16px;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 0.8rem;
            font-weight: 900;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 24px rgba(0,118,255,0.4), 0 1px 0 rgba(255,255,255,0.15) inset;
            transition: all 0.25s cubic-bezier(0.16,1,0.3,1);
            position: relative;
            overflow: hidden;
        }
        .btn-login::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.18) 0%, transparent 55%);
            opacity: 0;
            transition: opacity 0.25s;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 14px 36px rgba(0,118,255,0.5); }
        .btn-login:hover::before { opacity: 1; }
        .btn-login:active { transform: translateY(0); box-shadow: 0 6px 16px rgba(0,118,255,0.3); }

        .text-shimmer {
            background: linear-gradient(120deg, #0076FF, #7C4DFF, #00E5FF, #0076FF);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 4s linear infinite;
        }
        .accent-bar {
            background: linear-gradient(90deg, #0076FF, #7C4DFF, #00E5FF);
        }
        .fade-divider {
            background: linear-gradient(to right, transparent, rgba(203,213,225,0.5), transparent);
        }
        .status-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: #34d399;
            box-shadow: 0 0 0 3px rgba(52,211,153,0.2);
            animation: ping-glow 2s ease-in-out infinite;
        }
        @keyframes ping-glow {
            0%, 100% { box-shadow: 0 0 0 3px rgba(52,211,153,0.2); }
            50% { box-shadow: 0 0 0 6px rgba(52,211,153,0.08); }
        }
    </style>
</head>
<body style="min-height:100vh; display:flex; align-items:center; justify-content:center; position:relative; overflow:hidden; background: linear-gradient(135deg, #EEF3FF 0%, #F8FAFC 50%, #EEF0FF 100%);">

    <!-- Background -->
    <div class="dot-grid" style="position:absolute;inset:0;pointer-events:none;opacity:0.7;"></div>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <!-- Card -->
    <div style="position:relative;z-index:10;width:100%;max-width:440px;padding:24px 16px;">
        <div class="login-card" style="overflow:hidden;">

            <!-- Gradient top bar -->
            <div class="accent-bar" style="height:3px;width:100%;"></div>

            <div style="padding: 40px 40px 36px;">

                <!-- Header -->
                <div style="text-align:center;margin-bottom:32px;">
                    <!-- Logo -->
                    <div style="display:inline-flex;position:relative;margin-bottom:20px;">
                        <div class="logo-ring" style="width:80px;height:80px;border-radius:20px;overflow:hidden;background:#fff;">
                            <img src="{{ asset('uploads/assets/logo.svg') }}" alt="ProgrammersIn" style="width:100%;height:100%;object-fit:contain;">
                        </div>
                        <div style="position:absolute;top:-4px;right:-4px;width:18px;height:18px;background:#34d399;border-radius:50%;border:2.5px solid #fff;box-shadow:0 0 10px rgba(52,211,153,0.6);animation:ping-glow 2s ease-in-out infinite;"></div>
                    </div>

                    <h1 style="margin:0 0 6px;font-size:2.4rem;font-weight:900;letter-spacing:-0.04em;line-height:1;font-style:italic;">
                        <span class="text-shimmer">Protocol</span>
                        <span style="color:#0f172a;"> Access</span>
                    </h1>

                    <p style="margin:0;display:flex;align-items:center;justify-content:center;gap:8px;font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:0.35em;color:#94a3b8;">
                        <span class="status-dot"></span>
                        Central Command Node
                        <span class="status-dot"></span>
                    </p>
                </div>

                <!-- Divider -->
                <div class="fade-divider" style="height:1px;width:100%;margin-bottom:28px;"></div>

                <!-- Error Alert -->
                @if ($errors->any())
                <div style="margin-bottom:20px;background:#fff1f2;border:1.5px solid #fecdd3;border-radius:14px;padding:14px 16px;display:flex;align-items:center;gap:10px;">
                    <span class="material-symbols-outlined" style="color:#f43f5e;font-size:18px;flex-shrink:0;">error</span>
                    <p style="margin:0;font-size:11px;font-weight:700;color:#e11d48;text-transform:uppercase;letter-spacing:0.08em;">{{ $errors->first() }}</p>
                </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" style="display:flex;flex-direction:column;gap:20px;">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" style="display:flex;align-items:center;gap:6px;font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:0.22em;color:#94a3b8;margin-bottom:8px;">
                            <span style="width:3px;height:12px;border-radius:2px;background:linear-gradient(#0076FF,#7C4DFF);display:inline-block;"></span>
                            Personnel Email
                        </label>
                        <div style="position:relative;">
                            <span class="field-icon material-symbols-outlined" id="email-icon">alternate_email</span>
                            <input
                                id="email" name="email" type="email" required autocomplete="email"
                                class="field-input"
                                placeholder="name@programmersin.com"
                                value="{{ old('email') }}"
                                onfocus="this.previousElementSibling.style.color='#0076FF'"
                                onblur="this.previousElementSibling.style.color=''"
                            >
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" style="display:flex;align-items:center;gap:6px;font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:0.22em;color:#94a3b8;margin-bottom:8px;">
                            <span style="width:3px;height:12px;border-radius:2px;background:linear-gradient(#7C4DFF,#00E5FF);display:inline-block;"></span>
                            Access Key
                        </label>
                        <div style="position:relative;">
                            <span class="field-icon material-symbols-outlined" id="pass-icon">lock</span>
                            <input
                                id="password" name="password" type="password" required autocomplete="current-password"
                                class="field-input has-toggle"
                                placeholder="••••••••••••"
                                onfocus="this.previousElementSibling.style.color='#0076FF'"
                                onblur="this.previousElementSibling.style.color=''"
                            >
                            <button type="button" id="toggle-pass"
                                style="position:absolute;right:14px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#94a3b8;padding:4px;display:flex;align-items:center;transition:color 0.2s;"
                                onmouseenter="this.style.color='#0076FF'" onmouseleave="this.style.color='#94a3b8'"
                                onclick="var p=document.getElementById('password');var i=this.querySelector('span');if(p.type==='password'){p.type='text';i.textContent='visibility_off';}else{p.type='password';i.textContent='visibility';}">
                                <span class="material-symbols-outlined" style="font-size:20px;">visibility</span>
                            </button>
                        </div>
                    </div>

                    <!-- Remember & Forgot -->
                    <div style="display:flex;align-items:center;justify-content:space-between;">
                        <label style="display:flex;align-items:center;gap:8px;cursor:pointer;">
                            <input type="checkbox" name="remember" style="width:16px;height:16px;accent-color:#0076FF;cursor:pointer;border-radius:4px;">
                            <span style="font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:0.15em;color:#94a3b8;">Remember Me</span>
                        </label>
                        <a href="#" style="font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:0.15em;color:#0076FF;text-decoration:none;font-style:italic;" onmouseenter="this.style.textDecoration='underline'" onmouseleave="this.style.textDecoration='none'">Forgot?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login" style="margin-top:4px;">
                        <span class="material-symbols-outlined" style="font-size:18px;font-variation-settings:'FILL' 1;">bolt</span>
                        Sign In
                        <span class="material-symbols-outlined" style="font-size:18px;font-variation-settings:'FILL' 1;">arrow_forward</span>
                    </button>
                </form>

                <!-- Footer -->
                <div style="margin-top:24px;">
                    <div class="fade-divider" style="height:1px;width:100%;margin-bottom:20px;"></div>
                    <div style="display:flex;align-items:center;justify-content:space-between;">
                        <p style="margin:0;font-size:9px;font-weight:800;text-transform:uppercase;letter-spacing:0.3em;color:#cbd5e1;font-style:italic;">Encrypted · Secure</p>
                        <a href="{{ url('/') }}" style="display:inline-flex;align-items:center;gap:6px;font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:0.15em;color:#94a3b8;text-decoration:none;transition:color 0.2s;" onmouseenter="this.style.color='#0076FF'" onmouseleave="this.style.color='#94a3b8'">
                            <span class="material-symbols-outlined" style="font-size:14px;">west</span>
                            Back to Site
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Below card -->
        <p style="text-align:center;margin-top:20px;font-size:9px;font-weight:800;text-transform:uppercase;letter-spacing:0.4em;color:#94a3b8;opacity:0.5;display:flex;align-items:center;justify-content:center;gap:12px;">
            <span style="height:1px;width:32px;background:#cbd5e1;display:inline-block;"></span>
            programmersin.com
            <span style="height:1px;width:32px;background:#cbd5e1;display:inline-block;"></span>
        </p>
    </div>

</body>
</html>
