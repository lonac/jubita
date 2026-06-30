@extends('shared.master')
@section('title', 'New Category')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">New Category</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('settings.categories.index') }}">Categories</a></li>
                <li class="active">New</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading"><h4 class="panel-title">Category Details</h4></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <form action="{{ route('settings.categories.store') }}" method="POST">
                            @csrf
                            <div class="form-body">

                                {{-- Category Type (FIRST - drives rest of UI) --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('category_type') has-error @enderror">
                                            <label class="control-label">Category Type <span class="text-danger">*</span></label>
                                            <select name="category_type" id="category_type" class="form-control">
                                                <option value="news"    {{ old('category_type','news') === 'news'    ? 'selected' : '' }}>News / Habari</option>
                                                <option value="product" {{ old('category_type') === 'product' ? 'selected' : '' }}>Marketplace / Bidhaa</option>
                                                <option value="both"    {{ old('category_type') === 'both'    ? 'selected' : '' }}>Both (News + Marketplace)</option>
                                            </select>
                                            <span class="help-block text-muted" style="font-size:11px;">
                                                <strong>News</strong> = articles/habari only.
                                                <strong>Marketplace</strong> = products for sale.
                                                <strong>Both</strong> = appears in both sections.
                                            </span>
                                            @error('category_type')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Name --}}
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label class="control-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="e.g. Magari, Simu, Uchumi" value="{{ old('name') }}">
                                            <span class="help-block text-muted" style="font-size:11px;">For vehicle categories, include "Magari" or "Car" in name to auto-enable vehicle fields.</span>
                                            @error('name')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group @error('color') has-error @enderror">
                                            <label class="control-label">Color (hex)</label>
                                            <input type="color" name="color" class="form-control" value="{{ old('color','#3498db') }}" style="height:38px;">
                                            @error('color')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Icon --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('icon') has-error @enderror">
                                            <label class="control-label">Font Awesome Icon Class</label>
                                            <input type="text" name="icon" class="form-control" placeholder="e.g. fa-car, fa-home, fa-mobile" value="{{ old('icon') }}">
                                            <span class="help-block text-muted" style="font-size:11px;">Leave blank for none. Preview: <i id="icon-preview" class="fa"></i></span>
                                            @error('icon')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('parent_id') has-error @enderror">
                                            <label class="control-label">Parent Category (optional)</label>
                                            <select name="parent_id" class="form-control">
                                                <option value="">— None (Top Level) —</option>
                                                @foreach($parent_categories as $parent)
                                                <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('description') has-error @enderror">
                                            <label class="control-label">Description</label>
                                            <input type="text" name="description" class="form-control" placeholder="Short description" value="{{ old('description') }}">
                                            @error('description')<span class="help-block">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Show in main navigation --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="is_main" value="1" {{ old('is_main') ? 'checked' : '' }}>
                                                &nbsp;Show in main navigation menu
                                            </label>
                                            <span class="help-block text-muted" style="font-size:11px;">Top-level categories with this checked appear in the site navigation bar.</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Category</button>
                                <a href="{{ route('settings.categories.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Help Panel --}}
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-info-circle"></i> Category Guide</h4></div>
                <div class="panel-body" style="font-size:13px;">
                    <p><strong><i class="fa fa-newspaper-o text-primary"></i> News Category</strong><br>
                    Use for articles, habari, uchumi, jiopolitiki etc.</p>
                    <hr>
                    <p><strong><i class="fa fa-tags text-success"></i> Marketplace Category</strong><br>
                    Use for products people post for sale. E.g: Magari, Simu, Nyumba, Mavazi.</p>
                    <hr>
                    <p><strong><i class="fa fa-car text-warning"></i> Vehicle Category (Auto-detected)</strong><br>
                    If the name contains <em>gari, car, vehicle</em> — the product form will automatically show vehicle fields:<br>
                    <ul style="font-size:12px;">
                        <li>Make / Brand (Toyota, Mercedes…)</li>
                        <li>Model (Prado, Vitz, 4x4…)</li>
                        <li>Year of manufacture</li>
                        <li>Mileage (km)</li>
                        <li>Fuel type</li>
                        <li>Transmission</li>
                        <li>Color, Engine CC, Body type</li>
                    </ul>
                    </p>
                    <hr>
                    <p><strong>Font Awesome Icons:</strong><br>
                    <code>fa-car</code> <i class="fa fa-car"></i> &nbsp;
                    <code>fa-home</code> <i class="fa fa-home"></i> &nbsp;
                    <code>fa-mobile</code> <i class="fa fa-mobile fa-lg"></i> &nbsp;
                    <code>fa-television</code> <i class="fa fa-television"></i> &nbsp;
                    <code>fa-laptop</code> <i class="fa fa-laptop"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.querySelector('[name="icon"]').addEventListener('input', function() {
        document.getElementById('icon-preview').className = 'fa ' + this.value;
    });
</script>
@endsection
