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

    <!-- =========================== Article Header Start =================================== -->
    <section class="page-title gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route(strtolower($article->category?->name ?? 'home')) }}">{{ $article->category?->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
                        </ol>
                        <h2 class="breadcrumb-title">{{ $article->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========================== Article Header End =================================== -->

    <!-- =========================== Article Detail Start =================================== -->
    <section>
        <div class="container">
            <div class="row">
                
                <!-- Blog Detail -->
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="article_detail_wrappers">
                        <div class="article_body_wrap">
                        
                            <div class="article_featured_image">
                                <img src="{{ $article->featured_image ? asset('storage/'.$article->featured_image) : asset('assets/img/img.webp') }}" class="img-fluid" alt="{{ $article->title }}">
                            </div>
                            
                            <div class="article_top_info">
                                <ul class="article_middle_info">
                                    <li><a href="#"><span class="icons"><i class="ti-user"></i></span>by {{ $article->author?->name ?? 'Jubita Desk' }}</a></li>
                                    <li><a href="#"><span class="icons"><i class="ti-calendar"></i></span>{{ $article->published_at?->format('d M, Y') ?? $article->created_at->format('d M, Y') }}</a></li>
                                    <li><a href="#"><span class="icons"><i class="ti-tag"></i></span>{{ $article->category?->name }}</a></li>
                                </ul>
                            </div>
                            
                            <h2 class="post-title">{{ $article->title }}</h2>
                            
                            <div class="article_text_content">
                                {!! $article->content !!}
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- Author Detail -->
                    <div class="article_detail_wrappers mt-4">
                        <div class="article_body_wrap">
                            <div class="author_details">
                                <div class="author_img">
                                    <img src="https://via.placeholder.com/500x500" class="img-fluid circle" alt="">
                                </div>
                                <div class="author_caption">
                                    <h4>{{ $article->author?->name ?? 'Jubita Desk' }}</h4>
                                    <p>Senior Editorial Staff at JUBITA covering {{ $article->category?->name }}. Professional insights on Tanzanian and Global markets.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="article_sidebar">
                        
                        <!-- Related Posts -->
                        <div class="single_sidebar_widgets">
                            <h4 class="title">Related Stories</h4>
                            <div class="sidebar_list_item">
                                @foreach($relatedPosts as $related)
                                <div class="news_item">
                                    <div class="news_thumb">
                                        <a href="{{ route('article.show', $related->slug) }}">
                                            <img src="{{ $related->featured_image ? asset('storage/'.$related->featured_image) : asset('assets/img/tr.webp') }}" class="img-fluid" alt="{{ $related->title }}">
                                        </a>
                                    </div>
                                    <div class="news_caption">
                                        <h4><a href="{{ route('article.show', $related->slug) }}">{{ $related->title }}</a></h4>
                                        <span>{{ $related->published_at?->format('d M, Y') ?? $related->created_at->format('d M, Y') }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Newsletter -->
                        <div class="single_sidebar_widgets">
                            <h4 class="title">Subscribe</h4>
                            <div class="newsletter_widget">
                                <p>Get the latest insights from JUBITA delivered to your inbox.</p>
                                <form>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email Address">
                                        <button type="submit" class="btn btn-theme">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- =========================== Article Detail End =================================== -->

@endsection
