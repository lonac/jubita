@extends('shared.master')

@section('title','Imprest Retirement')

@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Imprest Retirement</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('imprest.retirement.index') }}">Imprest Retirement</a></li>
                <li class="active">Retirement</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-body">
                    <form action="{{ route('imprest.retirement.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">

                            {{-- Imprest Reference --}}
                            <h4 class="m-t-10">Imprest </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Imprest Number</label>
                                        <select name="imprest_id" id="imprest_select" class="form-control">
                                            <option value="">-- Select Imprest --</option>
                                            @foreach($imprests as $imprest)
                                                <option value="{{ $imprest->id }}">
                                                    {{ $imprest->date }} - {{ $imprest->total_requested_amount }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Imprest Amount</label>
                                        <input type="number" id="approved_amount" name="approved_amount" class="form-control" readonly>
                                    </div>
                                </div>
                                
                            </div>

                            <!-- {{-- Extra Imprest Info --}}
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Start Date</label>
                                    <input type="text" id="start_date" class="form-control" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label>End Date</label>
                                    <input type="text" id="end_date" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Destination</label>
                                    <input type="text" id="destination" class="form-control" readonly>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group @error('purpose') has-error @enderror">
                                        <label class="control-label">Purpose</label>
                                        <textarea name="purpose" class="form-control"  value="{{ old('purpose') }}" id="purpose" cols="30" rows="5" readonly></textarea>                                    
                                    </div>
                                </div>
                            </div>

                       

                            {{-- Expenses --}}
                            <h4 class="m-t-20">Expenses</h4>
                            <div id="expenses_wrapper">
                                <div class="row expense-row">
                                    <div class="col-md-4">
                                        <input type="text" name="expenses[0][name]" class="form-control" placeholder="Expense name">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" step="0.01" name="expenses[0][rate]" class="form-control expense-field" placeholder="Cost Amount">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="file" name="expenses[0][receipt]" class="form-control expense-field">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger btn-remove-expense">X</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add_expense" class="btn btn-info m-t-10">+ Add Expense</button>

                            {{-- Settlement Summary --}}
                            <h4 class="m-t-30">Settlement Summary</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Total Expenditure</label>
                                    <input type="number" id="total_expenditure" name="total_expenditure" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Balance / Refund</label>
                                    <input type="number" id="refund_amount" name="refund_amount" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Extra Claim (if any)</label>
                                    <input type="number" id="extra_claim" name="extra_claim" class="form-control" value="0">
                                </div>
                            </div>

                            {{-- Remarks --}}
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea name="remarks" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Submit Retirement
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
    <script src="{{ asset('js/imprest.js') }}"></script>
@endsection

@endsection
