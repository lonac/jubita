@extends('website.shared.index')

@section('title', 'Magari Yote Tanzania | JUBITA Marketplace')

@section('content')

{{-- Hero --}}
<div style="background:linear-gradient(135deg,#1a1a1a 0%,#2c3e50 100%); border-bottom:4px solid #e74c3c; padding:50px 0;">
    <div class="container">
        <div class="meta-info text-white mb-2" style="letter-spacing:2px; font-size:10px; opacity:0.6;">JUBITA MARKETPLACE</div>
        <h1 style="color:#fff; font-size:3rem; letter-spacing:-2px; margin-bottom:5px;"><i class="fas fa-car" style="color:#e74c3c;"></i> Magari Tanzania</h1>
        <p style="color:rgba(255,255,255,0.6); font-size:1rem;">Toyota, Mercedes, BMW, Nissan — Gari lako linalofaa lipo hapa.</p>
    </div>
</div>

<div class="container" style="padding-top:30px; padding-bottom:60px;">
    <div class="row">

        {{-- Vehicle Filters Sidebar --}}
        <div class="col-lg-3 mb-4">
            <div style="background:#fff; border:1px solid #e0e0e0; padding:20px;">
                <h5 style="font-weight:900; text-transform:uppercase; letter-spacing:1px; border-bottom:3px solid #e74c3c; padding-bottom:10px; margin-bottom:20px; font-size:13px;">
                    <i class="fas fa-sliders-h" style="color:#e74c3c;"></i> Chuja Magari
                </h5>
                <form method="GET" action="{{ route('marketplace.vehicles') }}">

                    <div class="mb-3">
                        <label style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#555;">Brand / Make</label>
                        <select name="make" class="form-control form-control-sm" style="border-radius:0; font-size:12px;">
                            <option value="">Zote</option>
                            @foreach($makes as $make)
                            <option value="{{ $make }}" {{ request('make') === $make ? 'selected' : '' }}>{{ $make }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#555;">Mwaka (Min)</label>
                        <input type="number" name="year_min" class="form-control form-control-sm" placeholder="{{ date('Y') - 20 }}" value="{{ request('year_min') }}" min="1980" max="{{ date('Y') }}" style="border-radius:0; font-size:12px;">
                    </div>

                    <div class="mb-3">
                        <label style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#555;">Mwaka (Max)</label>
                        <input type="number" name="year_max" class="form-control form-control-sm" placeholder="{{ date('Y') }}" value="{{ request('year_max') }}" min="1980" max="{{ date('Y') }}" style="border-radius:0; font-size:12px;">
                    </div>

                    <div class="mb-3">
                        <label style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#555;">Aina ya Mafuta</label>
                        <select name="fuel_type" class="form-control form-control-sm" style="border-radius:0; font-size:12px;">
                            <option value="">Zote</option>
                            <option value="petrol"   {{ request('fuel_type') === 'petrol'   ? 'selected' : '' }}>Petrol</option>
                            <option value="diesel"   {{ request('fuel_type') === 'diesel'   ? 'selected' : '' }}>Diesel</option>
                            <option value="hybrid"   {{ request('fuel_type') === 'hybrid'   ? 'selected' : '' }}>Hybrid</option>
                            <option value="electric" {{ request('fuel_type') === 'electric' ? 'selected' : '' }}>Electric</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#555;">Gearbox</label>
                        <select name="transmission" class="form-control form-control-sm" style="border-radius:0; font-size:12px;">
                            <option value="">Zote</option>
                            <option value="automatic" {{ request('transmission') === 'automatic' ? 'selected' : '' }}>Automatic</option>
                            <option value="manual"    {{ request('transmission') === 'manual'    ? 'selected' : '' }}>Manual</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#555;">Mahali</label>
                        <select name="location" class="form-control form-control-sm" style="border-radius:0; font-size:12px;">
                            <option value="">Maeneo Yote</option>
                            @foreach($locations as $loc)
                            <option value="{{ $loc }}" {{ request('location') === $loc ? 'selected' : '' }}>{{ $loc }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#555;">Bei Min (Tsh)</label>
                        <input type="number" name="min_price" class="form-control form-control-sm" placeholder="0" value="{{ request('min_price') }}" style="border-radius:0; font-size:12px;">
                    </div>

                    <div class="mb-3">
                        <label style="font-size:10px; font-weight:900; text-transform:uppercase; letter-spacing:1px; color:#555;">Bei Max (Tsh)</label>
                        <input type="number" name="max_price" class="form-control form-control-sm" placeholder="500,000,000" value="{{ request('max_price') }}" style="border-radius:0; font-size:12px;">
                    </div>

                    <button type="submit" class="btn btn-block btn-sm" style="background:#e74c3c; color:#fff; border-radius:0; font-weight:900; letter-spacing:1px; font-size:11px; text-transform:uppercase;">
                        <i class="fas fa-search"></i> TAFUTA MAGARI
                    </button>
                    @if(request()->hasAny(['make','year_min','year_max','fuel_type','transmission','location','min_price','max_price']))
                    <a href="{{ route('marketplace.vehicles') }}" class="btn btn-outline-secondary btn-block btn-sm mt-1" style="border-radius:0; font-size:11px;">FUTA VICHUJIO</a>
                    @endif
                </form>
            </div>
        </div>

        {{-- Vehicle Grid --}}
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div style="font-size:13px; color:#666; font-weight:700;">
                    Magari <strong>{{ $vehicles->total() }}</strong> yamepatikana
                </div>
                <div style="font-size:11px; color:#999; text-transform:uppercase; letter-spacing:1px;">
                    Ukurasa {{ $vehicles->currentPage() }} / {{ $vehicles->lastPage() }}
                </div>
            </div>

            @if($vehicles->count())
            <div class="row">
                @foreach($vehicles as $car)
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    @include('website.marketplace._card', ['product' => $car])
                </div>
                @endforeach
            </div>
            <div class="mt-3">{{ $vehicles->links() }}</div>
            @else
            <div style="text-align:center; padding:80px 20px; border:2px dashed #e0e0e0;">
                <i class="fas fa-car" style="font-size:3rem; color:#ccc; display:block; margin-bottom:15px;"></i>
                <h4 style="font-weight:900; color:#333;">Hakuna magari yaliyopatikana</h4>
                <p style="color:#999;">Jaribu tena na vichujio tofauti.</p>
                <a href="{{ route('marketplace.vehicles') }}" class="btn-bloomberg" style="display:inline-block; padding:12px 30px; margin-top:15px;">ONA YOTE</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
