<div class="white-box">
    <h3 class="box-title">Applicant Info</h3>
    <hr>
    <div class="row">
        <div class="col-md-12"><strong>Requested By</strong><br>
            <p class="text-muted">{{ $imprest->user->first_name }} {{ $imprest->user->last_name }}</p>
        </div>
        <div class="col-md-12"><strong>Department</strong><br>
            <p class="text-muted">{{ $imprest->department->name??'' }}</p>
        </div>
        <div class="col-md-12"><strong>Date Requested</strong><br>
            <p class="text-muted">{{ $imprest->date }}</p>
        </div>
        <div class="col-md-12"><strong>Imprest Amount</strong><br>
            <p class="text-muted">{{ number_format($imprest->total_requested_amount) }}</p>
        </div>
        <!-- <div class="col-md-12"><strong>Total Amount</strong><br>
            <p class="text-muted">{{ number_format($imprest->expenses->sum('amount') + ($imprest->subsistence_rate * $imprest->total_nights)) }}</p>
        </div> -->
        <div class="col-md-12"><strong>Status</strong><br>
            <p class="text-muted">  <span class="label label-info">{{ ucfirst($imprest->status) }}</span> </p>
        </div> <br>
        @if(($imprest->status=="paid") || ($imprest->status=="retired"))
            <div class="col-md-12"><strong>Download</strong><br>
                <p class="text-muted"> 
                    <form action="{{route('imprest.download_imprest',$imprest->id)}}" method="POST">
                        @csrf 
                        <input type="number" hidden value="{{$imprest->id}}" name="imprest">
                        <button class="btn btn-xs btn-danger"><i class="fa fa-download"></i> Download Application</button>
                    </form>
                </p>
            </div> @else 
            <button class="btn btn-xs disabled btn-danger"><i class="fa fa-download"></i> Download Application</button>
        @endif 
    </div>
</div>