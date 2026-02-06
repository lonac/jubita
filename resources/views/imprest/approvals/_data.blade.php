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
            <td>{{ $member->user->first_name }} {{ $member->user->first_name }}</td>
            <td>{{ $member->type->name }}</td>
            <td>{{ $member->total_requested_amount }}</td>
            <td>{{ $member->status }}</td>
            <td>
                <a href="{{ route('approval.respond', $member->id) }}" class="btn btn-info btn-sm">View</a>                                    
            </td>
        </tr>
        @endforeach
    </tbody>
</table>