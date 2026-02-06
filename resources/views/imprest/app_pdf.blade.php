<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}} Application Form</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 13px;
            line-height: 1.5;
        }
        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            position: relative;
        }
        .header-left {
            position: absolute;
            left: 0;
            top: 5%;
            transform: translateY(-50%);
            text-align: center;
            width: 100px;
        }
        .header-left img {
            width: 120px;
            height: auto;
        }
        .header-right {
            width: 100%;
            text-align: center;
        }
        .header-right h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .header-right h3 {
            margin: 0;
            font-size: 15px;
        }
        .contact-info {
            font-size: 12px;
            margin-top: 5px;
            line-height: 1.5;
        }
        .title {
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
        }
        .section {
            margin-top: 20px;
            border: 1px solid #000;
            padding: 10px;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 5px;
            text-decoration: underline;
        }
        .row {
            margin-bottom: 8px;
        }
        .label {
            display: inline-block;
            width: 220px;
            font-weight: bold;
        }
        .signature {
            margin-top: 30px;
        }
        .signature-line {
            border-top: 1px solid #000;
            width: 200px;
            text-align: center;
            margin-top: 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }
        table td, table th {
            border: 1px solid #000;
            padding: 5px;
            font-size: 12px;
        }
        .footer-note {
            margin-top: 40px;
            font-size: 11px;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <div class="header-left">
            <img src="{{ public_path('plugins/images/logo.png') }}" alt="Logo">
        </div>
        <div class="header-right">
            <h2>BUNGE LA TANZANIA</h2>
            <h3>Parliament of the United Republic of Tanzania</h3>
            <div class="contact-info">
                P.O. Box 941, Dodoma – Tanzania<br>
                Tel: +255 26 232 2761 | Fax: +255 26 232 2114<br>
                Email: info@bunge.go.tz | Website: www.bunge.go.tz
            </div>
        </div>
    </div>

    <!-- TITLE -->
    <div class="title">APPLICATION FOR ISSUE OF {{$title}}</div>
    <div class="row"><strong>Ref. No: ________________________</strong></div>

    <!-- STEP 1 - Applicant -->
    <div class="section">
        <div class="section-title">A. Applicant</div>
        <div class="row"><span class="label">Name of Applicant:</span> {{ $imprest->user->first_name }} {{ $imprest->user->last_name }}</div>
        <div class="row"><span class="label">Designation:</span> {{ $imprest->user->occupation->name ?? '________' }}</div>
        <div class="row"><span class="label">Check No:</span> {{ $imprest->user->check_no ?? '________' }}</div>
        <div class="row"><span class="label">Department:</span> {{ $imprest->user->department->name ?? '________' }}</div>
        <div class="row"><span class="label">Salary Scale:</span> {{ $imprest->user->salaryScale->name ?? '________' }}</div>
        <div class="row"><span class="label">Subsistence Allowance Rate (per night):</span> {{ number_format($imprest->subsistence_rate) }}</div>

        <div class="row"><span class="label">Date of Leaving Station:</span> {{ $imprest->date_of_leaving }}</div>
        <div class="row"><span class="label">Date of Return:</span> {{ $imprest->date_of_return }}</div>
        <div class="row"><span class="label">Place(s) to be Visited:</span> {{ $imprest->destination }}</div>
        <div class="row"><span class="label">Purpose of Safari:</span> {{ $imprest->purpose }}</div>

        @if($state)
        <div class="row"><strong>Details of Imprest Required:</strong></div>
        <table>
            <tr><th>Description</th><th>Rate</th><th>Nights</th><th>Total</th></tr>
            <tr>
                <td>Subsistence Allowance</td>
                <td>{{ number_format($imprest->subsistence_rate) }}</td>
                <td>{{ $imprest->total_nights }}</td>
                <td>{{ number_format($imprest->subsistence_rate * $imprest->total_nights) }}</td>
            </tr>
            @foreach($imprest->expenses as $expense)
             <tr><td>{{$expense->name}} <br> {{$expense->description}}</td><td colspan="2"></td><td>{{ number_format($expense->amount ?? 0) }}</td></tr>
            @endforeach
        </table>

        <div class="row"><strong>Safari Outside Tanzania (if applicable):</strong></div>
        <div class="row"><span class="label">State House Authority No:</span> __________</div>
        <div class="row"><span class="label">Exchange Control Authority No:</span> __________</div>
        <div class="row"><span class="label">Gov/Donor Assistance:</span> __________</div>

        <div class="row"><span class="label">Total Nights in Current Year (Excl. this safari):</span> __________</div>

        <div class="signature">
            <p>I certify that the imprest applied for is required for the above safari and that I have no outstanding imprest.</p>
            <div class="signature-line">Signature of Applicant</div>
            <div>Date: __________</div>
        </div>
        @endif 
    </div>

    <!-- STEP 2 - Accountant -->
    <div class="section">
        <div class="section-title">B. Accountant</div>
        <p>Certified that the applicant has no outstanding imprest.</p>
        <div class="signature-line">Signature of Accountant</div>
        <div>Date: __________</div>
    </div>

    <!-- STEP 3 - Head of Department -->
    <div class="section">
        <div class="section-title">C. Head of Department</div>
        <p>The above safari has been authorized by me and a Safari Imprest of Tshs __________ is recommended.</p>
        <p>Bus/Train/Air Warrant is hereby authorized from __________ to __________ and back.</p>
        <div class="signature-line">Signature of Head of Department</div>
        <div>Date: __________</div>
    </div>

    <!-- STEP 4 - Accounting Officer -->
    <div class="section">
        <div class="section-title">D. Accounting Officer</div>
        <p>An imprest of Tshs __________ is approved / not approved.</p>
        <p>The imprest must be retired before __________. Failing which, the officer will be liable to a surcharge of 10% of the unretired amount monthly until the whole imprest is fully retired. Any unspent amount must be refunded in cash or foreign exchange as applicable.</p>
        <div class="signature-line">Signature of Accounting Officer</div>
        <div>Date: __________</div>
    </div>

    <!-- Cash Office -->
    <div class="section">
        <div class="section-title">For Cash Office Use Only</div>
        <div class="row"><span class="label">Imprest No:</span> __________</div>
        <div class="row"><span class="label">P.V. No:</span> __________</div>
        <div class="row"><span class="label">Amount:</span> __________</div>
        <div class="row"><span class="label">Copy to:</span> Warrant Holder for commitment entry in the Vote Book</div>
    </div>

</body>
</html>
