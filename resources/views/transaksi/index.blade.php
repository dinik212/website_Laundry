@extends('layout.template')

@section('title', 'Daftar Transaksi')

@section('content')
    <div class="container">
        <h1>Daftar Transaksi</h1>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3 btn-sm">Tambah Transaksi</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>User</th>
                    <th>Pakaian</th>
                    <th>No.Order</th>
                    <th>Total Berat</th>
                    <th>Diskon</th>
                    <th>Tanggal Ditimbang</th>
                    <th>Tanggal Diambil</th>
                    <th>Total Bayar</th>
                    <th>Status Pembayaran</th>
                    <th>Bukti Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->user->name }}</td>
                        <td>{{ $transaksi->pakaian->jenis_pakaian }}</td>
                        <td>{{ $transaksi->pemesanan->id }}</td>
                        <td>{{ $transaksi->total_berat }} Kg</td>
                        <td>Rp{{ number_format($transaksi->diskon, 0, ',', '.') }}</td>
                        <td>{{ $transaksi->tgl_ditimbang }}</td>
                        <td>{{ $transaksi->tgl_diambil }}</td>
                        <td>Rp{{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($transaksi->status_pembayaran) }}</td>
                        <td>
                            @if ($transaksi->bukti_pembayaran)
                                <a href="{{ asset('storage/' . $transaksi->bukti_pembayaran) }}" target="_blank">Lihat Bukti</a>
                            @else
                                Tidak Ada
                            @endif
                        </td>
                        <td>
                            @if ($transaksi->status_pembayaran == 'lunas' && is_null($transaksi->tgl_diambil))
                                <form action="{{ route('transaksi.confirm', $transaksi->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                                </form>
                            @elseif (!is_null($transaksi->tgl_diambil))
                                <a href="{{ route('transaksi.print', $transaksi->id) }}" class="btn btn-primary btn-sm">Print</a>
                            @endif
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
