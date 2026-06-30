@extends('shared.master')
@section('title','View Listing')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-12">
            <h4 class="page-title">Listing Details
                <a href="{{ route('product.product.edit', $product->id) }}" class="btn btn-warning btn-sm pull-right">Edit</a>
                <a href="{{ route('product.product.index') }}" class="btn btn-default btn-sm pull-right mr-1">Back</a>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" class="img-responsive" style="width:100%;border-radius:4px;margin-bottom:10px;">
                            @endif
                            @if($product->images->count())
                            <div class="row">
                                @foreach($product->images as $img)
                                <div class="col-xs-4"><img src="{{ asset('storage/'.$img->image_path) }}" style="width:100%;height:60px;object-fit:cover;border-radius:3px;margin-bottom:5px;"></div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <h3>{{ $product->name }}</h3>
                            <p class="text-success" style="font-size:22px;font-weight:bold;">Tsh {{ number_format($product->price) }}</p>
                            @if($product->old_price)<p><del class="text-muted">Tsh {{ number_format($product->old_price) }}</del></p>@endif
                            <hr>
                            <table class="table table-sm">
                                <tr><th>Category</th><td>{{ $product->category?->name ?? '—' }}</td></tr>
                                <tr><th>Condition</th><td>{{ $product->condition_label }}</td></tr>
                                <tr><th>Location</th><td>{{ $product->location ?? '—' }}</td></tr>
                                <tr><th>Seller</th><td>{{ $product->seller_name ?? '—' }}</td></tr>
                                <tr><th>Phone</th><td>{{ $product->phone ?? '—' }}</td></tr>
                                <tr><th>Views</th><td>{{ number_format($product->views) }}</td></tr>
                                <tr><th>Featured</th><td>{{ $product->is_featured ? 'Yes' : 'No' }}</td></tr>
                                <tr><th>Status</th><td>{{ ucfirst($product->status) }}</td></tr>
                            </table>

                            @if($product->isVehicle() && $product->meta)
                            <hr>
                            <h5><i class="fa fa-car text-warning"></i> Vehicle Details</h5>
                            <table class="table table-sm">
                                @foreach(['make'=>'Make','model'=>'Model','year'=>'Year','mileage'=>'Mileage (km)','fuel_type'=>'Fuel','transmission'=>'Transmission','color'=>'Color','body_type'=>'Body Type','engine_cc'=>'Engine'] as $key => $label)
                                @if($product->vehicleMeta($key))
                                <tr><th>{{ $label }}</th><td>{{ $product->vehicleMeta($key) }}</td></tr>
                                @endif
                                @endforeach
                            </table>
                            @endif
                        </div>
                    </div>
                    @if($product->description)
                    <hr>
                    <h5>Description</h5>
                    <p>{{ $product->description }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
