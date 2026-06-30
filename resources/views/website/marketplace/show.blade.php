@extends('website.shared.index')

@section('title', $product->name . ' | JUBITA Marketplace')

@section('content')

<div style="background:#f5f5f5; padding:10px 0; border-bottom:1px solid #e0e0e0;">
    <div class="container">
        <nav style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#999;">
            <a href="{{ route('home') }}" style="color:#999; text-decoration:none;">Nyumbani</a>
            <span style="margin:0 8px;">/</span>
            <a href="{{ route('marketplace.index') }}" style="color:#999; text-decoration:none;">Soko</a>
            @if($product->category)
            <span style="margin:0 8px;">/</span>
            <a href="{{ route('marketplace.category', $product->category->slug) }}" style="color:#999; text-decoration:none;">{{ $product->category->name }}</a>
            @endif
            <span style="margin:0 8px;">/</span>
            <span style="color:#000;">{{ Str::limit($product->name, 40) }}</span>
        </nav>
    </div>
</div>

<div class="container" style="padding-top:30px; padding-bottom:60px;">
    <div class="row">

        {{-- ===== LEFT: Images + Details ===== --}}
        <div class="col-lg-8">

            {{-- Image Gallery --}}
            <div style="background:#fff; border:1px solid #e0e0e0; padding:0; margin-bottom:20px; overflow:hidden;">
                {{-- Main Image --}}
                <div style="position:relative; background:#f0f0f0; height:420px; overflow:hidden;">
                    <img id="main-img"
                         src="{{ $product->image ? asset('storage/'.$product->image) : 'https://picsum.photos/seed/jubitaproduct/900/600' }}"
                         alt="{{ $product->name }}"
                         style="width:100%; height:100%; object-fit:contain; cursor:zoom-in;"
                         onclick="openLightbox(this.src)">

                    {{-- Condition Badge --}}
                    <div style="position:absolute; top:15px; left:15px;">
                        <span style="background:{{ $product->condition === 'new' ? '#27ae60' : ($product->condition === 'fairly_used' ? '#e67e22' : '#7f8c8d') }}; color:#fff; font-size:10px; font-weight:900; padding:4px 12px; text-transform:uppercase; letter-spacing:1px;">
                            {{ $product->condition_label }}
                        </span>
                        @if($product->is_featured)
                        <span style="background:#f1c40f; color:#000; font-size:10px; font-weight:900; padding:4px 12px; text-transform:uppercase; letter-spacing:1px; margin-left:5px;">
                            <i class="fas fa-star"></i> Featured
                        </span>
                        @endif
                    </div>
                </div>

                {{-- Thumbnails --}}
                @php
                    $allImages = [];
                    if ($product->image) $allImages[] = asset('storage/'.$product->image);
                    foreach ($product->images as $img) $allImages[] = asset('storage/'.$img->image_path);
                @endphp
                @if(count($allImages) > 1)
                <div style="display:flex; gap:8px; padding:10px; overflow-x:auto; background:#f9f9f9;">
                    @foreach($allImages as $i => $imgUrl)
                    <img src="{{ $imgUrl }}" alt="Picha {{ $i+1 }}"
                         onclick="document.getElementById('main-img').src = this.src"
                         style="width:80px; height:60px; object-fit:cover; cursor:pointer; border:2px solid {{ $i === 0 ? '#0000ff' : '#e0e0e0' }}; flex-shrink:0; transition:border-color 0.2s;"
                         class="thumb-img">
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Product Title + Meta --}}
            <div style="background:#fff; border:1px solid #e0e0e0; padding:25px; margin-bottom:20px;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h1 style="font-size:1.7rem; font-weight:900; line-height:1.2; margin:0; letter-spacing:-0.5px;">{{ $product->name }}</h1>
                    <div style="text-align:right; flex-shrink:0; margin-left:20px;">
                        <div style="font-size:26px; font-weight:900; color:#0000ff;">Tsh {{ number_format($product->price) }}</div>
                        @if($product->old_price)
                        <del style="font-size:14px; color:#999;">Tsh {{ number_format($product->old_price) }}</del>
                        @endif
                    </div>
                </div>

                <div style="display:flex; flex-wrap:wrap; gap:15px; font-size:12px; color:#666; border-top:1px solid #f0f0f0; border-bottom:1px solid #f0f0f0; padding:12px 0; margin:15px 0;">
                    @if($product->location)
                    <span><i class="fas fa-map-marker-alt" style="color:#e74c3c;"></i> {{ $product->location }}</span>
                    @endif
                    @if($product->category)
                    <span><i class="fas fa-tag" style="color:#3498db;"></i> {{ $product->category->name }}</span>
                    @endif
                    <span><i class="fas fa-eye" style="color:#95a5a6;"></i> {{ number_format($product->views) }} views</span>
                    <span><i class="fas fa-clock" style="color:#95a5a6;"></i> {{ $product->created_at->diffForHumans() }}</span>
                </div>

                {{-- Vehicle Specs (special display) --}}
                @if($product->isVehicle() && $product->meta)
                <div style="background:#f8f9fa; border-left:4px solid #f1c40f; padding:20px; margin-bottom:20px;">
                    <h5 style="font-weight:900; text-transform:uppercase; font-size:12px; letter-spacing:1.5px; margin-bottom:15px; color:#333;">
                        <i class="fas fa-car" style="color:#f1c40f;"></i> Vehicle Specifications
                    </h5>
                    <div class="row">
                        @php
                            $specs = [
                                'make'         => ['label' => 'Make / Brand',    'icon' => 'fa-industry'],
                                'model'        => ['label' => 'Model',           'icon' => 'fa-car'],
                                'year'         => ['label' => 'Year',            'icon' => 'fa-calendar'],
                                'mileage'      => ['label' => 'Mileage',         'icon' => 'fa-tachometer'],
                                'fuel_type'    => ['label' => 'Fuel Type',       'icon' => 'fa-gas-pump'],
                                'transmission' => ['label' => 'Transmission',    'icon' => 'fa-cogs'],
                                'color'        => ['label' => 'Color',           'icon' => 'fa-paint-brush'],
                                'body_type'    => ['label' => 'Body Type',       'icon' => 'fa-car-side'],
                                'engine_cc'    => ['label' => 'Engine',          'icon' => 'fa-bolt'],
                            ];
                        @endphp
                        @foreach($specs as $key => $spec)
                        @if($product->vehicleMeta($key))
                        <div class="col-sm-4 mb-2">
                            <div style="font-size:10px; text-transform:uppercase; letter-spacing:1px; color:#999; font-weight:700;">{{ $spec['label'] }}</div>
                            <div style="font-size:14px; font-weight:800; color:#111;">
                                @if($key === 'mileage')
                                    {{ number_format($product->vehicleMeta($key)) }} km
                                @else
                                    {{ ucfirst($product->vehicleMeta($key)) }}
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Description --}}
                @if($product->description)
                <div>
                    <h5 style="font-weight:900; text-transform:uppercase; font-size:12px; letter-spacing:1px; margin-bottom:12px; border-bottom:2px solid #000; padding-bottom:8px;">Maelezo</h5>
                    <div style="font-size:15px; line-height:1.7; color:#333; white-space:pre-line;">{{ $product->description }}</div>
                </div>
                @endif
            </div>
        </div>

        {{-- ===== RIGHT: Seller + Actions ===== --}}
        <div class="col-lg-4">

            {{-- Price Card --}}
            <div style="background:#fff; border:2px solid #0000ff; padding:25px; margin-bottom:20px; position:sticky; top:80px;">
                <div style="font-size:28px; font-weight:900; color:#0000ff; margin-bottom:5px;">Tsh {{ number_format($product->price) }}</div>
                @if($product->old_price)
                <div style="font-size:13px; color:#999; margin-bottom:15px;"><del>Tsh {{ number_format($product->old_price) }}</del> <span style="color:#e74c3c; font-weight:700; font-size:11px;">Punguzo!</span></div>
                @endif

                <hr style="border-color:#f0f0f0; margin:15px 0;">

                {{-- Seller --}}
                <div style="margin-bottom:20px;">
                    <div style="font-size:10px; text-transform:uppercase; letter-spacing:1px; color:#999; font-weight:700; margin-bottom:8px;">Muuzaji</div>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div style="width:44px; height:44px; background:#000; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fas fa-user" style="color:#fff; font-size:18px;"></i>
                        </div>
                        <div>
                            <div style="font-weight:900; font-size:15px; color:#111;">{{ $product->seller_name ?? 'Muuzaji' }}</div>
                            @if($product->location)
                            <div style="font-size:11px; color:#999;"><i class="fas fa-map-marker-alt" style="color:#e74c3c;"></i> {{ $product->location }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- CTA Buttons --}}
                @if($product->phone)
                <a href="tel:{{ preg_replace('/\s+/', '', $product->phone) }}"
                   style="display:block; background:#27ae60; color:#fff; text-align:center; padding:14px; font-weight:900; font-size:14px; text-transform:uppercase; letter-spacing:1px; text-decoration:none; margin-bottom:10px; transition:0.2s;"
                   onmouseover="this.style.background='#219a52'" onmouseout="this.style.background='#27ae60'">
                    <i class="fas fa-phone"></i> &nbsp;{{ $product->phone }}
                </a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->phone) }}?text={{ urlencode('Habari, ninahusika na tangazo lako la "'.$product->name.'" kwenye JUBITA. Bei yako bado ipo?') }}"
                   target="_blank"
                   style="display:block; background:#25D366; color:#fff; text-align:center; padding:12px; font-weight:900; font-size:13px; text-transform:uppercase; letter-spacing:1px; text-decoration:none; margin-bottom:10px; transition:0.2s;">
                    <i class="fab fa-whatsapp"></i> &nbsp;Wasiliana WhatsApp
                </a>
                @endif

                <div style="font-size:11px; text-align:center; color:#999; margin-top:15px; padding-top:15px; border-top:1px solid #f0f0f0;">
                    <i class="fas fa-shield-alt" style="color:#27ae60;"></i>
                    Tahadhari: Jiepushe na malipo ya mapema kabla ya kuona bidhaa.
                </div>
            </div>

            {{-- Share --}}
            <div style="background:#fff; border:1px solid #e0e0e0; padding:15px; margin-bottom:20px;">
                <div style="font-size:11px; font-weight:800; text-transform:uppercase; letter-spacing:1px; margin-bottom:12px;">Shiriki</div>
                <div style="display:flex; gap:8px;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                       style="flex:1; background:#3b5998; color:#fff; text-align:center; padding:8px; text-decoration:none; font-size:12px; font-weight:700;">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($product->name . ' - Tsh '.number_format($product->price).' | '.request()->url()) }}" target="_blank"
                       style="flex:1; background:#25D366; color:#fff; text-align:center; padding:8px; text-decoration:none; font-size:12px; font-weight:700;">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($product->name.' - Tsh '.number_format($product->price)).'&url='.urlencode(request()->url()) }}" target="_blank"
                       style="flex:1; background:#1da1f2; color:#fff; text-align:center; padding:8px; text-decoration:none; font-size:12px; font-weight:700;">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- ===== RELATED LISTINGS ===== --}}
    @if($related->count())
    <div class="mt-4">
        <div class="cat-header">
            <h2 style="font-size:18px;">Bidhaa Zinazofanana</h2>
        </div>
        <div class="row">
            @foreach($related as $r)
            <div class="col-lg-2 col-md-4 col-sm-4 col-6 mb-3">
                @include('website.marketplace._card', ['product' => $r])
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

{{-- Lightbox --}}
<div id="lightbox" onclick="document.getElementById('lightbox').style.display='none'"
     style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.9); z-index:99999; cursor:zoom-out; align-items:center; justify-content:center;">
    <img id="lightbox-img" src="" style="max-width:90%; max-height:90vh; object-fit:contain;">
</div>

<script>
function openLightbox(src) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox').style.display = 'flex';
}
// Thumbnail click update main
document.querySelectorAll('.thumb-img').forEach(function(img) {
    img.addEventListener('click', function() {
        document.querySelectorAll('.thumb-img').forEach(t => t.style.borderColor = '#e0e0e0');
        this.style.borderColor = '#0000ff';
    });
});
</script>
@endsection
