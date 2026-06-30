@extends('website.shared.index')

@section('title', 'Soko la Bidhaa | JUBITA - Tanzania Marketplace')

@section('content')

{{-- ===== MARKETPLACE HERO ===== --}}
<div style="background: linear-gradient(135deg, #000 0%, #1a1a2e 100%); border-bottom: 4px solid #0000ff; padding: 40px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="meta-info text-white mb-2" style="letter-spacing:2px; font-size:10px; opacity:0.6;">JUBITA MARKETPLACE</div>
                <h1 style="color:#fff; font-size:2.8rem; line-height:1.1; letter-spacing:-2px; margin-bottom:10px;">Soko la Bidhaa Tanzania</h1>
                <p style="color:rgba(255,255,255,0.7); font-size:1rem; margin-bottom:0;">Nunua na uza bidhaa — magari, simu, nyumba, na zaidi. Bei halisi, watu halisi.</p>
            </div>
            <div class="col-md-6">
                <form method="GET" action="{{ route('marketplace.index') }}">
                    <div class="input-group input-group-lg" style="box-shadow: 0 4px 20px rgba(0,0,255,0.3);">
                        <input type="text" name="q" class="form-control rounded-0"
                               placeholder="Tafuta bidhaa... gari, simu, nyumba..."
                               value="{{ request('q') }}"
                               style="border:none; font-size:1rem; height:56px;">
                        <span class="input-group-btn">
                            <button class="btn btn-bloomberg" type="submit" style="height:56px; padding:0 30px; border:none;">
                                <i class="fas fa-search"></i> TAFUTA
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ===== CATEGORY PILLS ===== --}}
<div style="background:#fff; border-bottom:2px solid #f0f0f0; padding:15px 0; overflow-x:auto; white-space:nowrap;">
    <div class="container">
        <a href="{{ route('marketplace.index') }}" class="btn btn-sm mr-2 mb-1 {{ !request('cat') ? 'btn-dark' : 'btn-outline-secondary' }}" style="border-radius:20px; font-size:11px; font-weight:800; letter-spacing:0.5px;">
            <i class="fas fa-th"></i> ZOTE
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('marketplace.category', $cat->slug) }}"
           class="btn btn-sm mr-2 mb-1"
           style="border-radius:20px; font-size:11px; font-weight:800; letter-spacing:0.5px; background:{{ $cat->color ?? '#333' }}; color:#fff; border:none;">
            @if($cat->icon)<i class="fa {{ $cat->icon }}"></i> @endif
            {{ strtoupper($cat->name) }}
            @if($cat->products_count > 0)<span style="background:rgba(255,255,255,0.3); padding:1px 6px; border-radius:10px; margin-left:4px;">{{ $cat->products_count }}</span>@endif
        </a>
        @endforeach
        <a href="{{ route('marketplace.vehicles') }}" class="btn btn-sm mr-2 mb-1" style="border-radius:20px; font-size:11px; font-weight:800; background:#e74c3c; color:#fff; border:none;">
            <i class="fas fa-car"></i> MAGARI
        </a>
    </div>
</div>

