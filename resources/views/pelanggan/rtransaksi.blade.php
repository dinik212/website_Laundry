@extends('layout.template')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="container bg-primary-subtle p-4 rounded">
    <h3 class="mb-2 text-center">Riwayat Transaksi</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No. Transaksi</th>
                    <th>Tanggal Ditimbang</th>
                    <th>Total Bayar</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->tgl_ditimbang }}</td>
                    <td>Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
                    <td>{{ $transaksi->status_pembayaran }}</td>
                    <td>
                        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
