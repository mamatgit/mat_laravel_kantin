<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Belanja - Wikrama Canteen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Apply sticky footer styles */
        html, body {
            height: 100%;
            margin: 0;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            margin-top: 2rem;
            flex: 1;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: rgb(5, 198, 247);
            font-size: 1.75rem;
        }

        .nav-link {
            color: #C0BDBD;
            font-size: 1rem;
            padding: 0.5rem 1rem;
        }

        .nav-link:hover {
            color: #f5f3f3;
        }

        .cart-item {
            padding: 1rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }

        .cart-item img {
            max-width: 100px;
            height: auto;
        }

        .btn-primary, .btn-danger {
            margin-top: 1rem;
        }

        .navbar .navbar-collapse {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .navbar .navbar-nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .navbar .search-form {
            margin: 0 auto;
            width: 50%;
        }

        /* Align items to the right in the navbar */
        .navbar .navbar-nav-right {
            display: flex;
            align-items: center;
        }

        /* Style adjustments for smaller screens */
        @media (max-width: 768px) {
            .navbar .search-form {
                width: 100%;
                order: 2;
            }

            .navbar .navbar-nav {
                flex-direction: column;
                align-items: center;
                order: 3;
            }

            .navbar .navbar-nav-right {
                order: 1;
            }
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
            margin-top: auto;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <header class="navbar navbar-expand-lg navbar-light bg-body-tertiary sticky-top" data-bs-theme="dark">
            <div class="container-fluid py-3">
                <a class="navbar-brand mb-0 h1" href="index" style="color: rgb(5, 198, 247); font-size: 2rem;">Wikrama Canteen</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <form class="d-flex search-form" role="search" action="/index" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav mb-2 mb-lg-0 navbar-nav-scroll navbar-nav-right">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user"></i>
                                <span class="ms-2">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fa-regular fa-id-card"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-box-archive"></i> Orders</a></li>
                                <li><a class="dropdown-item" href="{{ route('cart.index') }}"><i class="fa-solid fa-cart-shopping"></i> Keranjang</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Login
                                <i class="fa-solid fa-circle-question"></i>
                            </a>
                        </li>
                        @endauth

                        <li class="nav-item">
                            <a class="nav-link active" href="index" style="font-size: 20px;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="gallery" style="font-size: 20px;">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="font-size: 20px;" aria-current="page" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="font-size: 20px;" aria-current="page" href="/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


        <main class="container">
            <h1 class="text-center">Keranjang Belanja</h1>

            @if($carts->isEmpty())
            <p class="text-center">Keranjang belanja Anda kosong.</p>
            <p class="text-center"><a href="index">Ayo Belanja Dulu YUK!!!</a><i class="fa-solid fa-cart-shopping"></i></p>
            @else
            <table class="table">
                {{-- <thead>
                    <tr>
                        <th scope="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="selectAllCheckbox">Select All
                            </div>
                        </th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead> --}}

                <tbody>
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><input type="checkbox" id="select-all"></th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Kuantitas</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                        </tbody>

                                @foreach($carts as $cart)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selected_items[]" value="{{ $cart->id }}" class="select-item">
                                    </td>
                                    <td><img src="{{ asset('fotodata/' . $cart->barang->foto) }}" style="width: 50px;height:auto;" alt="Foto {{ $cart->barang->nama }}"></td>
                                    <td>{{ $cart->barang->nama }}</td>
                                    <td>Rp. {{ number_format($cart->barang->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('cart.update', $cart) }}" method="post">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" class="form-control" style="width: 80px;">
                                            <button class="btn btn-primary">Update</button>
                                        </form>
                                    </td>
                                    <td>Rp. {{ number_format($cart->totalharga, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('cart.destroy', $cart) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <button type="submit" class="btn btn-success">Checkout Selected Items</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>

                </tbody>
            </table>
            @endif
        </main>

        <footer>
            <div class="container">
                <p>&copy; <a href="about">Canteen Wikrama 2024</a></p>
            </div>
        </footer>
    </div>

    <script>
        document.getElementById('select-all').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('.select-item');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    </script>

    {{-- <script>
        document.getElementById('selectAllCheckbox').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('.form-check-input');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qU4dggEc01jrzkAP8/cLjs+bgUhbttCl3YH48LgRyF6x5Iw1jLoCEJ/IXcTZAK2h" crossorigin="anonymous"></script>
</body>
</html>
