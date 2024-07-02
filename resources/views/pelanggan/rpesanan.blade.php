@extends('layout.template')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="container bg-primary-subtle p-4 rounded">
    <h3 class="mb-2 text-center">Riwayat Pesanan</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No. Pesanan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan as $pesanan)
                <tr>
                    <td>{{ $pesanan->id }}</td>
                    <td>{{ $pesanan->tgl_pemesanan }}</td>
                    <td>{{ $pesanan->alamat }}</td>
                    <td>{{ $pesanan->no_telp}}</td>
                    <td>{{ $pesanan->status_pemesanan }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
