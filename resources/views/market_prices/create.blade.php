@extends('shared.master')

@section('title','Add Market Price')

@section('content')
<div class="container-fluid">

    <h4>Add Market Price</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('market.market_price.store') }}" method="POST">
        @csrf

        {{-- Commodity --}}
        <div class="form-group @error('commodity_id') has-error @enderror">
            <label>Commodity</label>
            <select name="commodity_id" class="form-control">
                <option value="">-- Select Commodity --</option>
                @foreach($commodities as $commodity)
                    <option value="{{ $commodity->id }}"
                        {{ old('commodity_type_id') == $commodity->id ? 'selected' : '' }}>
                        {{ $commodity->name }}
                    </option>
                @endforeach
            </select>
            @error('commodity_id')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Price Min --}}
        <div class="form-group @error('price_min') has-error @enderror">
            <label>Minimum Price</label>
            <input type="number" step="0.01" name="price_min" class="form-control"
                   value="{{ old('price_min') }}">
            @error('price_min')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Price Max --}}
        <div class="form-group @error('price_max') has-error @enderror">
            <label>Maximum Price</label>
            <input type="number" step="0.01" name="price_max" class="form-control"
                   value="{{ old('price_max') }}">
            @error('price_max')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Market Type --}}
        <div class="form-group @error('market_type') has-error @enderror">
            <label>Market Type</label>
            <select name="market_type" class="form-control">
                <option value="update">Update</option>
                <option value="trending">Trending</option>
                <option value="hot_offer">Hot Offer</option>
            </select>
            @error('market_type')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Recorded At --}}
        <div class="form-group @error('recorded_at') has-error @enderror">
            <label>Recorded Date</label>
            <input type="datetime-local" name="recorded_at" class="form-control"
                   value="{{ old('recorded_at') }}">
            @error('recorded_at')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-success">Save Market Price</button>
    </form>
</div>
@endsection
