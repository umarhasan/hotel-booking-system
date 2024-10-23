<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $booking->id }}</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .invoice-box {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #eee;
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .heading {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .invoice-header div {
            width: 48%;
        }
        .invoice-header p {
            margin: 5px 0;
        }
        .info-block {
            margin-bottom: 30px;
        }
        .info-block strong {
            color: #333;
            font-weight: bold;
        }
        .items {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .items th, .items td {
            padding: 12px;
            border: 1px solid #eee;
            text-align: left;
        }
        .items th {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        .total {
            font-weight: bold;
            text-align: right;
            padding-right: 20px;
        }
        .btn-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
            cursor: pointer;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        .btn-print {
            background-color: #008CBA;
        }
        .btn-print1 {
            background-color: #140264da;
        }
        /* Hide buttons when printing */
        @media print {
            .btn-container {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <!-- Hotel Name and Invoice Heading -->
        <h1 class="heading">Invoice #{{ $booking->id }} | {{ $hotel->name }}</h1>

        <!-- Guest Information and Room Details Side by Side -->
        <div class="invoice-header">
            <!-- Guest Information -->
            <div>
                <strong>Guest Information</strong>
                <p><strong>Name:</strong> {{ $booking->name }}</p>
                <p><strong>Email:</strong> {{ $booking->email }}</p>
                <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                <p><strong>Address:</strong> {{ $booking->address }}</p>
            </div>
            <!-- Room Details -->
            <div>
                <strong>Booking Details</strong>
                <p><strong>Room:</strong> {{ $booking->room->name }} (ID: {{ $booking->room->id }})</p>
                <p><strong>Check-in Date:</strong> {{ $booking->check_in }}</p>
                <p><strong>Check-out Date:</strong> {{ $booking->check_out }}</p>
                <p><strong>Adults:</strong> {{ $booking->adults }} | <strong>Children:</strong> {{ $booking->children }}</p>
            </div>
        </div>

        <!-- Itemized Billing -->
        <table class="items">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Room Booking ({{ $booking->room->name }} - Room ID: {{ $booking->room->id }})</td>
                    <td>${{ $booking->room->price }}</td>
                </tr>
                <!-- Add other charges or services here if any -->
            </tbody>
            <tfoot>
                <tr>
                    <td class="total">Total:</td>
                    <td class="total">${{ $booking->room->price }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- Buttons -->
        <div class="btn-container">
            <button class="btn btn-print" onclick="handlePrint()">Print</button>
            <button class="btn" id="downloadBtn">Download as PDF</button>
            <a href="{{ route('booking.index', $hotel) }}" class="btn btn-print1">Back to Bookings</a>
        </div>
    </div>

    <script>
        function handlePrint() {
            document.querySelector('.btn-container').style.display = 'none';
            window.print();
            document.querySelector('.btn-container').style.display = 'block';
        }

        document.getElementById('downloadBtn').addEventListener('click', function () {
            const element = document.querySelector('.invoice-box');
            document.querySelector('.btn-container').style.display = 'none'; // Hide buttons before PDF download
            const opt = {
                margin: 0.5,
                filename: 'invoice_{{ $booking->id }}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(element).set(opt).save().then(() => {
                document.querySelector('.btn-container').style.display = 'block'; // Show buttons again after download
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</body>
</html>