<div class="container" style="padding-top:30px; padding-bottom:60px;">

    {{-- ===== FEATURED LISTINGS ===== --}}
    @if($featured->count() && !request('q') && !request('cat'))
    <div class="mb-4">
        <div class="cat-header">
            <h2 style="font-size:18px; text-transform:uppercase; font-weight:900;">
                <i class="fas fa-star text-warning"></i> Featured Listings
            </h2>
        </div>
        <div class="row">
            @foreach($featured as $f)
            <div class="col-lg-3 col-md-6 mb-3">
                @include('website.marketplace._card', ['product' => $f, 'featured' => true])
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="row">

        {{-- ===== SIDEBAR FILTERS ===== --}}
        <div class="col-lg-3 col-md-4 mb-4">
            <div style="background:#fff; border:1px solid #e0e0e0; padding:20px;">
                <h5 style="font-weight:900; text-transform:uppercase; letter-spacing:1px; border-bottom:2px solid #000; padding-bottom:10px; margin-bottom:20px; font-size:13px;">Chuja Matokeo</h5>
                <form method="GET" action="{{ route('marketplace.index') }}">
                    @if(request('q'))<input type="hidden" name="q" value="{{ request('q') }}">@endif

                    <div style="margin-bottom:15px;">
                        <label style="font-size:11px; font-weight:800; text-transform:uppercase; letter-spacing:1px;">Hali</label>
                        <select name="condition" class="form-control form-control-sm" style="border-radius:0; font-size:12px;">
                            <option value="">Yote</option>
                            <option value="new"         {{ request('condition') === 'new'         ? 'selected' : '' }}>Mpya</option>
                            <option value="fairly_used" {{ request('condition') === 'fairly_used' ? 'selected' : '' }}>Imetumika Kidogo</option>
                            <option value="used"        {{ request('condition') === 'used'        ? 'selected' : '' }}>Imetumika</option>
                        </select>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label style="font-size:11px; font-weight:800; text-transform:uppercase; letter-spacing:1px;">Mahali</label>
                        <select name="location" class="form-control form-control-sm" style="border-radius:0; font-size:12px;">
                            <option value="">Maeneo Yote</option>
                            @foreach($locations as $loc)
                            <option value="{{ $loc }}" {{ request('location') === $loc ? 'selected' : '' }}>{{ $loc }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom:15px;">
                        <label style="font-size:11px; font-weight:800; text-transform:uppercase; letter-spacing:1px;">Bei (Tsh)</label>
                        <input type="number" name="min_price" class="form-control form-control-sm mb-1" placeholder="Min" value="{{ request('min_price') }}" style="border-radius:0; font-size:12px;">
                        <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Max" value="{{ request('max_price') }}" style="border-radius:0; font-size:12px;">
                    </div>

                    <button type="submit" class="btn btn-dark btn-block btn-sm" style="border-radius:0; font-weight:900; font-size:11px; letter-spacing:1px;">CHUJA</button>
                    @if(request()->hasAny(['condition','location','min_price','max_price']))
                    <a href="{{ route('marketplace.index') }}{{ request('q') ? '?q='.request('q') : '' }}" class="btn btn-outline-secondary btn-block btn-sm mt-1" style="border-radius:0; font-size:11px;">FUTA VICHUJIO</a>
                    @endif
                </form>
            </div>
        </div>

        {{-- ===== PRODUCT GRID ===== --}}
        <div class="col-lg-9 col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div style="font-size:13px; color:#666; font-weight:700;">
                    Bidhaa <strong>{{ $products->total() }}</strong> zimepatikana
                    @if(request('q')) kwa "<strong>{{ request('q') }}</strong>"@endif
                </div>
                <div style="font-size:11px; color:#999; text-transform:uppercase; letter-spacing:1px;">
                    Ukurasa {{ $products->currentPage() }} / {{ $products->lastPage() }}
                </div>
            </div>

            @if($products->count())
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    @include('website.marketplace._card', ['product' => $product])
                </div>
                @endforeach
            </div>
            <div class="mt-3">{{ $products->links() }}</div>
            @else
            <div style="text-align:center; padding:80px 20px; border:2px dashed #e0e0e0;">
                <i class="fas fa-search" style="font-size:3rem; color:#ccc; display:block; margin-bottom:15px;"></i>
                <h4 style="font-weight:900; color:#333;">Hakuna bidhaa zilizopatikana</h4>
                <p style="color:#999;">Jaribu tena na maneno tofauti au futa vichujio.</p>
                <a href="{{ route('marketplace.index') }}" class="btn-bloomberg" style="display:inline-block; padding:12px 30px; margin-top:15px;">ONA ZOTE</a>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
