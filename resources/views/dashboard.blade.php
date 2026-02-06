@extends('shared.master')

@section('title','Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row bg-title mb-4">
        <div class="col-md-12">
            <h3 class="page-title">Welcome, {{ Auth::user()->name }}</h3>
            <p class="text-muted">Overview of your Account and  activities</p>
        </div>
    </div>


    <!-- KPI Cards -->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="white-box text-center bg-warning text-white rounded">
                <h1 class="counter">265</h1>
                <p>Posts</p>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="white-box text-center bg-megna text-white rounded">
                <h1 class="counter">54</h1>
                <p>Pending</p>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="white-box text-center bg-primary text-white rounded">
                <h1 class="counter">250</h1>
                <p>Published</p>
            </div>
        </div>


        <div class="col-md-3 col-sm-6">
            <div class="white-box text-center bg-success text-white rounded">
                <h1 class="counter">17,896</h1>
                <p>Visitors</p>
            </div>
        </div>
     

       
       
    </div>

</div>
@endsection

