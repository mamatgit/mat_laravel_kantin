<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $product->nama }} - Wikrama Canteen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .container {
            margin-top: 2rem;
        }

        .bg-black {
            background-color: #202020;
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
    .container {
      margin-top: 2rem;
    }
    .product-image {
      max-width: 100%;
      height: auto;
    }
    .product-details {
      padding: 2rem;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .product-details h2 {
      color: #28a745;
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }
    footer {
      background-color: #343a40;
      color: #fff;
      padding: 1rem 0;
      text-align: center;
      margin-top: 2rem;
    }
    footer a {
      color: #fff;
      text-decoration: none;
    }
    .quantity-container {
      display: flex;
      align-items: center;
      font-family: Arial, sans-serif;
      font-size: 18px;
    }
    .quantity-input {
      display: flex;
      align-items: center;
    }
    .quantity-input input[type="number"] {
      margin: 0 5px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 60px;
      text-align: center;
    }
    .quantity-input button {
      cursor: pointer;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #f2f2f2;
      padding: 8px 12px;
    }
    .quantity-input button:hover {
      background-color: #e6e6e6;
    }
    .alert {
      position: fixed;
      top: 20px;
      right: 20px;
      display: none;
      padding: 15px;
      background-color: #28a745;
      color: white;
      border-radius: 5px;
      z-index: 1000;
    }
    .alert.show {
      display: block;
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
  </style>
</head>
<body>
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


  <main class="container">
    <h1 class="text-center">{{ $product->nama }}</h1>
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset('fotodata/' . $product->foto) }}" class="img-fluid product-image" alt="Foto {{ $product->nama }}">
      </div>
      <div class="col-md-6 product-details">
        <h2>Harga Produk: Rp.{{ $product->harga }}</h2>
        <p>Jumlah Produk: {{ $product->jumlah }}</p>
        <p>Deskripsi Produk: {{ $product->deskripsi }}</p>
        <p class="quantity-container">
          Kuantitas
          <div class="quantity-input">
            <button class="minus">-</button>
            <input type="number" value="1" class="form-control quantity cart_update" min="1" />
            <button class="plus">+</button>
          </div>
        </p>
        <div class="d-grid gap-2 mt-4">
            <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" class="quantity" value="1">
                <button type="submit" class="btn btn-success" id="add-to-cart-button">+keranjang</button>
            </form>
          <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" class="quantity" value="1">
            <button type="submit" class="btn btn-primary" id="add-to-cart-button">Beli</button>
        </form>

        </div>
      </div>
    </div>
  </main>
  <div class="alert" id="alert">Pesanan anda telah ditambahkan ke keranjang</div>


  <footer>
    <div class="container">
      <p>&copy; <a href="about">Canteen Wikrama 2024</a></p>
    </div>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7RduPuemT//+jJXB16zg6i8UQD3lV5uDC3Yc7bz1Eeow" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3F7NcK9T9FGKcT2dF022mHlzDY/PnjwK1mTJzUwCt" crossorigin="anonymous"></script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    const addToCartButton = document.getElementById('add-to-cart-button');
    const alertBox = document.getElementById('alert');

    addToCartButton.addEventListener('click', function() {
        const form = document.getElementById('add-to-cart-form');
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => {
            if (response.ok) {
                alertBox.classList.add('show');
                setTimeout(() => {
                    alertBox.classList.remove('show');
                }, 3000);
            }
        })
        .catch(error => console.error('Error:', error));
    });

    document.querySelectorAll('.quantity-input').forEach(function(quantityInput) {
        const input = quantityInput.querySelector('input');
        const plusBtn = quantityInput.querySelector('.plus');
        const minusBtn = quantityInput.querySelector('.minus');

        plusBtn.addEventListener('click', function() {
            input.stepUp();
            updateHiddenQuantities(input.value);
        });

        minusBtn.addEventListener('click', function() {
            input.stepDown();
            updateHiddenQuantities(input.value);
        });

        input.addEventListener('change', function() {
            if (input.value < 1) {
                input.value = 1;
            }
            updateHiddenQuantities(input.value);
        });
    });

    function updateHiddenQuantities(value) {
        const hiddenQuantities = document.querySelectorAll('input[name="quantity"]');
        hiddenQuantities.forEach(function(hiddenQuantity) {
            hiddenQuantity.value = value;
        });
    }
});
</script>
</body>
</html>