@extends('website.shared.index')

@section('title', $article->title . ' - JUBITA')

@section('meta')
    <meta name="description" content="{{ $article->excerpt }}">
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ $article->excerpt }}">
    <meta property="og:image" content="{{ $article->featured_image ? asset('storage/'.$article->featured_image) : asset('assets/img/logo2.png') }}">
    <meta property="og:url" content="{{ route('article.show', $article->slug) }}">
    <meta property="og:type" content="article">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')

<!-- =========================== Article Detail Start =================================== -->
<section class="bg-white py-5">
    <div class="container">
        <div class="row justify-content-center">
            
            <!-- Main Content -->
            <div class="col-lg-8 col-md-12">
                <article class="article-container">
                    
                    <!-- Meta info -->
                    <div class="article-meta mb-4">
                        <span class="text-danger font-weight-bold text-uppercase" style="letter-spacing: 1px; font-size: 13px;">{{ $article->category?->name }}</span>
                        <h1 class="display-4 font-weight-bold mt-2 mb-4" style="font-family: var(--forbes-font-serif); line-height: 1.1; color: #000; letter-spacing: -1.5px;">{{ $article->title }}</h1>
                        
                        <div class="d-flex align-items-center border-top border-bottom py-3 mb-4">
                            <img src="https://via.placeholder.com/50x50" class="rounded-circle mr-3" alt="{{ $article->author?->name }}">
                            <div>
                                <p class="mb-0 font-weight-bold" style="font-size: 14px;">Na <span class="text-dark">{{ strtoupper($article->author?->name ?? 'Jubita Desk') }}</span></p>
                                <p class="mb-0 text-muted small">{{ $article->published_at?->format('d M, Y') ?? $article->created_at->format('d M, Y') }} | JUBITA MEDIA</p>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <figure class="mb-5">
                        <img src="{{ $article->featured_image ? asset('storage/'.$article->featured_image) : 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?q=80&w=1200' }}" class="img-fluid w-100" alt="{{ $article->title }}" style="max-height: 600px; object-fit: cover;">
                        @if($article->excerpt)
                        <figcaption class="mt-3 text-muted font-italic small border-left pl-3">{{ $article->excerpt }}</figcaption>
                        @endif
                    </figure>

                    <!-- Article Body -->
                    <div class="article-body text-dark" style="font-family: var(--forbes-font-serif); font-size: 1.25rem; line-height: 1.8;">
                        {!! $article->content !!}
                    </div>

                    <!-- Social Share -->
                    <div class="social-share-wrap border-top mt-5 pt-4">
                        <h6 class="font-weight-bold text-uppercase small mb-3">Share this story</h6>
                        <a href="#" class="btn btn-outline-dark btn-sm rounded-0 mr-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-outline-dark btn-sm rounded-0 mr-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-outline-dark btn-sm rounded-0 mr-2"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="btn btn-outline-dark btn-sm rounded-0 mr-2"><i class="fas fa-link"></i></a>
                    </div>
                </article>

                <!-- Related Stories -->
                <div class="related-stories mt-5 pt-5 border-top">
                    <div class="cat-header mb-4">
                        <h2 style="font-size: 20px;">Habari Zinazohusiana</h2>
                    </div>
                    <div class="row">
                        @foreach($relatedPosts as $related)
                        <div class="col-md-4 mb-4">
                            <a href="{{ route('article.show', $related->slug) }}" class="text-decoration-none">
                                <img src="{{ $related->featured_image ? asset('storage/'.$related->featured_image) : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=600' }}" class="img-fluid mb-3" style="height: 120px; width: 100%; object-fit: cover;">
                                <h6 class="font-weight-bold text-dark" style="font-family: var(--forbes-font-serif); line-height: 1.3;">{{ $related->title }}</h6>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="sticky-top" style="top: 100px;">
                    <div class="bg-light p-4 mb-4">
                        <h5 class="font-weight-bold mb-3" style="font-size: 16px;">JUBITA PRO</h5>
                        <p class="small text-muted">Uchambuzi wa kina na ripoti za kipekee kwa wanachama wetu pekee.</p>
                        <a href="#" class="btn btn-bloomberg btn-block btn-sm">JIUNGE SASA</a>
                    </div>
                    
                    <div class="border-top pt-4">
                        <h6 class="font-weight-bold text-uppercase small mb-3">TAARIFA ZA SOKO</h6>
                        @php
                            $marketPrices = App\Models\Market\MarketPrice::with('commodity')->latest()->take(5)->get();
                        @endphp
                        @foreach($marketPrices as $price)
                        <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                            <span class="small font-weight-bold text-uppercase">{{ $price->commodity?->name }}</span>
                            <span class="small text-success font-weight-bold">Tsh {{ number_format($price->price_max) }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
