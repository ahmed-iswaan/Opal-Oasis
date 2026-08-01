<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $room['name'] }} at Opal Oasis Guest House in Gdh. Gadhdhoo, Maldives. View room details, amenities, room numbers, and photos.">
    <title>{{ $room['name'] }} | Opal Oasis</title>
    <link rel="icon" href="{{ asset('assets/images/optimized/logo-gold.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800|playfair-display:600,700" rel="stylesheet">
    <style>
        :root {
            --gold: #c8a45d;
            --gold-dark: #94702d;
            --cream: #f7f2e8;
            --ink: #25272b;
            --muted: #6d7178;
            --white: #fff;
            --serif: "Playfair Display", Georgia, serif;
            --sans: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
            --shadow: 0 22px 60px rgba(37, 39, 43, .13);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; background: #fcfcfa; color: var(--ink); font-family: var(--sans); line-height: 1.65; }
        a { color: inherit; text-decoration: none; }
        img { display: block; max-width: 100%; }
        .container { width: min(1160px, calc(100% - 32px)); margin-inline: auto; }

        .site-header {
            position: sticky;
            z-index: 20;
            top: 0;
            border-bottom: 1px solid rgba(200, 164, 93, .18);
            background: rgba(20, 22, 25, .94);
            backdrop-filter: blur(18px);
        }
        .nav { display: flex; min-height: 76px; align-items: center; justify-content: space-between; gap: 24px; }
        .brand img { width: 118px; height: 52px; object-fit: contain; }
        .nav-links { display: flex; align-items: center; gap: 28px; color: rgba(255, 255, 255, .82); font-size: .92rem; font-weight: 700; }
        .nav-links a:hover { color: var(--gold); }
        .nav-book, .button {
            display: inline-flex;
            min-height: 46px;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 11px 20px;
            font-weight: 800;
            transition: transform .2s ease, background .2s ease;
        }
        .nav-book, .button-primary { background: var(--gold); color: #17191d; }
        .button-dark { background: var(--ink); color: var(--white); }
        .button:hover, .nav-book:hover { transform: translateY(-2px); }

        .hero {
            position: relative;
            display: grid;
            min-height: min(690px, 78vh);
            align-items: end;
            overflow: hidden;
            background:
                linear-gradient(90deg, rgba(14, 16, 19, .88) 0%, rgba(14, 16, 19, .52) 50%, rgba(14, 16, 19, .16) 100%),
                url("{{ asset('assets/Rooms and Outdoors/'.$room['folder'].'/'.$room['images'][0]) }}") center / cover;
        }
        .hero-content { width: min(720px, 100%); padding: clamp(70px, 10vw, 126px) 0 80px; color: var(--white); }
        .breadcrumb { display: flex; flex-wrap: wrap; gap: 9px; margin-bottom: 22px; color: rgba(255,255,255,.7); font-size: .88rem; font-weight: 700; }
        .breadcrumb a:hover { color: var(--gold); }
        .eyebrow { color: var(--gold); font-size: .78rem; font-weight: 800; letter-spacing: .16em; text-transform: uppercase; }
        h1, h2, h3, p { margin-top: 0; }
        h1 { max-width: 680px; margin: 12px 0 18px; font-family: var(--serif); font-size: clamp(3rem, 7vw, 6.3rem); line-height: .98; }
        .hero-summary { max-width: 650px; margin-bottom: 28px; color: rgba(255,255,255,.84); font-size: clamp(1.05rem, 2vw, 1.25rem); }
        .hero-actions { display: flex; flex-wrap: wrap; gap: 12px; }

        .facts-wrap { position: relative; z-index: 2; margin-top: -34px; }
        .facts {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            overflow: hidden;
            border: 1px solid rgba(200, 164, 93, .23);
            border-radius: 22px;
            background: var(--white);
            box-shadow: var(--shadow);
        }
        .fact { padding: 24px 28px; border-right: 1px solid rgba(37,39,43,.08); }
        .fact:last-child { border-right: 0; }
        .fact span { display: block; color: var(--muted); font-size: .78rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }
        .fact strong { display: block; margin-top: 5px; font-family: var(--serif); font-size: 1.22rem; }

        .section { padding: clamp(72px, 9vw, 112px) 0; }
        .section.alt { background: var(--cream); }
        .details-grid { display: grid; grid-template-columns: minmax(0, 1.15fr) minmax(320px, .85fr); gap: clamp(44px, 7vw, 90px); align-items: start; }
        .section h2 { margin: 10px 0 20px; font-family: var(--serif); font-size: clamp(2.35rem, 5vw, 4rem); line-height: 1.06; }
        .lead { color: var(--muted); font-size: 1.08rem; }
        .highlights { display: grid; gap: 12px; margin: 28px 0 0; padding: 0; list-style: none; }
        .highlights li, .amenity {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .check {
            display: grid;
            width: 28px;
            height: 28px;
            flex: 0 0 28px;
            place-items: center;
            border-radius: 50%;
            background: rgba(200,164,93,.18);
            color: var(--gold-dark);
            font-weight: 900;
        }
        .room-number-card { border-radius: 24px; padding: 30px; background: var(--ink); color: var(--white); box-shadow: var(--shadow); }
        .room-number-card h3 { margin-bottom: 6px; font-family: var(--serif); font-size: 1.8rem; }
        .room-number-card p { color: rgba(255,255,255,.64); }
        .room-numbers { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 22px; }
        .room-number { display: grid; min-width: 68px; min-height: 56px; place-items: center; border: 1px solid rgba(200,164,93,.42); border-radius: 14px; background: rgba(200,164,93,.12); color: var(--gold); font-size: 1.12rem; font-weight: 800; }

        .section-heading { max-width: 720px; margin-bottom: 44px; }
        .amenities-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
        .amenity { min-height: 78px; border: 1px solid rgba(37,39,43,.08); border-radius: 16px; padding: 16px 18px; background: var(--white); font-weight: 700; }

        .gallery-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
        .photo { position: relative; overflow: hidden; min-height: 310px; border-radius: 18px; background: #ddd; box-shadow: 0 12px 34px rgba(37,39,43,.11); }
        .photo:first-child { grid-column: span 2; grid-row: span 2; min-height: 636px; }
        .photo img { width: 100%; height: 100%; object-fit: cover; transition: transform .35s ease; }
        .photo:hover img { transform: scale(1.035); }
        .photo span { position: absolute; right: 12px; bottom: 12px; border-radius: 999px; padding: 6px 11px; background: rgba(18,20,23,.72); color: #fff; font-size: .78rem; font-weight: 700; backdrop-filter: blur(8px); }

        .other-rooms { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
        .other-room { overflow: hidden; border: 1px solid rgba(37,39,43,.08); border-radius: 19px; background: #fff; box-shadow: 0 12px 34px rgba(37,39,43,.08); transition: transform .2s ease; }
        .other-room:hover { transform: translateY(-5px); }
        .other-room img { width: 100%; height: 205px; object-fit: cover; }
        .other-room div { padding: 20px; }
        .other-room h3 { margin-bottom: 6px; font-family: var(--serif); font-size: 1.3rem; }
        .other-room p { margin: 0; color: var(--muted); font-size: .9rem; }

        .cta { padding: 72px 0; background: #17191d; color: #fff; }
        .cta-inner { display: flex; align-items: center; justify-content: space-between; gap: 28px; }
        .cta h2 { margin-bottom: 8px; font-size: clamp(2rem, 4vw, 3.4rem); }
        .cta p { margin: 0; color: rgba(255,255,255,.65); }
        footer { padding: 30px 0; background: #0f1114; color: rgba(255,255,255,.58); font-size: .88rem; }
        .footer-inner { display: flex; justify-content: space-between; gap: 18px; }

        @media (max-width: 820px) {
            .nav-links { display: none; }
            .facts, .details-grid { grid-template-columns: 1fr; }
            .fact { border-right: 0; border-bottom: 1px solid rgba(37,39,43,.08); }
            .fact:last-child { border-bottom: 0; }
            .amenities-grid { grid-template-columns: repeat(2, 1fr); }
            .gallery-grid { grid-template-columns: repeat(2, 1fr); }
            .photo:first-child { min-height: 520px; }
            .other-rooms { grid-template-columns: 1fr; }
            .cta-inner { align-items: flex-start; flex-direction: column; }
        }
        @media (max-width: 560px) {
            .nav-book { padding-inline: 15px; }
            .brand img { width: 98px; }
            .hero { min-height: 650px; }
            .facts-wrap { margin-top: -18px; }
            .amenities-grid, .gallery-grid { grid-template-columns: 1fr; }
            .photo, .photo:first-child { grid-column: auto; grid-row: auto; min-height: 420px; }
            .footer-inner { flex-direction: column; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <nav class="container nav" aria-label="Room page navigation">
            <a class="brand" href="{{ route('home') }}" aria-label="Opal Oasis home">
                <img src="{{ asset('assets/images/optimized/logo-nav.png') }}" alt="Opal Oasis Guest House">
            </a>
            <div class="nav-links">
                <a href="{{ route('home') }}#rooms">All Rooms</a>
                <a href="#amenities">Amenities</a>
                <a href="#photos">Photos</a>
            </div>
            <a class="nav-book" href="{{ route('home', ['room' => $room['slug']]) }}#booking">Book This Room</a>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-content">
                <div class="breadcrumb"><a href="{{ route('home') }}">Home</a><span>/</span><a href="{{ route('home') }}#rooms">Rooms</a><span>/</span><span>{{ $room['name'] }}</span></div>
                <span class="eyebrow">Opal Oasis Room Category</span>
                <h1>{{ $room['name'] }}</h1>
                <p class="hero-summary">{{ $room['summary'] }}</p>
                <div class="hero-actions">
                    <a class="button button-primary" href="{{ route('home', ['room' => $room['slug']]) }}#booking">Request This Room</a>
                    <a class="button button-dark" href="#photos">View All Photos</a>
                </div>
            </div>
        </section>

        <div class="container facts-wrap">
            <div class="facts">
                <div class="fact"><span>Category</span><strong>{{ $room['name'] }}</strong></div>
                <div class="fact"><span>Room numbers</span><strong>{{ implode(', ', $room['room_numbers']) }}</strong></div>
                <div class="fact"><span>Photo collection</span><strong>{{ count($room['images']) }} room photos</strong></div>
            </div>
        </div>

        <section class="section">
            <div class="container details-grid">
                <div>
                    <span class="eyebrow">About This Room</span>
                    <h2>Comfort made for island living.</h2>
                    <p class="lead">{{ $room['description'] }}</p>
                    <ul class="highlights">
                        @foreach ($room['highlights'] as $highlight)
                            <li><span class="check">✓</span><strong>{{ $highlight }}</strong></li>
                        @endforeach
                    </ul>
                </div>
                <aside class="room-number-card">
                    <span class="eyebrow">Available In This Category</span>
                    <h3>Room numbers</h3>
                    <p>When requesting this category, availability will be confirmed for one of the rooms below.</p>
                    <div class="room-numbers">
                        @foreach ($room['room_numbers'] as $number)
                            <span class="room-number">{{ $number }}</span>
                        @endforeach
                    </div>
                </aside>
            </div>
        </section>

        <section class="section alt" id="amenities">
            <div class="container">
                <div class="section-heading">
                    <span class="eyebrow">Room Amenities</span>
                    <h2>Everything for a comfortable stay.</h2>
                </div>
                <div class="amenities-grid">
                    @foreach ($room['amenities'] as $amenity)
                        <div class="amenity"><span class="check">✓</span><span>{{ $amenity }}</span></div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section" id="photos">
            <div class="container">
                <div class="section-heading">
                    <span class="eyebrow">Room Gallery</span>
                    <h2>View the complete {{ $room['name'] }} collection.</h2>
                    <p class="lead">Select any image to open the full-size photograph.</p>
                </div>
                <div class="gallery-grid">
                    @foreach ($room['images'] as $index => $image)
                        <a class="photo" href="{{ asset('assets/Rooms and Outdoors/'.$room['folder'].'/'.$image) }}" target="_blank" rel="noopener">
                            <img src="{{ asset('assets/Rooms and Outdoors/'.$room['folder'].'/'.$image) }}" alt="{{ $room['name'] }} photo {{ $index + 1 }}" loading="{{ $loop->first ? 'eager' : 'lazy' }}" decoding="async">
                            <span>Photo {{ $index + 1 }} / {{ count($room['images']) }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        @php($otherRooms = collect(config('rooms'))->except($room['slug']))
        <section class="section alt">
            <div class="container">
                <div class="section-heading">
                    <span class="eyebrow">Other Categories</span>
                    <h2>Explore our other rooms.</h2>
                </div>
                <div class="other-rooms">
                    @foreach ($otherRooms as $otherRoom)
                        <a class="other-room" href="{{ route('rooms.show', $otherRoom['slug']) }}">
                            <img src="{{ asset('assets/Rooms and Outdoors/'.$otherRoom['folder'].'/'.$otherRoom['images'][0]) }}" alt="{{ $otherRoom['name'] }}" loading="lazy" decoding="async">
                            <div><h3>{{ $otherRoom['name'] }}</h3><p>Rooms {{ implode(', ', $otherRoom['room_numbers']) }} · View details</p></div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="container cta-inner">
                <div><span class="eyebrow">Plan Your Stay</span><h2>Interested in the {{ $room['name'] }}?</h2><p>Send your preferred dates and we will confirm availability.</p></div>
                <a class="button button-primary" href="{{ route('home', ['room' => $room['slug']]) }}#booking">Request This Room</a>
            </div>
        </section>
    </main>

    <footer><div class="container footer-inner"><span>&copy; {{ date('Y') }} Opal Oasis Guest House</span><span>Gdh. Gadhdhoo, Maldives</span></div></footer>
</body>
</html>
