@extends('website.shared.index')

@section('content')

<!-- =========================== Hero Section Start =================================== -->
<section class="p-0 border-bottom">
    <div class="container">
        <div class="row no-gutters">
            
            <!-- Main Featured Story -->
            <div class="col-lg-8 col-md-12 border-right pr-lg-4 pt-3 pb-3">
                @if($featuredPost)
                <article class="forbes-card mb-0">
                    <div class="meta-info mb-1">
                        <span class="text-danger font-weight-bold">ILIOCHAGULIWA</span> | {{ strtoupper($featuredPost->category?->name) }}
                    </div>
                    <a href="{{ route('article.show', $featuredPost->slug) }}" class="text-decoration-none">
                        <h1 class="mb-2" style="font-weight: 900; line-height: 1.18; letter-spacing: -0.5px; font-size: 2.2rem; color: #000;">{{ $featuredPost->title }}</h1>
                    </a>
                    <figure class="mb-2 position-relative overflow-hidden rounded-0">
                        <a href="{{ route('article.show', $featuredPost->slug) }}">
                            <img src="{{ $featuredPost->featured_image ? asset('storage/'.$featuredPost->featured_image) : 'https://picsum.photos/seed/jubitanews/1200/600' }}" class="img-fluid w-100" alt="{{ $featuredPost->title }}" style="max-height: 360px; object-fit: cover;">
                        </a>
                    </figure>
                    <div class="post-excerpt mb-2">
                        <p class="text-dark mb-0" style="font-size: 0.9rem; line-height: 1.55; font-family: var(--forbes-font-serif); font-weight: 400;">{{ Str::limit($featuredPost->excerpt, 200) }}</p>
                    </div>
                    <div class="d-flex align-items-center border-top pt-2 mt-2">
                        <div class="meta-info mb-0" style="font-size: 11px; letter-spacing: 0.5px;">
                            Na <span class="text-dark font-weight-bold">{{ strtoupper($featuredPost->author?->name ?? 'Jubita Desk') }}</span> | {{ $featuredPost->published_at?->format('d M, Y') ?? $featuredPost->created_at->format('d M, Y') }}
                        </div>
                    </div>
                </article>
                @endif
            </div>

            <!-- The Latest Sidebar -->
            <div class="col-lg-4 col-md-12 p-0">
            <div class="pl-lg-4 pr-3 pt-3 h-100 bg-light d-flex flex-column">
                <div class="cat-header mb-0 pb-2" style="flex-shrink:0;">
                    <h2 class="m-0" style="font-size: 17px;">Hivi Punde</h2>
                    <a href="{{ route('home') }}" class="view-all text-dark" style="font-size:9px; font-weight:800; text-transform:uppercase; text-decoration:none; letter-spacing:1px;">Zote <i class="fas fa-chevron-right" style="font-size:7px;"></i></a>
                </div>
                <ul class="p-0 mb-0 flex-grow-1 d-flex flex-column" style="list-style:none;">
                    @forelse($latestNews->take(5) as $news)
                    <li class="border-bottom d-flex align-items-center flex-grow-1" style="padding: 8px 0;">
                        <div class="news-content flex-grow-1 pr-2">
                            <div class="meta-info text-primary mb-1" style="font-size: 9px; font-weight: 900; letter-spacing: 1px;">{{ strtoupper($news->category?->name) }}</div>
                            <a href="{{ route('article.show', $news->slug) }}" class="font-weight-bold text-dark d-block" style="line-height: 1.3; font-size: 12px; text-decoration: none;">{{ $news->title }}</a>
                            <div class="text-muted mt-1" style="font-weight: 600; font-size: 9px; letter-spacing:0.3px;">{{ $news->published_at?->diffForHumans() ?? $news->created_at->diffForHumans() }}</div>
                        </div>
                        <div style="flex-shrink: 0;">
                            <a href="{{ route('article.show', $news->slug) }}">
                                <img src="{{ $news->featured_image ? asset('storage/'.$news->featured_image) : 'https://picsum.photos/seed/jubitanews2/200/120' }}"
                                     alt="{{ $news->title }}"
                                     style="width: 66px; height: 55px; object-fit: cover; border: 1px solid #e0e0e0; display:block;">
                            </a>
                        </div>
                    </li>
                    @empty
                    <li class="py-3 text-muted small">Hakuna habari mpya kwa sasa.</li>
                    @endforelse
                </ul>
            </div>
            </div>

        </div>
    </div>
