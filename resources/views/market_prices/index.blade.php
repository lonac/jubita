@extends('shared.master')

@section('title','Market Prices')

@section('content')
<div class="container-fluid">

    <h4>Market Prices</h4>

    <a href="{{ route('market.market_price.create') }}"
       class="btn btn-success btn-sm mb-3">
        Add Price
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Commodity</th>
                <th>Min</th>
                <th>Max</th>
                <th>Type</th>
                <th>Recorded</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $price)
                <tr>
                    <td>{{ $price->id }}</td>
                    <td>{{ $price->commodity->name ?? '-' }}</td>
                    <td>{{ $price->price_min }}</td>
                    <td>{{ $price->price_max }}</td>
                    <td>{{ ucfirst(str_replace('_',' ',$price->market_type)) }}</td>
                    <td>{{ $price->recorded_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $prices->links() }}
</div>
@endsection
