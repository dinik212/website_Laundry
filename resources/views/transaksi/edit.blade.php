@extends('layout.template')

@section('title', 'Edit Transaksi')

@section('content')
    <div class="container">
        <h1>Edit Transaksi</h1>
        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="user_id" class="form-label">Nama User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Pilih User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $transaksi->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="pemesanan_id" class="form-label">ID Pemesanan</label>
                <input type="number" name="pemesanan_id" id="pemesanan_id" class="form-control" value="{{ $transaksi->pemesanan_id }}" required>
            </div>
            <div class="mb-3">
                <label for="pakaian_id" class="form-label">ID Pakaian</label>
                <select name="pakaian_id" id="pakaian_id" class="form-control" required>
                    <option value="">Pilih Pakaian</option>
                    @foreach($pakaians as $pakaian)
                        <option value="{{ $pakaian->id }}" {{ $pakaian->id == $transaksi->pakaian_id ? 'selected' : '' }}>{{ $pakaian->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tgl_ditimbang" class="form-label">Tanggal Ditimbang</label>
                <input type="date" name="tgl_ditimbang" id="tgl_ditimbang" class="form-control" value="{{ $transaksi->tgl_ditimbang }}" required>
            </div>
            <div class="mb-3">
                <label for="tgl_diambil" class="form-label">Tanggal Diambil</label>
                <input type="date" name="tgl_diambil" id="tgl_diambil" class="form-control" value="{{ $transaksi->tgl_diambil }}">
            </div>
            <div class="mb-3">
                <label for="total_bayar" class="form-label">Total Bayar</label>
                <input type="number" step="0.01" name="total_bayar" id="total_bayar" class="form-control" value="{{ $transaksi->total_bayar }}" required>
            </div>
            <div class="mb-3">
                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                <input type="text" name="status_pembayaran" id="status_pembayaran" class="form-control" value="{{ $transaksi->status_pembayaran }}" required>
            </div>
            <div class="mb-3">
                <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
                @if($transaksi->bukti_pembayaran)
                    <img src="{{ Storage::url($transaksi->bukti_pembayaran) }}" width="100" alt="Bukti Pembayaran">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
