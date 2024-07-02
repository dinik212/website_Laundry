@extends('layout.template')
<meta http-equiv="refresh" content="7">
@section('title', 'Homepage')

@section('content')
<div class="container">
    <h2>Buat Transaksi Baru</h2>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_name">Nama Pengguna</label>
            <input type="text" class="form-control" id="user_name" value="{{ $user ? $user->name : '' }}" readonly>
            <input type="hidden" name="user_id" value="{{ $user ? $user->id : '' }}">
        </div>
        <div class="form-group">
            <label for="pakaian">Pakaian</label>
            <select class="form-control" id="pakaian" name="pakaian_id">
                @foreach($pakaian as $item)
                    <option value="{{ $item->id }}">{{ $item->jenis_pakaian}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pemesanan">ID Pemesanan</label>
            <input type="text" class="form-control" id="pemesanan" name="pemesanan_id" value="{{ $pemesanan ? $pemesanan->id : '' }}" readonly>
        </div>
        <div class="form-group">
            <label for="tgl_ditimbang">Tanggal Ditimbang</label>
            <input type="datetime-local" class="form-control" id="tgl_ditimbang" name="tgl_ditimbang" required>
        </div>

        <div class="form-group">
            <label for="total_berat">Total Berat (kg)</label>
            <input type="number" class="form-control" id="total_berat" name="total_berat" value="{{ $weight_data ? $weight_data->weight : '' }}" readonly>
        </div>

        <div class="form-group">
            <label for="diskon">Diskon (Rp)</label>
            <input type="number" class="form-control" id="diskon" name="diskon" value="0" required>
        </div>
        <div class="form-group">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select class="form-control" id="status_pembayaran" name="status_pembayaran" required>
                <option value="belum_lunas">Belum Bayar</option>
                <option value="lunas">Sudah Bayar</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>
</div>

<script>
    // Fungsi untuk mendapatkan tanggal dan waktu saat ini dalam format yang sesuai dengan input datetime-local
    function getCurrentDateTime() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
        return currentDateTime;
    }

    // Set nilai default tanggal dan waktu saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        const currentDateTime = getCurrentDateTime();
        document.getElementById('tgl_ditimbang').value = currentDateTime;
    });
</script>
@endsection
