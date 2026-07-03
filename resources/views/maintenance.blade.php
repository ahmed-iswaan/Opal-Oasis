<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Opal Oasis | Under Maintenance</title>

    <link rel="icon" href="{{ asset('assets/images/optimized/logo-gold.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|playfair-display:600,700" rel="stylesheet">

    <style>
        :root {
            --gold: #c8a45d;
            --gold-dark: #9f7b35;
            --gold-soft: #f4ead2;
            --charcoal: #25272b;
            --serif: "Playfair Display", Georgia, serif;
            --sans: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: var(--sans);
            color: var(--charcoal);
            background: #fbfaf7;
            overflow: hidden;
        }

        /* Animated background */
        .bg-pattern {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
        }

        .bg-pattern::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(ellipse at 30% 20%, rgba(200, 164, 93, .08) 0%, transparent 50%),
                        radial-gradient(ellipse at 70% 80%, rgba(200, 164, 93, .06) 0%, transparent 50%);
            animation: bgDrift 20s ease-in-out infinite alternate;
        }

        @keyframes bgDrift {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-3%, 2%) rotate(2deg); }
        }

        .bg-pattern::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(200, 164, 93, .04) 0%, transparent 70%);
            transform: translate(-50%, -50%);
            animation: pulse 6s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: .6; }
            50% { transform: translate(-50%, -50%) scale(1.15); opacity: 1; }
        }

        /* Main content */
        .container {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 40px 24px;
            max-width: 580px;
        }

        .logo {
            width: 120px;
            height: auto;
            margin-bottom: 40px;
            opacity: 0;
            animation: fadeUp .8s ease forwards;
        }

        /* Animated gear icon */
        .icon-wrap {
            position: relative;
            width: 80px;
            height: 80px;
            margin-bottom: 32px;
            opacity: 0;
            animation: fadeUp .8s ease .15s forwards;
        }

        .gear-ring {
            width: 80px;
            height: 80px;
            border: 2px solid rgba(200, 164, 93, .25);
            border-top-color: var(--gold);
            border-radius: 50%;
            animation: spin 3s linear infinite;
        }

        .gear-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 32px;
            height: 32px;
            color: var(--gold);
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        h1 {
            font-family: var(--serif);
            font-size: clamp(2rem, 5vw, 3rem);
            line-height: 1.15;
            margin-bottom: 16px;
            opacity: 0;
            animation: fadeUp .8s ease .3s forwards;
        }

        .subtitle {
            font-size: clamp(1rem, 2.5vw, 1.2rem);
            color: #6d7178;
            line-height: 1.6;
            margin-bottom: 36px;
            opacity: 0;
            animation: fadeUp .8s ease .45s forwards;
        }

        /* Progress bar */
        .progress-wrap {
            width: 100%;
            max-width: 320px;
            margin-bottom: 36px;
            opacity: 0;
            animation: fadeUp .8s ease .6s forwards;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: .8rem;
            font-weight: 600;
            color: #6d7178;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background: rgba(37, 39, 43, .08);
            border-radius: 999px;
            overflow: hidden;
        }

        .progress-fill {
            width: 65%;
            height: 100%;
            background: linear-gradient(90deg, var(--gold-dark), var(--gold));
            border-radius: 999px;
            animation: progressPulse 2.5s ease-in-out infinite;
        }

        @keyframes progressPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: .6; }
        }

        /* Divider */
        .divider {
            width: 60px;
            height: 1px;
            background: var(--gold);
            margin-bottom: 28px;
            opacity: 0;
            animation: fadeUp .8s ease .7s forwards;
        }

        /* Contact info */
        .contact {
            opacity: 0;
            animation: fadeUp .8s ease .8s forwards;
        }

        .contact p {
            font-size: .92rem;
            color: #6d7178;
            margin-bottom: 12px;
        }

        .contact a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--charcoal);
            font-weight: 600;
            text-decoration: none;
            padding: 10px 20px;
            border: 1px solid rgba(200, 164, 93, .3);
            border-radius: 999px;
            transition: all .25s ease;
        }

        .contact a:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: #17191d;
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(200, 164, 93, .25);
        }

        .contact a svg {
            width: 16px;
            height: 16px;
        }

        /* Floating decorations */
        .deco {
            position: fixed;
            border-radius: 50%;
            background: var(--gold);
            opacity: .06;
            pointer-events: none;
        }

        .deco-1 {
            width: 300px;
            height: 300px;
            top: -80px;
            right: -80px;
            animation: float 8s ease-in-out infinite;
        }

        .deco-2 {
            width: 200px;
            height: 200px;
            bottom: -60px;
            left: -60px;
            animation: float 10s ease-in-out infinite reverse;
        }

        .deco-3 {
            width: 100px;
            height: 100px;
            top: 40%;
            left: 8%;
            opacity: .04;
            animation: float 12s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .logo {
                width: 90px;
                margin-bottom: 32px;
            }

            .icon-wrap {
                width: 64px;
                height: 64px;
                margin-bottom: 24px;
            }

            .gear-ring {
                width: 64px;
                height: 64px;
            }

            .gear-icon {
                width: 26px;
                height: 26px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-pattern"></div>
    <div class="deco deco-1"></div>
    <div class="deco deco-2"></div>
    <div class="deco deco-3"></div>

    <div class="container">
        <img class="logo" src="{{ asset('assets/images/optimized/logo-gold.png') }}" alt="Opal Oasis Logo">

        <div class="icon-wrap">
            <div class="gear-ring"></div>
            <svg class="gear-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z"></path>
                <path d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
                <path d="M12 2v2"></path>
                <path d="M12 20v2"></path>
                <path d="m4.93 4.93 1.41 1.41"></path>
                <path d="m17.66 17.66 1.41 1.41"></path>
                <path d="M2 12h2"></path>
                <path d="M20 12h2"></path>
                <path d="m6.34 17.66-1.41 1.41"></path>
                <path d="m19.07 4.93-1.41 1.41"></path>
            </svg>
        </div>

        <h1>We'll Be Back Soon</h1>
        <p class="subtitle">We're making some improvements to give you a better experience. Our site will be back online shortly.</p>

        <div class="progress-wrap">
            <div class="progress-label">
                <span>Progress</span>
                <span>Almost there</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>

        <div class="divider"></div>

        <div class="contact">
            <p>Need to reach us in the meantime?</p>
            <a href="mailto:info@opaloasis.com">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                </svg>
                info@opaloasis.com
            </a>
        </div>
    </div>
</body>
</html>
