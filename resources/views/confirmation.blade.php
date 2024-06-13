<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Pesanan - Wikrama Canteen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            margin-top: 3rem;
            flex: 1;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
        footer a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-body-tertiary sticky-top">
        <div class="container-fluid py-3">
            <a class="navbar-brand mb-0 h1" href="{{ route('index') }}" style="color: rgb(5, 198, 247); font-size: 2rem;">Wikrama Canteen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('index') }}" style="font-size: 20px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('gallery') }}" style="font-size: 20px;">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="font-size: 20px;" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="font-size: 20px;" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main class="container">
        <h1 class="text-center">Konfirmasi Pesanan</h1>
        <p class="text-center">Pesanan Anda telah berhasil diproses. Terima kasih telah berbelanja dengan kami!</p>
        <div class="text-center">
            <a href="{{ route('index') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <a href="{{ route('about') }}">Canteen Wikrama 2024</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
