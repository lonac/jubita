@extends('shared.master')

@section('title', 'Edit Content')

@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Content</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('content.content.index') }}">Contents</a></li>
                <li class="active">Edit</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ route('content.content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">

                                {{-- Title --}}
                                <div class="form-group @error('title') has-error @enderror">
                                    <label class="control-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Content Title" value="{{ old('title', $content->title) }}">
                                    @error('title')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Slug --}}
                                <div class="form-group @error('slug') has-error @enderror">
                                    <label class="control-label">Slug (Optional)</label>
                                    <input type="text" name="slug" class="form-control" placeholder="content-slug" value="{{ old('slug', $content->slug) }}">
                                    @error('slug')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                             
                                {{-- Excerpt --}}
                                <div class="form-group @error('excerpt') has-error @enderror">
                                    <label class="control-label">Excerpt</label>
                                    <textarea name="excerpt" class="form-control" placeholder="Short summary">{{ old('excerpt', $content->excerpt) }}</textarea>
                                    @error('excerpt')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Content --}}
                                <div class="form-group @error('content') has-error @enderror">
                                    <label class="control-label">Content</label>
                                    <textarea name="content" class="form-control" rows="10" placeholder="Full article content">{{ old('content', $content->content) }}</textarea>
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
                                            <option value="{{ $type->id }}" {{ old('post_type_id', $content->post_type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
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
                                            <option value="{{ $category->id }}" {{ old('category_id', $content->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="form-group @error('status') has-error @enderror">
                                    <label class="control-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="draft" {{ old('status', $content->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ old('status', $content->status) == 'published' ? 'selected' : '' }}>Published</option>
                                    </select>
                                    @error('status')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Featured Image --}}
                                <div class="form-group @error('featured_image') has-error @enderror">
                                    <label class="control-label">Featured Image</label>
                                    @if($content->featured_image)
                                        <div class="m-b-10">
                                            <img src="{{ asset('storage/' . $content->featured_image) }}" alt="Current Image" style="max-width: 200px; display: block;">
                                        </div>
                                    @endif
                                    <input type="file" name="featured_image" class="form-control">
                                    @error('featured_image')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Is Featured --}}
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $content->is_featured) ? 'checked' : '' }}> Featured
                                    </label>
                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update Content</button>
                                <a href="{{ route('content.content.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
