@extends('shared.master')

@section('title','Hariri Bei ya Soko')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="white-box">
                <h3 class="box-title">Hariri Bei: <strong>{{ $market_price->commodity->name ?? '—' }}</strong></h3>

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                </div>
                @endif

                <form action="{{ route('market.market_price.update', $market_price->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group @error('commodity_id') has-error @enderror">
                                <label>Bidhaa <span class="text-danger">*</span></label>
                                <select name="commodity_id" class="form-control">
                                    <option value="">-- Chagua Bidhaa --</option>
                                    @foreach($commodities as $c)
                                    <option value="{{ $c->id }}"
                                        {{ (old('commodity_id', $market_price->commodity_type_id) == $c->id) ? 'selected' : '' }}>
                                        {{ $c->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('commodity_id')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group @error('unit') has-error @enderror">
                                <label>Kipimo</label>
                                <select name="unit" class="form-control">
                                    <option value="">-- Kipimo --</option>
                                    @foreach(['kg','gramu','lita','debe (20L)','gunia (100kg)','tani','kilo (50kg)','ndoo','paket','karata'] as $u)
                                    <option value="{{ $u }}" {{ old('unit', $market_price->unit) == $u ? 'selected' : '' }}>{{ $u }}</option>
                                    @endforeach
                                </select>
                                @error('unit')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group @error('location') has-error @enderror">
                                <label>Mahali (Soko)</label>
                                <select name="location" class="form-control">
                                    <option value="">-- Chagua Soko --</option>
                                    @foreach(['Kariakoo - Dar es Salaam','Tandale - Dar es Salaam','Mwananyamala - Dar es Salaam','Kivukoni - Dar es Salaam','Machinga Complex - DSM','Arusha Mjini','Moshi Mjini','Mwanza Mjini','Dodoma Mjini','Morogoro Mjini','Tanga Mjini','Iringa Mjini','Songea Mjini','Mbeya Mjini','Zanzibar Mjini','Kigoma Mjini','Musoma Mjini','Shinyanga Mjini'] as $loc)
                                    <option value="{{ $loc }}" {{ old('location', $market_price->location) == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                                    @endforeach
                                </select>
                                @error('location')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group @error('price_min') has-error @enderror">
                                <label>Bei ya Chini (Tsh) <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="price_min" class="form-control"
                                       value="{{ old('price_min', $market_price->price_min) }}">
                                @error('price_min')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group @error('price_max') has-error @enderror">
                                <label>Bei ya Juu (Tsh) <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="price_max" class="form-control"
                                       value="{{ old('price_max', $market_price->price_max) }}">
                                @error('price_max')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group @error('market_type') has-error @enderror">
                                <label>Hali ya Soko</label>
                                <select name="market_type" class="form-control">
                                    <option value="update"    {{ old('market_type', $market_price->market_type) == 'update'    ? 'selected' : '' }}>Kawaida</option>
                                    <option value="trending"  {{ old('market_type', $market_price->market_type) == 'trending'  ? 'selected' : '' }}>Inapanda (Trending)</option>
                                    <option value="hot_offer" {{ old('market_type', $market_price->market_type) == 'hot_offer' ? 'selected' : '' }}>Punguzo (Hot Offer)</option>
                                </select>
                                @error('market_type')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group @error('recorded_at') has-error @enderror">
                                <label>Tarehe ya Rekodi</label>
                                <input type="date" name="recorded_at" class="form-control"
                                       value="{{ old('recorded_at', $market_price->recorded_at?->toDateString()) }}">
                                @error('recorded_at')<span class="help-block">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Sasisha Bei
                    </button>
                    <a href="{{ route('market.market_price.index') }}" class="btn btn-default ml-2">Rudi</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
