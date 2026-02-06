@extends('shared.master')

@section('title','Loan Report')

@section('content')

<div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Loan Report
                    <a href="" class="btn btn-sm pull-right btn-info">Generate Report</a>
                </h4>
            </div>
        </div>
        <!-- /row -->

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Loan Given</h3>
                    <div class="text-right"> <span class="text-muted">All time</span>
                        <h1><sup><i class="ti-arrow-up text-success"></i></sup> {{number_format($all_loan)}}</h1> 
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Collected</h3>
                    <div class="text-right"> <span class="text-muted">Collected</span>
                        <h1><sup><i class="ti-arrow-up text-info"></i>  </sup>{{number_format($paid_loan)}}</h1> 
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Uncollected</h3>
                    <div class="text-right"> <span class="text-muted">Uncollected</span>
                        <h1><sup><i class="ti-arrow-down text-danger"></i></sup> {{number_format($all_loan - $paid_loan)}}</h1> 
                    </div>
                </div>
            </div>
        </div>




            <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">LOAN ANALYTICS</h3>
                            <ul class="list-inline text-center">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Site A View</h5> </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Site B View</h5> </li>
                            </ul>
                            <div id="morris-area-chart2" style="height: 370px;"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Total Members</h3>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                                    <h1 class="text-warning">100</h1>
                                    <p class="text-muted">APRIL 2016</p> <b>Total Members</b> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div id="sales1" class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Inactive Members</h3>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                                    <h1 class="text-info">12</h1>
                                    <p class="text-muted">APRIL 2025</p> <b>(150-165 Sales)</b> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div id="sales2" class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




    </div>

@endsection 


