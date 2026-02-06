@extends('shared.master')

@section('title','Balance Sheet Report')

@section('content')

<div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Balance Sheet Report
                    <a href="" class="btn btn-sm pull-right btn-info">Generate</a>
                </h4>
            </div>
        </div>
        <!-- /row -->



        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">BALANCE SHEET</h3>
                    <ul class="list-inline text-center">
                        <li>
                            <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Site A View</h5> </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Site B View</h5> </li>
                    </ul>
                    <div id="morris-area-chart2" style="height: 370px;"></div>
                </div>
            </div>
        </div>




    </div>

@endsection 


