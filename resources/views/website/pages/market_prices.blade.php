@extends('website.shared.index')

@section('title', 'Bei za Soko Tanzania | JUBITA')

@section('content')

{{-- Hero --}}
<div style="background:#000; border-bottom:4px solid var(--bloomberg-blue); padding:40px 0;">
    <div class="container">
        <div class="meta-info text-white mb-2" style="letter-spacing:2px; font-size:10px; opacity:0.6;">JUBITA MARKET DATA — TANZANIA</div>
        <div class="d-flex justify-content-between align-items-start flex-wrap">
            <div>
                <h1 style="color:#fff; font-size:2.2rem; letter-spacing:-1.5px; margin:0;">Bei za Masoko Tanzania</h1>
                <p style="color:rgba(255,255,255,0.5); font-size:0.9rem; margin-top:8px; margin-bottom:0;">
                    Bei za bidhaa msingi — kutoka kijiji hadi mjini — zinasasishwa kila siku.
                </p>
            </div>
            <div style="text-align:right; color:rgba(255,255,255,0.4); font-size:11px; font-weight:700; padding-top:8px;">
                <div>Ilisasishwa: {{ now()->format('d M Y, H:i') }}</div>
                <div style="margin-top:4px;">Vyanzo: Masoko {{ $prices->total() }}+ ya Tanzania</div>
            </div>
        </div>

        {{-- Quick stats bar --}}
        <div style="display:flex; gap:24px; margin-top:24px; flex-wrap:wrap;">
            @php
                $trendingCount = $prices->getCollection()->where('market_type','trending')->count();
                $hotCount      = $prices->getCollection()->where('market_type','hot_offer')->count();
                $locations     = $prices->getCollection()->pluck('location')->unique()->filter()->count();
            @endphp
            <div style="border-left:3px solid var(--bloomberg-blue); padding:0 16px;">
                <div style="font-size:22px; font-weight:900; color:#fff;">{{ number_format($prices->total()) }}</div>
                <div style="font-size:10px; text-transform:uppercase; letter-spacing:1px; color:rgba(255,255,255,0.4);">Bei Zilizorekodiwa</div>
            </div>
            <div style="border-left:3px solid #f1d302; padding:0 16px;">
                <div style="font-size:22px; font-weight:900; color:#f1d302;">{{ $trendingCount }}</div>
                <div style="font-size:10px; text-transform:uppercase; letter-spacing:1px; color:rgba(255,255,255,0.4);">Bei Zinazoopanda</div>
            </div>
            <div style="border-left:3px solid #27ae60; padding:0 16px;">
                <div style="font-size:22px; font-weight:900; color:#27ae60;">{{ $hotCount }}</div>
                <div style="font-size:10px; text-transform:uppercase; letter-spacing:1px; color:rgba(255,255,255,0.4);">Bei za Punguzo</div>
            </div>
            <div style="border-left:3px solid #e74c3c; padding:0 16px;">
                <div style="font-size:22px; font-weight:900; color:#fff;">{{ $locations }}</div>
                <div style="font-size:10px; text-transform:uppercase; letter-spacing:1px; color:rgba(255,255,255,0.4);">Masoko Yaliyofuatwa</div>
            </div>
        </div>
    </div>
</div>

{{-- Filter bar --}}
<div style="background:#fff; border-bottom:1px solid #e0e0e0; padding:12px 0;">
    <div class="container">
        <form method="GET" action="{{ route('market.prices') }}" style="display:flex; gap:10px; flex-wrap:wrap; align-items:center;">
            <input type="text" name="q" value="{{ request('q') }}"
                   placeholder="Tafuta bidhaa (mchele, mahindi, petroli...)"
                   style="border:2px solid #e0e0e0; padding:8px 14px; font-size:13px; font-weight:600; font-family:inherit; outline:none; flex:1; min-width:200px;">
            <select name="region" style="border:2px solid #e0e0e0; padding:8px 14px; font-size:13px; font-family:inherit; outline:none; background:#fff;">
                <option value="">Mkoa/Soko Wote</option>
                @foreach(['Dar es Salaam','Arusha','Moshi','Mwanza','Dodoma','Morogoro','Tanga','Iringa','Mbeya','Shinyanga','Mtwara','Zanzibar','Kigoma','Musoma'] as $r)
                <option value="{{ $r }}" {{ request('region') == $r ? 'selected' : '' }}>{{ $r }}</option>
                @endforeach
            </select>
            <select name="type" style="border:2px solid #e0e0e0; padding:8px 14px; font-size:13px; font-family:inherit; outline:none; background:#fff;">
                <option value="">Hali Yote</option>
                <option value="trending"  {{ request('type') == 'trending'  ? 'selected' : '' }}>Zinazoopanda</option>
                <option value="hot_offer" {{ request('type') == 'hot_offer' ? 'selected' : '' }}>Punguzo</option>
                <option value="update"    {{ request('type') == 'update'    ? 'selected' : '' }}>Kawaida</option>
            </select>
            <button type="submit" style="background:#000; color:#fff; border:none; padding:8px 20px; font-size:12px; font-weight:900; text-transform:uppercase; letter-spacing:1px; cursor:pointer; font-family:inherit;">
                <i class="fas fa-search"></i> Tafuta
            </button>
            @if(request()->hasAny(['q','region','type']))
            <a href="{{ route('market.prices') }}" style="font-size:12px; color:#999; font-weight:700; text-decoration:none;">Futa &times;</a>
            @endif
        </form>
    </div>
