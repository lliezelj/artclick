<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monthly Report</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            margin: 0;
            padding: 0;
            min-height: 100%; /* Ensures the body takes the full height of the page */
        }
        .content {
            padding: 20px;
        }
        img {
            max-width: 150px; /* Ensure the image fits within the page */
            height: auto;     /* Maintain aspect ratio */
            display: block;    /* Make the image a block element */
            margin: 0 auto;   /* Centering */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Space between image and table */
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #FEC978;
        }
        h2 {
            text-align: center;
            margin-top: 60px; /* Space between header and image */
        }
        footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #FEC978;
            padding: 8px;
            color: #333;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <img src="{{ public_path('manager/img/logo.png') }}" alt="Logo">
    <h2>Monthly Sales and Expenses Report</h2>
    <table>
        <thead>
            <tr>
                <th>Year</th>
                <th>Total Orders</th>
                <th>Total Sales</th>
                <th>Total Expenses</th>
                <th>Net Income Profit</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($annualData as $data)
        <tr>
            <td style="font-family: DejaVu Sans; sans-serif">{{ \Carbon\Carbon::create($data['year'])->format('Y') }}</td>
            <td style="font-family: DejaVu Sans; sans-serif">{{ $data['total_orders'] ?? 0 }}</td>
            <td style="font-family: DejaVu Sans; sans-serif">₱{{ number_format($data['total_sales'], 2) }}</td>
            <td style="font-family: DejaVu Sans; sans-serif">₱{{ number_format($data['total_expense'], 2) }}</td>
            <td style="font-family: DejaVu Sans; sans-serif">₱{{ number_format($data['total_sales'] - $data['total_expense'], 2) }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <footer>
        © {{ date('Y') }} Asiano Arts and Crafts. All rights reserved.
    </footer>
</body>
</html>
