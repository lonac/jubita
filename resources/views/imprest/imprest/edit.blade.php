@extends('shared.master')

@section('title','Edit Imprest Application')

@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Imprest Application</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('imprest.imprest.index') }}">Imprest Application</a></li>
                <li class="active">Edit</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ route('imprest.imprest.update', $imprest->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">

                                {{-- Common Fields --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('imprest_type_id') has-error @enderror">
                                            <label class="control-label">Imprest Type</label>
                                            <select name="imprest_type_id" id="imprest_type_id" class="form-control">
                                                <option value="">-- Select --</option>
                                                @foreach($imprestTypes as $type)
                                                    <option value="{{ $type->id }}" {{ $imprest->imprest_type_id == $type->id ? 'selected' : '' }}>
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('imprest_type_id')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('imprest_amount') has-error @enderror">
                                            <label class="control-label">Imprest Amount</label>
                                            <input type="imprest_amount" name="imprest_amount" value="{{$imprest->total_requested_amount}}" class="form-control"  value="{{ old('imprest_amount') }}" id="imprest_amount">
                                            @error('imprest_amount')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Type 1 Fields --}}
                                <div id="type1_fields" style="display:none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @error('start_date') has-error @enderror">
                                                <label class="control-label">Start Date</label>
                                                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $imprest->start_date) }}">
                                                @error('start_date')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group @error('end_date') has-error @enderror">
                                                <label class="control-label">End Date</label>
                                                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $imprest->end_date) }}">
                                                @error('end_date')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @error('purpose') has-error @enderror">
                                                <label class="control-label">Purpose</label>
                                                <input type="text" name="purpose" class="form-control" value="{{ old('purpose', $imprest->purpose) }}">
                                                @error('purpose')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group @error('safari_destination') has-error @enderror">
                                                <label class="control-label">Safari Destination</label>
                                                <input type="text" name="safari_destination" class="form-control" value="{{ old('safari_destination', $imprest->safari_destination) }}">
                                                @error('safari_destination')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                {{-- Type 2 Fields --}}
                                <div id="type2_fields" style="display:none;">
                                    
                                </div>


                        

                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group @error('purpose') has-error @enderror">
                                        <label class="control-label">Purpose</label>
                                        <textarea name="purpose" class="form-control"  value="{{ old('purpose') }}" id="purpose" cols="30" rows="5">{{ $imprest->purpose }}</textarea>
                                        @error('purpose')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="type3_fields" style="display:none;">
                                {{-- Incidental Expenses --}}
                                <h4 class="m-t-30">Incidental Expenses</h4>
                                <div id="expenses_wrapper">
                                    @foreach($imprest->expenses as $index => $expense)
                                    <div class="row expense-row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" name="expenses[{{ $index }}][name]" class="form-control" placeholder="Expense name" value="{{ $expense->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="number" step="0.01" name="expenses[{{ $index }}][rate]" class="form-control" placeholder="Rate" value="{{ $expense->rate }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger btn-remove-expense" style="margin-top:25px;">X</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add_expense" class="btn btn-info m-t-10">+ Add Expense</button>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn pull-right btn-success">
                                    <i class="fa fa-check"></i> Update Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let select = document.getElementById("imprest_type_id");
        let type1 = document.getElementById("type1_fields");
        let type2 = document.getElementById("type2_fields");
        let type3 = document.getElementById("type3_fields");


        function toggleFields() {
            type1.style.display = "none";
            type2.style.display = "none";
            type3.style.display = "none";
            
            if (select.value == "1") {
                type1.style.display = "block";
                type3.style.display = "block";
            } else if (select.value == "2") {
                type2.style.display = "block";
            }
        }

        select.addEventListener("change", toggleFields);
        toggleFields(); // on page load

        // Dynamic expenses
        let wrapper = document.getElementById("expenses_wrapper");
        let addBtn = document.getElementById("add_expense");
        let index = wrapper.querySelectorAll('.expense-row').length;

        addBtn.addEventListener("click", function() {
            let row = document.createElement("div");
            row.classList.add("row", "expense-row");
            row.innerHTML = `
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="text" name="expenses[${index}][name]" class="form-control" placeholder="Expense name">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="number" step="0.01" name="expenses[${index}][rate]" class="form-control" placeholder="Rate">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-remove-expense">X</button>
                </div>
            `;
            wrapper.appendChild(row);
            index++;
        });

        wrapper.addEventListener("click", function(e) {
            if (e.target.classList.contains("btn-remove-expense")) {
                e.target.closest(".expense-row").remove();
            }
        });
    });
</script>

@endsection
