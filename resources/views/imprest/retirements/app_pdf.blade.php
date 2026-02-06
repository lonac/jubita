<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>RETIREMENT OF {{$title}}</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 40px;
            font-size: 14px;
            line-height: 1.6;
        }
        h2, h3 {
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .section {
            margin-top: 25px;
            border: 1px solid #000;
            padding: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            font-size: 13px;
        }
        .signature {
            margin-top: 50px;
        }
        .signature p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <h2>RETIREMENT OF {{$title}}</h2>
    <h3>(B: Retirement of Imprest)</h3>
    <hr>

    <!-- Section 1: Retirement of Imprest -->
    <div class="section">
        <h3>1. Retirement of Imprest</h3>
        <p>Date: ____________________________</p>
        <p>To: The Accounting Officer</p>
        <p>
            I, <strong>{{ $staff->first_name }} {{ $staff->last_name }}</strong>,  
            Salary Scale: <strong>{{ $staff->salaryScale->name ?? '________' }}</strong>,  
            Department: <strong>{{ $staff->department->name ?? '________' }}</strong>,  
            Designation: <strong>{{ $staff->occupation->name ?? '________' }}</strong>,  
            Division: _____________________
        </p>
        <p>
            Date of commencement of safari: ________  
            Terminated on: ________  
            Imprest No: ________ of Tshs __________________
        </p>
    </div>

    @if($state)
    <!-- Section 2: Officer’s Certificate -->
    <div class="section">
        <h3>2. Officer’s Certificate</h3>
        <p>
            I certify that I travelled to _____________________ where I stayed for ______ nights.  
            I am therefore entitled to subsistence allowance of Tshs __________ plus incidental expenses of Tshs __________,
            arrived as follows:
        </p>

        <table>
            <thead>
                <tr>
                    <th>Date of Departure</th>
                    <th>Place</th>
                    <th>Date of Arrival</th>
                    <th>Place</th>
                    <th>No of Nights</th>
                    <th>Rate Per Day (Tshs)</th>
                    <th>Total Subsistence (Tshs)</th>
                </tr>
            </thead>
            <tbody>
                <tr><td colspan="7">&nbsp;</td></tr>
                <tr><td colspan="7">&nbsp;</td></tr>
            </tbody>
        </table>

        <p>Other incidental expenses payable under paragraph 4 of Staff Circular No ________</p>
        <p><strong>Total Claims Tshs: __________________</strong></p>

        <div class="signature">
            <p>Officer’s Signature: ________________________</p>
        </div>
    </div>
    @endif 

    <!-- Section 3: Head of Department -->
    <div class="section">
        <h3>3. Recommendation by Head of Department / In-Charge of Activity</h3>
        <p>
            I, __________________________ of __________________________ solemnly recommend that Shs ___________  
            be charged to the activity _____________________ Item _____________________.
        </p>
        <p>Date: ____________</p>
        <div class="signature">
            <p>Signature: ________________________</p>
        </div>
    </div>

    <!-- Section 4: Authorising Officer -->
    <div class="section">
        <h3>4. Authorising Officer’s Certificate</h3>
        <p>
            I certify that __________________ travelled to / issued special imprest __________________ where he/she stayed for ______ nights.  
            I, therefore, authorise payment of his/her claim to the extent of Tshs __________________ only.  
            The claim is payable from Item _____________________.
        </p>
        <p>Date: ____________</p>
        <div class="signature">
            <p>Authorising Officer’s Signature: ________________________</p>
            <p>Designation: ________________________</p>
        </div>
    </div>

</body>
</html>
