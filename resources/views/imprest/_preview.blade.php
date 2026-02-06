@if($imprest->imprest_type_id==1)
    <div class="white-box">
        <h3 class="box-title">A: Subsistence Allowance</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Nights</th>
                    <th>Rate Amount</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>Allowance per night</td>
                        <td> {{$imprest->total_nights}} </td>
                        <td>{{ number_format($imprest->subsistence_rate) }}</td>
                    </tr>
                <tr>
                    <th>Total Subsistence</th>
                    <th>{{ number_format($imprest->subsistence_rate * $imprest->total_nights) }}</th>
                </tr>
            </tbody>
        </table>
    </div>
    @endif 

     @if($imprest->imprest_type_id==1)    
        <div class="white-box">
            <h3 class="box-title">
                B: Incidental Expenses
            </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Expense Name</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($imprest->expenses as $exp)
                        <tr>
                            <td>{{ $exp->name }}</td>
                            <td>{{ number_format($exp->amount) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th>Total  Incidental Amount</th>
                        <th>{{ number_format($imprest->expenses->sum('amount')) }}</th>
                    </tr>
                    
                </tbody>
            </table>
        </div>


         <div class="white-box">
        <h3 class="box-title">
            A + B: Total Per Diem
        </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Expense Name</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Total  Per Diem </th>
                    <th>{{ number_format($imprest->expenses->sum('amount') + ($imprest->subsistence_rate * $imprest->total_nights)) }}</th>
                </tr>
                
            </tbody>
        </table>
         </div>
     @endif 


        <div class="white-box">
        <h3 class="box-title">
        Imprest Amount | <i>To be Retired</i>
        </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Imprest Amount</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Requested Amount</th>
                    <th>{{ number_format($imprest->total_requested_amount) }}</th>
                </tr>
            </tbody>
        </table>
    </div>



    <!-- APPROVAL HISTORY -->
    <div class="white-box">
        <h3 class="box-title">Approval History</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Office</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($imprest->approvals as $approval)
                    <tr>
                        <td>{{ $approval->role->name }}</td>
                        <td>
                            @if($approval->status == 'approved')
                                <span class="label label-success">Approved</span>
                            @elseif($approval->status == 'rejected')
                                <span class="label label-danger">Rejected</span>
                            @else
                                <span class="label label-warning">Pending</span>
                            @endif
                        </td>
                        <td>{{ $approval->comment ?? '-' }}</td>
                        <td>{{ $approval->action_date }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">No approvals yet</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

