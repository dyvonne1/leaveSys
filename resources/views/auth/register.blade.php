<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — LeaveEase</title>
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
            color: var(--sage);
            background: rgba(74,124,89,0.2);
            padding: 0.35rem 0.9rem;
            border-radius: 100px;
            margin-bottom: 1.5rem;
        }

        .panel-tag::before {
            content: '';
            width: 5px; height: 5px;
            border-radius: 50%;
            background: var(--sage);
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

        .panel-perks {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .panel-perks li {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            font-size: 0.875rem;
            color: rgba(250,248,244,0.7);
        }

        .perk-icon {
            width: 22px; height: 22px;
            border-radius: 50%;
            background: rgba(74,124,89,0.35);
            color: #86efac;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.65rem;
            font-weight: 700;
            flex-shrink: 0;
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
            max-width: 420px;
        }

        .form-header {
            margin-bottom: 2rem;
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

        /* ─── TEACHER BADGE ─── */
        .teacher-badge {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: var(--sage-light);
            border: 1px solid #c2d9c8;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.75rem;
        }

        .teacher-badge-icon {
            width: 36px; height: 36px;
            background: var(--sage);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .teacher-badge-text p:first-child {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--sage-dark);
            margin-bottom: 0.1rem;
        }

        .teacher-badge-text p:last-child {
            font-size: 0.75rem;
            color: #5a8c69;
        }

        /* ─── FORM FIELDS ─── */
        .field {
            margin-bottom: 1.1rem;
        }

        .field label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 0.4rem;
            letter-spacing: 0.01em;
        }

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

        .field input.has-error {
            border-color: var(--error);
        }

        .field input.has-error:focus {
            box-shadow: 0 0 0 3px rgba(220,38,38,0.1);
        }

        /* ─── SUBMIT BUTTON ─── */
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
            margin-top: 1.25rem;
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
            margin: 1.25rem 0;
            font-size: 0.78rem;
            color: var(--muted);
        }

        .form-divider::before,
        .form-divider::after {
            content: '';
            flex: 1;
            border-top: 1px solid var(--border);
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
            <div class="panel-tag">Teacher Portal</div>
            <h2 class="panel-title">Start filing<br><em>smarter leaves.</em></h2>
            <p class="panel-desc">
                Create your teacher account and submit leave requests with ease. Track every request in real-time.
            </p>
            <ul class="panel-perks">
                <li><span class="perk-icon">✓</span> Submit Sick, Vacation & Emergency leaves</li>
                <li><span class="perk-icon">✓</span> Real-time status tracking</li>
                <li><span class="perk-icon">✓</span> Full request history</li>
                <li><span class="perk-icon">✓</span> Instant notifications on approval</li>
            </ul>
        </div>

        <p class="panel-footer">© {{ date('Y') }} LeaveEase — School Leave Management System</p>
    </div>

    {{-- ─── RIGHT PANEL ─── --}}
    <div class="right-panel">
        <div class="form-wrapper">

            <div class="form-header">
                <h1>Create account</h1>
                <p>Already have one? <a href="{{ route('login') }}">Sign in instead →</a></p>
            </div>

            {{-- Teacher Badge --}}
            <div class="teacher-badge">
                <div class="teacher-badge-icon">👨‍🏫</div>
                <div class="teacher-badge-text">
                    <p>Registering as Teacher</p>
                    <p>Your account will have teacher-level access</p>
                </div>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="field">
                    <label for="name">Full Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="e.g. Maria Santos"
                        autocomplete="name"
                        autofocus
                        class="{{ $errors->has('name') ? 'has-error' : '' }}"
                        required
                    >
                    @error('name')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

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
                        class="{{ $errors->has('email') ? 'has-error' : '' }}"
                        required
                    >
                    @error('email')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="field">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Min. 8 characters"
                        autocomplete="new-password"
                        class="{{ $errors->has('password') ? 'has-error' : '' }}"
                        required
                    >
                    @error('password')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="field">
                    <label for="password_confirmation">Confirm Password</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Re-enter your password"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <button type="submit" class="btn-submit">
                    Create Teacher Account →
                </button>

                <div class="form-divider">or</div>

                <p style="text-align:center; font-size:0.8rem; color:var(--muted);">
                    Are you an admin?
                    <a href="{{ route('login') }}" style="color:var(--sage); font-weight:600; text-decoration:none;">
                        Login here →
                    </a>
                </p>
            </form>

        </div>
    </div>

</body>
</html>