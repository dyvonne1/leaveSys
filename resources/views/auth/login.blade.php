<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — LeaveEase</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,700;0,900;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --ink:        #0f1117;
            --paper:      #faf8f4;
            --sage:       #4a7c59;
            --sage-light: #e8f0ea;
            --sage-dark:  #3a6347;
            --gold:       #c9a84c;
            --muted:      #6b7280;
            --border:     #e2ddd6;
            --error:      #dc2626;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--paper);
            min-height: 100vh;
            display: flex;
        }

        /* ─── LEFT PANEL ─── */
        .left-panel {
            width: 42%;
            background: var(--ink);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -80px; left: -80px;
            width: 360px; height: 360px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(74,124,89,0.25) 0%, transparent 70%);
            pointer-events: none;
        }

        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -60px; right: -60px;
            width: 280px; height: 280px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201,168,76,0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .panel-logo {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            text-decoration: none;
            position: relative;
            z-index: 1;
        }

        .panel-logo-icon {
            width: 38px; height: 38px;
            background: var(--sage);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem;
        }

        .panel-logo-text {
            font-family: 'Fraunces', serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--paper);
            letter-spacing: -0.02em;
        }

        .panel-logo-text span { color: var(--sage); }

        .panel-content {
            position: relative;
            z-index: 1;
        }

        .panel-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--gold);
            background: rgba(201,168,76,0.18);
            padding: 0.35rem 0.9rem;
            border-radius: 100px;
            margin-bottom: 1.5rem;
        }

        .panel-tag::before {
            content: '';
            width: 5px; height: 5px;
            border-radius: 50%;
            background: var(--gold);
        }

        .panel-title {
            font-family: 'Fraunces', serif;
            font-size: 2.6rem;
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -0.03em;
            color: var(--paper);
            margin-bottom: 1rem;
        }

        .panel-title em {
            font-style: italic;
            color: var(--sage);
        }

        .panel-desc {
            font-size: 0.9rem;
            color: rgba(250,248,244,0.5);
            line-height: 1.7;
            max-width: 300px;
            margin-bottom: 2.5rem;
        }

        /* Role Cards */
        .role-cards {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .role-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 0.85rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.85rem;
        }

        .role-card-icon {
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .role-card-info p:first-child {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--paper);
            margin-bottom: 0.15rem;
        }

        .role-card-info p:last-child {
            font-size: 0.75rem;
            color: rgba(250,248,244,0.4);
        }

        .panel-footer {
            position: relative;
            z-index: 1;
            font-size: 0.75rem;
            color: rgba(250,248,244,0.25);
        }

        /* ─── RIGHT PANEL ─── */
        .right-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 2.5rem;
            background: var(--paper);
        }

        .form-wrapper {
            width: 100%;
            max-width: 400px;
        }

        .form-header {
            margin-bottom: 2.25rem;
        }

        .form-header h1 {
            font-family: 'Fraunces', serif;
            font-size: 1.9rem;
            font-weight: 900;
            letter-spacing: -0.025em;
            color: var(--ink);
            margin-bottom: 0.35rem;
        }

        .form-header p {
            font-size: 0.875rem;
            color: var(--muted);
        }

        .form-header p a {
            color: var(--sage);
            font-weight: 600;
            text-decoration: none;
        }

        .form-header p a:hover { text-decoration: underline; }

        /* ─── SESSION STATUS ─── */
        .session-status {
            background: var(--sage-light);
            border: 1px solid #c2d9c8;
            color: var(--sage-dark);
            font-size: 0.85rem;
            padding: 0.65rem 0.9rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
        }

        /* ─── FORM FIELDS ─── */
        .field {
            margin-bottom: 1.1rem;
        }

        .field-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.4rem;
        }

        .field label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--ink);
            letter-spacing: 0.01em;
        }

        .field-link {
            font-size: 0.78rem;
            color: var(--sage);
            font-weight: 500;
            text-decoration: none;
        }

        .field-link:hover { text-decoration: underline; }

        .field input {
            width: 100%;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: var(--ink);
            background: white;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: 0.65rem 0.9rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .field input:focus {
            border-color: var(--sage);
            box-shadow: 0 0 0 3px rgba(74,124,89,0.12);
        }

        .field input::placeholder { color: #b5b0a8; }

        .field-error {
            font-size: 0.76rem;
            color: var(--error);
            margin-top: 0.3rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .field-error::before {
            content: '!';
            width: 14px; height: 14px;
            border-radius: 50%;
            background: var(--error);
            color: white;
            font-size: 0.6rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .field input.has-error { border-color: var(--error); }
        .field input.has-error:focus { box-shadow: 0 0 0 3px rgba(220,38,38,0.1); }

        /* ─── REMEMBER ME ─── */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
        }

        .remember-row input[type="checkbox"] {
            width: 15px; height: 15px;
            accent-color: var(--sage);
            cursor: pointer;
        }

        .remember-row label {
            font-size: 0.82rem;
            color: var(--muted);
            cursor: pointer;
        }

        /* ─── SUBMIT ─── */
        .btn-submit {
            width: 100%;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            color: white;
            background: var(--ink);
            border: none;
            border-radius: 8px;
            padding: 0.8rem;
            cursor: pointer;
            transition: all 0.2s ease;
            letter-spacing: 0.01em;
        }

        .btn-submit:hover {
            background: var(--sage);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(74,124,89,0.3);
        }

        .btn-submit:active { transform: translateY(0); }

        /* ─── DIVIDER ─── */
        .form-divider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.5rem 0 1.25rem;
            font-size: 0.78rem;
            color: var(--muted);
        }

        .form-divider::before,
        .form-divider::after {
            content: '';
            flex: 1;
            border-top: 1px solid var(--border);
        }

        /* ─── ADMIN HINT ─── */
        .admin-hint {
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.85rem 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.7rem;
        }

        .admin-hint-icon {
            font-size: 1.1rem;
            flex-shrink: 0;
            margin-top: 0.05rem;
        }

        .admin-hint p:first-child {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 0.15rem;
        }

        .admin-hint p:last-child {
            font-size: 0.75rem;
            color: var(--muted);
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 768px) {
            .left-panel { display: none; }
            .right-panel { padding: 2rem 1.5rem; }
        }
    </style>
</head>
<body>

    {{-- ─── LEFT PANEL ─── --}}
    <div class="left-panel">
        <a href="{{ route('welcome') }}" class="panel-logo">
            <div class="panel-logo-icon">📋</div>
            <span class="panel-logo-text">Leave<span>Ease</span></span>
        </a>

        <div class="panel-content">
            <div class="panel-tag">Welcome Back</div>
            <h2 class="panel-title">Good to see<br>you <em>again.</em></h2>
            <p class="panel-desc">
                Sign in to access your dashboard. Teachers file requests, admins manage them.
            </p>

            <div class="role-cards">
                <div class="role-card">
                    <div class="role-card-icon">👨‍🏫</div>
                    <div class="role-card-info">
                        <p>Teacher</p>
                        <p>Submit and track your leave requests</p>
                    </div>
                </div>
                <div class="role-card">
                    <div class="role-card-icon">👨‍💼</div>
                    <div class="role-card-info">
                        <p>Admin</p>
                        <p>Review, approve or reject all requests</p>
                    </div>
                </div>
            </div>
        </div>

        <p class="panel-footer">© {{ date('Y') }} LeaveEase — School Leave Management System</p>
    </div>

    {{-- ─── RIGHT PANEL ─── --}}
    <div class="right-panel">
        <div class="form-wrapper">

            <div class="form-header">
                <h1>Welcome back</h1>
                <p>No account yet? <a href="{{ route('register') }}">Register as teacher →</a></p>
            </div>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="session-status">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="field">
                    <label for="email">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="you@school.edu.ph"
                        autocomplete="username"
                        autofocus
                        class="{{ $errors->has('email') ? 'has-error' : '' }}"
                        required
                    >
                    @error('email')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="field">
                    <div class="field-row">
                        <label for="password">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="field-link">Forgot password?</a>
                        @endif
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        class="{{ $errors->has('password') ? 'has-error' : '' }}"
                        required
                    >
                    @error('password')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="remember-row">
                    <input type="checkbox" id="remember_me" name="remember">
                    <label for="remember_me">Keep me signed in</label>
                </div>

                <button type="submit" class="btn-submit">
                    Sign In →
                </button>

                <div class="form-divider">admin credentials</div>

                {{-- Admin hint --}}
                <div class="admin-hint">
                    <span class="admin-hint-icon">💡</span>
                    <div>
                        <p>Default Admin Account</p>
                        <p>admin@leavease.com &nbsp;·&nbsp; admin1234</p>
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>
</html>