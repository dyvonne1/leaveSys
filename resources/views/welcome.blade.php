<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaveEase — School Leave Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,700;0,900;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink:    #0f1117;
            --paper:  #faf8f4;
            --sage:   #4a7c59;
            --sage-light: #e8f0ea;
            --gold:   #c9a84c;
            --muted:  #6b7280;
            --border: #e2ddd6;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--paper);
            color: var(--ink);
            overflow-x: hidden;
        }

        h1, h2, h3, .serif {
            font-family: 'Fraunces', serif;
        }

        /* ─── NOISE TEXTURE OVERLAY ─── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 1000;
            opacity: 0.4;
        }

        /* ─── HEADER ─── */
        header {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 1.25rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(250, 248, 244, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            background: var(--ink);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .logo-text {
            font-family: 'Fraunces', serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -0.02em;
        }

        .logo-text span {
            color: var(--sage);
        }

        nav {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-ghost {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--ink);
            text-decoration: none;
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            border: 1px solid transparent;
            transition: all 0.2s ease;
        }

        .btn-ghost:hover {
            border-color: var(--border);
            background: rgba(0,0,0,0.04);
        }

        .btn-primary {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--paper);
            background: var(--ink);
            text-decoration: none;
            padding: 0.55rem 1.4rem;
            border-radius: 6px;
            border: 1px solid var(--ink);
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background: var(--sage);
            border-color: var(--sage);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(74, 124, 89, 0.3);
        }

        /* ─── HERO ─── */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 8rem 2rem 4rem;
            text-align: center;
            position: relative;
        }

        /* Background decorative circles */
        .hero::after {
            content: '';
            position: absolute;
            top: 15%;
            right: -10%;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(74,124,89,0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--sage);
            background: var(--sage-light);
            padding: 0.4rem 1rem;
            border-radius: 100px;
            margin-bottom: 1.75rem;
            animation: fadeUp 0.6s ease both;
        }

        .hero-eyebrow::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--sage);
        }

        .hero-title {
            font-family: 'Fraunces', serif;
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -0.03em;
            color: var(--ink);
            max-width: 820px;
            margin-bottom: 1.5rem;
            animation: fadeUp 0.6s 0.1s ease both;
        }

        .hero-title em {
            font-style: italic;
            color: var(--sage);
        }

        .hero-sub {
            font-size: 1.1rem;
            font-weight: 400;
            color: var(--muted);
            max-width: 520px;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            animation: fadeUp 0.6s 0.2s ease both;
        }

        .hero-cta {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeUp 0.6s 0.3s ease both;
        }

        .btn-cta {
            font-family: 'DM Sans', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            color: var(--paper);
            background: var(--ink);
            text-decoration: none;
            padding: 0.85rem 2.25rem;
            border-radius: 8px;
            border: 2px solid var(--ink);
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-cta:hover {
            background: var(--sage);
            border-color: var(--sage);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(74, 124, 89, 0.35);
        }

        .btn-cta-outline {
            font-family: 'DM Sans', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            color: var(--ink);
            background: transparent;
            text-decoration: none;
            padding: 0.85rem 2.25rem;
            border-radius: 8px;
            border: 2px solid var(--border);
            transition: all 0.25s ease;
        }

        .btn-cta-outline:hover {
            border-color: var(--ink);
            background: rgba(0,0,0,0.04);
            transform: translateY(-2px);
        }

        /* ─── HERO CARD PREVIEW ─── */
        .hero-preview {
            margin-top: 5rem;
            position: relative;
            width: 100%;
            max-width: 860px;
            animation: fadeUp 0.8s 0.4s ease both;
        }

        .preview-glow {
            position: absolute;
            inset: -20px;
            background: radial-gradient(ellipse at center, rgba(74,124,89,0.12) 0%, transparent 70%);
            border-radius: 24px;
            pointer-events: none;
        }

        .preview-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow:
                0 1px 2px rgba(0,0,0,0.04),
                0 4px 8px rgba(0,0,0,0.04),
                0 16px 40px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
        }

        .preview-bar {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .dot { width: 10px; height: 10px; border-radius: 50%; }
        .dot-r { background: #ff5f57; }
        .dot-y { background: #febc2e; }
        .dot-g { background: #28c840; }

        .preview-title {
            font-family: 'Fraunces', serif;
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--ink);
            margin-left: auto;
            margin-right: auto;
        }

        .preview-table-header {
            display: grid;
            grid-template-columns: 0.5fr 1fr 1fr 1fr 1fr 0.8fr;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem;
            background: var(--paper);
            border-radius: 6px;
            margin-bottom: 0.5rem;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--muted);
        }

        .preview-row {
            display: grid;
            grid-template-columns: 0.5fr 1fr 1fr 1fr 1fr 0.8fr;
            gap: 0.5rem;
            padding: 0.65rem 0.75rem;
            border-radius: 6px;
            font-size: 0.78rem;
            color: var(--ink);
            align-items: center;
            transition: background 0.15s;
        }

        .preview-row:hover { background: var(--paper); }

        .status-badge {
            display: inline-block;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 0.2rem 0.6rem;
            border-radius: 100px;
        }

        .status-pending  { background: #fef3c7; color: #92400e; }
        .status-approved { background: #d1fae5; color: #065f46; }
        .status-rejected { background: #fee2e2; color: #991b1b; }

        /* ─── FEATURES ─── */
        .features {
            padding: 6rem 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        .section-label {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--sage);
            margin-bottom: 1rem;
        }

        .section-title {
            font-family: 'Fraunces', serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -0.025em;
            color: var(--ink);
            max-width: 540px;
            margin-bottom: 3.5rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .feature-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 2rem;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card:hover {
            border-color: var(--sage);
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(74,124,89,0.12);
        }

        .feature-icon {
            width: 44px;
            height: 44px;
            background: var(--sage-light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1.25rem;
        }

        .feature-card h3 {
            font-family: 'Fraunces', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: 0.9rem;
            color: var(--muted);
            line-height: 1.65;
        }

        /* ─── ROLES SECTION ─── */
        .roles {
            padding: 6rem 2rem;
            background: var(--ink);
            position: relative;
            overflow: hidden;
        }

        .roles::before {
            content: '';
            position: absolute;
            top: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(74,124,89,0.2) 0%, transparent 70%);
            pointer-events: none;
        }

        .roles-inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        .roles .section-label { color: var(--gold); }

        .roles .section-title { color: var(--paper); }

        .roles-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-top: 3rem;
        }

        @media (max-width: 640px) {
            .roles-grid { grid-template-columns: 1fr; }
            .preview-table-header,
            .preview-row { grid-template-columns: 1fr 1fr 1fr; }
            .preview-table-header > *:nth-child(n+4),
            .preview-row > *:nth-child(n+4) { display: none; }
        }

        .role-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .role-card:hover {
            background: rgba(255,255,255,0.08);
            border-color: rgba(255,255,255,0.2);
            transform: translateY(-4px);
        }

        .role-card::before {
            content: '';
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            opacity: 0.06;
            font-size: 5rem;
        }

        .role-tag {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.3rem 0.8rem;
            border-radius: 100px;
            margin-bottom: 1.25rem;
        }

        .role-tag.teacher { background: rgba(74,124,89,0.3); color: #86efac; }
        .role-tag.admin   { background: rgba(201,168,76,0.25); color: var(--gold); }

        .role-card h3 {
            font-family: 'Fraunces', serif;
            font-size: 1.6rem;
            font-weight: 900;
            color: var(--paper);
            margin-bottom: 0.75rem;
            letter-spacing: -0.02em;
        }

        .role-card > p {
            font-size: 0.9rem;
            color: rgba(250,248,244,0.55);
            line-height: 1.65;
            margin-bottom: 1.5rem;
        }

        .role-perms {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }

        .role-perms li {
            font-size: 0.875rem;
            color: rgba(250,248,244,0.75);
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .role-perms li::before {
            content: '✓';
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.65rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .role-perms.teacher li::before { background: rgba(74,124,89,0.4); color: #86efac; }
        .role-perms.admin   li::before { background: rgba(201,168,76,0.3); color: var(--gold); }

        .role-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 2rem;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .role-cta.teacher {
            background: var(--sage);
            color: white;
        }

        .role-cta.teacher:hover {
            background: #3d6b4a;
            transform: translateY(-1px);
        }

        .role-cta.admin {
            background: var(--gold);
            color: var(--ink);
        }

        .role-cta.admin:hover {
            background: #b8932f;
            transform: translateY(-1px);
        }

        /* ─── FOOTER ─── */
        footer {
            background: var(--ink);
            border-top: 1px solid rgba(255,255,255,0.07);
            padding: 2.5rem 2rem;
            text-align: center;
        }

        footer p {
            font-size: 0.85rem;
            color: rgba(250,248,244,0.35);
        }

        footer span {
            color: var(--sage);
        }

        /* ─── ANIMATIONS ─── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ─── DIVIDER ─── */
        .divider {
            max-width: 1100px;
            margin: 0 auto;
            border: none;
            border-top: 1px solid var(--border);
        }
    </style>
</head>
<body>

    {{-- ─── HEADER ─── --}}
    <header>
        <a href="{{ route('welcome') }}" class="logo">
            <div class="logo-icon">📋</div>
            <span class="logo-text">Leave<span>Ease</span></span>
        </a>
        <nav>
            <a href="{{ route('login') }}" class="btn-ghost">Login</a>
            <a href="{{ route('register') }}" class="btn-primary">Get Started →</a>
        </nav>
    </header>

    {{-- ─── HERO ─── --}}
    <section class="hero">
        <div class="hero-eyebrow">School Leave Management System</div>

        <h1 class="hero-title">
            Leave requests,<br>
            <em>handled effortlessly.</em>
        </h1>

        <p class="hero-sub">
            A simple, clean system for teachers to file leave requests and administrators to review and act on them — all in one place.
        </p>

        <div class="hero-cta">
            <a href="{{ route('register') }}" class="btn-cta">
                Get Started — it's free →
            </a>
            <a href="{{ route('login') }}" class="btn-cta-outline">
                Login to your account
            </a>
        </div>

        {{-- Dashboard Preview --}}
        <div class="hero-preview">
            <div class="preview-glow"></div>
            <div class="preview-card">
                <div class="preview-bar">
                    <div class="dot dot-r"></div>
                    <div class="dot dot-y"></div>
                    <div class="dot dot-g"></div>
                    <div class="preview-title">Admin Dashboard — All Leave Requests</div>
                </div>

                <div class="preview-table-header">
                    <span>#</span>
                    <span>Teacher</span>
                    <span>Type</span>
                    <span>Start</span>
                    <span>End</span>
                    <span>Status</span>
                </div>

                <div class="preview-row">
                    <span style="color:var(--muted)">1</span>
                    <span style="font-weight:500">Maria Santos</span>
                    <span>Sick Leave</span>
                    <span>Mar 25, 2025</span>
                    <span>Mar 26, 2025</span>
                    <span><span class="status-badge status-approved">✔ Approved</span></span>
                </div>
                <div class="preview-row">
                    <span style="color:var(--muted)">2</span>
                    <span style="font-weight:500">Juan Dela Cruz</span>
                    <span>Vacation Leave</span>
                    <span>Apr 01, 2025</span>
                    <span>Apr 05, 2025</span>
                    <span><span class="status-badge status-pending">⏳ Pending</span></span>
                </div>
                <div class="preview-row">
                    <span style="color:var(--muted)">3</span>
                    <span style="font-weight:500">Ana Reyes</span>
                    <span>Emergency Leave</span>
                    <span>Mar 28, 2025</span>
                    <span>Mar 28, 2025</span>
                    <span><span class="status-badge status-rejected">✘ Rejected</span></span>
                </div>
                <div class="preview-row">
                    <span style="color:var(--muted)">4</span>
                    <span style="font-weight:500">Pedro Bautista</span>
                    <span>Sick Leave</span>
                    <span>Apr 10, 2025</span>
                    <span>Apr 11, 2025</span>
                    <span><span class="status-badge status-pending">⏳ Pending</span></span>
                </div>
            </div>
        </div>
    </section>

    <hr class="divider">

    {{-- ─── FEATURES ─── --}}
    <section class="features">
        <p class="section-label">Why LeaveEase</p>
        <h2 class="section-title">Everything you need, nothing you don't.</h2>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📝</div>
                <h3>Simple Submission</h3>
                <p>Teachers can file leave requests in under a minute — just pick the type, dates, and reason. No complicated forms.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Instant Actions</h3>
                <p>Admins can approve or reject requests with a single click directly from the dashboard. Fast and efficient.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>At-a-Glance Stats</h3>
                <p>Admin dashboard shows total, pending, approved, and rejected counts — always know the status at a glance.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Role-Based Access</h3>
                <p>Teachers only see their own requests. Admins have full oversight. Clean separation of responsibilities.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🗂️</div>
                <h3>Leave Types Covered</h3>
                <p>Supports Sick Leave, Vacation Leave, and Emergency Leave — the three most common school leave categories.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3>Responsive Design</h3>
                <p>Works perfectly on desktop, tablet, and mobile. Manage requests from anywhere, anytime.</p>
            </div>
        </div>
    </section>

    {{-- ─── ROLES ─── --}}
    <section class="roles">
        <div class="roles-inner">
            <p class="section-label">Two Roles, One System</p>
            <h2 class="section-title">Built for teachers.<br>Designed for admins.</h2>

            <div class="roles-grid">
                {{-- Teacher --}}
                <div class="role-card">
                    <span class="role-tag teacher">👨‍🏫 Teacher</span>
                    <h3>File & Track</h3>
                    <p>Submit your leave requests and monitor their status in real-time. No more chasing down approvals.</p>
                    <ul class="role-perms teacher">
                        <li>Submit new leave requests</li>
                        <li>Choose leave type & dates</li>
                        <li>Track status (Pending / Approved / Rejected)</li>
                        <li>View full request history</li>
                    </ul>
                    <a href="{{ route('register') }}" class="role-cta teacher">
                        Register as Teacher →
                    </a>
                </div>

                {{-- Admin --}}
                <div class="role-card">
                    <span class="role-tag admin">👨‍💼 Admin</span>
                    <h3>Review & Decide</h3>
                    <p>Get a complete picture of all leave requests and act on them quickly. Stay in full control.</p>
                    <ul class="role-perms admin">
                        <li>View all teachers' requests</li>
                        <li>Approve or Reject with one click</li>
                        <li>Delete outdated records</li>
                        <li>Dashboard with live statistics</li>
                    </ul>
                    <a href="{{ route('register') }}" class="role-cta admin">
                        Register as Admin →
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── FOOTER ─── --}}
    <footer>
        <p>© {{ date('Y') }} <span>LeaveEase</span> — School Leave Management System. Built with Laravel 12 & Tailwind CSS.</p>
    </footer>

</body>
</html>