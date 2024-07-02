<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        td img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .no-bukti {
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>Laporan Transaksi Laundry</h1>
        <table>
            <tr><th>No. Resi</th><td>{{ $transaksi->id }}</td></tr>
            <tr><th>No. Order</th><td>{{ $transaksi->pemesanan->id }}</td></tr>
            <tr><th>Nama Pelanggan</th><td>{{ $transaksi->user->name }}</td></tr>
            <tr><th>Jenis Pakaian</th><td>{{ $transaksi->pakaian->jenis_pakaian }}</td></tr>
            <tr><th>Tanggal Ditimbang</th><td>{{ $transaksi->tgl_ditimbang }}</td></tr>
            <tr><th>Tanggal Di Terima Oleh Pelanggan</th><td>{{ $transaksi->tgl_diambil }}</td></tr>
            <tr><th>Berat</th><td>{{ $transaksi->total_berat }} kg</td></tr>
            <tr><th>Diskon</th><td>{{ $transaksi->diskon }}%</td></tr>
            <tr><th>Total Bayar</th><td>Rp {{ $transaksi->total_bayar }}</td></tr>
            <tr><th>Status Pembayaran</th><td>{{ $transaksi->status_pembayaran }}</td></tr>
            <tr>
                <th>Bukti pembayaran</th>
                <td>
                    @if($transaksi->bukti_pembayaran)
                        <img src="{{ asset('storage/' . $transaksi->bukti_pembayaran) }}" alt="Bukti Pembayaran">
                    @else
                        <span class="no-bukti">Tidak ada bukti pembayaran</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
