@extends('shared.master')
@section('title','Categories')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-12">
            <h4 class="page-title">Categories
                <a href="{{route('settings.categories.create')}}" class="btn btn-sm pull-right btn-info">
                    <i class="fa fa-plus"></i> NEW CATEGORY
                </a>
            </h4>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('fail'))
    <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif

    {{-- News Categories --}}
    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="white-box">
                <h4 class="box-title"><i class="fa fa-newspaper-o text-primary"></i> &nbsp;Habari / News Categories</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead style="background:#337ab7;color:#fff;">
                            <tr>
                                <th>#</th><th>Name</th><th>Parent</th><th>Nav Menu?</th><th>Type</th><th>Status</th><th style="width:130px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories->filter(fn($c) => $c->isNewsCategory()) as $i => $cat)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>
                                    @if($cat->icon)<i class="fa {{ $cat->icon }}"></i>&nbsp;@endif
                                    <strong>{{ $cat->name }}</strong>
                                </td>
                                <td>{{ $cat->parent?->name ?? '—' }}</td>
                                <td>{!! $cat->is_main ? '<span class="label label-success">Yes</span>' : '<span class="label label-default">No</span>' !!}</td>
                                <td><span class="label label-primary">{{ ucfirst($cat->category_type) }}</span></td>
                                <td>{!! $cat->status ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' !!}</td>
                                <td>
                                    <a href="{{ route('settings.categories.edit', $cat->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <form action="{{ route('settings.categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-xs" onclick="return confirm('Delete this category?')">Del</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="text-center text-muted">No news categories yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Product / Marketplace Categories --}}
    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="white-box">
                <h4 class="box-title"><i class="fa fa-tags text-success"></i> &nbsp;Soko / Marketplace Categories</h4>
                <p class="text-muted" style="font-size:12px;">These categories appear in the Marketplace / Bidhaa section on the website. Vehicle categories (containing "gari", "car", "vehicle" in name/slug) automatically show special fields: make, model, year, mileage, fuel type, transmission, color, etc.</p>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead style="background:#5cb85c;color:#fff;">
                            <tr>
                                <th>#</th><th>Name</th><th>Icon</th><th>Color</th><th>Vehicle?</th><th>Sub-cats</th><th>Products</th><th>Status</th><th style="width:130px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories->filter(fn($c) => $c->isProductCategory() && !$c->parent_id) as $i => $cat)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>
                                    <strong>{{ $cat->name }}</strong>
                                    @if($cat->children->count())
                                    <br><small class="text-muted">{{ $cat->children->count() }} sub-categories</small>
                                    @endif
                                </td>
                                <td>
                                    @if($cat->icon)
                                        <i class="fa {{ $cat->icon }} fa-lg" style="color:{{ $cat->color ?? '#333' }}"></i>
                                        <small>{{ $cat->icon }}</small>
                                    @else —@endif
                                </td>
                                <td>
                                    @if($cat->color)
                                    <span style="display:inline-block;background:{{ $cat->color }};padding:2px 12px;border-radius:3px;color:#fff;font-size:11px;">{{ $cat->color }}</span>
                                    @else —@endif
                                </td>
                                <td>
                                    @if($cat->isVehicleCategory())
                                    <span class="label label-warning"><i class="fa fa-car"></i> Yes</span>
                                    @else —@endif
                                </td>
                                <td>{{ $cat->children->count() }}</td>
                                <td>{{ $cat->products()->count() }}</td>
                                <td>{!! $cat->status ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' !!}</td>
                                <td>
                                    <a href="{{ route('settings.categories.edit', $cat->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <form action="{{ route('settings.categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-xs" onclick="return confirm('Delete?')">Del</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="9" class="text-center text-muted">No marketplace categories yet. Create one below.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
