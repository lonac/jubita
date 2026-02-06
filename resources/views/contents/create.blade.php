@extends('shared.master')

@section('title', 'Content Registration')

@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Content Registration</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('content.content.index') }}">Contents</a></li>
                <li class="active">Registration</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ route('content.content.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">

                                {{-- Title --}}
                                <div class="form-group @error('title') has-error @enderror">
                                    <label class="control-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Content Title" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                             
                                {{-- Excerpt --}}
                                <div class="form-group @error('excerpt') has-error @enderror">
                                    <label class="control-label">Excerpt</label>
                                    <textarea name="excerpt" class="form-control" placeholder="Short summary">{{ old('excerpt') }}</textarea>
                                    @error('excerpt')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Content --}}
                                <div class="form-group @error('content') has-error @enderror">
                                    <label class="control-label">Content</label>
                                    <textarea name="content" class="form-control" rows="6" placeholder="Full article content">{{ old('content') }}</textarea>
                                    @error('content')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Post Type --}}
                                <div class="form-group @error('post_type_id') has-error @enderror">
                                    <label class="control-label">Post Type</label>
                                    <select name="post_type_id" class="form-control">
                                        <option value="">-- Select Post Type --</option>
                                        @foreach($postTypes as $type)
                                            <option value="{{ $type->id }}" {{ old('post_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('post_type_id')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div class="form-group @error('category_id') has-error @enderror">
                                    <label class="control-label">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Author --}}
                                <div class="form-group @error('author_id') has-error @enderror">
                                    <label class="control-label">Author</label>
                                    <select name="author_id" class="form-control">
                                        <option value="">-- Select Author --</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->email }}</option>
                                        @endforeach
                                    </select>
                                    @error('author_id')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Featured Image --}}
                                <div class="form-group @error('featured_image') has-error @enderror">
                                    <label class="control-label">Featured Image</label>
                                    <input type="file" name="featured_image" class="form-control">
                                    @error('featured_image')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Is Featured --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}> Featured
                                    </label>
                                </div>

                              

                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Content</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
