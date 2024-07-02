<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkNest - @yield('title', 'Print Data')</title>
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>Print Pekerja</title>
    <style>
        body {
            font-family: 'Times New Roman';
            margin: 20px;
        }
        h1, h2, p {
            text-align: center;
        }
        h1 b {
            font-size: 24px;
        }
        h2 {
            font-size: 20px;
        }
        p {
            font-size: 18px;
        }
        h4 {
            font-size: 16px;
            margin-top: 5px;
        }
        hr {
            border: 1px solid hsl(0, 50%, 4%);
            margin: 10px 0;
        }
        .data-label {
            font-weight: bold;
            margin-right: 5px;
        }
        .container {
            width: 70%;
        }
        .content-container {
            margin-top: 20px;
            text-align: justify;
        }
        .content-container h3 {
            text-align: left;
        }
        .img-container {
            text-align: left;
            margin-top: 20px;
        }
        .footer-container {
            margin-top: 20px;
        }
        .footer-container p {
            margin: 0; /* Menghapus margin bawaan dari elemen p */
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="/images/home/LOGO.jpg" alt="Worknest Logo" width="30" height="30" class="d-inline-block align-top" style="margin-right: 10px;">
                <span style="color: #ff5722;"><strong>WORKNEST</strong></span>
            </a>
        </nav>

        <div class="content-container">
            <h1>
                <b>Data Pekerja Yang Mendaftar</b>
            </h1>
            <h2>Di {{ $pekerja->category->nama_kategori }}</h2>
            <p>Website WordNest - Dini</p>
            <hr>
        </div>

        <div class="img-container">
            <img src="/images/{{ $pekerja['foto_sampul'] }}" class="img-fluid rounded-start" alt="Foto Pekerja" width="90" height="120">
        </div>

        <div>
            <h4><span class="data-label">Nama Pekerja</span>: {{ $pekerja->nama }}</h4>
            <h4><span class="data-label">Bekerja sebagai</span>: {{ $pekerja->loker->nama_loker }}</h4>
            <h4><span class="data-label">Di perusahaan</span>: {{ $pekerja->category->nama_kategori }}</h4>
        </div>

        <div class="content-container">
            <h3>Dengan data di atas, saya mendaftarkan diri bekerja di {{ $pekerja->category->nama_kategori }} sebagai {{ $pekerja->loker->nama_loker }}, saya siap bekerja
            </h3>
        </div>

        <div class="footer-container">
            <p class="ttd">Padang, Januari 2024</p>
            <br>
            <br>
            <br>
            <p class="nama">{{ $pekerja->nama }}</p>
        </div>
    </div>
</body>
</html>
