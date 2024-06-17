<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wikrama Canteen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3F7NcK9T9FGKcT2dF022mHlzDY/PnjwK1mTJzUwCt"
        crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles.css */
        .container {
            margin-top: 2rem;
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

        .bg-black {
            background-color: #202020;
        }

        .image-container {
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .image-container:hover {
            opacity: 0.9;
        }

        .description {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            transform: translateY(-50%) translateX(100%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            transition: transform 0.3s ease, opacity 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .info {
            margin-top: 1rem;
            text-align: right;
        }

        .info a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
        }

        .info img {
            margin-right: 0.5rem;
            border-radius: 50%;
        }

        .hero-image {
            position: relative;
            width: 100%;
            height: 800px;
            /* Adjust the height to make it longer */
            overflow: hidden;
            margin-bottom: 20px;
        }

        .hero-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Change to object-fit: contain to maintain aspect ratio */
        }

        /* Style for the search form to center it in the navbar */
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



    <main class="container mt-5">
        <section class="hero-section">
            <h1 class="text-center">Dashboard</h1>
            <div class="hero-image">
                <img src="{{ asset('img/gambarutama.jpg') }}" alt="Hero Image" class="img-fluid">
            </div>
            <div class="row">
                @foreach ($data as $row)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="position-relative">
                                <img src="{{ asset('fotodata/' . $row->foto) }}" alt="Foto {{ $row->nama }}"
                                    class="card-img-top image-container"
                                    data-card-body-id="card-body-{{ $row->id }}"
                                    data-description="{{ $row->deskripsi }}">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <!-- Icon keranjang -->
                                </div>
                            </div>
                            <div class="card-body" id="card-body-{{ $row->id }}" style="display: none;">
                                <h5 class="card-title">Nama: {{ $row->nama }}</h5>
                                <h6 class="card-title">Harga: {{ $row->harga }}</h6>
                                <h6 class="card-title">Jumlah: {{ $row->jumlah }}</h6>
                                <p class="card-text">Deskripsi: {{ $row->deskripsi }}</p>
                                <br>
                                <a href="{{ route('product.show', ['id' => $row->id]) }}"
                                    class="btn btn-primary">Beli</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </main>

    @foreach ($data as $row)
        <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel{{ $row->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $row->id }}">{{ $row->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Nama: {{ $row->nama }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="container">
        <div class="row">
            <!-- About -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mt-3">About Wikrama Canteen</h1>
                        <p class="card-text text-center">Wikrama Canteen is a digital solution that offers various
                            types of food and ensures hygiene in handling and cooking processes. This digital platform
                            will be used to enhance convenience for both canteen owners and students.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <img src="img/kantin.png" class="card-img-top" alt="Canteen Image">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Contact -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mt-3">Contact Us</h1>
                        <p class="card-text lead text-center">Feel free to reach out to us with any questions or
                            comments.</p>
                        <form>
                            <!-- Your form elements here -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">You can also contact us by phone or email:</p>
                        <ul>
                            <li><strong>Phone:</strong> (123) 456-7890</li>
                            <li><strong>Email:</strong> <a
                                    href="mailto:info@wikramacanteen.com">info@wikramacanteen.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; <a href="about">Canteen Wikrama 2024</a></p>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBud7RduPuemT//+jJXB16zg6i8UQD3lV5uDC3Yc7bz1Eeow" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3F7NcK9T9FGKcT2dF022mHlzDY/PnjwK1mTJzUwCt"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
            $(".cart-add").click(function(e) {
                e.preventDefault();
                var id = $(this).data("id");

                $.ajax({
                    url: '/add-to-cart/' + id,
                    type: 'GET',
                    success: function(response) {
                        // Lakukan sesuatu setelah berhasil menambahkan ke keranjang
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var images = document.querySelectorAll(".card-img-top");

            images.forEach(function(image) {
                image.addEventListener("mouseover", function() {
                    var cardBodyId = this.getAttribute("data-card-body-id");
                    var cardBody = document.getElementById(cardBodyId);
                    var descriptionElement = document.createElement("div");
                    descriptionElement.className = "description";
                    descriptionElement.innerHTML = cardBody.innerHTML;
                    this.parentNode.appendChild(descriptionElement);
                    descriptionElement.style.transform = "translateY(100%)";
                    descriptionElement.style.opacity = 0;
                    setTimeout(function() {
                        descriptionElement.style.transform = "translateY(0)";
                        descriptionElement.style.opacity = 1;
                    }, 10);
                });

                image.addEventListener("mouseout", function() {
                    var descriptionElement = this.parentNode.querySelector(".description");
                    if (descriptionElement) {
                        descriptionElement.style.transform = "translateY(100%)";
                        descriptionElement.style.opacity = 0;
                        setTimeout(function() {
                            descriptionElement.remove();
                        }, 300);
                    }
                });
            });
        });

        $(document).ready(function() {
            $(".cart-add").click(function(e) {
                e.preventDefault();
                var id = $(this).data("id");

                $.ajax({
                    url: '/add-to-cart/' + id,
                    type: 'GET',
                    success: function(response) {
                        // Lakukan sesuatu setelah berhasil menambahkan ke keranjang
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

</body>

</html>
