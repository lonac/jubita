@extends('website.shared.index')

@section('content')

<!-- =========================== Hero Section Start =================================== -->
<section class="p-0 border-bottom">
    <div class="container">
        <div class="row no-gutters">
            
            <!-- Main Featured Story -->
            <div class="col-lg-8 col-md-12 border-right pr-lg-5 pt-4">
                @if($featuredPost)
                <article class="forbes-card mb-4">
                    <div class="meta-info mb-2">
                        <span class="text-danger font-weight-bold">ILIOCHAGULIWA</span> | {{ strtoupper($featuredPost->category?->name) }}
                    </div>
                    <a href="{{ route('article.show', $featuredPost->slug) }}" class="text-decoration-none">
                        <h1 class="mb-3" style="font-weight: 900; line-height: 1.0; letter-spacing: -2px; font-size: 3.8rem; color: #000;">{{ $featuredPost->title }}</h1>
                    </a>
                    <figure class="mb-4 position-relative overflow-hidden rounded-0">
                        <a href="{{ route('article.show', $featuredPost->slug) }}">
                            <img src="{{ $featuredPost->featured_image ? asset('storage/'.$featuredPost->featured_image) : 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?q=80&w=1200' }}" class="img-fluid w-100 transition-scale" alt="{{ $featuredPost->title }}" style="max-height: 500px; object-fit: cover;">
                        </a>
                    </figure>
                    <div class="post-excerpt mb-4">
                        <p class="lead text-dark" style="font-size: 1.25rem; line-height: 1.6; font-family: var(--forbes-font-serif); font-weight: 400;">{{ Str::limit($featuredPost->excerpt, 250) }}</p>
                    </div>
                    <div class="d-flex align-items-center border-top pt-3">
                        <div class="meta-info mb-0" style="font-size: 13px; letter-spacing: 0.5px;">
                            Na <span class="text-dark font-weight-bold">{{ strtoupper($featuredPost->author?->name ?? 'Jubita Desk') }}</span> | {{ $featuredPost->published_at?->format('d M, Y') ?? $featuredPost->created_at->format('d M, Y') }}
                        </div>
                    </div>
                </article>
                @endif
            </div>

            <!-- The Latest Sidebar -->
            <div class="col-lg-4 col-md-12 pl-lg-5 pt-4 bg-light">
                <div class="cat-header">
                    <h2 class="m-0" style="font-size: 20px;">Hivi Punde</h2>
                </div>
                <ul class="sidebar-list p-0" style="list-style: none;">
                    @forelse($latestNews as $news)
                    <li class="py-3 border-bottom">
                        <div class="meta-info text-primary mb-1" style="font-size: 11px; font-weight: 800; letter-spacing: 1px;">{{ strtoupper($news->category?->name) }}</div>
                        <a href="{{ route('article.show', $news->slug) }}" class="h5 font-weight-bold text-dark d-block" style="line-height: 1.3; font-size: 17px; text-decoration: none;">{{ $news->title }}</a>
                        <div class="meta text-muted small mt-2" style="font-weight: 600;">{{ $news->published_at?->diffForHumans() ?? $news->created_at->diffForHumans() }}</div>
                    </li>
                    @empty
                    <li class="py-3 text-muted small">Hakuna habari mpya kwa sasa.</li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</section>
<!-- =========================== Hero Section End =================================== -->

<!-- =========================== Markets Ticker Start =================================== -->
<div class="ticker-wrap">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="px-3 font-weight-bold text-uppercase small border-right mr-3" style="white-space: nowrap;">TAARIFA ZA SOKO</div>
            <div class="marquee-wrapper">
                <div class="marquee-content">
                    @forelse($marketPrices as $price)
                    <div class="d-inline-block px-4 border-right border-secondary">
                        <span class="small font-weight-bold">{{ strtoupper($price->commodity?->name) }}</span> 
                        <span class="small ml-2">Tsh {{ number_format($price->price_max) }}</span>
                        <span class="small ml-1 text-success"><i class="fas fa-caret-up"></i></span>
                    </div>
                    @empty
                    <div class="d-inline-block px-4 small">Masoko yanaandaliwa...</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =========================== Markets Ticker End =================================== -->

