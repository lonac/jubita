<div class="white-box">
    <h3 class="box-title">  Expenses Records </h3>
    <table class="table">
        <thead>
            <tr>
                <th>Expense Name</th>
                <th>Amount</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            @foreach($imprest->expenses as $exp)
                <tr>
                    <td>{{ $exp->name }}</td>
                    <td>{{ number_format($exp->amount) }}</td>
                    <td>
                        @if($exp->receipt_path)
                            <a href="{{ asset($exp->receipt_path) }}" target="_blank" class="btn btn-xs btn-info">
                                <i class="fa fa-file"></i>
                            </a>
                        @else
                            <span class="text-muted">No file</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <th>Total Shs.</th>
                <th>{{ number_format($imprest->expenses->sum('amount')) }}</th>
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

