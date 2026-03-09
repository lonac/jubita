@extends('shared.master')

@section('title', 'Edit Post Type')

@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Post Type</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('settings.post_type.index') }}">Post Types</a></li>
                <li class="active">Edit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ route('settings.post_type.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label class="control-label"> Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Post Type Name" value="{{ old('name', $category->name) }}">
                                            @error('name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('status') has-error @enderror">
                                            <label class="control-label"> Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('description') has-error @enderror">
                                            <label class="control-label"> Description</label>
                                            <input type="text" name="description" class="form-control" placeholder="description" value="{{ old('description', $category->description) }}">
                                            @error('description')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update Post Type</button>
                                <a href="{{ route('settings.post_type.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
