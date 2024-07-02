@extends('layout.template')

@section('title', 'Contact')

@section('content')
<!-- Contact Section -->
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container bg-dark-subtle">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-0 bread">Contact us</h1>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info Section -->
<section class="ftco-section ftco-no-pb contact-section mb-4">
    <div class="container">
        <div class="row d-flex contact-info">
            <!-- Address -->
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-map-marker"></span>
                    </div>
                    <h3 class="mb-2">Address</h3>
                    <p> Jl. Kampus, Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat 25164</p>
                </div>
            </div>

            <!-- Contact Number -->
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-phone"></span>
                    </div>
                    <h3 class="mb-2">Contact Number</h3>
                    <p><a href="https://wa.me/6281374649623?text=Ingin%20Melaporkan%20Masalah">081374649623 Admin</a></p>
                </div>
            </div>

            <!-- Email Address -->
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-paper-plane"></span>
                    </div>
                    <h3 class="mb-2">Email Address</h3>
                    <p><a href="mailto:infinitytech.pbl@gmail.com">infinitytech.pbl@gmail.com</a></p>
                </div>
            </div>

            <!-- Website -->
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-globe"></span>
                    </div>
                    <h3 class="mb-2">Website</h3>
                    <p><a href="https://smartlaundry.my.id">smartlaundry.my.id</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Formulir Pengaduan Section -->
<section class="ftco-section contact-section ftco-no-pt mt-2">
    <div class="container my-2 py-3 shadow" style="width: 70%">
        <div class="row block-9">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="col-md-8">
                    <h2 class="h4">Formulir Pengaduan</h2>
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea name="pesan" id="pesan" cols="30" rows="5" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <a href=" " class="btn btn-primary">Kirim Pengaduan</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Google Maps Section -->
<div class="ftco-section contact-section ftco-no-pt mt-4">
    <h4 class="text-center">Peta Alamat Kantor kami</h4>
    <div class="container">
        <div class="row block-9">
            <div class="col-md-12 d-flex justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.310043240093!2d100.46357607621276!3d-0.914567899076576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b7be9e52a171%3A0x609ef1cc57a38e32!2sPoliteknik%20Negeri%20Padang!5e0!3m2!1sid!2sid!4v1717940372243!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection
