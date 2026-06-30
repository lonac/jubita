@extends('shared.master')
@section('title','Edit Listing')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3">
            <h4 class="page-title">Edit Listing</h4>
        </div>
        <div class="col-lg-9">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('product.product.index') }}">Products</a></li>
                <li class="active">Edit: {{ Str::limit($product->name, 30) }}</li>
            </ol>
        </div>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <form action="{{ route('product.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">

            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="panel-title">Product Information</h4></div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group @error('name') has-error @enderror">
                                    <label>Jina la Bidhaa <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                                    @error('name')<span class="help-block">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @error('category_id') has-error @enderror">
                                    <label>Category</label>
                                    <select name="category_id" id="category_select" class="form-control">
                                        <option value="">— Select —</option>
                                        @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            data-is-vehicle="{{ $cat->isVehicleCategory() ? '1' : '0' }}"
                                            {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<span class="help-block">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Maelezo ya Bidhaa</label>
                            <textarea name="description" class="form-control" rows="5">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bei (Tsh)</label>
                                    <input type="number" step="1" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bei ya Zamani</label>
                                    <input type="number" step="1" name="old_price" class="form-control" value="{{ old('old_price', $product->old_price) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hali ya Bidhaa</label>
                                    <select name="condition" class="form-control">
                                        <option value="used"        {{ old('condition', $product->condition) === 'used'        ? 'selected' : '' }}>Imetumika</option>
                                        <option value="fairly_used" {{ old('condition', $product->condition) === 'fairly_used' ? 'selected' : '' }}>Imetumika Kidogo</option>
                                        <option value="new"         {{ old('condition', $product->condition) === 'new'         ? 'selected' : '' }}>Mpya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mahali</label>
                                    <input type="text" name="location" class="form-control" value="{{ old('location', $product->location) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active"   {{ old('status', $product->status) === 'active'   ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $product->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Vehicle Fields --}}
                <div id="vehicle_fields" class="panel panel-warning" style="display:none;">
                    <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-car"></i> Vehicle Details</h4></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Make / Brand</label>
                                    <input type="text" name="make" class="form-control" value="{{ old('make', $product->vehicleMeta('make')) }}" placeholder="Toyota, Mercedes...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" name="vehicle_model" class="form-control" value="{{ old('vehicle_model', $product->vehicleMeta('model')) }}" placeholder="Prado, Vitz...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="number" name="year" class="form-control" value="{{ old('year', $product->vehicleMeta('year')) }}" min="1980" max="{{ date('Y')+1 }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mileage (km)</label>
                                    <input type="number" name="mileage" class="form-control" value="{{ old('mileage', $product->vehicleMeta('mileage')) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fuel Type</label>
                                    <select name="fuel_type" class="form-control">
                                        <option value="">— Select —</option>
                                        @foreach(['petrol','diesel','hybrid','electric'] as $ft)
                                        <option value="{{ $ft }}" {{ old('fuel_type', $product->vehicleMeta('fuel_type')) === $ft ? 'selected' : '' }}>{{ ucfirst($ft) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Transmission</label>
                                    <select name="transmission" class="form-control">
                                        <option value="">— Select —</option>
                                        <option value="automatic" {{ old('transmission', $product->vehicleMeta('transmission')) === 'automatic' ? 'selected' : '' }}>Automatic</option>
                                        <option value="manual"    {{ old('transmission', $product->vehicleMeta('transmission')) === 'manual'    ? 'selected' : '' }}>Manual</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="text" name="vehicle_color" class="form-control" value="{{ old('vehicle_color', $product->vehicleMeta('color')) }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Body Type</label>
                                    <select name="body_type" class="form-control">
                                        <option value="">— Select —</option>
                                        @foreach(['suv','sedan','pickup','minivan','coupe','hatchback','truck'] as $bt)
                                        <option value="{{ $bt }}" {{ old('body_type', $product->vehicleMeta('body_type')) === $bt ? 'selected' : '' }}>{{ ucfirst($bt) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Engine CC</label>
                                    <input type="text" name="engine_cc" class="form-control" value="{{ old('engine_cc', $product->vehicleMeta('engine_cc')) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Current Images --}}
                @if($product->image || $product->images->count())
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title">Current Images</h4></div>
                    <div class="panel-body">
                        <div class="row">
                            @if($product->image)
                            <div class="col-md-2 text-center">
                                <img src="{{ asset('storage/'.$product->image) }}" style="width:100%;height:80px;object-fit:cover;border-radius:4px;">
                                <small class="text-muted">Main</small>
                            </div>
                            @endif
                            @foreach($product->images as $img)
                            <div class="col-md-2 text-center">
                                <img src="{{ asset('storage/'.$img->image_path) }}" style="width:100%;height:80px;object-fit:cover;border-radius:4px;">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                {{-- New Images --}}
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title">Update Photos</h4></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Replace Main Photo</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Add More Photos</label>
                                    <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 class="panel-title">Seller Information</h4></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Seller Name</label>
                            <input type="text" name="seller_name" class="form-control" value="{{ old('seller_name', $product->seller_name) }}">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $product->phone) }}">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                                &nbsp;<strong>Featured Listing</strong>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="panel panel-success">
                    <div class="panel-body">
                        <button type="submit" class="btn btn-success btn-block btn-lg">
                            <i class="fa fa-check"></i> Update Listing
                        </button>
                        <a href="{{ route('product.product.index') }}" class="btn btn-default btn-block mt-2">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function checkVehicle() {
        var sel = document.getElementById('category_select');
        var opt = sel.options[sel.selectedIndex];
        var isVehicle = opt && opt.dataset.isVehicle === '1';
        document.getElementById('vehicle_fields').style.display = isVehicle ? 'block' : 'none';
    }
    document.getElementById('category_select').addEventListener('change', checkVehicle);
    checkVehicle();
</script>
@endsection