</div>

<div class="container" style="padding-top:36px; padding-bottom:60px;">

    @php
        // Group prices by commodity name for the card display
        $grouped = $prices->getCollection()->groupBy(fn($p) => $p->commodity?->name ?? 'Nyingine');
    @endphp

    @if($grouped->isEmpty())
    <div style="text-align:center; padding:80px; border:2px dashed #e0e0e0;">
        <i class="fas fa-search" style="font-size:2.5rem; color:#ccc; display:block; margin-bottom:16px;"></i>
        <h4 style="font-weight:900;">Hakuna bei zilizopatikana kwa utafutaji huu.</h4>
        <a href="{{ route('market.prices') }}" style="display:inline-block; margin-top:16px; background:#000; color:#fff; padding:10px 28px; font-size:12px; font-weight:900; text-transform:uppercase; text-decoration:none;">Ona Bei Zote</a>
    </div>
    @else

    <div class="row">
        @foreach($grouped as $commodityName => $group)
        <div class="col-lg-4 col-md-6 mb-4">
            <div style="border:1px solid #e0e0e0; overflow:hidden; height:100%;">
                {{-- Card header --}}
                <div style="background:#000; color:#fff; padding:10px 15px; display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-weight:900; font-size:12px; text-transform:uppercase; letter-spacing:1px;">{{ $commodityName }}</span>
                    @php $unit = $group->first()->unit; @endphp
                    @if($unit)
                    <span style="font-size:10px; background:#222; padding:2px 8px; color:#aaa; font-weight:700;">{{ $unit }}</span>
                    @endif
                </div>
                {{-- Price rows --}}
                <table style="width:100%; border-collapse:collapse;">
                    @foreach($group->take(5) as $price)
                    <tr style="border-bottom:1px solid #f0f0f0;">
                        <td style="padding:9px 12px; font-size:12px; color:#444; font-weight:700; line-height:1.2;">
                            {{ $price->location ? explode(' - ', $price->location)[0] : 'Soko' }}
                            @if($price->location && str_contains($price->location, ' - '))
                            <div style="font-size:10px; color:#aaa; font-weight:600;">{{ explode(' - ', $price->location)[1] ?? '' }}</div>
                            @endif
                        </td>
                        <td style="padding:9px 12px; text-align:right; white-space:nowrap;">
                            <span style="font-size:14px; font-weight:900; color:var(--bloomberg-blue);">Tsh {{ number_format($price->price_min) }}</span>
                            @if($price->price_max && $price->price_max != $price->price_min)
                            <span style="font-size:11px; color:#bbb;"> – {{ number_format($price->price_max) }}</span>
                            @endif
                        </td>
                        <td style="padding:9px 10px; text-align:center; width:26px;">
                            @if($price->market_type === 'trending')
                                <i class="fas fa-arrow-up" style="color:#f1d302; font-size:11px;" title="Inapanda"></i>
                            @elseif($price->market_type === 'hot_offer')
                                <i class="fas fa-arrow-down" style="color:#27ae60; font-size:11px;" title="Punguzo"></i>
                            @else
                                <i class="fas fa-minus" style="color:#ccc; font-size:11px;"></i>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{-- Card footer --}}
                <div style="padding:7px 12px; background:#f9f9f9; font-size:10px; color:#aaa; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; display:flex; justify-content:space-between;">
                    <span>Imesasishwa: {{ $group->first()->recorded_at?->diffForHumans() ?? 'Leo' }}</span>
                    <span>{{ $group->count() }} soko</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endif

    <div class="mt-3">{{ $prices->links() }}</div>
</div>

@endsection
