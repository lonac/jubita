@extends('website.shared.index')

@section('title', $title)

@section('content')

<!-- =========================== Category Header =================================== -->
<section class="py-5 border-bottom bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="display-4 font-weight-bold mb-3" style="font-family: var(--forbes-font-sans); letter-spacing: -2px; text-transform: uppercase;">{{ $title }}</h1>
                    <p class="lead text-muted">{{ $category->description ?? 'Habari na uchambuzi wa kina kuhusu '.$title }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================== Main Content =================================== -->
<section class="bg-light">
    <div class="container">
        <div class="row">
            
            <!-- Left Column: Main Story -->
            <div class="col-lg-8 border-right pr-lg-5">
                @if($featuredPost)
                <article class="mb-5">
                    <a href="{{ route('article.show', $featuredPost->slug) }}" class="text-decoration-none">
                        <img src="{{ $featuredPost->featured_image ? asset('storage/'.$featuredPost->featured_image) : 'https://picsum.photos/seed/jubitanews/1200/600' }}" class="img-fluid w-100 mb-4" style="max-height: 450px; object-fit: cover;">
                        <h2 class="display-5 font-weight-bold text-dark mb-3" style="font-family: var(--forbes-font-serif); line-height: 1.1;">{{ $featuredPost->title }}</h2>
                    </a>
                    <p class="lead text-dark mb-4" style="font-family: var(--forbes-font-serif); font-size: 1.2rem;">{{ $featuredPost->excerpt }}</p>
                    <div class="d-flex align-items-center border-top pt-3">
                        <span class="text-muted small font-weight-bold text-uppercase" style="letter-spacing: 1px;">Na {{ $featuredPost->author?->name ?? 'Jubita Desk' }} | {{ $featuredPost->published_at?->format('d M, Y') }}</span>
                    </div>
                </article>
                @endif

                <div class="row">
                    @foreach($categoryPosts as $post)
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 bg-transparent h-100">
                            <a href="{{ route('article.show', $post->slug) }}" class="text-decoration-none">
                                <img src="{{ $post->featured_image ? asset('storage/'.$post->featured_image) : 'https://picsum.photos/seed/jubitarelated/600/400' }}" class="card-img-top rounded-0 mb-3" style="height: 200px; object-fit: cover;">
                                <h4 class="h5 font-weight-bold text-dark mb-2" style="font-family: var(--forbes-font-serif); line-height: 1.3;">{{ $post->title }}</h4>
                            </a>
                            <p class="small text-muted mb-0">Na {{ $post->author?->name ?? 'Jubita Desk' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $categoryPosts->links() }}
                </div>
            </div>

            <!-- Right Column: Sidebar -->
            <div class="col-lg-4 pl-lg-5">
                <div class="cat-header mb-4">
                    <h2 style="font-size: 18px;">Hivi Punde katika {{ $title }}</h2>
                </div>
                <ul class="list-unstyled">
                    @php
                        $latestInCategory = App\Models\Content\Content::where('category_id', $category->id)
                            ->orWhereIn('category_id', $category->children->pluck('id'))
                            ->latest()
                            ->take(5)
                            ->get();
                    @endphp
                    @foreach($latestInCategory as $news)
                    <li class="pb-3 mb-3 border-bottom">
                        <a href="{{ route('article.show', $news->slug) }}" class="text-dark font-weight-bold text-decoration-none" style="font-size: 0.95rem; line-height: 1.4; display: block;">{{ $news->title }}</a>
                        <small class="text-muted">{{ $news->published_at?->diffForHumans() }}</small>
                    </li>
                    @endforeach
                </ul>

                <!-- Newsletter / Ad Placeholder -->
                <div class="bg-dark text-white p-4 mt-5">
                    <h4 class="font-weight-bold mb-3" style="font-family: var(--forbes-font-sans); font-size: 1.2rem;">JUBITA DAILY</h4>
                    <p class="small mb-4">Pata habari muhimu za biashara na uchumi moja kwa moja kwenye email yako kila siku.</p>
                    <div class="input-group">
                        <input type="text" class="form-control rounded-0 border-0" placeholder="Email yako...">
                        <div class="input-group-append">
                            <button class="btn btn-bloomberg">JIUNGE</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
