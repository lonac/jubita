@php
    $img = $product->image
        ? asset('storage/'.$product->image)
        : 'https://picsum.photos/seed/jubitaproduct/400/300';
    $isFeatured = $featured ?? false;
@endphp
<a href="{{ route('marketplace.show', $product->slug) }}" class="text-decoration-none d-block" style="color:inherit;">
<div class="market-card" style="background:#fff; border:1px solid #e8e8e8; transition:all 0.25s; overflow:hidden; {{ $isFeatured ? 'border-top:3px solid #f1c40f;' : '' }}">

    {{-- Image --}}
    <div style="position:relative; overflow:hidden; height:180px; background:#f5f5f5;">
        <img src="{{ $img }}" alt="{{ $product->name }}"
             style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s;">
        {{-- Badges --}}
        <div style="position:absolute; top:8px; left:8px; display:flex; flex-direction:column; gap:4px;">
            @if($product->is_featured)
            <span style="background:#f1c40f; color:#000; font-size:9px; font-weight:900; padding:2px 8px; text-transform:uppercase; letter-spacing:1px;">
                <i class="fas fa-star"></i> Featured
            </span>
            @endif
            <span style="background:{{ $product->condition === 'new' ? '#27ae60' : ($product->condition === 'fairly_used' ? '#e67e22' : '#95a5a6') }}; color:#fff; font-size:9px; font-weight:900; padding:2px 8px; text-transform:uppercase; letter-spacing:1px;">
                {{ $product->condition_label }}
            </span>
        </div>
        @if($product->category)
        <div style="position:absolute; bottom:8px; right:8px;">
            <span style="background:rgba(0,0,0,0.7); color:#fff; font-size:9px; font-weight:800; padding:2px 8px; letter-spacing:0.5px; text-transform:uppercase;">
                @if($product->category->icon)<i class="fa {{ $product->category->icon }}"></i> @endif
                {{ $product->category->name }}
            </span>
        </div>
        @endif
    </div>

    {{-- Body --}}
    <div style="padding:12px 14px 14px;">
        <h6 style="font-weight:900; margin:0 0 6px; line-height:1.3; font-size:13px; color:#111; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;" title="{{ $product->name }}">
            {{ $product->name }}
        </h6>

        {{-- Vehicle quick specs --}}
        @if($product->isVehicle() && $product->meta)
        <div style="font-size:11px; color:#666; margin-bottom:6px; display:flex; flex-wrap:wrap; gap:8px;">
            @if($product->vehicleMeta('year'))<span><i class="fas fa-calendar-alt" style="color:#999;"></i> {{ $product->vehicleMeta('year') }}</span>@endif
            @if($product->vehicleMeta('mileage'))<span><i class="fas fa-tachometer-alt" style="color:#999;"></i> {{ number_format($product->vehicleMeta('mileage')) }} km</span>@endif
            @if($product->vehicleMeta('fuel_type'))<span><i class="fas fa-gas-pump" style="color:#999;"></i> {{ ucfirst($product->vehicleMeta('fuel_type')) }}</span>@endif
            @if($product->vehicleMeta('transmission'))<span><i class="fas fa-cogs" style="color:#999;"></i> {{ ucfirst($product->vehicleMeta('transmission')) }}</span>@endif
        </div>
        @endif

        {{-- Price --}}
        <div style="margin-bottom:8px;">
            <span style="font-size:17px; font-weight:900; color:#0000ff; font-family:'Work Sans',sans-serif;">
                Tsh {{ number_format($product->price) }}
            </span>
            @if($product->old_price)
            <del style="font-size:11px; color:#999; margin-left:6px;">Tsh {{ number_format($product->old_price) }}</del>
            @endif
        </div>

        {{-- Meta --}}
        <div style="display:flex; justify-content:space-between; align-items:center; font-size:10px; color:#999; border-top:1px solid #f0f0f0; padding-top:8px; margin-top:auto;">
            <span>
                @if($product->location)<i class="fas fa-map-marker-alt" style="color:#e74c3c;"></i> {{ $product->location }}@endif
            </span>
            <span><i class="fas fa-eye"></i> {{ number_format($product->views) }}</span>
        </div>
    </div>
</div>
</a>

<style>
.market-card:hover { box-shadow: 0 8px 25px rgba(0,0,0,0.12); transform: translateY(-3px); }
.market-card:hover img { transform: scale(1.04); }
</style>
