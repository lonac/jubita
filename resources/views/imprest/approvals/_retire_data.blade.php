<table id="myTable" class="table table-striped">
    <thead>
        <tr>
            <th>SNo</th>
            <th>Staff Name</th>
            <th>Imprest Type</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($imprests as $index => $member)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $member->imprest->user->first_name }} {{ $member->imprest->user->last_name }} </td>
            <td>{{ $member->imprest->type->name }}</td>
            <td>{{ number_format($member->total_retired_amount, 2) }}</td>
            <td>{{ $member->status }}</td>
            <td>
                <a href="{{ route('approval.retire', $member->id) }}" class="btn btn-info btn-sm">View</a>                                    
            </td>
        </tr>
        @endforeach
    </tbody>
</table>