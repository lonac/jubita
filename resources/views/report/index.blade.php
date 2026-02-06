@extends('shared.master')

@section('title','Reports')

@section('content')
<div class="container-fluid">
    <h3 class="mb-3">Imprest Reports</h3>

    <!-- Report Actions -->
    <div class="white-box mb-4">
        <h4 class="box-title">Quick Actions</h4>
        <div class="d-flex gap-2">
            <!-- <a href="{{ route('report.export', ['format' => 'excel']) }}" class="btn btn-success">
                <i class="fa fa-file-excel-o"></i> Export Excel
            </a> -->
            <a href="{{ route('report.export', ['format' => 'pdf']) }}" class="btn btn-danger">
                <i class="fa fa-file-pdf-o"></i> Export PDF
            </a>
            <a href="{{ route('report.print') }}" target="_blank" class="btn btn-secondary">
                <i class="fa fa-print"></i> Print
            </a>
        </div>
    </div>

    <!-- Reports Table -->
    <div class="white-box">
        <h4 class="box-title">Imprest Overview</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imprest ID</th>
                        <th>User</th>
                        <th>Issued</th>
                        <th>Retired</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $r)
                    <tr>
                        <td>#{{ $r->id }}</td>
                        <td>{{ $r->user->first_name ?? $r->user->last_name ?? '-' }}</td>
                        <td>{{ number_format($r->total_requested_amount, 2) }}</td>
                        <td>{{ number_format($r->retirement->total_retired_amount ?? 0, 2) }}</td>
                        <td>{{ number_format($r->retirement->balance_to_return ?? 0, 2) }}</td>
                        <td><span class="label label-info">{{ ucfirst($r->status) }}</span></td>
                        <td>{{ $r->created_at->format('Y-m-d') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center">No data found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $reports->links() }}
    </div>
</div>
@endsection
