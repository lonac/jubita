<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class ReportsExport implements FromCollection
{
    protected $reports;

    public function __construct($reports)
    {
        $this->reports = $reports;
    }

    public function collection()
    {
        return $this->reports->map(function ($imprest) {
            return [
                'Imprest ID' => $imprest->id,
                'User' => $imprest->user->name ?? '-',
                'Amount Issued' => $imprest->amount ?? 0,
                'Retired Amount' => $imprest->retirement->total_retired_amount ?? 0,
                'Balance' => $imprest->retirement->balance_to_return ?? 0,
                'Status' => $imprest->status,
                'Created At' => $imprest->created_at->format('Y-m-d'),
            ];
        });
    }
}
