@extends('layout.template')

@section('title', 'Homepage Pelanggan')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="hero-wrap d-flex align-items-center justify-content-center text-center" style="background-image: url('/images/home/user.jpg'); background-size: cover; height: 80vh; filter: brightness(80%);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center">
            <div class="col-md-12 text-md-left">
                <h1 class="mb-8">
                    <strong>
                        Selamat Datang @if(auth()->user()) {{ auth()->user()->name }} @else Pengunjung @endif
                    </strong>
                </h1>
                <h3>
                    Temukan pengalaman baru dengan layanan kami<span style="color: #3822ff;"></span></strong>
                </h3>
                <a href="{{ route('pemesanan.create') }}" class="btn btn-primary mt-3">Pesan Layanan</a>
            </div>
        </div>
    </div>
</div>

<div class="container bg-primary-subtle p-4 rounded">
    <h3 class="mb-2 text-center">Data Pemesanan Anda</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
        
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>Status Pemesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanans as $pemesanan)
                        @if($pemesanan->status_pemesanan != 'sudah diperiksa')
                            <tr>
                                <td>{{ $pemesanan->id }}</td>
                                <td>{{ $pemesanan->tgl_pemesanan }}</td>
                                <td>{{ $pemesanan->alamat }}</td>
                                <td>{{ $pemesanan->no_telp }}</td>
                                <td>{{ $pemesanan->status_pemesanan }}</td>
                                <td>
                                    @if($pemesanan->status_pemesanan == 'sudah diproses')
                                        <a href="{{ route('pelanggan.cekTransaksi', $pemesanan->id) }}" class="btn btn-success">Cek Transaksi</a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            
    </div>
</div>
@endsection
