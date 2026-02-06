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
                <li><a href="#">Imprests Assessments</a></li>
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

            
         
            <!-- ACTION FORM -->
            <div class="white-box">
                <h3 class="box-title">Approval Action</h3>
                @if($canApprove)
                <form method="POST" action="{{ route('approval.store', $currentApproval->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="status">Action:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">-- Select Action --</option>
                            <option value="approved">Approve</option>
                            <option value="rejected">Reject</option>
                        </select>
                    </div>

                    <div class="form-group" id="commentBox" style="display:none;">
                        <label for="comment">Comment (required when rejecting):</label>
                        <textarea name="comment" id="comment" rows="3" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Submit Response</button>
                </form>
                @else <p>You can not perform any action on this application!</p> @endif 
            </div> 
        </div>
    </div>
</div>

<script>
document.getElementById('status').addEventListener('change', function() {
    if (this.value === 'rejected') {
        document.getElementById('commentBox').style.display = 'block';
        document.getElementById('comment').setAttribute('required','required');
    } else {
        document.getElementById('commentBox').style.display = 'none';
        document.getElementById('comment').removeAttribute('required');
    }
});
</script>

@endsection