<!-- =========================== JIOPOLITIKI Section Start =================================== -->
<section class="border-bottom">
    <div class="container">
        <div class="cat-header">
            <h2>Jiopolitiki</h2>
            <a href="#" class="view-all text-dark font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none;">Ona Zote <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
        </div>
        <div class="row">
            @forelse($politicsPosts as $post)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="forbes-card h-100">
                    <figure class="mb-3 overflow-hidden rounded-0">
                        <a href="{{ route('article.show', $post->slug) }}">
                            <img src="{{ $post->featured_image ? asset('storage/'.$post->featured_image) : 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?q=80&w=600' }}" class="img-fluid w-100 transition-scale" style="height: 180px; object-fit: cover;">
                        </a>
                    </figure>
                    <a href="{{ route('article.show', $post->slug) }}" class="text-decoration-none">
                        <h4 class="h5 font-weight-bold text-dark mb-2" style="line-height: 1.3; font-family: var(--forbes-font-serif); font-size: 1.1rem;">{{ $post->title }}</h4>
                    </a>
                    <div class="meta-info" style="font-size: 11px; font-weight: 700;">NA {{ strtoupper($post->author?->name ?? 'Jubita Desk') }}</div>
                </div>
            </div>
            @empty
            <div class="col-12"><p class="text-muted">Habari za Jiopolitiki zinakuja hivi punde...</p></div>
            @endforelse
        </div>
    </div>
</section>
<!-- =========================== JIOPOLITIKI Section End =================================== -->

<!-- =========================== UCHUMI Section Start =================================== -->
<section class="bg-light border-bottom">
    <div class="container">
        <div class="cat-header">
            <h2>Uchumi</h2>
            <a href="#" class="view-all text-dark font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none;">Ona Zote <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
        </div>
        <div class="row">
            <!-- Main Economy Feature -->
            <div class="col-lg-7 mb-4 border-right pr-lg-4">
                @if($economyPosts->isNotEmpty())
                @php $ep = $economyPosts->first(); @endphp
                <div class="forbes-card">
                    <a href="{{ route('article.show', $ep->slug) }}" class="text-decoration-none">
                        <img src="{{ $ep->featured_image ? asset('storage/'.$ep->featured_image) : 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?q=80&w=800' }}" class="img-fluid rounded-0 mb-3 w-100" style="height: 380px; object-fit: cover;">
                        <h3 class="font-weight-bold text-dark" style="font-size: 2rem; line-height: 1.1; font-family: var(--forbes-font-serif);">{{ $ep->title }}</h3>
                    </a>
                    <p class="text-muted mt-3" style="font-size: 1.05rem; line-height: 1.5;">{{ Str::limit($ep->excerpt, 180) }}</p>
                </div>
                @else
                <div class="forbes-card">
                    <p class="text-muted">Hakuna habari za Uchumi kwa sasa.</p>
                </div>
                @endif
            </div>
            <!-- Secondary Economy News -->
            <div class="col-lg-5 pl-lg-4">
                <ul class="sidebar-list p-0" style="list-style: none;">
                    @forelse($economyPosts->skip(1) as $post)
                    <li class="py-3 border-bottom">
                        <a href="{{ route('article.show', $post->slug) }}" class="h5 font-weight-bold text-dark d-block text-decoration-none" style="font-family: var(--forbes-font-serif); font-size: 1.2rem; line-height: 1.3;">{{ $post->title }}</a>
                        <div class="meta-info mt-2" style="font-size: 11px; font-weight: 700; color: var(--forbes-gray);">{{ $post->published_at?->format('d M, Y') ?? '2026' }}</div>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- =========================== UCHUMI Section End =================================== -->

<!-- =========================== BIASHARA Section Start =================================== -->
<section class="border-bottom">
    <div class="container">
        <div class="cat-header">
            <h2>Biashara</h2>
            <a href="#" class="view-all text-dark font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none;">Ona Zote <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
        </div>
        <div class="row">
            @forelse($businessList as $biz)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="forbes-card h-100">
                    <figure class="mb-3 overflow-hidden rounded-0 border">
                        <a href="{{ route('article.show', $biz->slug) }}">
                            <img src="{{ $biz->featured_image ? asset('storage/'.$biz->featured_image) : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=600' }}" class="img-fluid w-100 transition-scale" style="height: 160px; object-fit: cover;">
                        </a>
                    </figure>
                    <a href="{{ route('article.show', $biz->slug) }}" class="text-decoration-none">
                        <h4 class="h6 font-weight-bold text-dark mb-0" style="line-height: 1.4; font-family: var(--forbes-font-serif); font-size: 1rem;">{{ $biz->title }}</h4>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12"><p class="text-muted">Habari za biashara zinakuja...</p></div>
            @endforelse
        </div>
    </div>
</section>
<!-- =========================== BIASHARA Section End =================================== -->

<!-- =========================== MASOKO Section Start =================================== -->
<section class="bg-dark text-white py-5 border-bottom">
    <div class="container">
        <div class="cat-header border-light" style="border-bottom-color: rgba(255,255,255,0.2);">
            <h2 class="text-white">Masoko ya Fedha</h2>
            <a href="#" class="view-all text-light font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none;">Ona Zote <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
        </div>
        <div class="row mt-4">
            @forelse($marketNews as $m)
            <div class="col-md-4 mb-4">
                <div class="border-left border-secondary pl-3 h-100">
                    <div class="meta-info text-warning mb-2" style="font-size: 10px; font-weight: 800; letter-spacing: 1px;">MASOKO</div>
                    <a href="{{ route('article.show', $m->slug) }}" class="text-white text-decoration-none">
                        <h5 class="serif font-weight-bold h5 mb-0" style="font-family: var(--forbes-font-serif); line-height: 1.3;">{{ $m->title }}</h5>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12"><p class="text-light">Taarifa za masoko zinakuja...</p></div>
            @endforelse
        </div>
    </div>
