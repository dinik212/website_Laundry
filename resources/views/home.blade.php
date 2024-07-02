@extends('layout.template')

@section('title', 'Selamat Datang')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

{{--tampilan awal--}}
<div class="hero-wrap d-flex align-items-center justify-content-center" style="background-image: url('images/home/logo1.jpg'); background-size: cover; height: 100vh; box-shadow: 0 4px 8px rgba(20, 19, 19, 0.1); filter: brightness(85%);">
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center" style="height: 100%;">
            <div class="col-md-8 text-center text-md-left pb-5">
                <h1 class="mb-4 text-light">Layanan <span style="color: #ff5722;"><strong>LAUNDRY</strong>-Tech</span><br><strong>Dari Kami Untuk<span style="color: #3822ff;"> Anda,</span> Mencuci lebih Cerdas</strong></h1>
                <h5 class="caps text-light">Aplikasi berbasis website untuk layanan realtime timbangan</h5>
                <a href="/login" class="btn btn-primary">Daftarkan Dirimu!</a>
            </div>
        </div>
    </div>
</div>



<div class="hero-wrap d-flex align-items-center justify-content-center p-8" style="background-image: url('images/home/logo1.jpg'); background-size: cover; height: 80vh; filter: brightness(85%);">
    <div class="overlay"></div>
    <div class="container bg-info-subtle p-8 rounded">
        <div class="row justify-content-center pb-8">
            <div class="col-md-7 text-center heading-section heading-section-white">
                <h2 class="mb-4"><strong>Mengapa Mencari Layanan <br>laundry-tech.com?</strong></h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-3">
            <div class="col">
                <div class="card">
                    <img src="images/home/kerja1.png" class="card-img-top" alt="Layanan Realtime">
                    <div class="card-body text-center">
                        <h5 class="card-title">Layanan Realtime</h5>
                        <p class="card-text">Kami memberikan layanan laundry yang bekerja secara realtime, memastikan pakaian Anda segera diproses dan dikembalikan tepat waktu.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="images/home/kerja2.png" class="card-img-top" alt="Pelacakan Pesanan">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pelacakan Pesanan</h5>
                        <p class="card-text">Pantau status pesanan laundry Anda dari awal hingga akhir dengan mudah dan transparan.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="images/home/kerja3.png" class="card-img-top" alt="Preferensi Layanan">
                    <div class="card-body text-center">
                        <h5 class="card-title">Preferensi Layanan</h5>
                        <p class="card-text">Sesuaikan layanan laundry sesuai kebutuhan dan preferensi Anda, mulai dari jenis cucian hingga pengantaran.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="images/home/kerja4.png" class="card-img-top" alt="Layanan Pelanggan">
                    <div class="card-body text-center">
                        <h5 class="card-title">Layanan Pelanggan</h5>
                        <p class="card-text">Tim layanan pelanggan kami siap membantu Anda dengan segala pertanyaan dan kebutuhan Anda, memastikan pengalaman yang memuaskan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="container bg-primary-subtle p-4 rounded">
    <h3 class="mb-2 text-center">Pekerjaan Paling Top</h3>
    <div class="row p-2">
        @foreach ($lokers as $loker)
        <div class="col-lg-4"> <!-- Set column width to 4 for each card -->
            <div class="card mb-3">
                <img src="/images/{{ $loker['foto_sampul'] }}" class="card-img-top" alt="..." style="height: 400px;"> <!-- Set a fixed height for the card image -->
                <div class="card-body">
                    <h5 class="card-title">{{ $loker['nama_loker'] }}</h5>
                    <p class="card-text">Gaji yang ditawarkan : Rp.{{ $loker['gaji'] }} Rupiah</p>
                    <p class="card-text">Open Recruitment : {{ $loker['deskripsi'] }}</p>
                    <a href="/loker/{{ $loker['id'] }}" class="btn btn-success">Lihat</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center my-4">
        {{ $lokers->links('pagination::bootstrap-4', ['onEachSide' => 1]) }}
    </div> --}}


<footer class="bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
	<div class="container bg-dark text-light">
		<div class="row mb-5">
				<div class="col-md pt-5">
					<div class="ftco-footer-widget pt-md-5 mb-4">
						<h2 class="ftco-heading-2"><strong>About</strong></h2>
							<p style="text-align: justify;">
                                Laundry-tech adalah platform berbasis web yang bertujuan untuk memberikan layanan laundry
                                berkualitas tinggi kepada masyarakat. Kami menggunakan teknologi timbangan pintar untuk memastikan
                                transparansi dan akurasi dalam setiap proses pencucian. Dengan tagline "Dari Kita Untuk Anda, Mencuci dengan Cerdas",
                                kami berkomitmen untuk menyediakan layanan laundry yang efisien, cepat, dan andal.
                            </p>
					</div>
                </div>
		    <div class="col-md pt-5 border-left">
				<div class="ftco-footer-widget pt-md-5 mb-4">
						<h2 class="ftco-heading-2"><strong>Cabang Toko</strong></h2>
								<ul class="list-unstyled">
									<li><a class="py-2 d-block">Lundry-Tech Cantika</a></li>
									<li><a class="py-2 d-block">Lundry-Tech Pelangi</a></li>
									<li><a class="py-2 d-block">Lundry-Tech Cerdas</a></li>
								</ul>
                                <ul class="footer-social list-unstyled float-md-left float-lft height: 20vh mb-2">
									<li class="footer-social">
                                        <i class="bi bi-instagram">
                                        <a href="https://www.instagram.com/pbl.infinitytech.4/" target="_blank">instagram<span
									    class="fa fa-instagram"></span></a></i>
                                    </li>

									<li class="footer-social">
                                        <i class="bi bi-facebook">
                                        <a href="#"target="_blank">Facebook<span
                                        class="fa fa-facebook"></span></a></i>
                                    </li>

									<li class="footer-social">
                                        <i class="bi bi-twitter-x">
                                        <a href="#" target="_blank">Twitter<span
										class="fa fa-twitter"></span></a></i>
                                    </li>
								</ul>
				</div>
			</div>
            <div class="col-md pt-5 border-left">
                <div class="ftco-footer-widget pt-md-5 mb-4">
                    <h2 class="ftco-heading-2 bg-info"><strong>Have a Questions?</strong></h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.310043240093!2d100.46357607621276!3d-0.914567899076576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b7be9e52a171%3A0x609ef1cc57a38e32!2sPoliteknik%20Negeri%20Padang!5e0!3m2!1sid!2sid!4v1717940372243!5m2!1sid!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <li><span class="icon fa fa-map-marker"></span><span class="text">
                            Jl. Kampus, Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat 25164
                            </span></li>
                            <li><a href="https://wa.me/081374649623"><span class="icon fa fa-whatsapp"></span><span class="text">081374649623 Admin
                                                                            1</span></a></li>
                            <li><a href="http://smartlaundry.my.id"><span class="icon fa fa-paper-plane"></span><span
                                                                            class="text">smartlaundry.my.id</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
	    </div>
</footer>



@endsection
