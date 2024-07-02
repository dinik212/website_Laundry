@extends('layout.template')

@section('title', 'Hasil Transaksi Pegawai')

@section('content')
    <div class="container">
        <h1>Hasil Transaksi {{ auth()->user()->name }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Pakaian</th>
                    <th>Pemesanan</th>
                    <th>Total Berat</th>
                    <th>Diskon</th>
                    <th>Tanggal Ditimbang</th>
                    <th>Total Bayar</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi) <!-- Perbaikan di sini -->
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->user->name }}</td>
                    <td>{{ $transaksi->pakaian->jenis_pakaian }}</td>
                    <td>{{ $transaksi->pemesanan->id }}</td>
                    <td>{{ $transaksi->total_berat }}</td>
                    <td>{{ $transaksi->diskon }}</td>
                    <td>{{ $transaksi->tgl_ditimbang }}</td>
                    <td>{{ $transaksi->total_bayar }}</td>
                    <td>{{ $transaksi->status_pembayaran }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
