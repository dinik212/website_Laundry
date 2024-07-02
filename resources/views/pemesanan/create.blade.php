@extends('layout.template')

@section('title', 'Form Pemesanan Layanan')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <h1 class="mb-4">Form Pemesanan Layanan</h1>
    <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tgl_pemesanan" class="form-label">Tanggal Pemesanan</label>
            <input type="datetime-local" class="form-control" id="tgl_pemesanan" name="tgl_pemesanan" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ auth()->user()->no_telp }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Pesan Layanan</button>
    </form>
</div>
<script>
    // Fungsi untuk mendapatkan tanggal hari ini
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
        document.getElementById('tgl_pemesanan').value = currentDateTime;
    });
</script>
@endsection
