@extends('layout.template')

@section('title', 'Homepage')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="hero-wrap d-flex align-items-center justify-content-center text-center" style="background-image: url('/images/home/user.jpg'); background-size: cover; height: 50vh; filter: brightness(80%);">
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
                    Mari kita bantu<span style="color: #3822ff;"> warga</span></strong>
                </h3>
            </div>
        </div>
    </div>
</div>

<div class="container bg-primary-subtle p-4 rounded">
    <h3 class="mb-2 text-center">Data Pesanan Terbaru</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.Order</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Alamat</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanans as $pesanan)
                @if($pesanan->status_pemesanan != 'sudah diperiksa')
                <tr>
                    <td>{{ $pesanan->id }}</td>
                    <td>{{ $pesanan->user->name }}</td>
                    <td>{{ $pesanan->tgl_pemesanan }}</td>
                    <td>{{ $pesanan->alamat }}</td>
                    <td>{{ $pesanan->status_pemesanan }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