</section>
<!-- =========================== Hero Section End =================================== -->

<!-- =========================== Secondary Stories (4-col grid) =========================== -->
@if($sidePosts->isNotEmpty())
<section style="background:#f4f4f4; padding:12px 0; border-bottom:1px solid #e0e0e0;">
    <div class="container">
        <div class="row no-gutters">
            @foreach($sidePosts->take(4) as $sp)
            <div class="col-lg-3 col-md-6 {{ !$loop->last ? 'border-right' : '' }} px-3 py-2">
                <div class="meta-info mb-1" style="font-size:9px; font-weight:900; letter-spacing:1.5px; color:var(--bloomberg-blue);">{{ strtoupper($sp->category?->name) }}</div>
                <a href="{{ route('article.show', $sp->slug) }}" class="text-decoration-none">
                    <div style="font-family:var(--forbes-font-serif); font-size:13px; font-weight:900; color:#000; line-height:1.3;">{{ $sp->title }}</div>
                </a>
                <div style="font-size:9px; color:#999; font-weight:700; margin-top:4px;">{{ $sp->published_at?->diffForHumans() ?? $sp->created_at->diffForHumans() }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- =========================== Secondary Stories End =========================== -->

<!-- =========================== Markets Ticker Start =================================== -->
<div class="ticker-wrap" style="background: #000; border-bottom: 1px solid #222; padding: 12px 0;">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="px-3 font-weight-bold text-uppercase small border-right mr-3 text-white" style="white-space: nowrap; letter-spacing: 1.5px; border-color: #444 !important; font-size: 11px;">TAARIFA ZA SOKO</div>
            <div class="marquee-wrapper" style="overflow: hidden; width: 100%;">
                <div class="marquee-content" style="display: flex; animation: marquee 60s linear infinite;">
                    @foreach($marketPrices as $price)
                    <div class="d-inline-flex align-items-center px-4 border-right border-secondary" style="border-color: #333 !important; white-space: nowrap;">
                        <span class="small font-weight-bold text-muted text-uppercase" style="font-size: 10px; letter-spacing: 0.5px;">{{ $price->commodity?->name }}</span> 
                        <span class="small ml-2 text-white font-weight-bold" style="font-size: 12px;">Tsh {{ number_format($price->price_max) }}</span>
                        <span class="small ml-1 text-success"><i class="fas fa-caret-up"></i></span>
                    </div>
                    @endforeach
                    @foreach($marketPrices as $price)
                    <div class="d-inline-flex align-items-center px-4 border-right border-secondary" style="border-color: #333 !important; white-space: nowrap;">
                        <span class="small font-weight-bold text-muted text-uppercase" style="font-size: 10px; letter-spacing: 0.5px;">{{ $price->commodity?->name }}</span> 
                        <span class="small ml-2 text-white font-weight-bold" style="font-size: 12px;">Tsh {{ number_format($price->price_max) }}</span>
                        <span class="small ml-1 text-success"><i class="fas fa-caret-up"></i></span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =========================== Markets Ticker End =================================== -->

<!-- =========================== AD ROOM 1 =================================== -->
<div class="ad-container text-center py-2 bg-light border-bottom">
    <div class="container">
        <div class="bg-white border d-inline-block p-2 text-muted small" style="width: 100%; max-width: 970px; height: 90px; line-height: 70px; font-size:11px; letter-spacing:1px; font-weight:700;">
            MATANGAZO — NAFASI YA BIASHARA YAKO
        </div>
    </div>
</div>

<!-- =========================== JIOPOLITIKI Section (Bloomberg Style) =================================== -->
<section class="border-bottom">
    <div class="container">
        <div class="cat-header">
            <h2>Jiopolitiki</h2>
            <a href="{{ route('category.show', 'jiopolitiki') }}" class="view-all text-dark font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none;">Ona Zote <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
        </div>
        <div class="row">
            <!-- Large Bloomberg Feature -->
            <div class="col-lg-6 mb-2 border-right pr-4">
                @if($politicsPosts->isNotEmpty())
                @php $bigP = $politicsPosts->first(); @endphp
                <div class="forbes-card">
                    <figure class="overflow-hidden rounded-0 mb-2">
                        <a href="{{ route('article.show', $bigP->slug) }}">
                            <img src="{{ $bigP->featured_image ? asset('storage/'.$bigP->featured_image) : 'https://picsum.photos/seed/jubitapolitics/800/500' }}" class="img-fluid w-100" style="height: 230px; object-fit: cover;">
                        </a>
                    </figure>
                    <a href="{{ route('article.show', $bigP->slug) }}" class="text-decoration-none">
                        <h3 class="font-weight-bold text-dark mb-1" style="font-size: 1.45rem; line-height: 1.2; font-family: var(--forbes-font-serif);">{{ $bigP->title }}</h3>
                    </a>
                    <p class="text-muted mb-0" style="font-size: 0.88rem; line-height: 1.5;">{{ Str::limit($bigP->excerpt, 130) }}</p>
                </div>
                @endif
            </div>
            
            <!-- Smaller Bloomberg Sidebar Items -->
            <div class="col-lg-6 pl-4">
                @foreach($politicsPosts->skip(1)->take(4) as $post)
                <div class="border-bottom pb-2 mb-2">
                    @if($post->featured_image)
                    <a href="{{ route('article.show', $post->slug) }}">
                        <img src="{{ asset('storage/'.$post->featured_image) }}" class="img-fluid w-100 mb-1" style="height:100px; object-fit:cover;">
                    </a>
                    @endif
                    <a href="{{ route('article.show', $post->slug) }}" class="text-decoration-none">
                        <div class="font-weight-bold text-dark" style="font-family: var(--forbes-font-serif); line-height: 1.25; font-size:13px;">{{ $post->title }}</div>
                    </a>
                    <div class="meta-info mt-1" style="font-size: 9px; color:#999;">{{ $post->published_at?->diffForHumans() }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- =========================== JIOPOLITIKI Section End =================================== -->

<!-- =========================== UCHUMI Section Start =================================== -->
<section class="border-bottom" style="background:#fff; padding:0;">
    {{-- Section header --}}
    <div class="container">
        <div class="cat-header" style="border-bottom-color: #1a7a4a;">
            <h2 style="color:#1a7a4a;">Uchumi</h2>
            <a href="{{ route('category.show', 'uchumi') }}" class="view-all font-weight-bold small text-uppercase" style="letter-spacing:1px; text-decoration:none; color:#1a7a4a;">Ona Zote <i class="fas fa-chevron-right ml-1" style="font-size:10px;"></i></a>
        </div>
    </div>

    {{-- Main feature: horizontal image + text band --}}
    @if($economyPosts->isNotEmpty())
    @php $ep = $economyPosts->first(); @endphp
    <div style="border-top:1px solid #eee; border-bottom:3px solid #1a7a4a; background:#f6faf7;">
        <div class="container p-0">
            <div class="row no-gutters">
                {{-- Image (left 45%) --}}
                <div class="col-lg-5 col-md-12" style="overflow:hidden; max-height:230px; min-height:180px;">
                    <a href="{{ route('article.show', $ep->slug) }}" style="display:block; height:100%;">
                        <img src="{{ $ep->featured_image ? asset('storage/'.$ep->featured_image) : 'https://picsum.photos/seed/jubitauchumi/800/500' }}"
                             style="width:100%; height:230px; object-fit:cover; display:block;">
                    </a>
                </div>
                {{-- Text (right 55%) --}}
                <div class="col-lg-7 col-md-12 d-flex flex-column justify-content-center" style="padding:20px 28px;">
                    <div style="font-size:9px; font-weight:900; letter-spacing:1.5px; text-transform:uppercase; color:#1a7a4a; margin-bottom:8px;">
                        <i class="fas fa-chart-line mr-1"></i> UCHUMI
                    </div>
                    <a href="{{ route('article.show', $ep->slug) }}" class="text-decoration-none">
                        <h3 style="font-family:var(--forbes-font-serif); font-size:1.45rem; font-weight:900; color:#000; line-height:1.22; margin-bottom:10px;">{{ $ep->title }}</h3>
                    </a>
                    <p style="font-size:0.86rem; color:#555; line-height:1.55; margin-bottom:10px;">{{ Str::limit($ep->excerpt, 160) }}</p>
                    <div style="font-size:10px; color:#888; font-weight:700; letter-spacing:0.3px;">
                        Na <span style="color:#000; font-weight:900;">{{ strtoupper($ep->author?->name ?? 'Jubita Desk') }}</span>
                        &nbsp;|&nbsp; {{ $ep->published_at?->format('d M, Y') ?? $ep->created_at->format('d M, Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Secondary stories: 4 text-only columns with green left-border accents --}}
    <div class="container">
        <div class="row no-gutters">
            @forelse($economyPosts->skip(1)->take(4) as $post)
            <div class="col-lg-3 col-md-6 {{ !$loop->last ? 'border-right' : '' }}" style="padding:14px 18px; border-color:#e5e5e5;">
                <div style="border-left:3px solid #1a7a4a; padding-left:10px;">
                    <div style="font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#1a7a4a; margin-bottom:5px;">UCHUMI</div>
                    <a href="{{ route('article.show', $post->slug) }}" class="text-decoration-none">
                        <div style="font-family:var(--forbes-font-serif); font-size:13px; font-weight:900; color:#111; line-height:1.3;">{{ $post->title }}</div>
                    </a>
                    <div style="font-size:9px; color:#999; font-weight:700; margin-top:5px;">{{ $post->published_at?->diffForHumans() ?? $post->created_at->diffForHumans() }}</div>
                </div>
            </div>
            @empty
            <div class="col-12 py-3"><p class="text-muted small mb-0">Habari za Uchumi zinakuja...</p></div>
            @endforelse
        </div>
    </div>
</section>
<!-- =========================== UCHUMI Section End =================================== -->

<!-- =========================== BIASHARA Section Start =================================== -->
<section class="border-bottom" style="padding: 14px 0;">
    <div class="container">
        <div class="cat-header" style="margin-bottom:10px;">
            <h2>Biashara</h2>
            <a href="{{ route('category.show', 'biashara') }}" class="view-all text-dark font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none;">Ona Zote <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
        </div>
        <div class="row no-gutters" style="border:1px solid #ebebeb;">
            @forelse($businessList->take(4) as $biz)
            <div class="col-lg-3 col-md-6 {{ !$loop->last ? 'border-right' : '' }}" style="border-color:#ebebeb;">
                <a href="{{ route('article.show', $biz->slug) }}" class="text-decoration-none d-flex align-items-center" style="padding:10px 14px; gap:10px;">
                    <div style="flex-shrink:0; width:62px; height:46px; overflow:hidden; border:1px solid #f0f0f0;">
                        <img src="{{ $biz->featured_image ? asset('storage/'.$biz->featured_image) : 'https://picsum.photos/seed/jubitarelated/600/400' }}" style="width:100%; height:100%; object-fit:cover;">
                    </div>
                    <div style="min-width:0;">
                        <div style="font-size:8px; color:var(--bloomberg-blue); font-weight:900; letter-spacing:1px; text-transform:uppercase; margin-bottom:3px;">{{ $biz->published_at?->diffForHumans() ?? $biz->created_at->diffForHumans() }}</div>
                        <div class="text-dark font-weight-bold" style="font-size:12px; line-height:1.3; font-family:var(--forbes-font-serif); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $biz->title }}</div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 p-3"><p class="text-muted mb-0" style="font-size:12px;">Habari za biashara zinakuja...</p></div>
            @endforelse
        </div>
    </div>
</section>
<!-- =========================== BIASHARA Section End =================================== -->

<!-- =========================== AD ROOM 2 =================================== -->
<div class="ad-container text-center py-2 bg-dark">
    <div class="container">
        <div class="border d-inline-block p-2" style="width: 100%; max-width: 728px; height: 90px; border-color: #333 !important; line-height: 70px; opacity: 0.4; font-size:11px; font-weight:700; letter-spacing:1px; color:#fff; text-transform:uppercase;">
            MATANGAZO — PREMIUM AD SLOT
        </div>
    </div>
</div>

<!-- =========================== MASOKO Section Start =================================== -->
<section class="bg-dark text-white border-bottom" style="background: #000 !important; border-top: 4px solid var(--forbes-yellow); padding: 28px 0;">
    <div class="container">
        <div class="cat-header border-light" style="border-bottom-color: rgba(255,255,255,0.2);">
            <h2 class="text-white" style="font-family: var(--forbes-font-sans); letter-spacing: 0.5px; font-size: 22px;">Masoko ya Fedha</h2>
            <a href="{{ route('market.prices') }}" class="view-all text-warning font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none; color: var(--forbes-yellow) !important;">Ona Zote <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
        </div>
        <div class="row mt-3">
            @forelse($marketNews->take(4) as $m)
            <div class="col-lg-3 col-md-6 mb-2">
                <div class="border-left border-warning pl-3" style="border-left-width: 3px !important; border-left-color: var(--forbes-yellow) !important;">
                    <div class="meta-info mb-1" style="font-size: 9px; font-weight: 900; letter-spacing: 1.5px; color: var(--forbes-yellow);">MASOKO</div>
                    <a href="{{ route('article.show', $m->slug) }}" class="text-white text-decoration-none">
                        <div class="font-weight-bold mb-0" style="font-family: var(--forbes-font-serif); line-height: 1.3; font-size: 1rem; color: #fff;">{{ $m->title }}</div>
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

<!-- =========================== MARKET PRICES TABLE =================================== -->
@if($marketPrices->isNotEmpty())
<section style="background:#fff; padding:20px 0; border-bottom:1px solid #e0e0e0;">
    <div class="container">
        {{-- Section header --}}
        <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:2px solid #000; padding-bottom:7px; margin-bottom:14px;">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="background:var(--bloomberg-blue); color:#fff; font-size:8px; font-weight:900; text-transform:uppercase; letter-spacing:2px; padding:3px 8px;">LIVE</span>
                <span style="font-family:var(--forbes-font-sans); font-size:17px; font-weight:900; text-transform:uppercase; letter-spacing:-0.5px; color:#000;">Bei za Masoko Tanzania</span>
            </div>
            <a href="{{ route('market.prices') }}" style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#000; text-decoration:none;">
                Ona Bei Zote <i class="fas fa-chevron-right" style="font-size:8px;"></i>
            </a>
        </div>

        {{-- Price data grid - show 4 commodity groups in one row --}}
        <div class="row no-gutters">
            @php $shown = 0; @endphp
            @foreach($marketPrices->groupBy(fn($p) => $p->commodity?->name ?? 'Nyingine') as $cname => $cgroup)
            @if($shown >= 4) @break @endif
            <div class="col-lg-3 col-md-6 mb-0 {{ !($loop->last || $shown == 3) ? 'border-right' : '' }}" style="padding: 0 14px 10px;">
                <div style="border-bottom:2px solid var(--bloomberg-blue); padding-bottom:4px; margin-bottom:6px;">
                    <span style="font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:var(--bloomberg-blue);">{{ $cname }}</span>
                </div>
                @foreach($cgroup->take(3) as $cp)
                <div style="display:flex; justify-content:space-between; align-items:center; padding:3px 0; border-bottom:1px dotted #e8e8e8;">
                    <span style="font-size:10px; color:#666; font-weight:600; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:55%;">{{ Str::limit($cp->location ?? 'Soko', 20) }}</span>
                    <div style="text-align:right;">
                        <span style="font-size:12px; font-weight:900; color:#000;">{{ number_format($cp->price_min) }}</span>
                        <span style="font-size:9px; color:#999; margin-left:1px;">Tsh</span>
                    </div>
                </div>
                @endforeach
                @if($cgroup->first()->price_max > $cgroup->first()->price_min)
                <div style="font-size:9px; color:#999; margin-top:3px;">
                    Kiwango: Tsh {{ number_format($cgroup->first()->price_min) }} – {{ number_format($cgroup->first()->price_max) }}
                </div>
                @endif
            </div>
            @php $shown++; @endphp
            @endforeach
        </div>
    </div>
</section>
@endif
<!-- =========================== MARKET PRICES TABLE End =================================== -->

<!-- =========================== TEKNOLOJIA Section Start =================================== -->
<section class="border-bottom bg-white">
    <div class="container">
        <div class="cat-header">
            <h2>Teknolojia</h2>
            <a href="{{ route('category.show', 'teknolojia') }}" class="view-all text-dark font-weight-bold small text-uppercase" style="letter-spacing: 1px; text-decoration: none;">Ona Zote <i class="fas fa-chevron-right ml-1" style="font-size: 10px;"></i></a>
        </div>
        <div class="row">
            @forelse($techInsightPosts->take(4) as $post)
            <div class="col-lg-3 col-md-6 mb-2">
                <div class="forbes-card">
                    <figure class="overflow-hidden rounded-0 mb-1" style="border:1px solid #e8e8e8;">
                        <a href="{{ route('article.show', $post->slug) }}">
                            <img src="{{ $post->featured_image ? asset('storage/'.$post->featured_image) : 'https://picsum.photos/seed/jubitatech/400/280' }}" class="img-fluid w-100" style="height: 140px; object-fit: cover;">
                        </a>
                    </figure>
                    <div class="meta-info text-primary mb-1" style="font-size: 9px; font-weight: 900; letter-spacing:1px;">TEKNOLOJIA</div>
                    <a href="{{ route('article.show', $post->slug) }}" class="text-decoration-none">
                        <div class="font-weight-bold text-dark mb-1" style="font-family: var(--forbes-font-serif); font-size: 13px; line-height: 1.3;">{{ $post->title }}</div>
                    </a>
                    <div style="font-size:9px; color:#999; font-weight:700;">{{ $post->published_at?->diffForHumans() ?? $post->created_at->diffForHumans() }}</div>
                </div>
            </div>
            @empty
            <div class="col-12"><p class="text-muted">Uchambuzi wa teknolojia unakuja...</p></div>
            @endforelse
        </div>
    </div>
</section>
<!-- =========================== TEKNOLOJIA Section End =================================== -->

<!-- ======================== MARKETPLACE SECTION ==================== -->
<section style="background:#fff; border-bottom: 1px solid var(--forbes-border); padding:24px 0;">
    <div class="container">
        {{-- Header --}}
        <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:3px solid #000; padding-bottom:8px; margin-bottom:18px;">
            <h2 style="font-family:var(--forbes-font-sans); font-size:26px; font-weight:900; text-transform:uppercase; letter-spacing:-0.5px; margin:0;">
                <i class="fas fa-store" style="color:var(--bloomberg-blue);"></i> Soko la Bidhaa
            </h2>
            <a href="{{ route('marketplace.index') }}" style="font-size:11px; font-weight:900; text-transform:uppercase; letter-spacing:1px; text-decoration:none; color:#000;">
                Ona Zote <i class="fas fa-chevron-right" style="font-size:9px;"></i>
            </a>
        </div>

        {{-- Category Tiles --}}
        @if($productCategories->count())
        <div class="row no-gutters mb-3" style="border:1px solid #e0e0e0;">
            @foreach($productCategories as $pcat)
            <div class="col-lg col-md-4 col-6" style="border-right:1px solid #e0e0e0;">
                <a href="{{ route('marketplace.category', $pcat->slug) }}" style="text-decoration:none; display:block; padding:8px 10px; background:#111; text-align:center;">
                    <div style="color:#fff; font-weight:800; font-size:11px; text-transform:uppercase; letter-spacing:0.5px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $pcat->name }}</div>
                </a>
            </div>
            @endforeach
            {{-- Vehicles tile --}}
            <div class="col-lg col-md-4 col-6">
                <a href="{{ route('marketplace.vehicles') }}" style="text-decoration:none; display:block; padding:8px 10px; background:#111; text-align:center;">
                    <div style="color:#fff; font-weight:800; font-size:11px; text-transform:uppercase; letter-spacing:0.5px;">Magari</div>
                </a>
            </div>
        </div>
        @endif

        {{-- Featured Products --}}
        @if($featuredProducts->count())
        <div class="mb-2" style="display:flex; justify-content:space-between; align-items:center;">
            <div style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1.5px; color:#999; border-left:3px solid var(--forbes-yellow); padding-left:10px;">
                <i class="fas fa-star" style="color:var(--forbes-yellow);"></i> Matangazo Maalum
            </div>
        </div>
        <div class="row mb-4">
            @foreach($featuredProducts->take(4) as $fp)
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ route('marketplace.show', $fp->slug) }}" style="text-decoration:none; color:inherit;">
                    <div class="product-card-hover" style="border:2px solid var(--forbes-yellow); overflow:hidden;">
                        <div style="height:150px; overflow:hidden; position:relative;">
                            <img src="{{ $fp->image ? asset('storage/'.$fp->image) : 'https://picsum.photos/seed/jubitaproduct/400/300' }}"
                                 style="width:100%; height:100%; object-fit:cover;">
                            <div style="position:absolute; top:0; left:0; background:var(--forbes-yellow); color:#000; font-size:9px; font-weight:900; padding:3px 10px; text-transform:uppercase; letter-spacing:1px;">
                                <i class="fas fa-star"></i> Maalum
                            </div>
                        </div>
                        <div style="padding:10px 12px;">
                            <div style="font-size:9px; font-weight:900; text-transform:uppercase; color:#999; letter-spacing:0.5px; margin-bottom:3px;">{{ $fp->category?->name }}</div>
                            <div style="font-size:13px; font-weight:900; color:#111; line-height:1.3; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $fp->name }}</div>
                            <div style="font-size:15px; font-weight:900; color:var(--bloomberg-blue); margin-top:4px;">Tsh {{ number_format($fp->price) }}</div>
                            @if($fp->location)<div style="font-size:10px; color:#999; margin-top:2px;"><i class="fas fa-map-marker-alt" style="color:#e74c3c;"></i> {{ $fp->location }}</div>@endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Latest 8 Products --}}
        @if($latestProducts->count())
        <div class="mb-2" style="display:flex; justify-content:space-between; align-items:center;">
            <div style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1.5px; color:#999; border-left:3px solid #000; padding-left:10px;">Matangazo Mapya</div>
            <a href="{{ route('marketplace.index') }}" style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; text-decoration:none; color:#000;">Ona Zote <i class="fas fa-chevron-right" style="font-size:8px;"></i></a>
        </div>
        <div class="row">
            @foreach($latestProducts->take(4) as $lp)
            <div class="col-lg-3 col-md-6 col-6 mb-3">
                <a href="{{ route('marketplace.show', $lp->slug) }}" style="text-decoration:none; color:inherit;">
                    <div class="product-card-hover" style="border:1px solid #e8e8e8; overflow:hidden;">
                        <div style="height:130px; overflow:hidden;">
                            <img src="{{ $lp->image ? asset('storage/'.$lp->image) : 'https://picsum.photos/seed/jubitaproduct/400/300' }}"
                                 style="width:100%; height:100%; object-fit:cover;">
                        </div>
                        <div style="padding:8px 10px;">
                            @if($lp->category)<div style="font-size:9px; font-weight:900; text-transform:uppercase; color:var(--bloomberg-blue); letter-spacing:0.5px; margin-bottom:2px;">{{ $lp->category->name }}</div>@endif
                            <div style="font-size:12px; font-weight:900; color:#111; line-height:1.25; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; margin-bottom:3px;">{{ $lp->name }}</div>
                            <div style="font-size:13px; font-weight:900; color:#000;">Tsh {{ number_format($lp->price) }}</div>
                            @if($lp->location)<div style="font-size:9px; color:#999; margin-top:2px;"><i class="fas fa-map-marker-alt" style="color:#e74c3c;"></i> {{ $lp->location }}</div>@endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Magari / Cars Section --}}
        @if($carProducts->count())
        <div style="margin-top:20px; border-top:3px solid #e74c3c; padding-top:16px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
                <div style="font-family:var(--forbes-font-sans); font-size:17px; font-weight:900; text-transform:uppercase; margin:0; color:#e74c3c;">
                    <i class="fas fa-car"></i> Magari — Yanayouzwa Tanzania
                </div>
                <a href="{{ route('marketplace.vehicles') }}" style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; text-decoration:none; color:#e74c3c;">
                    Ona Yote <i class="fas fa-chevron-right" style="font-size:8px;"></i>
                </a>
            </div>
            <div class="row">
                @foreach($carProducts as $car)
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="{{ route('marketplace.show', $car->slug) }}" style="text-decoration:none; color:inherit;">
                        <div class="product-card-hover" style="border:1px solid #e8e8e8; overflow:hidden; border-top:3px solid #e74c3c;">
                            <div style="height:150px; overflow:hidden; background:#f5f5f5;">
                                <img src="{{ $car->image ? asset('storage/'.$car->image) : 'https://picsum.photos/seed/jubitacar/400/280' }}"
                                     style="width:100%; height:100%; object-fit:cover;">
                            </div>
                            <div style="padding:8px 10px;">
                                <div style="font-size:12px; font-weight:900; color:#111; line-height:1.3; margin-bottom:3px;">{{ $car->name }}</div>
                                @if($car->isVehicle())
                                <div style="font-size:10px; color:#666; margin-bottom:3px;">
                                    @if($car->vehicleMeta('year'))<span style="margin-right:8px;">{{ $car->vehicleMeta('year') }}</span>@endif
                                    @if($car->vehicleMeta('mileage'))<span>{{ number_format($car->vehicleMeta('mileage')) }} km</span>@endif
                                </div>
                                @endif
                                <div style="font-size:14px; font-weight:900; color:#e74c3c;">Tsh {{ number_format($car->price) }}</div>
                                @if($car->location)<div style="font-size:9px; color:#999; margin-top:2px;"><i class="fas fa-map-marker-alt"></i> {{ $car->location }}</div>@endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>
<!-- ======================== End Marketplace Section ==================== -->

<style>
    /* Marketplace product cards — only these get hover lift */
    .product-card-hover { transition: box-shadow 0.22s ease, transform 0.22s ease; }
    .product-card-hover:hover { box-shadow: 0 6px 20px rgba(0,0,0,0.11); transform: translateY(-2px); }

    /* Category tiles */
    .cat-tile { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .cat-tile:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }

    /* News article links — only underline on hover, no scale */
    .article-link:hover { text-decoration: underline !important; }

    /* Marquee */
    .marquee-wrapper { overflow: hidden; width: 100%; }
    .marquee-content { animation: marquee 60s linear infinite; white-space: nowrap; }
    @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
    .marquee-wrapper:hover .marquee-content { animation-play-state: paused; }

    @media (max-width: 768px) {
        .border-right { border-right: none !important; }
    }
</style>

@endsection
