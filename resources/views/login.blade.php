<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WorkNest - @yield('title', 'Login')</title>
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #67aef4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80vh;
            margin: 0;
        }

        .container {
            background-color: #b1c4dd;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 30s0%; /* Adjust the width if needed */
        }

        h2 {
            color: #343a40;
        }

        form {
            margin-top: 20px;
        }

        .form-label {
            color: #495057;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container col-lg-4">
        <h2 class="text-center"><span style="color: #ff5722;"><strong>Laundry-Tech</strong> </span></h2>

        @error('email')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill"> {{ $message }} </i>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 input-group">
                <label for="email" class="form-label visually-hidden">Email</label>
                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                <input type="email" name="email" id="email" class="form-control" required autofocus>
            </div>

            <div class="mb-3 input-group">
                <label for="password" class="form-label visually-hidden">Password</label>
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
            <a href="/" class="btn"><i class="bi bi-back"></i> Kembali</a>
        </form>
    </div>

    <script src="/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
