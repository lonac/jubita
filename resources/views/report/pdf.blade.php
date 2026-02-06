<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Imprest Report</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
            line-height: 1.4;
        }
        .header {
            position: relative;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header-left {
            position: absolute;
            left: 0;
            top: 5%;
            transform: translateY(-50%);
            width: 100px;
            text-align: center;
        }
        .header-left img {
            width: 100px;
            height: auto;
        }
        .header-center {
            width: 100%;
            text-align: center;
        }
        .header-center h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .header-center h3 {
            margin: 0;
            font-size: 14px;
        }
        .contact-info {
            font-size: 12px;
            margin-top: 5px;
            line-height: 1.4;
        }
        h2.report-title {
            text-align: center;
            margin: 10px 0 20px 0;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        th {
            background: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        tbody tr:nth-child(even) {
            background: #fafafa;
        }
        .footer {
            margin-top: 20px;
            font-size: 10px;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <div class="header-left">
            <img src="{{ public_path('plugins/images/logo.png') }}" alt="Logo">
        </div>
        <div class="header-center">
            <h2>BUNGE LA TANZANIA</h2>
            <h3>Parliament of the United Republic of Tanzania</h3>
            <div class="contact-info">
                P.O. Box 941, Dodoma – Tanzania<br>
                Tel: +255 26 232 2761 | Fax: +255 26 232 2114<br>
                Email: info@bunge.go.tz | Website: www.bunge.go.tz
            </div>
        </div>
    </div>

    <!-- REPORT TITLE -->
    <h2 class="report-title">Imprest Report</h2>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Issued (TZS)</th>
                <th>Retired (TZS)</th>
                <th>Balance (TZS)</th>
                <th>Status</th>
                <th>Date Issued</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $r)
            <tr>
                <td style="text-align: center;">{{ $r->id }}</td>
                <td>{{ $r->user->name ?? '-' }}</td>
                <td style="text-align: right;">{{ number_format($r->amount, 2) }}</td>
                <td style="text-align: right;">{{ number_format($r->retirement->total_retired_amount ?? 0, 2) }}</td>
                <td style="text-align: right;">{{ number_format($r->retirement->balance_to_return ?? 0, 2) }}</td>
                <td style="text-align: center;">{{ ucfirst($r->status) }}</td>
                <td style="text-align: center;">{{ $r->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        Generated on {{ now()->format('d M Y H:i') }} | System Generated Report
    </div>

</body>
</html>
