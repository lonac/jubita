<!DOCTYPE html>
<html lang="sw">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>@yield('title', 'JUBITA - Biashara na Uchumi')</title>
		<link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

		<style>
			:root {
				--forbes-black: #000000;
				--forbes-gray: #757575;
				--forbes-light-gray: #f4f4f4;
				--forbes-border: #e0e0e0;
				--forbes-font-serif: 'Merriweather', serif;
				--forbes-font-sans: 'Work Sans', sans-serif;
				--bloomberg-blue: #0000ff;
                --bloomberg-hover: #0000cc;
                --forbes-yellow: #f1d302; /* Sharp Forbes/Bloomberg Yellow */
			}
			
			body { 
                font-family: var(--forbes-font-sans); 
                background-color: #ffffff; 
                color: #000; 
                overflow-x: hidden; 
                -webkit-font-smoothing: antialiased;
                letter-spacing: -0.01em;
            }
			
            h1, h2, h3, h4, h5, h6, .serif { 
                font-family: var(--forbes-font-serif); 
                font-weight: 900; 
                color: var(--forbes-black); 
                line-height: 1.05;
                letter-spacing: -0.03em;
            }

            .meta-info {
                font-family: var(--forbes-font-sans);
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                font-size: 11px;
            }

            /* --- HEADER COLORS (Bloomberg Style) --- */
			.top-bar-minimal { 
                background: var(--forbes-black); 
                color: #fff; 
                padding: 10px 0; 
                font-size: 11px; 
                text-transform: uppercase; 
                letter-spacing: 1.5px; 
                font-weight: 700; 
                text-align: center;
                border-bottom: 1px solid #333;
            }
			
			.header-middle {
                padding: 16px 0;
                border-bottom: 1px solid var(--forbes-border);
                background: #fff;
            }
			.logo-container img { max-height: 42px; display: block; margin: 0 auto; } 
			
			.header-bottom-nav { 
                background: #ffffff; 
                border-bottom: 3px solid var(--forbes-black); /* Thick Forbes-style line */
                position: sticky; 
                top: 0; 
                z-index: 9999;
                box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            }
			
			.nav-ul { display: flex; justify-content: center; list-style: none; margin: 0; padding: 0; }
			.nav-ul > li { position: static; }
			
			.nav-ul > li > a { 
				padding: 20px 20px; 
                display: block; 
                color: var(--forbes-black); 
                font-weight: 900; 
				text-transform: uppercase; 
                font-size: 12px; 
                text-decoration: none; 
				border-bottom: 4px solid transparent; 
                transition: 0.2s;
                letter-spacing: 0.5px;
			}
			
			.nav-ul > li:hover > a { 
                color: var(--bloomberg-blue); 
                border-bottom-color: var(--bloomberg-blue); 
                background: var(--forbes-light-gray);
            }

            .nav-ul > li.active > a {
                border-bottom-color: var(--forbes-black);
            }

			/* --- MEGA MENU PANEL (Compact, Professional) --- */
			.mega-panel {
				position: absolute; top: 100%; left: 0; width: 100%;
				background: #fff;
				border-top: 2px solid var(--bloomberg-blue);
				box-shadow: 0 10px 30px rgba(0,0,0,0.12);
				display: none; z-index: 10000;
			}
			.nav-ul > li:hover .mega-panel { display: block !important; }

			/* Thin accent header bar across the top of each panel */
			.mega-bar {
				background: #111;
				padding: 7px 0;
			}
			.mega-bar-inner {
				max-width: 1200px; margin: 0 auto; padding: 0 20px;
				display: flex; justify-content: space-between; align-items: center;
			}
			.mega-bar-title {
				font-size: 10px; font-weight: 900; text-transform: uppercase;
				letter-spacing: 2px; color: #fff; font-family: var(--forbes-font-sans);
			}
			.mega-bar-link {
				font-size: 9px; font-weight: 900; text-transform: uppercase;
				letter-spacing: 1px; color: var(--forbes-yellow); text-decoration: none;
				transition: 0.15s;
			}
			.mega-bar-link:hover { color: #fff; }

			/* Two-column grid */
			.mega-content {
				max-width: 1200px; margin: 0 auto;
				display: grid; grid-template-columns: 185px 1fr;
				padding: 0 20px;
			}
			.mega-col-left { padding: 14px 20px 14px 0; border-right: 1px solid #ebebeb; }
			.mega-col-right { padding: 14px 0 14px 24px; }

			.mega-title {
				font-size: 9px; text-transform: uppercase; letter-spacing: 1.5px;
				color: #aaa; border-bottom: 1px solid #ebebeb;
				padding-bottom: 5px; margin-bottom: 9px;
				font-weight: 900; font-family: var(--forbes-font-sans);
			}

			/* Sub-list: compact nav links (NOT huge serif titles) */
			.sub-list { list-style: none; padding: 0; margin: 0; }
			.sub-list li { margin-bottom: 0; }
			.sub-list li a {
				color: #222; text-decoration: none;
				font-size: 12px; font-weight: 700;
				font-family: var(--forbes-font-sans);
				display: flex; align-items: center; gap: 7px;
				padding: 5px 0; border-bottom: 1px solid transparent;
				transition: all 0.15s;
			}
			.sub-list li a i { width: 13px; font-size: 9px; opacity: 0.5; flex-shrink: 0; }
			.sub-list li a:hover { color: var(--bloomberg-blue); padding-left: 5px; }
			.sub-list li a:hover i { opacity: 1; }

			/* Featured articles/products grid in right column */
			.menu-articles {
				display: grid; grid-template-columns: 1fr 1fr; gap: 12px;
			}
			.menu-news-item {
				display: flex; gap: 9px; align-items: flex-start; text-decoration: none;
			}
			.menu-news-img {
				width: 70px; height: 50px; background: #eee;
				flex-shrink: 0; background-size: cover; background-position: center;
				border: 1px solid #e8e8e8;
			}
			.menu-news-title {
				font-size: 12px; font-weight: 700; color: #111;
				line-height: 1.35; font-family: var(--forbes-font-serif);
			}
			.menu-news-meta {
				font-size: 9px; color: #999; font-weight: 700;
				margin-top: 3px; text-transform: uppercase; letter-spacing: 0.5px;
			}
			.menu-news-item:hover .menu-news-title { color: var(--bloomberg-blue); }

			/* --- TICKER (High Contrast) --- */
			.ticker-wrap { 
                background: #000; 
                color: #fff; 
                padding: 12px 0; 
                border-bottom: 1px solid #333;
            }
            .ticker-label { 
                background: var(--bloomberg-blue); 
                padding: 2px 8px; 
                font-size: 10px; 
                font-weight: 900; 
                margin-right: 15px; 
            }

			.forbes-card {
                margin-bottom: 8px;
            }
            .forbes-card figure { margin-bottom: 6px !important; }
            .forbes-card h4, .forbes-card h5, .forbes-card h6 {
                margin-bottom: 4px !important;
                line-height: 1.2 !important;
            }
            .forbes-card .meta-info { color: var(--forbes-gray); font-size: 9px; }

            /* --- SECTIONS & BUTTONS --- */
            section { padding: 18px 0; border-bottom: 1px solid var(--forbes-border); }
            .bg-light { background-color: var(--forbes-light-gray) !important; }
            .bg-dark { background-color: var(--forbes-black) !important; }
            
			.cat-header {
                border-bottom: 2px solid var(--forbes-black);
                margin-bottom: 10px;
                padding-bottom: 4px;
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
            }
            .cat-header h2 { font-size: 20px; text-transform: uppercase; font-family: var(--forbes-font-sans); font-weight: 900; margin: 0; letter-spacing: -0.5px; }
            .view-all { font-size: 10px !important; }

            .btn-bloomberg {
                background: var(--bloomberg-blue);
                color: #fff !important;
                border-radius: 0;
                padding: 12px 25px;
                font-weight: 800;
                text-transform: uppercase;
                font-size: 11px;
                letter-spacing: 1px;
                border: none;
                transition: 0.3s;
            }
            .btn-bloomberg:hover { background: var(--bloomberg-hover); transform: translateY(-2px); }

			/* Footer Styles */
			footer { background: #0a0a0a; padding: 0; color: #fff; font-family: var(--forbes-font-sans); }
			.footer-column h4 { font-size: 9px; font-weight: 900; text-transform: uppercase; margin-bottom: 14px; letter-spacing: 2px; color: #aaa; border-bottom: 1px solid #2a2a2a; padding-bottom: 7px; display: block; }
			.footer-links { list-style: none; padding: 0; margin: 0; }
			.footer-links li { margin-bottom: 8px; }
			.footer-links li a { color: #bbb; font-size: 11px; text-decoration: none; font-weight: 600; transition: 0.2s; display: block; }
			.footer-links li a:hover { color: #fff; padding-left: 4px; }
			.footer-social-badge { display: flex; align-items: center; gap: 7px; padding: 8px 10px; border: 1px solid #2a2a2a; text-decoration: none !important; transition: border-color 0.2s, background 0.2s; }
			.footer-social-badge:hover { border-color: #555; background: #111; }
			.footer-social-badge i { font-size: 12px; width: 14px; text-align: center; flex-shrink: 0; }
			.footer-social-badge span { font-size: 10px; font-weight: 700; color: #bbb; font-family: var(--forbes-font-sans); }
			.footer-bottom { padding: 14px 0 20px; }
			.footer-bottom p { font-size: 9px; color: #888; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; margin: 0; }
			.footer-bottom-links-item:hover { color: #fff !important; }

			/* Mobile Responsive Adjustments */
            @media (max-width: 991px) {
                .header-middle { padding: 15px 0; }
                .logo-container img { max-height: 30px; }
                .nav-ul { display: none; }
                .hero-section h1 { font-size: 2.5rem !important; }
                .cat-header h2 { font-size: 20px; }
                .ticker-label { display: none; }
                .col-4.d-none.d-md-block { display: none !important; }
                .col-md-4.col-12 { flex: 0 0 100%; max-width: 100%; text-align: center; }
            }

            /* Mobile Menu Drawer */
            .mobile-menu-drawer {
                position: fixed;
                top: 0;
                left: -300px;
                width: 300px;
                height: 100%;
                background: #fff;
                z-index: 100001;
                transition: 0.3s ease;
                box-shadow: 5px 0 15px rgba(0,0,0,0.1);
                overflow-y: auto;
                padding-top: 60px;
            }
            .mobile-menu-drawer.active { left: 0; }
            .mobile-menu-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 100000;
                display: none;
            }
            .mobile-menu-overlay.active { display: block; }
            .mobile-nav-list { list-style: none; padding: 0; margin: 0; }
            .mobile-nav-list li { border-bottom: 1px solid #eee; }
            .mobile-nav-list li a { 
                display: block; 
                padding: 15px 25px; 
                color: #000; 
                font-weight: 800; 
                text-transform: uppercase; 
                font-size: 13px; 
                text-decoration: none;
            }
            .mobile-nav-list li a:hover { background: #f9f9f9; color: var(--bloomberg-blue); }
            .close-mobile-menu {
                position: absolute;
                top: 15px;
                right: 15px;
                font-size: 24px;
                cursor: pointer;
            }

			/* Utility */
			.search-box-header input { border: 1px solid var(--forbes-border); background: #fff; padding: 8px 15px; font-size: 13px; border-radius: 0; width: 100%; }
			.social-header a { color: var(--forbes-black); font-size: 18px; margin-left: 20px; transition: 0.2s; }
            .social-header a:hover { color: var(--bloomberg-blue); }

			#preloader { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #fff; z-index: 100000; display: flex; flex-direction:column; justify-content: center; align-items: center; gap:20px; }
        .pl-logo { height:38px; filter:brightness(0); opacity:0.8; }
        .pl-dots { display:flex; gap:8px; }
        .pl-dots span { width:10px; height:10px; background:#000; border-radius:50%; animation:pdot 1.2s ease-in-out infinite; }
        .pl-dots span:nth-child(2) { animation-delay:0.2s; }
        .pl-dots span:nth-child(3) { animation-delay:0.4s; }
        @keyframes pdot { 0%,80%,100%{transform:scale(0.7);opacity:0.3} 40%{transform:scale(1.1);opacity:1} }

        /* Global search bar */
        .header-search-form { display:flex; align-items:center; border:1px solid var(--forbes-border); background:#fff; }
        .header-search-form input { border:none; outline:none; background:transparent; padding:8px 15px; font-size:13px; width:100%; font-family:var(--forbes-font-sans); }
        .header-search-form button { border:none; background:none; padding:8px 12px; cursor:pointer; color:#999; }
        .header-search-form button:hover { color:var(--bloomberg-blue); }

        /* Mobile search panel */
        .mobile-search-panel { display:none; padding:12px 15px; background:#f4f4f4; border-bottom:1px solid #e0e0e0; }
        .mobile-search-panel.active { display:block; }
        .mobile-search-panel form { display:flex; align-items:center; border:2px solid #000; background:#fff; }
        .mobile-search-panel input { border:none; outline:none; background:transparent; padding:10px 15px; font-size:14px; width:100%; }
        .mobile-search-panel button { border:none; background:#000; color:#fff; padding:10px 16px; cursor:pointer; font-size:14px; }
		</style>
		<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	</head>
	<body>
		<div id="preloader">
            <img src="{{asset('assets/img/logo2.png')}}" alt="JUBITA" class="pl-logo">
            <div class="pl-dots"><span></span><span></span><span></span></div>
        </div>
		
        <!-- Mobile Menu -->
        <div class="mobile-menu-overlay"></div>
        <div class="mobile-menu-drawer">
            <span class="close-mobile-menu">&times;</span>
            <div class="p-4 text-center border-bottom">
                <img src="{{asset('assets/img/logo2.png')}}" alt="LOGO" style="height: 28px;">
            </div>
            <div style="padding:12px 15px; border-bottom:1px solid #eee;">
                <form action="{{ route('marketplace.index') }}" method="GET" style="display:flex; border:2px solid #000;">
                    <input type="text" name="q" placeholder="Tafuta bidhaa, habari..." value="{{ request('q') }}" style="border:none; outline:none; padding:10px 14px; font-size:13px; flex:1; background:#fff;">
                    <button type="submit" style="border:none; background:#000; color:#fff; padding:10px 14px; cursor:pointer;"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <ul class="mobile-nav-list">
                <li><a href="{{route('home')}}"><i class="fas fa-home" style="width:20px;opacity:0.5;"></i> Nyumbani</a></li>
                <li style="background:#f9f9f9; padding:8px 25px; font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1.5px; color:#999; border-bottom:1px solid #eee;">Soko</li>
                <li><a href="{{ route('marketplace.index') }}" style="color:var(--bloomberg-blue);"><i class="fas fa-store" style="width:20px;"></i> Soko la Bidhaa</a></li>
                <li><a href="{{ route('marketplace.vehicles') }}" style="color:#e74c3c;"><i class="fas fa-car" style="width:20px;"></i> Magari</a></li>
                <li><a href="{{ route('market.prices') }}" style="color:#27ae60;"><i class="fas fa-chart-line" style="width:20px;"></i> Bei za Soko</a></li>
                <li style="background:#f9f9f9; padding:8px 25px; font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1.5px; color:#999; border-bottom:1px solid #eee;">Habari</li>
                @foreach($menuCategories as $category)
                <li><a href="{{ route('category.show', $category->slug) }}"><i class="fas fa-angle-right" style="width:20px;opacity:0.4;"></i> {{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>

		<div id="main-wrapper">
			<div class="top-bar-minimal" style="background:#000; display:flex; align-items:center; justify-content:space-between; padding: 8px 20px;">
                <span style="font-size:11px; text-transform:uppercase; letter-spacing:1.5px;">{{ now()->format('l, d F, Y') }} | JUBITA MEDIA GLOBAL EDITION</span>
                <span style="display:flex; align-items:center; gap:20px; font-size:10px; letter-spacing:1px;">
                    <a href="{{ route('marketplace.index') }}" style="color:#f1d302; text-decoration:none; font-weight:900;"><i class="fas fa-store"></i> SOKO</a>
                    <a href="{{ route('marketplace.vehicles') }}" style="color:#e74c3c; text-decoration:none; font-weight:900;"><i class="fas fa-car"></i> MAGARI</a>
                    <a href="{{ route('market.prices') }}" style="color:#27ae60; text-decoration:none; font-weight:900;"><i class="fas fa-chart-line"></i> BEI ZA SOKO</a>
                </span>
			</div>

			<div class="header-middle">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-4 d-none d-md-block">
							<form action="{{ route('marketplace.index') }}" method="GET" class="header-search-form">
                                <input type="text" name="q" placeholder="Tafuta bidhaa, habari, bei..." value="{{ request('q') }}">
                                <button type="submit"><i class="fas fa-search" style="font-size:12px;"></i></button>
                            </form>
						</div>
						<div class="col-md-4 col-12">
							<div class="logo-container">
								<a href="{{route('home')}}"><img src="{{asset('assets/img/logo2.png')}}" alt="JUBITA" /></a>
							</div>
						</div>
						<div class="col-4 d-none d-md-block">
							<div class="social-header text-right">
								<a href="#"><i class="fab fa-facebook-f"></i></a>
								<a href="#"><i class="fab fa-twitter"></i></a>
								<a href="#"><i class="fab fa-linkedin-in"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<nav class="header-bottom-nav d-none d-lg-block">
				<div class="container">
					<ul class="nav-ul">
						<li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{route('home')}}">Nyumbani</a></li>
                        <li class="{{ request()->routeIs('marketplace.*') ? 'active' : '' }}">
                            <a href="{{ route('marketplace.index') }}" style="color:var(--bloomberg-blue) !important;">
                                <i class="fas fa-store" style="font-size:10px;"></i> SOKO <i class="fas fa-caret-down ml-1" style="font-size:9px;"></i>
                            </a>
                            <div class="mega-panel" style="border-top-color:#e74c3c;">
                                <div class="mega-bar">
                                    <div class="mega-bar-inner">
                                        <span class="mega-bar-title"><i class="fas fa-store" style="margin-right:6px; color:#e74c3c;"></i>Soko la Bidhaa</span>
                                        <a href="{{ route('marketplace.index') }}" class="mega-bar-link">Angalia Matangazo Yote <i class="fas fa-arrow-right" style="font-size:7px;"></i></a>
                                    </div>
                                </div>
                                <div class="mega-content">
                                    <div class="mega-col-left">
                                        <div class="mega-title">Aina za Bidhaa</div>
                                        <ul class="sub-list">
                                            <li><a href="{{ route('marketplace.vehicles') }}" style="color:#e74c3c; font-weight:900;"><i class="fas fa-car"></i>Magari</a></li>
                                            @foreach($navProductCategories as $pcat)
                                            <li><a href="{{ route('marketplace.category', $pcat->slug) }}">
                                                <i class="fa {{ $pcat->icon ?? 'fa-tag' }}"></i>{{ $pcat->name }}
                                            </a></li>
                                            @endforeach
                                            <li style="padding-top:8px; border-top:1px solid #eee; margin-top:4px;">
                                                <a href="{{ route('market.prices') }}" style="color:#27ae60; font-weight:900;"><i class="fas fa-chart-line"></i>Bei za Soko</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mega-col-right">
                                        <div class="mega-title">Matangazo Maalumu</div>
                                        <div class="menu-articles">
                                            @foreach($navFeaturedProducts as $fp)
                                            <a href="{{ route('marketplace.show', $fp->slug) }}" class="menu-news-item">
                                                <div class="menu-news-img" style="background-image:url('{{ $fp->image ? asset('storage/'.$fp->image) : 'https://picsum.photos/seed/jubitaproduct/200/140' }}')"></div>
                                                <div>
                                                    <div class="menu-news-title">{{ Str::limit($fp->name, 45) }}</div>
                                                    <div class="menu-news-meta" style="color:var(--bloomberg-blue); letter-spacing:0;">Tsh {{ number_format($fp->price) }}</div>
                                                    @if($fp->location)<div class="menu-news-meta"><i class="fas fa-map-marker-alt" style="color:#e74c3c;"></i> {{ $fp->location }}</div>@endif
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        @foreach($menuCategories as $category)
						<li class="{{ request()->is('category/'.$category->slug) ? 'active' : '' }}">
							<a href="{{ route('category.show', $category->slug) }}">{{ strtoupper($category->name) }} @if($category->children->count() > 0) <i class="fas fa-caret-down ml-1" style="font-size:9px;"></i> @endif</a>
							@if($category->children->count() > 0)
                            <div class="mega-panel">
								<div class="mega-bar">
									<div class="mega-bar-inner">
										<span class="mega-bar-title">{{ strtoupper($category->name) }}</span>
										<a href="{{ route('category.show', $category->slug) }}" class="mega-bar-link">Habari Zote <i class="fas fa-arrow-right" style="font-size:7px;"></i></a>
									</div>
								</div>
								<div class="mega-content">
									<div class="mega-col-left">
										<div class="mega-title">Sekta</div>
										<ul class="sub-list">
                                            @foreach($category->children as $child)
											<li><a href="{{ route('category.show', $child->slug) }}"><i class="fas fa-angle-right"></i>{{ $child->name }}</a></li>
                                            @endforeach
										</ul>
									</div>
									<div class="mega-col-right">
										<div class="mega-title">Habari za Hivi Karibuni</div>
										<div class="menu-articles">
                                            @php $latestInCategory = $menuCategoryArticles[$category->id] ?? collect(); @endphp
                                            @forelse($latestInCategory as $news)
											<a href="{{ route('article.show', $news->slug) }}" class="menu-news-item">
												<div class="menu-news-img" style="background-image:url('{{ $news->featured_image ? asset('storage/'.$news->featured_image) : 'https://picsum.photos/seed/jubitathumb/200/120' }}')"></div>
												<div>
													<div class="menu-news-title">{{ Str::limit($news->title, 55) }}</div>
													<div class="menu-news-meta">{{ $news->published_at?->diffForHumans() ?? $news->created_at->diffForHumans() }}</div>
												</div>
											</a>
                                            @empty
                                            <p style="font-size:11px; color:#bbb; grid-column:1/-1;">Habari zinakuja hivi punde...</p>
                                            @endforelse
										</div>
									</div>
								</div>
							</div>
                            @endif
						</li>
                        @endforeach
					</ul>
				</div>
			</nav>

			<!-- Mobile Header -->
			<div class="d-lg-none bg-white sticky-top" style="border-bottom:3px solid #000; box-shadow:0 2px 8px rgba(0,0,0,0.07);">
				<div class="d-flex justify-content-between align-items-center px-3 py-2">
					<button class="btn btn-link text-dark p-0 toggle-mobile-menu" style="font-size:1.1rem;"><i class="fas fa-bars"></i></button>
					<a href="{{ route('home') }}"><img src="{{asset('assets/img/logo2.png')}}" alt="LOGO" style="height: 26px;"></a>
					<button class="btn btn-link text-dark p-0 toggle-mobile-search" style="font-size:1.1rem;"><i class="fas fa-search"></i></button>
				</div>
                <div class="mobile-search-panel" id="mobileSearchPanel">
                    <form action="{{ route('marketplace.index') }}" method="GET">
                        <input type="text" name="q" placeholder="Tafuta bidhaa, habari..." value="{{ request('q') }}">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
			</div>

			@yield('content')

			<footer>
                {{-- HERO: Centered logo + newsletter --}}
                <div style="border-top:3px solid var(--bloomberg-blue); background:#050505; padding:40px 0 32px; border-bottom:1px solid #181818;">
                    <div class="container text-center">
                        <img src="{{asset('assets/img/logo2.png')}}" alt="JUBITA" style="height:34px; filter:brightness(0) invert(1); margin-bottom:10px; display:inline-block;">
                        <p style="font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:3px; color:#333; margin-bottom:22px; font-family:var(--forbes-font-sans);">Habari · Biashara · Masoko · Tanzania</p>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-7 col-11">
                                <p style="font-size:12px; color:#666; margin-bottom:14px; line-height:1.65;">Pokea habari za uchumi na masoko Tanzania moja kwa moja kwenye barua pepe yako kila asubuhi.</p>
                                <div style="display:flex; overflow:hidden; border:1px solid #262626;">
                                    <input type="email" placeholder="Weka barua pepe yako..."
                                        style="flex:1; border:none; outline:none; background:#111; color:#ccc; padding:13px 16px; font-size:12px; font-family:var(--forbes-font-sans); min-width:0;">
                                    <button style="background:var(--bloomberg-blue); border:none; color:#fff; padding:13px 22px; font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:1.5px; cursor:pointer; white-space:nowrap; flex-shrink:0;">
                                        Jiunge Bure
                                    </button>
                                </div>
                                <p style="font-size:9px; color:#2e2e2e; margin-top:8px; margin-bottom:0; font-weight:700;">Hatutumii barua taka. Unaweza kuacha wakati wowote.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- LINKS + SOCIALS --}}
                <div class="container" style="padding-top:30px; padding-bottom:8px;">
                    <div class="row">
                        {{-- Habari --}}
                        <div class="col-lg-3 col-md-6 mb-4 footer-column">
                            <h4>Habari</h4>
                            <ul class="footer-links">
                                <li><a href="{{ route('home') }}">Nyumbani</a></li>
                                @forelse($menuCategories->take(6) as $fcat)
                                <li><a href="{{ route('category.show', $fcat->slug) }}">{{ $fcat->name }}</a></li>
                                @empty
                                @endforelse
                            </ul>
                        </div>

                        {{-- Soko --}}
                        <div class="col-lg-3 col-md-6 mb-4 footer-column">
                            <h4>Soko la Bidhaa</h4>
                            <ul class="footer-links">
                                <li><a href="{{ route('marketplace.index') }}">Soko la Bidhaa</a></li>
                                <li><a href="{{ route('marketplace.vehicles') }}">Magari</a></li>
                                <li><a href="{{ route('market.prices') }}">Bei za Soko</a></li>
                                @foreach(\App\Models\Setting\Category::where('status',1)->whereIn('category_type',['product','both'])->whereNull('parent_id')->take(4)->get() as $pfc)
                                <li><a href="{{ route('marketplace.category', $pfc->slug) }}">{{ $pfc->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Mawasiliano --}}
                        <div class="col-lg-3 col-md-6 mb-4 footer-column">
                            <h4>Mawasiliano</h4>
                            <ul class="footer-links" style="margin-bottom:14px;">
                                <li><a href="#">Kuhusu Sisi</a></li>
                                <li><a href="#">Wasiliana Nasi</a></li>
                                <li><a href="#">Matangazo</a></li>
                                <li><a href="{{ route('login') }}">Ingia Mfumo</a></li>
                            </ul>
                            <div style="border-top:1px solid #1a1a1a; padding-top:14px;">
                                <div style="display:flex; align-items:center; gap:9px; margin-bottom:8px;">
                                    <i class="fas fa-map-marker-alt" style="color:var(--bloomberg-blue); font-size:10px; width:12px; flex-shrink:0;"></i>
                                    <span style="font-size:11px; color:#555;">Dar es Salaam, Tanzania</span>
                                </div>
                                <div style="display:flex; align-items:center; gap:9px;">
                                    <i class="fas fa-envelope" style="color:var(--bloomberg-blue); font-size:10px; width:12px; flex-shrink:0;"></i>
                                    <span style="font-size:11px; color:#555;">habari@jubita.co.tz</span>
                                </div>
                            </div>
                        </div>

                        {{-- Social --}}
                        <div class="col-lg-3 col-md-6 mb-4 footer-column">
                            <h4>Fuata Sisi</h4>
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:8px;">
                                <a href="#" class="footer-social-badge">
                                    <i class="fab fa-facebook-f" style="color:#1877f2;"></i>
                                    <span>Facebook</span>
                                </a>
                                <a href="#" class="footer-social-badge">
                                    <i class="fab fa-twitter" style="color:#1da1f2;"></i>
                                    <span>Twitter</span>
                                </a>
                                <a href="#" class="footer-social-badge">
                                    <i class="fab fa-instagram" style="color:#e1306c;"></i>
                                    <span>Instagram</span>
                                </a>
                                <a href="#" class="footer-social-badge">
                                    <i class="fab fa-youtube" style="color:#ff0000;"></i>
                                    <span>YouTube</span>
                                </a>
                                <a href="#" class="footer-social-badge">
                                    <i class="fab fa-linkedin-in" style="color:#0a66c2;"></i>
                                    <span>LinkedIn</span>
                                </a>
                                <a href="#" class="footer-social-badge">
                                    <i class="fab fa-telegram" style="color:#2ca5e0;"></i>
                                    <span>Telegram</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BOTTOM BAR --}}
                <div style="border-top:1px solid #151515;">
                    <div class="container">
                        <div class="footer-bottom" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px;">
                            <p style="margin:0;">&copy; {{ date('Y') }} JUBITA MEDIA GROUP. Haki Zote Zimehifadhiwa.</p>
                            <div style="display:flex; flex-wrap:wrap;">
                                <a href="#" class="footer-bottom-links-item" style="color:#888; font-size:9px; font-weight:800; text-transform:uppercase; text-decoration:none; margin-left:16px; transition:0.2s; letter-spacing:0.5px;">Masharti</a>
                                <a href="#" class="footer-bottom-links-item" style="color:#888; font-size:9px; font-weight:800; text-transform:uppercase; text-decoration:none; margin-left:16px; transition:0.2s; letter-spacing:0.5px;">Faragha</a>
                                <a href="#" class="footer-bottom-links-item" style="color:#888; font-size:9px; font-weight:800; text-transform:uppercase; text-decoration:none; margin-left:16px; transition:0.2s; letter-spacing:0.5px;">Matangazo</a>
                                <a href="{{ route('login') }}" class="footer-bottom-links-item" style="color:var(--bloomberg-blue); font-size:9px; font-weight:800; text-transform:uppercase; text-decoration:none; margin-left:16px; transition:0.2s; letter-spacing:0.5px;">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
		</div>

		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script>
			$(window).on('load', function() { $('#preloader').fadeOut(600); });

            // Mobile Menu Logic
            $('.toggle-mobile-menu').on('click', function() {
                $('.mobile-menu-drawer, .mobile-menu-overlay').addClass('active');
            });
            $('.close-mobile-menu, .mobile-menu-overlay').on('click', function() {
                $('.mobile-menu-drawer, .mobile-menu-overlay').removeClass('active');
            });

            // Mobile Search Toggle
            $('.toggle-mobile-search').on('click', function() {
                var panel = $('#mobileSearchPanel');
                panel.toggleClass('active');
                if (panel.hasClass('active')) { panel.find('input').focus(); }
            });
		</script>
	</body>
</html>