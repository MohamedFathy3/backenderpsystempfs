<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 15px;
            line-height: 1.9;
            margin: 40px;
        }

        .title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 40px;
            text-decoration: underline;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }

        .table td {
            border: 1px solid #000;
            padding: 10px;
        }

        .footer {
            margin-top: 60px;
        }

        .signature-table {
            width: 100%;
            margin-top: 70px;
        }

        .signature-table td {
            border: none;
            vertical-align: top;
        }
    </style>

</head>

<body>

    <div class="title">
        Acknowledgment
    </div>

    <p>
        <strong>To:</strong> Pyramids Freight Services
    </p>

    <p>
        I, <strong>{{ $employeeDetails['name'] ?? '' }}</strong>,
        National ID:
        <strong>{{ $employeeDetails['national_id'] ?? '............................' }}</strong>,
        <br>
        working as
        <strong>{{ $employeeDetails['position'] ?? '' }}</strong>,<br>
        hereby acknowledge that I have received a laptop from
        <strong>Pyramids Freight Services</strong>
        with the following specifications:
    </p>

    <table class="table">

        <tr>
            <td width="35%"><strong>Brand</strong></td>
            <td>{{ $device->brand?->name }}</td>
        </tr>

        <tr>
            <td><strong>Model</strong></td>
            <td>{{ $device->deviceModel?->name }}</td>
        </tr>

        <tr>
            <td><strong>Processor</strong></td>
            <td>{{ $device->cpu?->name }}</td>
        </tr>

        <tr>
            <td><strong>Memory (RAM)</strong></td>
            <td>{{ $device->memory?->size }} GB</td>
        </tr>

        <tr>
            <td><strong>Storage</strong></td>
            <td>
                @foreach($device->storages as $storage)
                    {{ $storage->type }} {{ $storage->size }} GB
                    @if(!$loop->last)
                        |
                    @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td><strong>Serial Number</strong></td>
            <td>{{ $device->serial_number }}</td>
        </tr>

        <tr>
            <td><strong>Charger</strong></td>
            <td>Included</td>
        </tr>

    </table>

        <p>
        The above-mentioned laptop has been handed over to me solely for official business purposes and for carrying out my assigned duties.
    </p>

    <p>
        I acknowledge that I have received the device in new condition. I accept full responsibility for it and undertake to pay its full value in the event of damage, misuse, or loss.
    </p>

    <p>
        This acknowledgment is made by me as confirmation of the above.
    </p>

    <p style="text-align:right;">
        Yours faithfully,
    </p>

    <table class="signature-table">

        <tr>

            <td width="50%">
                <strong>Employee Name:</strong><br><br>
                {{ $employeeDetails['name'] ?? '' }}
            </td>

            <td width="50%" align="right">
                <strong>Signature:</strong><br><br>
                ___________________________
            </td>

        </tr>

    </table>

</body>

</html>
