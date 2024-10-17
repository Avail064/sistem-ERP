<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Keuangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-header {
            text-align: center;
        }
        .invoice-details {
            margin-top: 20px;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h1>Invoice Transaksi Keuangan</h1>
        <p>ID Transaksi: {{ $finance->id }}</p>
        <p>Tanggal: {{ \Carbon\Carbon::parse($finance->transaction_date)->format('d-m-Y') }}</p>
    </div>

    <div class="invoice-details">
        <p>Deskripsi: {{ $finance->description }}</p>
        <p>Jumlah: Rp. {{ number_format($finance->amount, 2) }}</p>
        <p>Kategori: {{ $finance->category }}</p>
    </div>

    <div class="total">
        Total: Rp. {{ number_format($finance->amount, 2) }}
    </div>
</body>
</html>
