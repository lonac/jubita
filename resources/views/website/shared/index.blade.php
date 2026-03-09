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
                padding: 30px 0; 
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
			
			.nav-ul { display: flex; justify-content: center; list-style: none; margin: 0; padding: 0; position: relative; }
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

			/* --- MEGA MENU PANEL (Premium) --- */
			.mega-panel {
				position: absolute; top: 100%; left: 0; width: 100%; 
				background: #fff; border-top: 1px solid var(--forbes-border);
				border-bottom: 6px solid var(--bloomberg-blue); /* Bloomberg accent */
				box-shadow: 0 30px 60px rgba(0,0,0,0.2);
				display: none; padding: 50px 0; z-index: 10000;
			}

			.nav-ul > li:hover .mega-panel { display: block !important; }

			.mega-content { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 280px 1fr; gap: 60px; padding: 0 20px; }
			.mega-title { 
                font-size: 11px; 
                text-transform: uppercase; 
                color: var(--forbes-gray); 
                border-bottom: 2px solid var(--forbes-black); 
                padding-bottom: 12px; 
                margin-bottom: 25px; 
                font-weight: 900; 
                letter-spacing: 1px;
            }
			
			.sub-list { list-style: none; padding: 0; margin: 0; }
			.sub-list li { margin-bottom: 15px; }
			.sub-list li a { 
                color: var(--forbes-black); 
                text-decoration: none; 
                font-size: 18px; 
                font-weight: 900; 
                font-family: var(--forbes-font-serif); 
                transition: 0.2s; 
            }
			.sub-list li a:hover { color: var(--bloomberg-blue); padding-left: 10px; }

			.featured-news-menu { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
			.menu-news-item { display: flex; gap: 20px; align-items: start; text-decoration: none; }
			.menu-news-img { width: 140px; height: 90px; background: #eee; border-radius: 4px; flex-shrink: 0; background-size: cover; background-position: center; border: 1px solid var(--forbes-border); }
			.menu-news-title { 
                font-size: 16px; 
                font-weight: 900; 
                color: var(--forbes-black); 
                line-height: 1.3; 
                font-family: var(--forbes-font-serif); 
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
                margin-bottom: 15px;
                transition: 0.3s;
            }
            .forbes-card figure { margin-bottom: 8px !important; }
            .forbes-card h4, .forbes-card h5, .forbes-card h6 { 
                margin-bottom: 5px !important; 
                line-height: 1.2 !important;
            }
            .forbes-card .meta-info { color: var(--forbes-gray); font-size: 10px; }

            /* --- SECTIONS & BUTTONS --- */
            section { padding: 25px 0; border-bottom: 1px solid var(--forbes-border); }
            .bg-light { background-color: var(--forbes-light-gray) !important; }
            .bg-dark { background-color: var(--forbes-black) !important; }
            
			.cat-header { 
                border-bottom: 2px solid var(--forbes-black); 
                margin-bottom: 15px; 
                padding-bottom: 5px; 
                display: flex; 
                justify-content: space-between; 
                align-items: flex-end;
            }
            .cat-header h2 { font-size: 26px; text-transform: uppercase; font-family: var(--forbes-font-sans); font-weight: 900; margin: 0; letter-spacing: -1px; }

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
			footer { background: #000; padding: 100px 0 60px; color: #fff; font-family: var(--forbes-font-sans); }
			.footer-column h4 { font-size: 12px; font-weight: 900; text-transform: uppercase; margin-bottom: 30px; letter-spacing: 2px; color: #fff; border-bottom: 1px solid #333; padding-bottom: 10px; display: inline-block; }
			.footer-links { list-style: none; padding: 0; margin: 0; }
			.footer-links li { margin-bottom: 15px; }
			.footer-links li a { color: #888; font-size: 14px; text-decoration: none; font-weight: 600; transition: 0.3s; }
			.footer-links li a:hover { color: #fff; }
			.footer-social a { color: #fff; font-size: 22px; margin-right: 30px; transition: 0.3s; }
			.footer-social a:hover { color: var(--forbes-yellow); }
			.footer-bottom { border-top: 1px solid #222; margin-top: 80px; padding-top: 40px; }
			.footer-bottom p { font-size: 11px; color: #fff; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; opacity: 0.9; }
			.footer-bottom-links { margin-top: 20px; }
			.footer-bottom-links a { color: #888; font-size: 10px; margin: 0 15px; font-weight: 800; text-transform: uppercase; text-decoration: none; transition: 0.3s; letter-spacing: 0.5px; }
			.footer-bottom-links a:hover { color: #fff; }

			/* Logo filter for black background */
			.footer-logo { filter: brightness(0) invert(1); height: 45px; margin-bottom: 40px; display: block; }

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

			#preloader { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #fff; z-index: 100000; display: flex; justify-content: center; align-items: center; }
		</style>
		<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	</head>
	<body>
		<div id="preloader"><div class="spinner-border text-dark" style="width: 3rem; height: 3rem;"></div></div>
		
        <!-- Mobile Menu -->
        <div class="mobile-menu-overlay"></div>
        <div class="mobile-menu-drawer">
            <span class="close-mobile-menu">&times;</span>
            <div class="p-4 text-center border-bottom mb-3">
                <img src="{{asset('assets/img/logo2.png')}}" alt="LOGO" style="height: 30px;">
            </div>
            <ul class="mobile-nav-list">
                <li><a href="{{route('home')}}">Nyumbani</a></li>
                @foreach($menuCategories as $category)
                <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>

		<div id="main-wrapper">
			<div class="top-bar-minimal">
				{{ now()->format('l, d F, Y') }} | JUBITA MEDIA GLOBAL EDITION
			</div>

			<div class="header-middle">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-4 d-none d-md-block">
							<div class="search-box-header">
								<input type="text" placeholder="Tafuta habari za biashara...">
							</div>
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
								<a href="#" class="btn-bloomberg ml-4" style="padding: 8px 20px; font-size: 11px;">PRO</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<nav class="header-bottom-nav d-none d-lg-block">
				<div class="container">
					<ul class="nav-ul">
						<li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{route('home')}}">Nyumbani</a></li>
						
                        @foreach($menuCategories as $category)
						<li class="{{ request()->is('category/'.$category->slug) ? 'active' : '' }}">
							<a href="{{ route('category.show', $category->slug) }}">{{ strtoupper($category->name) }} @if($category->children->count() > 0) <i class="fas fa-caret-down ml-1" style="font-size: 9px;"></i> @endif</a>
							@if($category->children->count() > 0)
                            <div class="mega-panel">
								<div class="mega-content">
									<div class="mega-col">
										<div class="mega-title">Sekta za {{ $category->name }}</div>
										<ul class="sub-list">
                                            @foreach($category->children as $child)
											<li><a href="{{ route('category.show', $child->slug) }}">{{ $child->name }}</a></li>
                                            @endforeach
										</ul>
									</div>
									<div class="mega-col border-left pl-5">
										<div class="mega-title">Habari Mpya za {{ $category->name }}</div>
										<div class="featured-news-menu">
                                            @php
                                                $latestInCategory = App\Models\Content\Content::where('category_id', $category->id)
                                                    ->orWhereIn('category_id', $category->children->pluck('id'))
                                                    ->latest()
                                                    ->take(2)
                                                    ->get();
                                            @endphp
                                            @forelse($latestInCategory as $news)
											<a href="{{ route('article.show', $news->slug) }}" class="menu-news-item">
												<div class="menu-news-img" style="background-image:url('{{ $news->featured_image ? asset('storage/'.$news->featured_image) : 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?q=80&w=200' }}')"></div>
												<div class="menu-news-title">{{ $news->title }}</div>
											</a>
                                            @empty
                                            <p class="text-muted small">Hakuna habari mpya hivi punde.</p>
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
			<div class="d-lg-none p-3 border-bottom bg-white sticky-top">
				<div class="d-flex justify-content-between align-items-center">
					<button class="btn btn-link text-dark p-0 toggle-mobile-menu"><i class="fas fa-bars fa-lg"></i></button>
					<img src="{{asset('assets/img/logo2.png')}}" alt="LOGO" style="height: 28px;">
					<button class="btn btn-link text-dark p-0"><i class="fas fa-search fa-lg"></i></button>
				</div>
			</div>

			@yield('content')

			<footer>
                <div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
							<img src="{{asset('assets/img/logo2.png')}}" alt="JUBITA" class="footer-logo">
							<div class="footer-social">
								<a href="#"><i class="fab fa-facebook-f"></i></a>
								<a href="#"><i class="fab fa-twitter"></i></a>
								<a href="#"><i class="fab fa-instagram"></i></a>
								<a href="#"><i class="fab fa-linkedin-in"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 mb-5 mb-lg-0 footer-column">
							<h4>Habari</h4>
							<ul class="footer-links">
								<li><a href="#">Uchumi</a></li>
								<li><a href="#">Biashara</a></li>
								<li><a href="#">Jiopolitiki</a></li>
								<li><a href="#">Teknolojia</a></li>
								<li><a href="#">Masoko</a></li>
							</ul>
						</div>
						<div class="col-lg-3 col-md-6 mb-5 mb-lg-0 footer-column">
							<h4>Kampuni</h4>
							<ul class="footer-links">
								<li><a href="#">Kuhusu Sisi</a></li>
								<li><a href="#">Wasiliana Nasi</a></li>
								<li><a href="#">Matangazo</a></li>
								<li><a href="#">Ajira</a></li>
								<li><a href="#">Uwekezaji</a></li>
							</ul>
						</div>
						<div class="col-lg-3 col-md-6 footer-column">
							<h4>Huduma</h4>
							<ul class="footer-links">
								<li><a href="#">Newsletter</a></li>
								<li><a href="#">Jubita PRO</a></li>
								<li><a href="#">Ripoti za Soko</a></li>
								<li><a href="#">Matukio</a></li>
							</ul>
						</div>
					</div>
					
					<div class="footer-bottom text-center">
						<p>&copy; {{ date('Y') }} JUBITA MEDIA GROUP. HAKI ZOTE ZIMEHIFADHIWA.</p>
						<div class="footer-bottom-links mt-3">
							<a href="#">Masharti & Vigezo</a>
							<a href="#">Sera ya Faragha</a>
							<a href="#">AdChoices</a>
							<a href="#">Ramani ya Tovuti</a>
						</div>
					</div>
                </div>
			</footer>
		</div>

		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script>
			$(window).on('load', function() { $('#preloader').fadeOut('slow'); });

            // Mobile Menu Logic
            $('.toggle-mobile-menu').on('click', function() {
                $('.mobile-menu-drawer, .mobile-menu-overlay').addClass('active');
            });
            $('.close-mobile-menu, .mobile-menu-overlay').on('click', function() {
                $('.mobile-menu-drawer, .mobile-menu-overlay').removeClass('active');
            });
		</script>
	</body>
</html>