</section>
<!-- =========================== MASOKO Section End =================================== -->

<!-- =========================== TEKNOLOJIA Section Start =================================== -->
<section class="border-bottom">
    <div class="container">
        <div class="cat-header">
            <h2>Teknolojia</h2>
            <a href="#" class="view-all text-dark font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none;">Ona Zote <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
        </div>
        <div class="row">
            @forelse($techInsightPosts as $post)
            <div class="col-md-6 mb-4">
                <div class="d-flex align-items-center border p-3 rounded-0 bg-white shadow-sm h-100">
                    <img src="{{ $post->featured_image ? asset('storage/'.$post->featured_image) : 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?q=80&w=200' }}" class="rounded-0 mr-3" style="width: 140px; height: 100px; object-fit: cover; flex-shrink: 0;">
                    <div>
                        <a href="{{ route('article.show', $post->slug) }}" class="text-decoration-none">
                            <h5 class="font-weight-bold text-dark mb-2" style="font-family: var(--forbes-font-serif); font-size: 1.1rem; line-height: 1.3;">{{ $post->title }}</h5>
                        </a>
                        <p class="small text-muted mb-0">{{ Str::limit($post->excerpt, 80) }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12"><p class="text-muted">Uchambuzi wa teknolojia unakuja...</p></div>
            @endforelse
        </div>
    </div>
</section>
<!-- =========================== TEKNOLOJIA Section End =================================== -->

<!-- ======================== Real Estate & Automotive Showcase ==================== -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <!-- Houses -->
            <div class="col-lg-6 border-right pr-lg-4 mb-5 mb-lg-0">
                <div class="cat-header">
                    <h2>Nyumba & Viwanja</h2>
                    <a href="#" class="view-all text-dark font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none;">Soko la Nyumba <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
                </div>
                <div class="row">
                    @forelse($houseProducts->take(2) as $house)
                    <div class="col-sm-6 mb-4">
                        <div class="card border-0 shadow-sm rounded-0">
                            <img src="{{ $house->image ? (strpos($house->image, 'http') === 0 ? $house->image : asset('storage/'.$house->image)) : 'https://via.placeholder.com/400x300' }}" class="card-img-top rounded-0" style="height: 180px; object-fit: cover;">
                            <div class="card-body p-3">
                                <h6 class="font-weight-bold mb-1" style="font-family: var(--forbes-font-sans); letter-spacing: -0.5px;">{{ $house->name }}</h6>
                                <p class="text-primary font-weight-bold small mb-0">Tsh {{ number_format($house->price) }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-muted small">Tangazo la nyumba halijapatikana.</div>
                    @endforelse
                </div>
            </div>
            <!-- Cars -->
            <div class="col-lg-6 pl-lg-4">
                <div class="cat-header">
                    <h2>Magari</h2>
                    <a href="#" class="view-all text-dark font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none;">Showroom <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
                </div>
                <div class="row">
                    @forelse($carProducts->take(2) as $car)
                    <div class="col-sm-6 mb-4">
                        <div class="card border-0 shadow-sm rounded-0">
                            <img src="{{ $car->image ? (strpos($car->image, 'http') === 0 ? $car->image : asset('storage/'.$car->image)) : 'https://via.placeholder.com/400x300' }}" class="card-img-top rounded-0" style="height: 180px; object-fit: cover;">
                            <div class="card-body p-3">
                                <h6 class="font-weight-bold mb-1" style="font-family: var(--forbes-font-sans); letter-spacing: -0.5px;">{{ $car->name }}</h6>
                                <p class="text-danger font-weight-bold small mb-0">Tsh {{ number_format($car->price) }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-muted small">Tangazo la gari halijapatikana.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================== End Showcase ==================== -->

<style>
    .transition-scale { transition: transform 0.5s ease; }
    .forbes-card:hover .transition-scale { transform: scale(1.05); }
    .shadow-hover:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; transform: translateY(-3px); }
    .marquee-wrapper { overflow: hidden; width: 100%; }
    .marquee-content { animation: marquee 40s linear infinite; white-space: nowrap; }
    @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
    .marquee-wrapper:hover .marquee-content { animation-play-state: paused; }
    .display-6 { font-size: 1.8rem; }
    @media (max-width: 768px) {
        .display-3 { font-size: 2.5rem; }
        .border-right { border-right: none !important; }
    }
</style>

@endsection
