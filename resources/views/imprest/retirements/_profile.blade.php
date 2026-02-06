<div class="white-box">
    <h3 class="box-title">Applicant Info</h3>
    <hr>
    <div class="row">
        <div class="col-md-12"><strong>Requested By</strong><br>
            <p class="text-muted">{{ $imprest->imprest->user->first_name }} {{ $imprest->imprest->user->last_name }}</p>
        </div>
        <div class="col-md-12"><strong>Department</strong><br>
            <p class="text-muted">{{ $imprest->imprest->department->name??'' }}</p>
        </div>
        <div class="col-md-12"><strong>Date Requested</strong><br>
            <p class="text-muted">{{ $imprest->date }}</p>
        </div>
        <div class="col-md-12"><strong>Balance to Return </strong><br>
            <p class="text-muted">{{ number_format($imprest->balance_to_return) }}</p>
        </div>
        <div class="col-md-12"><strong>Retired Amount</strong><br>
            <p class="text-muted">{{ number_format($imprest->total_retired_amount) }}</p>
        </div>
        <div class="col-md-12"><strong>Excess Expenditure</strong><br>
            <p class="text-muted">{{ number_format($imprest->excess_expenditure) }}</p>
        </div>
        <div class="col-md-12"><strong>Status</strong><br>
            <p class="text-muted">
                <span class="label label-info">{{ ucfirst($imprest->status) }}</span>
            </p>
        </div> 
        <!-- <div class="col-md-12"><strong>Download</strong><br>
            <p class="text-muted"> 
                <form action="{{route('imprest.retirement',$imprest->id)}}" method="POST">
                    @csrf 
                    <button class="btn btn-xs btn-danger"><i class="fa fa-download"></i> Download Application</button>
                </form>
            </p>
        </div> -->
    </div>
</div>