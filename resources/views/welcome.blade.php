<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Opal Oasis Guest House is a peaceful, premium island retreat in Gdh. Gadhdhoo, Maldives with rooms, surfing, snorkeling, fishing, sandbank trips, and authentic Maldivian culture.">
    <meta name="keywords" content="Opal Oasis, guest house Gadhdhoo, Maldives guest house, Tiger Stripes surf, Gadhdhoo Kunaa, Maldives rooms">
    <meta name="author" content="Opal Oasis Guest House">

    <title>Opal Oasis | Gdh. Gadhdhoo, Maldives</title>

    <link rel="icon" href="{{ asset('assets/images/optimized/logo-gold.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/optimized/logo-gold.png') }}">
    <link rel="preload" as="image" href="{{ asset('assets/images/optimized/hero-guest-house.jpg') }}" fetchpriority="high">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://images.unsplash.com">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|playfair-display:600,700" rel="stylesheet">

    <style>
        :root {
            --gold: #c8a45d;
            --gold-dark: #9f7b35;
            --gold-soft: #f4ead2;
            --charcoal: #25272b;
            --gray: #6d7178;
            --gray-soft: #f4f4f2;
            --white: #ffffff;
            --shadow: 0 22px 60px rgba(37, 39, 43, .12);
            --radius: 22px;
            --serif: "Playfair Display", Georgia, serif;
            --sans: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            color: var(--charcoal);
            background: #fbfaf7;
            font-family: var(--sans);
            line-height: 1.65;
        }

        body.menu-open,
        body.modal-open {
            overflow: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 50;
            padding: 10px 0;
            background: transparent;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: min(1320px, calc(100% - 24px));
            min-height: 92px;
            margin: 0 auto;
            border: 1px solid rgba(200, 164, 93, .22);
            border-radius: 28px;
            padding: 10px 18px 10px 26px;
            background: rgba(37, 39, 43, .86);
            box-shadow: 0 24px 70px rgba(17, 18, 20, .3), inset 0 1px 0 rgba(255, 255, 255, .08);
            backdrop-filter: blur(18px);
            gap: 22px;
        }

        .brand {
            display: flex;
            align-items: center;
            flex: 0 0 auto;
        }

        .brand-logo {
            width: 168px;
            height: 72px;
            object-fit: contain;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
            color: rgba(255, 255, 255, .88);
            font-size: .94rem;
            font-weight: 600;
        }

        .nav-links a {
            transition: color .2s ease;
        }

        .nav-links a:hover {
            color: var(--gold-soft);
        }

        .nav-links a:first-child {
            color: var(--gold);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 18px;
            color: var(--white);
        }

        .phone-link {
            color: var(--gold-soft);
            font-weight: 800;
            text-decoration: underline;
            text-underline-offset: 4px;
            white-space: nowrap;
        }

        .nav-book {
            display: inline-flex;
            min-height: 52px;
            align-items: center;
            gap: 12px;
            border-radius: 999px;
            padding: 10px 10px 10px 24px;
            background: var(--gold);
            color: #17191d;
            font-weight: 800;
            box-shadow: 0 18px 40px rgba(17, 18, 20, .2);
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
        }

        .nav-book:hover {
            background: #d8b86d;
            box-shadow: 0 22px 44px rgba(17, 18, 20, .24);
            transform: translateY(-2px);
        }

        .nav-arrow {
            display: grid;
            width: 34px;
            height: 34px;
            place-items: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, .86);
            color: #17191d;
            transition: transform .2s ease, background .2s ease;
        }

        .nav-book:hover .nav-arrow {
            background: var(--white);
            transform: translateX(2px);
        }

        .menu-toggle {
            display: none;
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 999px;
            background: rgba(255, 255, 255, .12);
            color: var(--white);
            cursor: pointer;
        }

        .hero {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            color: var(--white);
            isolation: isolate;
        }

        .hero::before {
            position: absolute;
            inset: 0;
            z-index: -2;
            background:
                linear-gradient(90deg, rgba(28, 30, 33, .72), rgba(28, 30, 33, .36) 52%, rgba(28, 30, 33, .18)),
                url("{{ asset('assets/images/optimized/hero-guest-house.jpg') }}") center / cover;
            content: "";
            transform: scale(1.03);
            animation: heroDrift 18s ease-in-out infinite alternate;
        }

        .hero::after {
            position: absolute;
            inset: auto 0 0;
            z-index: -1;
            height: 170px;
            background: linear-gradient(0deg, #fbfaf7, rgba(251, 250, 247, 0));
            content: "";
        }

        .hero-inner {
            display: grid;
            width: min(1160px, calc(100% - 32px));
            min-height: 100vh;
            margin: 0 auto;
            align-content: center;
            padding: 170px 0 130px;
        }

        .eyebrow {
            display: inline-flex;
            width: fit-content;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            color: var(--gold-soft);
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .eyebrow::before {
            width: 42px;
            height: 1px;
            background: var(--gold);
            content: "";
        }

        .section .eyebrow {
            color: var(--gold-dark);
        }

        .hero .eyebrow,
        .surf-panel .eyebrow,
        .booking-aside .eyebrow {
            color: var(--gold-soft);
        }

        h1,
        h2,
        h3 {
            margin: 0;
            line-height: 1.08;
        }

        h1,
        h2 {
            font-family: var(--serif);
        }

        h1 {
            max-width: 760px;
            font-size: clamp(3.2rem, 8vw, 7.3rem);
            letter-spacing: 0;
        }

        .hero p {
            max-width: 620px;
            margin: 22px 0 34px;
            color: rgba(255, 255, 255, .88);
            font-size: clamp(1.08rem, 2vw, 1.35rem);
        }

        .hero-actions,
        .section-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .button {
            display: inline-flex;
            min-height: 48px;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1px solid transparent;
            border-radius: 999px;
            padding: 12px 22px;
            font-weight: 700;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, border-color .2s ease;
        }

        .button:hover {
            transform: translateY(-2px);
        }

        .button-primary {
            background: var(--gold);
            color: #191919;
            box-shadow: 0 16px 36px rgba(200, 164, 93, .32);
        }

        .button-primary:hover {
            background: #d8b86d;
        }

        .button-primary {
            position: relative;
            overflow: hidden;
        }

        .button-primary::after {
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, .36), transparent);
            content: "";
            transform: translateX(-120%);
            transition: transform .65s ease;
        }

        .button-primary:hover::after {
            transform: translateX(120%);
        }

        .button-secondary {
            border-color: rgba(255, 255, 255, .56);
            background: rgba(255, 255, 255, .12);
            color: var(--white);
        }

        .button-dark {
            border-color: rgba(37, 39, 43, .1);
            background: var(--charcoal);
            color: var(--white);
        }

        .reviews-strip {
            position: relative;
            z-index: 2;
            margin-top: -74px;
        }

        .reviews-panel {
            display: grid;
            grid-template-columns: .72fr 1.28fr;
            gap: 18px;
            border: 1px solid rgba(200, 164, 93, .2);
            border-radius: calc(var(--radius) + 6px);
            padding: 18px;
            background: rgba(255, 255, 255, .9);
            box-shadow: var(--shadow);
            backdrop-filter: blur(18px);
        }

        .reviews-summary,
        .review-card {
            border-radius: 20px;
            padding: 24px;
        }

        .reviews-summary {
            display: grid;
            align-content: center;
            background: linear-gradient(145deg, var(--charcoal), #3f4248);
            color: var(--white);
        }

        .reviews-summary strong {
            color: var(--gold-soft);
            font-family: var(--serif);
            font-size: clamp(2.4rem, 5vw, 4rem);
            line-height: .95;
        }

        .reviews-summary span {
            display: block;
            margin-top: 10px;
            color: rgba(255, 255, 255, .76);
            font-weight: 700;
            line-height: 1.35;
        }

        .reviews-summary .review-stars {
            margin-top: 16px;
            color: var(--gold-soft);
        }

        .reviews-carousel {
            min-width: 0;
            overflow: hidden;
        }

        .reviews-track {
            display: flex;
            transition: transform .65s cubic-bezier(.22, 1, .36, 1);
            will-change: transform;
        }

        .review-card {
            display: grid;
            flex: 0 0 100%;
            gap: 14px;
            border: 1px solid rgba(37, 39, 43, .08);
            background: rgba(255, 255, 255, .94);
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .review-card:hover {
            border-color: rgba(200, 164, 93, .34);
            box-shadow: 0 18px 44px rgba(37, 39, 43, .1);
        }

        .review-stars {
            display: flex;
            gap: 4px;
            color: var(--gold);
        }

        .review-stars span {
            width: 18px;
            height: 18px;
            background: currentColor;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 56%, 79% 91%, 50% 70%, 21% 91%, 32% 56%, 2% 35%, 39% 35%);
        }

        .review-card blockquote {
            margin: 0;
            color: #4f5359;
            font-size: .98rem;
            line-height: 1.65;
        }

        .review-author {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 4px;
        }

        .review-avatar {
            display: grid;
            width: 42px;
            height: 42px;
            flex: 0 0 42px;
            place-items: center;
            border-radius: 50%;
            background: var(--gold-soft);
            color: var(--gold-dark);
            font-size: .84rem;
            font-weight: 700;
            line-height: 1;
        }

        .review-author strong {
            display: block;
            color: var(--charcoal);
            line-height: 1.2;
        }

        .review-author div span {
            display: block;
            color: var(--gray);
            font-size: .84rem;
            line-height: 1.2;
        }

        .review-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-top: 16px;
        }

        .review-nav {
            display: flex;
            gap: 8px;
        }

        .review-nav button {
            display: grid;
            width: 40px;
            height: 40px;
            place-items: center;
            border: 1px solid rgba(37, 39, 43, .1);
            border-radius: 50%;
            background: var(--white);
            color: var(--charcoal);
            cursor: pointer;
            transition: transform .2s ease, background .2s ease, color .2s ease;
        }

        .review-nav button:hover {
            background: var(--gold);
            color: #17191d;
            transform: translateY(-2px);
        }

        .review-dots {
            display: flex;
            gap: 8px;
        }

        .review-dot {
            width: 9px;
            height: 9px;
            border: 0;
            border-radius: 999px;
            background: rgba(37, 39, 43, .18);
            cursor: pointer;
            padding: 0;
            transition: width .2s ease, background .2s ease;
        }

        .review-dot.active {
            width: 28px;
            background: var(--gold);
        }

        .section {
            padding: 96px 0;
        }

        .section.alt {
            background: var(--gray-soft);
        }

        .container {
            width: min(1160px, calc(100% - 32px));
            margin: 0 auto;
        }

        .section-heading {
            display: grid;
            max-width: 760px;
            gap: 16px;
            margin-bottom: 38px;
        }

        .section-heading.center {
            margin-right: auto;
            margin-left: auto;
            text-align: center;
        }

        .section-heading h2 {
            color: #24262a;
            font-size: clamp(2.2rem, 4vw, 4rem);
        }

        .section-heading p,
        .text-block p {
            margin: 0;
            color: var(--gray);
            font-size: 1.05rem;
        }

        .split {
            display: grid;
            grid-template-columns: minmax(0, 1.03fr) minmax(320px, .97fr);
            align-items: center;
            gap: 46px;
        }

        .feature-image {
            position: relative;
            overflow: hidden;
            min-height: 520px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            animation: softFloat 7s ease-in-out infinite;
        }

        .feature-image img {
            width: 100%;
            height: 100%;
            min-height: inherit;
            object-fit: cover;
        }

        .floating-note {
            position: absolute;
            right: 22px;
            bottom: 22px;
            max-width: 270px;
            border: 1px solid rgba(255, 255, 255, .34);
            border-radius: 18px;
            padding: 18px;
            background: rgba(255, 255, 255, .88);
            box-shadow: 0 18px 45px rgba(37, 39, 43, .16);
            backdrop-filter: blur(12px);
        }

        .floating-note strong {
            display: block;
            color: var(--gold-dark);
            font-family: var(--serif);
            font-size: 1.25rem;
            line-height: 1.15;
        }

        .floating-note span {
            display: block;
            margin-top: 6px;
            color: #585d64;
            font-size: .92rem;
        }

        .surf-panel {
            position: relative;
            overflow: hidden;
            border-radius: calc(var(--radius) + 8px);
            background:
                linear-gradient(90deg, rgba(37, 39, 43, .84), rgba(37, 39, 43, .45)),
                url("https://images.unsplash.com/photo-1502680390469-be75c86b636f?auto=format&fit=crop&w=1800&q=85") center / cover;
            color: var(--white);
            box-shadow: var(--shadow);
        }

        .surf-panel::after {
            position: absolute;
            right: -16%;
            bottom: -42%;
            width: 58%;
            aspect-ratio: 1;
            border: 1px solid rgba(244, 234, 210, .2);
            border-radius: 50%;
            background: radial-gradient(circle, rgba(244, 234, 210, .2), rgba(244, 234, 210, 0) 68%);
            content: "";
            animation: pulseGlow 5s ease-in-out infinite;
        }

        .surf-content {
            max-width: 700px;
            padding: clamp(34px, 7vw, 76px);
        }

        .surf-content h2 {
            font-size: clamp(2.4rem, 5vw, 4.5rem);
        }

        .surf-content p {
            margin: 20px 0 0;
            color: rgba(255, 255, 255, .86);
            font-size: 1.08rem;
        }

        .grid {
            display: grid;
            gap: 24px;
        }

        .rooms-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 22px;
        }

        .activity-card,
        .why-card {
            border: 1px solid rgba(37, 39, 43, .08);
            border-radius: var(--radius);
            background: var(--white);
            box-shadow: 0 18px 50px rgba(37, 39, 43, .08);
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .activity-card:hover,
        .why-card:hover {
            border-color: rgba(200, 164, 93, .38);
            box-shadow: 0 24px 60px rgba(37, 39, 43, .12);
            transform: translateY(-6px);
        }

        .room-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(200, 164, 93, .16);
            border-radius: calc(var(--radius) + 4px);
            background: var(--white);
            box-shadow: 0 20px 54px rgba(37, 39, 43, .09);
            transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
        }

        .room-card:hover {
            border-color: rgba(200, 164, 93, .48);
            box-shadow: 0 30px 70px rgba(37, 39, 43, .14);
            transform: translateY(-8px);
        }

        .room-image {
            position: relative;
            overflow: hidden;
            height: 225px;
            background: #dedbd3;
        }

        .room-image::after {
            position: absolute;
            inset: auto 0 0;
            height: 45%;
            background: linear-gradient(0deg, rgba(17, 18, 20, .55), rgba(17, 18, 20, 0));
            content: "";
        }

        .room-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .room-card:hover .room-image img {
            transform: scale(1.05);
        }

        .room-body {
            display: grid;
            gap: 14px;
            padding: 20px 22px 22px;
        }

        .room-body h3 {
            color: #23262b;
            font-family: var(--serif);
            font-size: 1.28rem;
            line-height: 1.12;
        }

        .room-body p {
            margin: 0;
            color: var(--gray);
            font-size: .98rem;
        }

        .room-features {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-self: start;
        }

        .pill {
            display: inline-flex;
            min-height: 30px;
            align-items: center;
            border: 1px solid rgba(200, 164, 93, .28);
            border-radius: 999px;
            padding: 5px 10px;
            background: rgba(244, 234, 210, .62);
            color: #6f5b2f;
            font-size: .8rem;
            font-weight: 700;
        }

        .room-link {
            display: inline-flex;
            min-height: 40px;
            align-items: center;
            justify-content: center;
            align-self: end;
            border-radius: 999px;
            padding: 9px 16px;
            background: #25272b;
            color: var(--white);
            border: 0;
            cursor: pointer;
            font: inherit;
            font-weight: 800;
            transition: background .2s ease, transform .2s ease;
        }

        .room-link:hover {
            background: var(--gold);
            color: #17191d;
            transform: translateY(-2px);
        }

        .room-modal {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: grid;
            place-items: center;
            padding: 22px;
            background: rgba(17, 18, 20, .62);
            opacity: 0;
            pointer-events: none;
            transition: opacity .22s ease;
        }

        .room-modal.open {
            opacity: 1;
            pointer-events: auto;
        }

        .room-modal-card {
            position: relative;
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(320px, .85fr);
            overflow: hidden;
            width: min(980px, 100%);
            max-height: min(760px, calc(100vh - 44px));
            border: 1px solid rgba(200, 164, 93, .28);
            border-radius: calc(var(--radius) + 8px);
            background: var(--white);
            box-shadow: 0 30px 90px rgba(17, 18, 20, .32);
            transform: translateY(18px) scale(.98);
            transition: transform .22s ease;
        }

        .room-modal.open .room-modal-card {
            transform: translateY(0) scale(1);
        }

        .room-modal-image {
            min-height: 520px;
            background: #dedbd3;
        }

        .room-modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .room-modal-content {
            display: grid;
            align-content: center;
            gap: 18px;
            padding: clamp(26px, 4vw, 42px);
            overflow-y: auto;
        }

        .room-modal-content h3 {
            color: #23262b;
            font-family: var(--serif);
            font-size: clamp(2rem, 4vw, 3rem);
            line-height: 1.05;
        }

        .room-modal-content p {
            margin: 0;
            color: var(--gray);
        }

        .room-modal-list {
            display: grid;
            gap: 10px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .room-modal-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #4f5359;
            font-weight: 700;
        }

        .room-modal-list li::before {
            display: inline-block;
            width: 9px;
            height: 9px;
            flex: 0 0 9px;
            border-radius: 50%;
            background: var(--gold);
            content: "";
        }

        .room-modal-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 4px;
        }

        .room-modal-close {
            position: absolute;
            top: 16px;
            right: 16px;
            z-index: 2;
            display: grid;
            width: 42px;
            height: 42px;
            place-items: center;
            border: 1px solid rgba(37, 39, 43, .1);
            border-radius: 50%;
            background: rgba(255, 255, 255, .9);
            color: var(--charcoal);
            cursor: pointer;
        }

        .activities-grid,
        .why-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .activity-card,
        .why-card {
            padding: 26px;
        }

        .icon {
            display: inline-grid;
            width: 48px;
            height: 48px;
            place-items: center;
            margin-bottom: 20px;
            border-radius: 16px;
            background: linear-gradient(145deg, #f8f1df, #ffffff);
            color: var(--gold-dark);
            box-shadow: inset 0 0 0 1px rgba(200, 164, 93, .22);
        }

        .icon svg {
            width: 24px;
            height: 24px;
        }

        .activity-card h3,
        .why-card h3 {
            margin-bottom: 8px;
            font-size: 1.1rem;
        }

        .activity-card p,
        .why-card p {
            margin: 0;
            color: var(--gray);
            font-size: .96rem;
        }

        .gallery {
            display: flex;
            gap: 18px;
            overflow-x: auto;
            overflow-y: hidden;
            margin-inline: calc((100vw - min(1160px, 100vw - 32px)) / -2);
            padding: 32px max(16px, calc((100vw - 1160px) / 2)) 42px;
            border-radius: calc(var(--radius) + 10px);
            background:
                radial-gradient(circle at 18% 0%, rgba(200, 164, 93, .16), transparent 32%),
                linear-gradient(145deg, #17191d, #0f1115);
            box-shadow: inset 0 0 0 1px rgba(200, 164, 93, .14), var(--shadow);
            scroll-behavior: smooth;
            scroll-padding-inline: max(16px, calc((100vw - 1160px) / 2));
            scroll-snap-type: x mandatory;
            scrollbar-width: thin;
            scrollbar-color: var(--gold) rgba(255, 255, 255, .12);
        }

        .gallery::-webkit-scrollbar {
            height: 10px;
        }

        .gallery::-webkit-scrollbar-track {
            border-radius: 999px;
            background: rgba(255, 255, 255, .12);
        }

        .gallery::-webkit-scrollbar-thumb {
            border-radius: 999px;
            background: var(--gold);
        }

        .gallery-controls {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: -12px 0 20px;
        }

        .gallery-control {
            display: grid;
            width: 44px;
            height: 44px;
            place-items: center;
            border: 1px solid rgba(37, 39, 43, .1);
            border-radius: 50%;
            background: var(--white);
            color: var(--charcoal);
            cursor: pointer;
            transition: transform .2s ease, background .2s ease, color .2s ease, border-color .2s ease;
        }

        .gallery-control:hover {
            border-color: rgba(200, 164, 93, .48);
            background: var(--gold);
            color: #17191d;
            transform: translateY(-2px);
        }

        .gallery-filters {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin: -8px 0 30px;
        }

        .gallery-filter {
            min-height: 42px;
            border: 1px solid rgba(37, 39, 43, .1);
            border-radius: 999px;
            padding: 9px 16px;
            background: var(--white);
            color: #4f5359;
            cursor: pointer;
            font: inherit;
            font-size: .9rem;
            font-weight: 800;
            transition: transform .2s ease, background .2s ease, border-color .2s ease, color .2s ease, box-shadow .2s ease;
        }

        .gallery-filter:hover,
        .gallery-filter.active {
            border-color: rgba(200, 164, 93, .48);
            background: var(--gold);
            color: #17191d;
            box-shadow: 0 14px 30px rgba(200, 164, 93, .24);
            transform: translateY(-2px);
        }

        .gallery-item {
            position: relative;
            flex: 0 0 clamp(280px, 38vw, 520px);
            overflow: hidden;
            height: clamp(320px, 42vw, 460px);
            border: 1px solid rgba(200, 164, 93, .18);
            border-radius: 18px;
            background: #2c2f35;
            box-shadow: 0 24px 54px rgba(0, 0, 0, .32);
            scroll-snap-align: center;
            transition: transform .28s ease, filter .28s ease, border-color .25s ease, box-shadow .25s ease;
        }

        .gallery-item.hidden {
            display: none;
        }

        .gallery-item.large {
            grid-row: auto;
        }

        .gallery-item.wide {
            grid-column: auto;
        }

        .gallery-item.is-featured {
            border-color: rgba(200, 164, 93, .58);
        }

        .gallery-item:hover {
            border-color: rgba(200, 164, 93, .72);
            box-shadow: 0 30px 70px rgba(0, 0, 0, .42);
            transform: translateY(-6px);
        }

        .gallery-item::after {
            position: absolute;
            inset: auto 0 0;
            height: 48%;
            background: linear-gradient(0deg, rgba(17, 18, 20, .68), rgba(17, 18, 20, 0));
            content: "";
            pointer-events: none;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
            transition: transform .45s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.06);
        }

        .gallery-caption {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
            display: grid;
            gap: 3px;
            padding: 18px;
            background: transparent;
            color: var(--white);
            font-size: 1rem;
            font-weight: 800;
            text-shadow: 0 2px 14px rgba(0, 0, 0, .28);
        }

        .gallery-caption span {
            color: var(--gold-soft);
            font-size: .72rem;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .presentation-card {
            display: grid;
            grid-template-columns: .75fr 1.25fr;
            gap: 24px;
            align-items: center;
            margin-top: 36px;
            border: 1px solid rgba(200, 164, 93, .2);
            border-radius: var(--radius);
            padding: 22px;
            background: linear-gradient(135deg, rgba(244, 234, 210, .7), rgba(255, 255, 255, .92));
            box-shadow: 0 18px 48px rgba(37, 39, 43, .08);
        }

        .presentation-card strong {
            color: var(--gold-dark);
            font-family: var(--serif);
            font-size: clamp(1.45rem, 3vw, 2.15rem);
            line-height: 1.12;
        }

        .presentation-card p {
            margin: 0;
            color: var(--gray);
        }

        .booking {
            display: grid;
            grid-template-columns: .82fr 1.18fr;
            overflow: hidden;
            border-radius: calc(var(--radius) + 8px);
            background: var(--white);
            box-shadow: var(--shadow);
        }

        .booking-aside {
            display: grid;
            align-content: end;
            min-height: 620px;
            padding: 36px;
            background:
                linear-gradient(180deg, rgba(37, 39, 43, .08), rgba(37, 39, 43, .72)),
                url("https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1400&q=85") center / cover;
            color: var(--white);
        }

        .booking-aside h2 {
            font-size: clamp(2.15rem, 4vw, 3.6rem);
        }

        .booking-aside p {
            margin: 16px 0 0;
            color: rgba(255, 255, 255, .86);
        }

        .booking-form {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            padding: clamp(26px, 5vw, 42px);
        }

        .field {
            display: grid;
            gap: 8px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            color: #4c5057;
            font-size: .86rem;
            font-weight: 800;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid rgba(37, 39, 43, .12);
            border-radius: 14px;
            background: #fbfaf7;
            color: var(--charcoal);
            font: inherit;
            padding: 13px 14px;
            outline: none;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        textarea {
            min-height: 128px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--gold);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(200, 164, 93, .15);
        }

        .form-button {
            grid-column: 1 / -1;
            width: fit-content;
            border: 0;
            cursor: pointer;
        }

        .footer {
            padding: 74px 0 30px;
            background:
                radial-gradient(circle at 12% 0%, rgba(200, 164, 93, .2), transparent 32%),
                linear-gradient(135deg, #202226 0%, #292a2d 54%, #1d1f22 100%);
            color: rgba(255, 255, 255, .72);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: minmax(260px, 1.25fr) .7fr .8fr .75fr;
            gap: clamp(28px, 5vw, 76px);
            align-items: start;
        }

        .footer-brand {
            max-width: 430px;
        }

        .footer h2,
        .footer h3 {
            margin: 0;
            color: var(--white);
        }

        .footer h2 {
            margin-top: 18px;
            font-family: var(--serif);
            font-size: clamp(2rem, 4vw, 2.7rem);
            line-height: 1;
        }

        .footer h3 {
            font-size: 1rem;
            letter-spacing: .02em;
        }

        .footer-logo {
            width: 128px;
            height: auto;
            display: block;
            filter: drop-shadow(0 14px 26px rgba(0, 0, 0, .25));
        }

        .footer p {
            max-width: 430px;
            margin: 12px 0 0;
            line-height: 1.75;
        }

        .footer-location {
            color: var(--gold-soft);
            font-weight: 700;
        }

        .footer-links,
        .footer-contact,
        .social-links {
            display: grid;
            gap: 12px;
            margin-top: 18px;
        }

        .footer-links a,
        .footer-contact a {
            width: fit-content;
            color: rgba(255, 255, 255, .74);
            transition: color .25s ease, transform .25s ease;
        }

        .footer-links a:hover,
        .footer-contact a:hover {
            color: var(--gold-soft);
            transform: translateX(4px);
        }

        .footer-contact span {
            color: rgba(255, 255, 255, .5);
            font-size: .88rem;
        }

        .footer-contact strong {
            display: block;
            color: rgba(255, 255, 255, .88);
            font-size: 1.03rem;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .social-links a {
            display: grid;
            width: 46px;
            height: 46px;
            place-items: center;
            border: 1px solid rgba(255, 255, 255, .14);
            border-radius: 999px;
            background: rgba(255, 255, 255, .04);
            color: var(--gold-soft);
            font-weight: 800;
            transition: transform .25s ease, border-color .25s ease, background .25s ease, color .25s ease;
        }

        .social-links a:hover {
            transform: translateY(-3px);
            border-color: rgba(200, 164, 93, .7);
            background: var(--gold);
            color: #222428;
        }

        .social-links svg {
            width: 19px;
            height: 19px;
        }

        .copyright {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 54px;
            padding-top: 22px;
            border-top: 1px solid rgba(255, 255, 255, .11);
            color: rgba(255, 255, 255, .58);
            font-size: .92rem;
        }

        .scroll-top {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 80;
            display: grid;
            width: 52px;
            height: 52px;
            place-items: center;
            border: 1px solid rgba(255, 255, 255, .28);
            border-radius: 999px;
            background: var(--gold);
            color: #202226;
            box-shadow: 0 18px 40px rgba(37, 39, 43, .24);
            cursor: pointer;
            opacity: 0;
            pointer-events: none;
            transform: translateY(18px) scale(.94);
            transition: opacity .25s ease, transform .25s ease, background .25s ease, color .25s ease;
        }

        .scroll-top.is-visible {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0) scale(1);
        }

        .scroll-top:hover {
            background: #202226;
            color: var(--gold-soft);
            transform: translateY(-3px) scale(1);
        }

        .scroll-top svg {
            width: 22px;
            height: 22px;
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .75s ease, transform .75s ease;
            transition-delay: var(--reveal-delay, 0s);
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-1 {
            --reveal-delay: .1s;
        }

        .delay-2 {
            --reveal-delay: .2s;
        }

        .delay-3 {
            --reveal-delay: .3s;
        }

        @keyframes heroDrift {
            from {
                transform: scale(1.03) translateY(0);
            }

            to {
                transform: scale(1.08) translateY(-12px);
            }
        }

        @keyframes reveal {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes softFloat {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulseGlow {
            0%,
            100% {
                opacity: .45;
                transform: scale(.96);
            }

            50% {
                opacity: .9;
                transform: scale(1.04);
            }
        }

        @media (max-width: 1080px) {
            .nav {
                min-height: 82px;
                padding-inline: 18px;
            }

            .brand-logo {
                width: 144px;
                height: 62px;
            }

            .phone-link {
                display: none;
            }

            .reviews-panel {
                grid-template-columns: 1fr 1fr;
            }

            .rooms-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .activities-grid,
            .why-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 860px) {
            .site-header {
                padding: 8px 0;
            }

            .nav {
                min-height: 72px;
                border-radius: 22px;
            }

            .nav-actions {
                display: none;
            }

            .menu-toggle {
                display: inline-flex;
            }

            .nav-links {
                position: fixed;
                top: 92px;
                right: 12px;
                left: 12px;
                display: none;
                flex-direction: column;
                align-items: stretch;
                gap: 4px;
                border: 1px solid rgba(200, 164, 93, .22);
                border-radius: 18px;
                padding: 14px;
                background: rgba(37, 39, 43, .96);
                box-shadow: var(--shadow);
                backdrop-filter: blur(18px);
            }

            .nav-links.open {
                display: flex;
            }

            .nav-links a {
                padding: 12px;
                border-radius: 12px;
                color: rgba(255, 255, 255, .9);
            }

            .nav-links a:hover {
                background: rgba(255, 255, 255, .1);
            }

            .split,
            .booking,
            .room-modal-card,
            .presentation-card {
                grid-template-columns: 1fr;
            }

            .feature-image,
            .booking-aside {
                min-height: 430px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 34px;
            }

            .copyright {
                flex-direction: column;
                gap: 8px;
            }

            .room-modal-card {
                overflow-y: auto;
            }

            .room-modal-image {
                min-height: 320px;
            }
        }

        @media (max-width: 640px) {
            .nav {
                width: min(100% - 24px, 1160px);
            }

            .brand-logo {
                width: 118px;
                height: 52px;
            }

            .hero-inner {
                width: min(100% - 24px, 1160px);
                padding-top: 140px;
            }

            .section {
                padding: 68px 0;
            }

            .container {
                width: min(100% - 24px, 1160px);
            }

            .hero-actions,
            .section-actions {
                flex-direction: column;
            }

            .reviews-panel {
                grid-template-columns: 1fr;
            }

            .reviews-strip {
                margin-top: -46px;
            }

            .button,
            .form-button,
            .room-modal-actions .button {
                width: 100%;
            }

            .rooms-grid,
            .activities-grid,
            .why-grid,
            .booking-form {
                grid-template-columns: 1fr;
            }

            .gallery {
                min-height: 390px;
                margin-inline: -12px;
                padding-inline: 12px;
            }

            .gallery-item {
                flex-basis: min(82vw, 320px);
                height: 320px;
            }

            .room-body {
                min-height: auto;
            }

            .floating-note {
                right: 14px;
                bottom: 14px;
                left: 14px;
                max-width: none;
            }

            .footer {
                padding-top: 58px;
            }

            .footer-logo {
                width: 112px;
            }

            .scroll-top {
                right: 16px;
                bottom: 16px;
                width: 48px;
                height: 48px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <nav class="nav" aria-label="Primary navigation">
            <a class="brand" href="#home" aria-label="Opal Oasis home">
                <img class="brand-logo" src="{{ asset('assets/images/optimized/logo-nav.png') }}" alt="Opal Oasis Guest House logo" decoding="async" fetchpriority="high">
            </a>

            <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16"></path>
                </svg>
            </button>

            <div class="nav-links" id="navLinks">
                <a href="#home">Home</a>
                <a href="#about">About Us</a>
                <a href="#rooms">Our Rooms</a>
                <a href="#activities">Activities</a>
                <a href="#gallery">Gallery</a>
                <a href="#surfing">Surfing</a>
            </div>

            <div class="nav-actions">
                <a class="phone-link" href="tel:+9609996759">+960 999 6759</a>
                <a class="nav-book" href="#booking">
                    <span>Book Now</span>
                    <span class="nav-arrow" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h13"></path>
                            <path d="m13 6 6 6-6 6"></path>
                        </svg>
                    </span>
                </a>
            </div>
        </nav>
    </header>

    <main id="home">
        <section class="hero" aria-labelledby="hero-title">
            <div class="hero-inner">
                <span class="eyebrow reveal">Gdh. Gadhdhoo, Maldives</span>
                <h1 id="hero-title" class="reveal delay-1">Opal Oasis Guest House</h1>
                <p class="reveal delay-2">A peaceful island retreat in Gadhdhoo, Maldives</p>
                <div class="hero-actions reveal delay-3">
                    <a class="button button-primary" href="#booking">Book Your Stay</a>
                    <a class="button button-secondary" href="#rooms">Explore Rooms</a>
                </div>
            </div>
        </section>

        <section class="reviews-strip" aria-label="Guest reviews">
            <div class="container">
                <div class="reviews-panel reveal">
                    <div class="reviews-summary">
                        <strong>Guest Reviews</strong>
                        <div class="review-stars" aria-label="5 out of 5 stars">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </div>
                        <span>Peaceful island stays, warm service, and memorable Maldives experiences.</span>
                    </div>
                    <div class="reviews-carousel" data-review-carousel>
                        <div class="reviews-track">
                            <article class="review-card">
                                <div class="review-stars" aria-label="5 out of 5 stars">
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                </div>
                                <blockquote>Beautiful, quiet, and welcoming. The rooms felt fresh and comfortable, and the island experience was exactly what we hoped for.</blockquote>
                                <div class="review-author">
                                    <span class="review-avatar">AM</span>
                                    <div>
                                        <strong>Amina M.</strong>
                                        <span>Couple stay</span>
                                    </div>
                                </div>
                            </article>
                            <article class="review-card">
                                <div class="review-stars" aria-label="5 out of 5 stars">
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                </div>
                                <blockquote>A calm guest house with warm hospitality. The team helped us plan snorkeling and a sandbank trip that felt unforgettable.</blockquote>
                                <div class="review-author">
                                    <span class="review-avatar">JR</span>
                                    <div>
                                        <strong>James R.</strong>
                                        <span>Island escape</span>
                                    </div>
                                </div>
                            </article>
                            <article class="review-card">
                                <div class="review-stars" aria-label="5 out of 5 stars">
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                    <span aria-hidden="true"></span>
                                </div>
                                <blockquote>Great location for surfers and travelers who want a real Maldivian island. Peaceful atmosphere, clean rooms, and friendly people.</blockquote>
                                <div class="review-author">
                                    <span class="review-avatar">LK</span>
                                    <div>
                                        <strong>Lena K.</strong>
                                        <span>Surf trip</span>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <div class="review-controls" aria-label="Review carousel controls">
                            <div class="review-dots" aria-label="Choose review">
                                <button class="review-dot active" type="button" aria-label="Show review 1"></button>
                                <button class="review-dot" type="button" aria-label="Show review 2"></button>
                                <button class="review-dot" type="button" aria-label="Show review 3"></button>
                            </div>
                            <div class="review-nav">
                                <button type="button" data-review-prev aria-label="Previous review">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m15 18-6-6 6-6"></path>
                                    </svg>
                                </button>
                                <button type="button" data-review-next aria-label="Next review">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="about" aria-labelledby="about-title">
            <div class="container split">
                <div class="text-block reveal">
                    <span class="eyebrow">About Opal Oasis</span>
                    <div class="section-heading">
                        <h2 id="about-title">Island comfort with authentic southern Maldives culture.</h2>
                    </div>
                    <p>Welcome to Opal Oasis Guest House, a peaceful island retreat located in Gadhdhoo, where authentic Maldivian culture meets the untouched beauty of the southern Maldives.</p>
                    <p style="margin-top: 18px;">Famous for the traditional Gadhdhoo Kunaa handwoven mats, the island offers visitors a unique cultural experience with local craftsmanship, island hospitality, and a glimpse into true Maldivian life. Surrounded by crystal-clear lagoons and vibrant reefs, guests can enjoy snorkeling, fishing, sandbank excursions, and relaxing tropical escapes.</p>
                    <div class="section-actions" style="margin-top: 28px;">
                        <a class="button button-dark" href="#activities">Explore Experiences</a>
                    </div>
            
                </div>

                <div class="feature-image reveal delay-1">
                    <img src="{{ asset('assets/images/optimized/guest-house-entrance.jpg') }}" alt="A peaceful tropical Maldives beach with clear water and palms" loading="lazy" decoding="async">
                    <div class="floating-note">
                        <strong>Peaceful local island atmosphere</strong>
                        <span>Designed for slow mornings, bright lagoons, and warm island hospitality.</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section alt" id="surfing" aria-labelledby="surfing-title">
            <div class="container">
                <article class="surf-panel reveal">
                    <div class="surf-content">
                        <span class="eyebrow">Surfing</span>
                        <h2 id="surfing-title">Surf the Legendary Tiger Stripes</h2>
                        <p>For surf lovers, Gadhdhoo is home to the legendary Tiger Stripes surf break, a world-class left-hand reef break located between Gan and Gadhdhoo. Known for its long, smooth rides, occasional barrels, and uncrowded waves, it offers an unforgettable surfing experience for intermediate and advanced surfers.</p>
                    </div>
                </article>
            </div>
        </section>

        <section class="section" id="rooms" aria-labelledby="rooms-title">
            <div class="container">
                <div class="section-heading center reveal">
                    <span class="eyebrow" style="margin-inline: auto;">Room Categories</span>
                    <h2 id="rooms-title">Elegant rooms for relaxed island living.</h2>
                    <p>Choose a comfortable stay designed for couples, families, surfers, and tropical escape seekers.</p>
                </div>

                <div class="grid rooms-grid">
                    <article class="room-card reveal">
                        <div class="room-image">
                            <img src="{{ asset('assets/images/optimized/room-garden-double.jpg') }}" alt="Garden Double Room at Opal Oasis" loading="lazy" decoding="async">
                        </div>
                        <div class="room-body">
                            <h3>Garden Double Room</h3>
                            <p>Cozy room with garden views.</p>
                            <div class="room-features">
                                <span class="pill">Garden view</span>
                                <span class="pill">Double bed</span>
                                <span class="pill">Calm retreat</span>
                            </div>
                            <button class="room-link" type="button" data-room-info="garden">More Info</button>
                        </div>
                    </article>

                    <article class="room-card reveal delay-1">
                        <div class="room-image">
                            <img src="{{ asset('assets/images/optimized/room-family.jpg') }}" alt="Deluxe Double Room and Family Room at Opal Oasis" loading="lazy" decoding="async">
                        </div>
                        <div class="room-body">
                            <h3>Deluxe Double Room / Family Room</h3>
                            <p>Spacious room with enhanced amenities.</p>
                            <div class="room-features">
                                <span class="pill">Family friendly</span>
                                <span class="pill">Extra space</span>
                                <span class="pill">Enhanced comfort</span>
                            </div>
                            <button class="room-link" type="button" data-room-info="family">More Info</button>
                        </div>
                    </article>

                    <article class="room-card reveal delay-2">
                        <div class="room-image">
                            <img src="{{ asset('assets/images/optimized/room-premium-double.jpg') }}" alt="Premium Double Room at Opal Oasis" loading="lazy" decoding="async">
                        </div>
                        <div class="room-body">
                            <h3>Premium Double Room</h3>
                            <p>Stylish room with upgraded comfort and decor.</p>
                            <div class="room-features">
                                <span class="pill">Premium comfort</span>
                                <span class="pill">Refined decor</span>
                                <span class="pill">Upgraded stay</span>
                            </div>
                            <button class="room-link" type="button" data-room-info="premium">More Info</button>
                        </div>
                    </article>

                    <article class="room-card reveal delay-3">
                        <div class="room-image">
                            <img src="{{ asset('assets/images/optimized/room-signature-double.jpg') }}" alt="Signature Double Room at Opal Oasis" loading="lazy" decoding="async">
                        </div>
                        <div class="room-body">
                            <h3>Signature Double Room</h3>
                            <p>The finest room category with the best features and experience.</p>
                            <div class="room-features">
                                <span class="pill">Best category</span>
                                <span class="pill">Signature stay</span>
                                <span class="pill">Finest experience</span>
                            </div>
                            <button class="room-link" type="button" data-room-info="signature">More Info</button>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="section alt" id="activities" aria-labelledby="activities-title">
            <div class="container">
                <div class="section-heading center reveal">
                    <span class="eyebrow" style="margin-inline: auto;">Activities</span>
                    <h2 id="activities-title">Memorable days on sea, reef, and island.</h2>
                    <p>Build your stay around Gadhdhoo's natural beauty, warm culture, and ocean adventures.</p>
                </div>

                <div class="grid activities-grid">
                    <article class="activity-card reveal">
                        <span class="icon" data-icon="waves"></span>
                        <h3>Snorkeling</h3>
                        <p>Discover clear lagoons, vibrant reef life, and calm tropical water.</p>
                    </article>
                    <article class="activity-card reveal delay-1">
                        <span class="icon" data-icon="fish"></span>
                        <h3>Fishing Trips</h3>
                        <p>Enjoy traditional island fishing experiences with local guidance.</p>
                    </article>
                    <article class="activity-card reveal delay-2">
                        <span class="icon" data-icon="sun"></span>
                        <h3>Sandbank Excursions</h3>
                        <p>Escape to soft white sand, turquoise shallows, and quiet views.</p>
                    </article>
                    <article class="activity-card reveal">
                        <span class="icon" data-icon="surf"></span>
                        <h3>Surfing</h3>
                        <p>Ride uncrowded southern swells near the famous Tiger Stripes break.</p>
                    </article>
                    <article class="activity-card reveal delay-1">
                        <span class="icon" data-icon="island"></span>
                        <h3>Local Island Experience</h3>
                        <p>Walk through everyday island life and meet the hospitality of Gadhdhoo.</p>
                    </article>
                    <article class="activity-card reveal delay-2">
                        <span class="icon" data-icon="weave"></span>
                        <h3>Gadhdhoo Kunaa Cultural Experience</h3>
                        <p>Learn about the island's treasured handwoven mat tradition.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="gallery" aria-labelledby="gallery-title">
            <div class="container">
                <div class="section-heading center reveal">
                    <span class="eyebrow" style="margin-inline: auto;">Gallery</span>
                    <h2 id="gallery-title">A glimpse of Opal Oasis and island life.</h2>
                    <p>Placeholder imagery is ready to be replaced with real rooms, guest house, excursions, and Gadhdhoo moments.</p>
                </div>

                <div class="gallery-filters reveal" aria-label="Gallery filters">
                    <button class="gallery-filter active" type="button" data-gallery-filter="all">All</button>
                    <button class="gallery-filter" type="button" data-gallery-filter="guest-house">Guest House</button>
                    <button class="gallery-filter" type="button" data-gallery-filter="rooms">Rooms</button>
                    <button class="gallery-filter" type="button" data-gallery-filter="ocean">Ocean</button>
                    <button class="gallery-filter" type="button" data-gallery-filter="surfing">Surfing</button>
                    <button class="gallery-filter" type="button" data-gallery-filter="island-life">Island Life</button>
                </div>

                <div class="gallery-controls reveal" aria-label="Gallery scroll controls">
                    <button class="gallery-control" type="button" data-gallery-prev aria-label="Scroll gallery left">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </button>
                    <button class="gallery-control" type="button" data-gallery-next aria-label="Scroll gallery right">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>
                </div>

                <div class="gallery" data-gallery>
                    <figure class="gallery-item reveal" data-gallery-category="guest-house">
                        <img src="{{ asset('assets/images/optimized/guest-house-exterior.jpg') }}" alt="Opal Oasis guest house exterior" loading="lazy" decoding="async">
                        <figcaption class="gallery-caption">Guest House <span>Stay</span></figcaption>
                    </figure>
                    <figure class="gallery-item reveal delay-1" data-gallery-category="guest-house">
                        <img src="{{ asset('assets/images/optimized/guest-house-entrance.jpg') }}" alt="Opal Oasis guest house entrance" style="object-position: center 58%;" loading="lazy" decoding="async">
                        <figcaption class="gallery-caption">Arrival View <span>Guest House</span></figcaption>
                    </figure>
                    <figure class="gallery-item reveal delay-2" data-gallery-category="rooms">
                        <img src="{{ asset('assets/images/optimized/guest-house-detail.jpg') }}" alt="Opal Oasis guest house room detail" style="object-position: center 60%;" loading="lazy" decoding="async">
                        <figcaption class="gallery-caption">Room Detail <span>Rooms</span></figcaption>
                    </figure>
                    <figure class="gallery-item reveal" data-gallery-category="rooms">
                        <img src="https://images.unsplash.com/photo-1578922746465-3a80a228f223?auto=format&fit=crop&w=1000&q=80" alt="Tropical guest house room placeholder" loading="lazy" decoding="async">
                        <figcaption class="gallery-caption">Guest Room <span>Rooms</span></figcaption>
                    </figure>
                    <figure class="gallery-item reveal delay-1" data-gallery-category="ocean">
                        <img src="https://images.unsplash.com/photo-1439066615861-d1af74d74000?auto=format&fit=crop&w=900&q=80" alt="Calm tropical lagoon placeholder" loading="lazy" decoding="async">
                        <figcaption class="gallery-caption">Lagoon Calm <span>Ocean</span></figcaption>
                    </figure>
                    <figure class="gallery-item reveal delay-2" data-gallery-category="surfing">
                        <img src="https://images.unsplash.com/photo-1502680390469-be75c86b636f?auto=format&fit=crop&w=900&q=80" alt="Surfing wave placeholder" loading="lazy" decoding="async">
                        <figcaption class="gallery-caption">Tiger Stripes <span>Surfing</span></figcaption>
                    </figure>
                    <figure class="gallery-item reveal" data-gallery-category="island-life">
                        <img src="https://images.unsplash.com/photo-1528181304800-259b08848526?auto=format&fit=crop&w=1200&q=80" alt="Island life and tropical path placeholder" loading="lazy" decoding="async">
                        <figcaption class="gallery-caption">Island Path <span>Island Life</span></figcaption>
                    </figure>
                    <figure class="gallery-item reveal delay-1" data-gallery-category="ocean">
                        <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?auto=format&fit=crop&w=900&q=80" alt="Ocean excursion placeholder" loading="lazy" decoding="async">
                        <figcaption class="gallery-caption">Excursion Day <span>Ocean</span></figcaption>
                    </figure>
                </div>
            </div>
        </section>

        <section class="section alt" id="why-stay" aria-labelledby="why-title">
            <div class="container">
                <div class="section-heading center reveal">
                    <span class="eyebrow" style="margin-inline: auto;">Why Stay With Us</span>
                    <h2 id="why-title">Everything you need for a premium local island stay.</h2>
                </div>

                <div class="grid why-grid">
                    <article class="why-card reveal">
                        <span class="icon" data-icon="bed"></span>
                        <h3>Comfortable island stay</h3>
                        <p>Clean, welcoming rooms made for relaxing after bright island days.</p>
                    </article>
                    <article class="why-card reveal delay-1">
                        <span class="icon" data-icon="surf"></span>
                        <h3>Near famous surf points</h3>
                        <p>Stay close to southern Maldives surf adventures and Tiger Stripes.</p>
                    </article>
                    <article class="why-card reveal delay-2">
                        <span class="icon" data-icon="weave"></span>
                        <h3>Authentic Maldivian culture</h3>
                        <p>Experience Gadhdhoo Kunaa heritage and true local island rhythm.</p>
                    </article>
                    <article class="why-card reveal">
                        <span class="icon" data-icon="island"></span>
                        <h3>Peaceful local island atmosphere</h3>
                        <p>Enjoy a slower, softer Maldives away from crowded resort paths.</p>
                    </article>
                    <article class="why-card reveal delay-1">
                        <span class="icon" data-icon="heart"></span>
                        <h3>Friendly hospitality</h3>
                        <p>Warm service and helpful local knowledge throughout your stay.</p>
                    </article>
                    <article class="why-card reveal delay-2">
                        <span class="icon" data-icon="map"></span>
                        <h3>Excursions and activities</h3>
                        <p>Plan snorkeling, fishing, sandbank trips, surfing, and culture visits.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="booking" aria-labelledby="booking-title">
            <div class="container">
                <div class="booking reveal">
                    <aside class="booking-aside">
                        <span class="eyebrow">Contact / Booking</span>
                        <h2 id="booking-title">Plan your stay at Opal Oasis.</h2>
                        <p>Send your preferred dates and room category. Contact details and booking integrations can be added later.</p>
                    </aside>

                    <form class="booking-form" onsubmit="event.preventDefault(); alert('Thank you. Your booking request is ready to connect to email or WhatsApp.');">
                        <div class="field">
                            <label for="full_name">Full Name</label>
                            <input id="full_name" name="full_name" type="text" autocomplete="name" required>
                        </div>
                        <div class="field">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" autocomplete="email" required>
                        </div>
                        <div class="field">
                            <label for="phone">Phone / WhatsApp</label>
                            <input id="phone" name="phone" type="tel" autocomplete="tel" required>
                        </div>
                        <div class="field">
                            <label for="room_category">Room Category</label>
                            <select id="room_category" name="room_category" required>
                                <option value="">Select a room</option>
                                <option>Garden Double Room</option>
                                <option>Deluxe Double Room / Family Room</option>
                                <option>Premium Double Room</option>
                                <option>Signature Double Room</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="check_in">Check-in Date</label>
                            <input id="check_in" name="check_in" type="date" required>
                        </div>
                        <div class="field">
                            <label for="check_out">Check-out Date</label>
                            <input id="check_out" name="check_out" type="date" required>
                        </div>
                        <div class="field full">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" placeholder="Tell us about your trip, guests, surf plans, or special requests."></textarea>
                        </div>
                        <button class="button button-primary form-button" type="submit">Submit Booking Request</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <button class="scroll-top" type="button" aria-label="Scroll to top">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M12 19V5"></path>
            <path d="m5 12 7-7 7 7"></path>
        </svg>
    </button>

    <div class="room-modal" id="roomInfoModal" role="dialog" aria-modal="true" aria-labelledby="roomModalTitle" aria-hidden="true">
        <div class="room-modal-card">
            <button class="room-modal-close" type="button" data-room-modal-close aria-label="Close room details">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 6l12 12M18 6 6 18"></path>
                </svg>
            </button>
            <div class="room-modal-image">
                <img id="roomModalImage" src="{{ asset('assets/images/optimized/room-garden-double.jpg') }}" alt="" loading="lazy" decoding="async">
            </div>
            <div class="room-modal-content">
                <span class="eyebrow">Room Details</span>
                <h3 id="roomModalTitle">Garden Double Room</h3>
                <p id="roomModalDescription">Cozy room with garden views.</p>
                <ul class="room-modal-list" id="roomModalFeatures"></ul>
                <div class="room-modal-actions">
                    <button class="button button-primary" type="button" id="roomModalRequest">Request This Room</button>
                    <button class="button button-dark" type="button" data-room-modal-close>Close</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <img class="footer-logo" src="{{ asset('assets/images/optimized/logo-gold.png') }}" alt="Opal Oasis Guest House logo" loading="lazy" decoding="async">
                    <h2>Opal Oasis</h2>
                    <p class="footer-location">Gdh. Gadhdhoo, Maldives</p>
                    <p>A peaceful island retreat for rooms, surfing, culture, and tropical excursions.</p>
                </div>
                <div>
                    <h3>Quick links</h3>
                    <div class="footer-links">
                        <a href="#about">About</a>
                        <a href="#rooms">Rooms</a>
                        <a href="#activities">Activities</a>
                        <a href="#gallery">Gallery</a>
                        <a href="#surfing">Surfing</a>
                        <a href="#booking">Booking</a>
                    </div>
                </div>
                <div>
                    <h3>Contact</h3>
                    <div class="footer-contact">
                        <a href="tel:+9609996759">
                            <span>Phone / WhatsApp</span>
                            <strong>+960 999 6759</strong>
                        </a>
                        <a href="#booking">
                            <span>Reservations</span>
                            <strong>Book your island stay</strong>
                        </a>
                    </div>
                </div>
                <div>
                    <h3>Social media</h3>
                    <div class="social-links" aria-label="Social media links">
                        <a href="#" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <rect x="3.5" y="3.5" width="17" height="17" rx="5"></rect>
                                <circle cx="12" cy="12" r="4"></circle>
                                <circle cx="17.3" cy="6.7" r=".8" fill="currentColor" stroke="none"></circle>
                            </svg>
                        </a>
                        <a href="#" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M14.2 8.1V6.7c0-.7.5-.9 1-.9h2V2.4L14.4 2c-3.1 0-4.7 1.9-4.7 4.5v1.6H6.8v3.8h2.9V22h4.1V11.9h3.1l.5-3.8h-3.2Z"></path>
                            </svg>
                        </a>
                        <a href="#" aria-label="TikTok">
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M16.7 3c.4 2.5 1.8 4 4.1 4.2v3.6a7.6 7.6 0 0 1-4.1-1.3v5.8c0 4-2.6 6.7-6.4 6.7a6.1 6.1 0 0 1-6.1-6.1c0-3.5 2.7-6.1 6.3-6.1.5 0 .9 0 1.3.1v3.7a3.7 3.7 0 0 0-1.4-.3 2.5 2.5 0 1 0 2.4 2.5V3h3.9Z"></path>
                            </svg>
                        </a>
                        <a href="#" aria-label="YouTube">
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M21.6 7.2a3 3 0 0 0-2.1-2.1C17.7 4.6 12 4.6 12 4.6s-5.7 0-7.5.5a3 3 0 0 0-2.1 2.1A31.3 31.3 0 0 0 2 12a31.3 31.3 0 0 0 .4 4.8 3 3 0 0 0 2.1 2.1c1.8.5 7.5.5 7.5.5s5.7 0 7.5-.5a3 3 0 0 0 2.1-2.1A31.3 31.3 0 0 0 22 12a31.3 31.3 0 0 0-.4-4.8ZM10 15.4V8.6l5.8 3.4-5.8 3.4Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <span>Copyright &copy; {{ date('Y') }} Opal Oasis Guest House. All rights reserved.</span>
                <span>Premium island hospitality in Gadhdhoo.</span>
            </div>
        </div>
    </footer>

    <template id="icon-sprite">
        <svg data-type="waves" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 16c2 0 2-2 4-2s2 2 4 2 2-2 4-2 2 2 4 2 2-2 4-2"></path><path d="M3 20c2 0 2-2 4-2s2 2 4 2 2-2 4-2 2 2 4 2 2-2 4-2"></path><path d="M7 10a5 5 0 0 1 10 0"></path></svg>
        <svg data-type="fish" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 12s4-6 10-3c2 .8 4 3 4 3s-2 2.2-4 3c-6 3-10-3-10-3Z"></path><path d="m5 12-3 3v-6l3 3Z"></path><path d="M15 11h.01"></path></svg>
        <svg data-type="sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v3M12 19v3M4.9 4.9 7 7M17 17l2.1 2.1M2 12h3M19 12h3M4.9 19.1 7 17M17 7l2.1-2.1"></path></svg>
        <svg data-type="surf" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 18c3.8-8.5 9.8-12.8 16-13-2.4 2.1-3.4 4.2-2.8 6.3.5 1.8 1.7 3.2 3.8 4.2-4.2.7-7.2-.3-9-3"></path><path d="M3 20c2 0 2-1.5 4-1.5s2 1.5 4 1.5 2-1.5 4-1.5 2 1.5 4 1.5 2-1.5 4-1.5"></path></svg>
        <svg data-type="island" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 20h18"></path><path d="M8 20c1.2-4.8 1.6-9 .8-13"></path><path d="M9 7C7 5 5 5 3 6.5c2.4.1 4.3.7 5.8 2"></path><path d="M9 7c2.6-1.8 5-1.8 7 0-2.8.1-5 .8-6.6 2.2"></path><path d="M10 8c2.2.3 3.8 1.5 5 3.5-2.3-.7-4.1-1.1-5.5-1"></path></svg>
        <svg data-type="weave" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="4" width="16" height="16" rx="2"></rect><path d="M8 4v16M12 4v16M16 4v16M4 8h16M4 12h16M4 16h16"></path></svg>
        <svg data-type="bed" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 11V5"></path><path d="M20 19v-7a3 3 0 0 0-3-3H4v10"></path><path d="M4 15h16"></path><path d="M7 9V7h4v2"></path></svg>
        <svg data-type="heart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.8 8.6c0 5.6-8.8 10.4-8.8 10.4S3.2 14.2 3.2 8.6A4.5 4.5 0 0 1 12 7.1a4.5 4.5 0 0 1 8.8 1.5Z"></path></svg>
        <svg data-type="map" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="m9 18-6 3V6l6-3 6 3 6-3v15l-6 3-6-3Z"></path><path d="M9 3v15M15 6v15"></path></svg>
    </template>

    <script>
        var revealItems = document.querySelectorAll('.reveal');

        if ('IntersectionObserver' in window) {
            var revealObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -60px 0px'
            });

            revealItems.forEach(function (item) {
                revealObserver.observe(item);
            });
        } else {
            revealItems.forEach(function (item) {
                item.classList.add('is-visible');
            });
        }

        var roomDetails = {
            garden: {
                title: 'Garden Double Room',
                category: 'Garden Double Room',
                image: "{{ asset('assets/images/optimized/room-garden-double.jpg') }}",
                description: 'A cozy and peaceful double room designed for relaxed island stays, with a soft garden-side atmosphere and everything needed after a bright day in Gadhdhoo.',
                features: ['Garden-inspired setting', 'Comfortable double bed', 'Ideal for couples', 'Calm and restful design']
            },
            family: {
                title: 'Deluxe Double Room / Family Room',
                category: 'Deluxe Double Room / Family Room',
                image: "{{ asset('assets/images/optimized/room-family.jpg') }}",
                description: 'A spacious room option with enhanced comfort, suited for families or guests who prefer extra room to unwind during their Maldives escape.',
                features: ['Family-friendly layout', 'More space for longer stays', 'Enhanced amenities', 'Comfortable island retreat']
            },
            premium: {
                title: 'Premium Double Room',
                category: 'Premium Double Room',
                image: "{{ asset('assets/images/optimized/room-premium-double.jpg') }}",
                description: 'A stylish double room with upgraded comfort and refined decor, made for guests who want a more elevated guest house experience.',
                features: ['Premium comfort', 'Refined room styling', 'Upgraded stay experience', 'Great for couples and solo travelers']
            },
            signature: {
                title: 'Signature Double Room',
                category: 'Signature Double Room',
                image: "{{ asset('assets/images/optimized/room-signature-double.jpg') }}",
                description: 'The finest Opal Oasis room category, designed for the most comfortable and memorable stay with the best overall room experience.',
                features: ['Signature room category', 'Best overall experience', 'Elegant comfort', 'Ideal for special stays']
            }
        };

        var roomModal = document.getElementById('roomInfoModal');
        var roomModalImage = document.getElementById('roomModalImage');
        var roomModalTitle = document.getElementById('roomModalTitle');
        var roomModalDescription = document.getElementById('roomModalDescription');
        var roomModalFeatures = document.getElementById('roomModalFeatures');
        var roomModalRequest = document.getElementById('roomModalRequest');
        var selectedRoomCategory = '';

        function openRoomModal(roomKey) {
            var details = roomDetails[roomKey];

            if (!details) {
                return;
            }

            selectedRoomCategory = details.category;
            roomModalImage.src = details.image;
            roomModalImage.alt = details.title + ' at Opal Oasis';
            roomModalTitle.textContent = details.title;
            roomModalDescription.textContent = details.description;
            roomModalFeatures.innerHTML = details.features.map(function (feature) {
                return '<li>' + feature + '</li>';
            }).join('');
            roomModal.classList.add('open');
            roomModal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('modal-open');
            roomModalRequest.focus();
        }

        function closeRoomModal() {
            roomModal.classList.remove('open');
            roomModal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('modal-open');
        }

        document.querySelectorAll('[data-room-info]').forEach(function (button) {
            button.addEventListener('click', function () {
                openRoomModal(button.dataset.roomInfo);
            });
        });

        document.querySelectorAll('[data-room-modal-close]').forEach(function (button) {
            button.addEventListener('click', closeRoomModal);
        });

        roomModal.addEventListener('click', function (event) {
            if (event.target === roomModal) {
                closeRoomModal();
            }
        });

        roomModalRequest.addEventListener('click', function () {
            var roomSelect = document.getElementById('room_category');

            if (roomSelect && selectedRoomCategory) {
                roomSelect.value = selectedRoomCategory;
            }

            closeRoomModal();
            document.getElementById('booking').scrollIntoView({ behavior: 'smooth' });
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && roomModal.classList.contains('open')) {
                closeRoomModal();
            }
        });

        document.querySelectorAll('[data-review-carousel]').forEach(function (carousel) {
            var track = carousel.querySelector('.reviews-track');
            var slides = Array.prototype.slice.call(carousel.querySelectorAll('.review-card'));
            var dots = Array.prototype.slice.call(carousel.querySelectorAll('.review-dot'));
            var prevButton = carousel.querySelector('[data-review-prev]');
            var nextButton = carousel.querySelector('[data-review-next]');
            var currentIndex = 0;
            var intervalId = null;
            var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            function showReview(index) {
                currentIndex = (index + slides.length) % slides.length;
                track.style.transform = 'translateX(-' + (currentIndex * 100) + '%)';

                dots.forEach(function (dot, dotIndex) {
                    dot.classList.toggle('active', dotIndex === currentIndex);
                });
            }

            function startAutoSlide() {
                if (reduceMotion || slides.length < 2 || intervalId) {
                    return;
                }

                intervalId = window.setInterval(function () {
                    showReview(currentIndex + 1);
                }, 5200);
            }

            function stopAutoSlide() {
                if (intervalId) {
                    window.clearInterval(intervalId);
                    intervalId = null;
                }
            }

            prevButton.addEventListener('click', function () {
                stopAutoSlide();
                showReview(currentIndex - 1);
                startAutoSlide();
            });

            nextButton.addEventListener('click', function () {
                stopAutoSlide();
                showReview(currentIndex + 1);
                startAutoSlide();
            });

            dots.forEach(function (dot, dotIndex) {
                dot.addEventListener('click', function () {
                    stopAutoSlide();
                    showReview(dotIndex);
                    startAutoSlide();
                });
            });

            carousel.addEventListener('mouseenter', stopAutoSlide);
            carousel.addEventListener('mouseleave', startAutoSlide);
            carousel.addEventListener('focusin', stopAutoSlide);
            carousel.addEventListener('focusout', startAutoSlide);

            showReview(0);
            startAutoSlide();
        });

        document.querySelectorAll('[data-gallery]').forEach(function (gallery) {
            var filterButtons = Array.prototype.slice.call(document.querySelectorAll('[data-gallery-filter]'));
            var galleryItems = Array.prototype.slice.call(gallery.querySelectorAll('[data-gallery-category]'));
            var prevButton = document.querySelector('[data-gallery-prev]');
            var nextButton = document.querySelector('[data-gallery-next]');

            function getVisibleItems() {
                return galleryItems.filter(function (item) {
                    return !item.classList.contains('hidden');
                });
            }

            function setFeatured(item) {
                var visibleItems = getVisibleItems();

                visibleItems.forEach(function (galleryItem) {
                    galleryItem.classList.toggle('is-featured', galleryItem === item);
                });
            }

            setFeatured(getVisibleItems()[0]);

            galleryItems.forEach(function (item) {
                item.addEventListener('click', function () {
                    setFeatured(item);
                    item.scrollIntoView({
                        behavior: 'smooth',
                        inline: 'center',
                        block: 'nearest'
                    });
                });
            });

            function scrollGallery(direction) {
                var visibleItems = getVisibleItems();

                if (!visibleItems.length) {
                    return;
                }

                var card = visibleItems[0];
                var scrollAmount = card.getBoundingClientRect().width + 18;

                gallery.scrollBy({
                    left: direction * scrollAmount,
                    behavior: 'smooth'
                });
            }

            if (prevButton) {
                prevButton.addEventListener('click', function () {
                    scrollGallery(-1);
                });
            }

            if (nextButton) {
                nextButton.addEventListener('click', function () {
                    scrollGallery(1);
                });
            }

            filterButtons.forEach(function (button) {
                button.setAttribute('aria-pressed', button.classList.contains('active') ? 'true' : 'false');

                button.addEventListener('click', function () {
                    var selectedCategory = button.dataset.galleryFilter;
                    var firstVisibleItem = null;

                    filterButtons.forEach(function (filterButton) {
                        var isActive = filterButton === button;
                        filterButton.classList.toggle('active', isActive);
                        filterButton.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                    });

                    galleryItems.forEach(function (item) {
                        var shouldShow = selectedCategory === 'all' || item.dataset.galleryCategory === selectedCategory;
                        item.classList.toggle('hidden', !shouldShow);

                        if (shouldShow && !firstVisibleItem) {
                            firstVisibleItem = item;
                        }
                    });

                    gallery.scrollTo({
                        left: 0,
                        behavior: 'smooth'
                    });
                    setFeatured(firstVisibleItem);
                });
            });
        });

        var iconTemplate = document.getElementById('icon-sprite');

        document.querySelectorAll('.icon[data-icon]').forEach(function (icon) {
            var svg = iconTemplate.content.querySelector('[data-type="' + icon.dataset.icon + '"]');
            if (svg) {
                icon.appendChild(svg.cloneNode(true));
            }
        });

        var menuToggle = document.querySelector('.menu-toggle');
        var navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', function () {
            var isOpen = navLinks.classList.toggle('open');
            document.body.classList.toggle('menu-open', isOpen);
            menuToggle.setAttribute('aria-expanded', String(isOpen));
        });

        navLinks.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navLinks.classList.remove('open');
                document.body.classList.remove('menu-open');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });

        var scrollTopButton = document.querySelector('.scroll-top');

        function toggleScrollTopButton() {
            scrollTopButton.classList.toggle('is-visible', window.scrollY > 520);
        }

        scrollTopButton.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        toggleScrollTopButton();
        window.addEventListener('scroll', toggleScrollTopButton, { passive: true });

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register('/sw.js').catch(function () {});
            });
        }
    </script>
</body>
</html>
