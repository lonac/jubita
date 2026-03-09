@extends('shared.master')

@section('title','Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row bg-title mb-4">
        <div class="col-md-12">
            <h3 class="page-title">Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
            <p class="text-muted">Overview of your Account and  activities</p>
        </div>
    </div>


    <!-- KPI Cards -->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="white-box text-center bg-warning text-white rounded">
                <h1 class="counter">{{ $totalPosts }}</h1>
                <p>Total Posts</p>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="white-box text-center bg-megna text-white rounded">
                <h1 class="counter">{{ $pendingPosts }}</h1>
                <p>Draft/Pending</p>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="white-box text-center bg-primary text-white rounded">
                <h1 class="counter">{{ $publishedPosts }}</h1>
                <p>Published</p>
            </div>
        </div>


        <div class="col-md-3 col-sm-6">
            <div class="white-box text-center bg-success text-white rounded">
                <h1 class="counter">{{ $totalCategories }}</h1>
                <p>Categories</p>
            </div>
        </div>
     

       
       
    </div>

</div>
@endsection

