@extends('shared.master')
@section('title', 'Edit Category')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Category</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('settings.categories.index') }}">Categories</a></li>
                <li class="active">Edit: {{ $category->name }}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading"><h4 class="panel-title">Edit: {{ $category->name }}</h4></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <form action="{{ route('settings.categories.update', $category->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('category_type') has-error @enderror">
                                            <label class="control-label">Category Type <span class="text-danger">*</span></label>
                                            <select name="category_type" class="form-control">
                                                <option value="news"    {{ old('category_type', $category->category_type) === 'news'    ? 'selected' : '' }}>News / Habari</option>
                                                <option value="product" {{ old('category_type', $category->category_type) === 'product' ? 'selected' : '' }}>Marketplace / Bidhaa</option>
                                                <option value="both"    {{ old('category_type', $category->category_type) === 'both'    ? 'selected' : '' }}>Both</option>
                                            </select>
                                            @error('category_type')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label class="control-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
                                            @error('name')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Color</label>
                                            <input type="color" name="color" class="form-control" value="{{ old('color', $category->color ?? '#3498db') }}" style="height:38px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('icon') has-error @enderror">
                                            <label class="control-label">Icon Class</label>
                                            <input type="text" name="icon" id="icon_field" class="form-control" value="{{ old('icon', $category->icon) }}" placeholder="e.g. fa-car">
                                            <span class="help-block text-muted" style="font-size:11px;">Preview: <i id="icon-preview" class="fa {{ $category->icon }}"></i></span>
                                            @error('icon')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('parent_id') has-error @enderror">
                                            <label class="control-label">Parent Category</label>
                                            <select name="parent_id" class="form-control">
                                                <option value="">— None (Top Level) —</option>
                                                @foreach($parent_categories as $parent)
                                                <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group @error('description') has-error @enderror">
                                            <label class="control-label">Description</label>
                                            <input type="text" name="description" class="form-control" value="{{ old('description', $category->description) }}">
                                            @error('description')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group @error('status') has-error @enderror">
                                            <label class="control-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="is_main" value="1" {{ old('is_main', $category->is_main) ? 'checked' : '' }}>
                                                &nbsp;Show in main navigation menu
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                @if($category->isVehicleCategory())
                                <div class="alert alert-warning">
                                    <i class="fa fa-car"></i> <strong>Vehicle Category detected.</strong>
                                    Products in this category will display vehicle-specific fields (make, model, year, mileage, fuel type, transmission, color, body type).
                                </div>
                                @endif

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update Category</button>
                                <a href="{{ route('settings.categories.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('icon_field').addEventListener('input', function() {
        document.getElementById('icon-preview').className = 'fa ' + this.value;
    });
</script>
@endsection
