<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Back — {{ \App\Models\Setting::get('site_name', 'ProgrammersIn') }}</title>
    <link rel="icon" type="image/svg+xml" href="{{ \App\Models\Setting::logoUrl() }}">
    
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    
    @vite(['resources/css/app.css'])
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        * { box-sizing: border-box; }

        body.login-page {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            position: relative;
            overflow-x: hidden;
        }

        /* ===== BACKGROUND: purely decorative, NEVER blocks clicks ===== */
        .mesh-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
            background-color: #f8fafc;
        }

        .mesh-blob {
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.35;
            mix-blend-mode: multiply;
            animation: morph 20s linear infinite alternate;
        }

        @keyframes morph {
            0%, 100% { border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%; transform: translate(0, 0) rotate(0deg); }
            34%      { border-radius: 70% 30% 46% 54% / 30% 29% 71% 70%; transform: translate(10%, 5%) rotate(90deg); }
            67%      { border-radius: 100% 60% 60% 100% / 100% 100% 60% 60%; transform: translate(-5%, 10%) rotate(180deg); }
        }

        .blob-1 { background: #0076FF; top: -100px; right: -100px; }
        .blob-2 { background: #00E5FF; bottom: -100px; left: -100px; animation-delay: -7s; }
        .blob-3 { background: #7C4DFF; top: 30%; left: 30%; width: 400px; height: 400px; animation-delay: -14s; }

        /* ===== MAIN CONTAINER: always above background ===== */
        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            margin: 0 auto;
        }

        /* ===== GLASS CARD ===== */
        .glass-card {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(20px) saturate(160%);
            -webkit-backdrop-filter: blur(20px) saturate(160%);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        /* ===== FORM ELEMENTS ===== */
        .modern-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 1rem;
            padding: 1rem 1.5rem 1rem 3.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #0f172a;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            outline: none;
        }
        .modern-input:focus {
            background: #fff;
            border-color: #0076FF;
            box-shadow: 0 0 0 4px rgba(0, 118, 255, 0.1);
        }

        .input-icon {
            transition: color 0.3s ease, transform 0.3s ease;
            pointer-events: none;
        }
        .input-group:focus-within .input-icon {
            color: #0076FF;
            transform: scale(1.1);
        }

        .submit-btn {
            width: 100%;
            background: #0f172a;
            color: #fff;
            font-weight: 700;
            font-size: 0.9375rem;
            padding: 1.125rem;
            border-radius: 1rem;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .submit-btn:hover {
            background: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
        }
        .submit-btn:active {
            transform: translateY(0) scale(0.98);
        }

        /* ===== ENTRY ANIMATION: safe — elements are visible by default, animation enhances ===== */
        .fade-up {
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) both;
        }
        .fade-up-d1 { animation-delay: 0.05s; }
        .fade-up-d2 { animation-delay: 0.12s; }
        .fade-up-d3 { animation-delay: 0.19s; }
        .fade-up-d4 { animation-delay: 0.26s; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ===== PASSWORD TOGGLE ===== */
        .pw-toggle {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #94a3b8;
            padding: 0.25rem;
            display: flex;
            align-items: center;
            transition: color 0.2s ease;
        }
        .pw-toggle:hover { color: #0076FF; }
    </style>
</head>
<body class="login-page">

    <!-- Decorative Background (pointer-events: none — can NEVER block clicks) -->
    <div class="mesh-bg">
        <div class="mesh-blob blob-1"></div>
        <div class="mesh-blob blob-2"></div>
        <div class="mesh-blob blob-3"></div>
    </div>

    <!-- Login Container -->
    <div class="login-container">
        
        <!-- Logo & Header -->
        <div class="fade-up fade-up-d1" style="text-align: center; margin-bottom: 2.5rem;">
            <div style="display: inline-block; position: relative; margin-bottom: 1.5rem;">
                <div style="position: absolute; inset: -8px; background: linear-gradient(135deg, #0076FF, #00E5FF, #7C4DFF); border-radius: 2.5rem; filter: blur(16px); opacity: 0.2;"></div>
                <div style="position: relative; width: 96px; height: 96px; border-radius: 2.5rem; background: #fff; border: 1px solid #f1f5f9; padding: 1.25rem; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    <img src="{{ \App\Models\Setting::logoUrl() }}" alt="{{ \App\Models\Setting::get('site_name', 'ProgrammersIn') }}" 
                         style="width: 100%; height: 100%; object-fit: contain;"
                         onerror="this.src='https://api.iconify.design/material-symbols:code-blocks.svg?color=%230076FF'">
                </div>
            </div>
            <h1 style="font-size: 2.25rem; font-weight: 900; color: #0f172a; letter-spacing: -0.025em; line-height: 1.2; margin: 0;">
                Welcome <span style="background: linear-gradient(135deg, #0076FF, #7C4DFF); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Back</span>
            </h1>
            <p style="font-size: 0.8125rem; color: #64748b; font-weight: 500; margin-top: 0.75rem;">
                Continue your journey with {{ \App\Models\Setting::get('site_name', 'ProgrammersIn') }}
            </p>
        </div>

        <!-- Glass Card with Form -->
        <div class="glass-card fade-up fade-up-d2">
            <div style="padding: 2rem 2rem; " class="md:p-12">
                @if ($errors->any())
                    <div style="margin-bottom: 1.5rem; background: rgba(244,63,94,0.08); border: 1px solid rgba(244,63,94,0.2); border-radius: 1rem; padding: 1rem; display: flex; align-items: flex-start; gap: 1rem;">
                        <span class="material-symbols-outlined" style="color: #f43f5e; font-size: 1.25rem;">error</span>
                        <div>
                            <span style="font-size: 0.6875rem; font-weight: 700; color: #e11d48; text-transform: uppercase; letter-spacing: 0.05em;">Login Error</span>
                            <p style="font-size: 0.75rem; font-weight: 500; color: rgba(244,63,94,0.9); margin: 0.25rem 0 0;">{{ $errors->first() }}</p>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
                    @csrf

                    <!-- Email Field -->
                    <div class="fade-up fade-up-d2">
                        <label for="email" style="display: block; font-size: 0.6875rem; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.15em; padding-left: 0.25rem; margin-bottom: 0.5rem;">Email Address</label>
                        <div style="position: relative;" class="input-group">
                            <span class="material-symbols-outlined input-icon" style="position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); font-size: 1.25rem; color: #94a3b8;">mail</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@programmersin.com" class="modern-input">
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="fade-up fade-up-d3" x-data="{ show: false }">
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 0 0.25rem; margin-bottom: 0.5rem;">
                            <label for="password" style="font-size: 0.6875rem; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.15em;">Password</label>
                            <a href="#" style="font-size: 0.625rem; font-weight: 700; color: #0076FF; text-decoration: none;">Forgot password?</a>
                        </div>
                        <div style="position: relative;" class="input-group">
                            <span class="material-symbols-outlined input-icon" style="position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); font-size: 1.25rem; color: #94a3b8;">lock</span>
                            <input id="password" :type="show ? 'text' : 'password'" name="password" required placeholder="••••••••" class="modern-input">
                            <button type="button" @click="show = !show" class="pw-toggle">
                                <span class="material-symbols-outlined" style="font-size: 1.25rem;" x-text="show ? 'visibility_off' : 'visibility'">visibility</span>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="fade-up fade-up-d3" style="display: flex; align-items: center; padding-top: 0.25rem;">
                        <label style="display: flex; align-items: center; gap: 0.75rem; cursor: pointer;">
                            <div style="position: relative; width: 2.5rem; height: 1.5rem;">
                                <input type="checkbox" name="remember" class="sr-only peer" style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0,0,0,0);">
                                <div style="width: 100%; height: 100%; background: #e2e8f0; border-radius: 9999px; transition: background 0.2s;" class="peer-checked:bg-blue-600"></div>
                                <div style="position: absolute; top: 4px; left: 4px; width: 16px; height: 16px; background: #fff; border-radius: 9999px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: transform 0.2s;" class="peer-checked:translate-x-4"></div>
                            </div>
                            <span style="font-size: 0.75rem; font-weight: 600; color: #64748b;">Stay signed in</span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="submit-btn fade-up fade-up-d4" style="margin-top: 0.5rem;">
                        <span>Sign In to Workspace</span>
                        <span class="material-symbols-outlined" style="font-size: 1.125rem;">arrow_forward</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Back to Website -->
        <div class="fade-up fade-up-d4" style="margin-top: 2rem; display: flex; flex-direction: column; align-items: center; gap: 1.5rem;">
            <a href="{{ url('/') }}" style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; font-weight: 700; color: #64748b; text-decoration: none; padding: 0.5rem 1rem; border-radius: 9999px; transition: all 0.2s;"
               onmouseover="this.style.color='#0076FF'; this.style.background='rgba(0,118,255,0.05)'"
               onmouseout="this.style.color='#64748b'; this.style.background='transparent'">
                <span class="material-symbols-outlined" style="font-size: 1.25rem;">west</span>
                Back to website
            </a>

            <p style="font-size: 0.625rem; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.25em; opacity: 0.6;">
                &copy; {{ date('Y') }} {{ \App\Models\Setting::get('site_name', 'ProgrammersIn') }}. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
