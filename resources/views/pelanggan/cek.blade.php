<!-- resources/views/pakaian/cek.blade.php -->
@extends('layout.template')

@section('title', 'Cek Harga Pakaian')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cek Harga Pakaian</div>
                <div class="card-body">
                    <form method="GET" action="{{ route('search.pakaian') }}">

                        <div class="mb-3">
                            <label for="nama_pakaian" class="form-label">Nama Pakaian:</label>
                            <input type="text" class="form-control" id="nama_pakaian" name="nama_pakaian" placeholder="Masukkan nama pakaian">
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                    @if(isset($pakaian) && $pakaian->isNotEmpty())
                        <div class="mt-3">
                            <h5>Hasil Pencarian:</h5>
                            <ul class="list-group">
                                @foreach($pakaian as $item)
                                    <li class="list-group-item">
                                        <strong>{{ $item->jenis_pakaian }}</strong> - Rp {{ number_format($item->harga, 0, ',', '.') }} /Kg
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif(isset($pakaian))
                        <div class="mt-3">
                            <p>Tidak ada hasil untuk pencarian "{{ request('nama_pakaian') }}".</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
