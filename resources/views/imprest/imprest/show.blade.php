@extends('shared.master')

@section('title','Imprest Details')

@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Imprest Details</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="#">Imprests Details</a></li>
                <li class="active">Imprest #{{ $imprest->id }}</li>
            </ol>
        </div>
    </div>

    <!-- IMPREST DETAILS -->
    <div class="row">
        <div class="col-md-4 col-xs-12">
            @include('imprest._profile')
        </div>

        <!-- EXPENSE ITEMS -->
        <div class="col-md-8 col-xs-12">
            @include('imprest._preview')
        </div>
    </div>
</div>

@endsection
