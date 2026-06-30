@extends('shared.master')
@section('title', 'Product Listings')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-12">
            <h4 class="page-title">Product Listings
                <a href="{{ route('product.product.create') }}" class="btn pull-right btn-success btn-sm">
                    <i class="fa fa-plus"></i> Add New Listing
                </a>
            </h4>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price (Tsh)</th>
                                        <th>Location</th>
                                        <th>Condition</th>
                                        <th>Featured</th>
                                        <th>Views</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if($product->image)
                                            <img src="{{ asset('storage/'.$product->image) }}" width="60" height="45" style="object-fit:cover;border-radius:3px;">
                                            @else
                                            <div style="width:60px;height:45px;background:#eee;border-radius:3px;line-height:45px;text-align:center;font-size:11px;color:#999;">No img</div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ Str::limit($product->name, 40) }}</strong>
                                            @if($product->isVehicle())
                                            <br><small class="text-warning"><i class="fa fa-car"></i> {{ $product->vehicleMeta('make') }} {{ $product->vehicleMeta('model') }} {{ $product->vehicleMeta('year') }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->category)
                                            <span class="label label-default">{{ $product->category->name }}</span>
                                            @else —@endif
                                        </td>
                                        <td>{{ $product->price ? 'Tsh '.number_format($product->price) : '—' }}</td>
                                        <td>{{ $product->location ?? '—' }}</td>
                                        <td>{{ $product->condition_label }}</td>
                                        <td>{!! $product->is_featured ? '<span class="label label-warning"><i class="fa fa-star"></i> Yes</span>' : '—' !!}</td>
                                        <td>{{ number_format($product->views) }}</td>
                                        <td>
                                            {!! $product->status === 'active' ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('product.product.show', $product->id) }}" class="btn btn-info btn-xs">View</a>
                                            <a href="{{ route('product.product.edit', $product->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                            <form action="{{ route('product.product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('Delete this listing?')">Del</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() { $('#myTable').DataTable({ "pageLength": 25, "order": [[0,"desc"]] }); });
</script>
@endsection
