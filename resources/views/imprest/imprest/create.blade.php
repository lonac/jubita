@extends('shared.master')

@section('title','Imprest Application')

@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Imprest Application</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('imprest.imprest.index') }}">Imprest Application</a></li>
                <li class="active">Application</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ route('imprest.imprest.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">

                                {{-- Common Fields --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('imprest_type_id') has-error @enderror">
                                            <label class="control-label">Imprest Type</label>
                                            <select name="imprest_type_id" id="imprest_type_id" class="form-control">
                                                <option value="">-- Select --</option>
                                                @foreach($imprestTypes as $type)
                                                    <option value="{{ $type->id }}" {{ old('imprest_type_id') == $type->id ? 'selected' : '' }}>
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
                                            <input type="imprest_amount" name="imprest_amount" class="form-control"  value="{{ old('imprest_amount') }}" id="imprest_amount">
                                            @error('imprest_amount')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- If imprest type == 1 --}}
                                <div id="type1_fields" style="display:none;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group @error('start_date') has-error @enderror">
                                                <label class="control-label">Start Date</label>
                                                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                                                @error('start_date')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group @error('end_date') has-error @enderror">
                                                <label class="control-label">End Date</label>
                                                <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                                                @error('end_date')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group @error('safari_destination') has-error @enderror">
                                                <label class="control-label">Safari Destination</label>
                                                <input type="text" name="safari_destination" class="form-control" value="{{ old('safari_destination') }}">
                                                @error('safari_destination')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                {{-- If imprest type == 2 --}}
                                <div id="type2_fields" style="display:none;">
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group @error('purpose') has-error @enderror">
                                            <label class="control-label">Purpose</label>
                                            <textarea name="purpose" class="form-control"  value="{{ old('purpose') }}" id="purpose" cols="30" rows="5"></textarea>
                                            @error('purpose')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                               
                            </div>

                            <div id="type3_fields" style="display:none;">
                                    {{-- Incidental Expenses --}}
                                    <h4 class="m-t-30">Incidental Expenses</h4>
                                    <div id="expenses_wrapper">
                                        <div class="row expense-row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Expense Name</label>
                                                    <input type="text" name="expenses[0][name]" class="form-control" placeholder="Expense name">
                                                </div>
                                            </div>
                                        
                                            <!-- <input type="number" value="1" name="expenses[0][quantity]" class="form-control" placeholder="Quantity"> -->
                                            
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Cost </label>
                                                    <input type="number" step="0.01" name="expenses[0][rate]" class="form-control" placeholder="Cost Rate Per Item">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger btn-remove-expense" style="margin-top:25px;">X</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" id="add_expense" class="btn btn-info m-t-10">+ Add Expense</button>
                                </div>

                            
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"> <br>
                                        <p>
                                           <label for=""><strong>NOTE</strong></label> <br>
                                            By submitting this application, you agree that all the information given above are correct to the best of your knowledge and that You
                                            have no previous Imprest Outstandings.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">

                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Submit Application
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
        let index = 1;

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
                        <input type="number" step="0.01" name="expenses[${index}][rate]" class="form-control" placeholder="Cost Rate">
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
