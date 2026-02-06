@extends('shared.master')

@section('title','Print Report')

@section('content')
<div class="container">
    <h2 class="text-center">Imprest Report</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>User</th><th>Issued</th><th>Retired</th>
                <th>Balance</th><th>Status</th><th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->user->name ?? '-' }}</td>
                <td>{{ number_format($r->amount, 2) }}</td>
                <td>{{ number_format($r->retirement->total_retired_amount ?? 0, 2) }}</td>
                <td>{{ number_format($r->retirement->balance_to_return ?? 0, 2) }}</td>
                <td>{{ ucfirst($r->status) }}</td>
                <td>{{ $r->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script> window.print(); </script>
@endsection
