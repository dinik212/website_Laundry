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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pemesanans as $pemesanan)
                @if($pemesanan->status_pemesanan != 'sudah diproses')
                    <tr>
                        <td>{{ $pemesanan->id }}</td>
                        <td>{{ $pemesanan->user->name}}</td>
                        <td>{{ $pemesanan->tgl_pemesanan }}</td>
                        <td>{{ $pemesanan->alamat }}</td>
                        <td>{{ $pemesanan->status_pemesanan }}</td>
                        <td>
                            @if($pemesanan->status_pemesanan == 'belum diproses')
                                <form action="{{ route('pemesanan.confirm', $pemesanan->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                </form>
                            @elseif($pemesanan->status_pemesanan == 'pegawai menuju lokasi')
                                <a href="{{ route('transaksi.create', ['pemesanan_id' => $pemesanan->id]) }}" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin membuat transaksi? Data pesanan akan hilang setelah membuat transaksi')">Buat Transaksi</a>
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
