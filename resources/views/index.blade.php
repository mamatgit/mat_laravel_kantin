<!-- index.html -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wikrama Canteen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css"> <!-- external stylesheet -->
  <style>
    /* styles.css */
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
      display: none;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary sticky-top" data-bs-theme="dark">
    <div class="container-fluid py-3">
      <a class="navbar-brand mb-0 h1" href="index" style="color: rgb(5, 198, 247); font-size: 2rem;">Wikrama Canteen</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" data-bs-auto-close="outside" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar-nav-scroll">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index" style="font-size: 20px;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="gallery" style="font-size: 20px;">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="font-size: 20px;"aria-current="page" href="/about">About</a>
</li>
          <li class="nav-item">
            <a class="nav-link active" style="font-size: 20px;" aria-current="page" href="/contact">Contact</a>
          </li>
        </ul>
        <form class="d-flex" role="search" action="/index" method="GET">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <main class="container mt-5">
    <h1 class="text-center">Dashboard</h1>
    <div class="row">
      @foreach ($data as $row)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img src="{{asset('fotodata/'.$row->foto)}}" alt="Foto {{ $row->nama }}" class="card-img-top image-container" data-card-body-id="card-body-{{ $row->id }}">
            <div class="card-body" id="card-body-{{ $row->id }}" style="display: none;">
              <h5 class="card-title">Nama: {{ $row->nama }}</h5>
              <h6 class="card-title">Harga:{{ $row->harga }}</h6>
              <h6 class="card-title">Jumlah:{{ $row->jumlah }}</h6>
              <p class="card-text">Deskripsi:{{ $row->deskripsi }}</p>
              <a href="{{ $row->url }}" class="btn btn-primary">Beli</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </main>

  @foreach ($data as $row)
    <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel{{$row->id}}">{{ $row->nama }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
<p>Nama: {{ $row->nama }}</p>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  <footer class="bg-black py-5">
    <div class="container text-center">
      <p class="text-white"><b>Copyright &copy; <a href="about">Canteen Wikrama 2024</a></b></p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7RduPuemT//+jJXB16zg6i8UQD3lV5uDC3Yc7bz1Eeow" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3F7NcK9T9FGKcT2dF022mHlzDY/PnjwK1mTJzUwCt" crossorigin="anonymous"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
      var images = document.querySelectorAll(".card-img-top");

      images.forEach(function (image) {
        image.addEventListener("click", function () {
          var cardBodyId = this.getAttribute("data-card-body-id");
          var cardBody = document.getElementById(cardBodyId);
          cardBody.style.display = cardBody.style.display === "block" ? "none" : "block";
        });
      });
    });
  </script>
</body>
</html>
