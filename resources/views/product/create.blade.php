@extends('shared.master')

@section('title','Add Product')

@section('content')
<div class="container-fluid">

    <h4>Add Product</h4>

    {{-- Success message (still below feed) --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('product.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Name --}}
        <div class="form-group @error('name') has-error @enderror">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Description --}}
        <div class="form-group @error('description') has-error @enderror">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Price --}}
        <div class="form-group @error('price') has-error @enderror">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}">
            @error('price')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Old Price --}}
        <div class="form-group @error('old_price') has-error @enderror">
            <label>Old Price</label>
            <input type="number" step="0.01" name="old_price" class="form-control" value="{{ old('old_price') }}">
            @error('old_price')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Rating --}}
        <div class="form-group @error('rating') has-error @enderror">
            <label>Rating (0–5)</label>
            <input type="number" step="0.1" name="rating" class="form-control" value="{{ old('rating') }}">
            @error('rating')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Image --}}
        <div class="form-group @error('image') has-error @enderror">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-success">Save Product</button>
    </form>
</div>
@endsection
