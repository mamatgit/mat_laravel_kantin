<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wikrama Canteen - Contact Us</title>
  <style>
    .bg-black {
  background-color: #202020; /* Green color code */
}
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-body" data-bs-theme="dark" style="height: 100px;">
        <div class="container-fluid">
          <a class="navbar-brand mb-0 h1" href="index" style="color: rgb(5, 198, 247); font-size: 2rem;">Wikrama Canteen</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" data-bs-auto-close="outside" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index" style="font-size: 20px;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="gallery" style="font-size: 20px;">Gallery</a>
              </li>
              {{-- <li class="nav-item dropdown">
                <a href="gallery" class="nav-link dropdown-toggle" style="font-size: 20px;" href="gallery" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Food
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="ayamgoreng">Ayam Goreng</a></li>
                  <li><a class="dropdown-item" href="nasigoreng">nasi Goreng</a></li>
                  <li><a class="dropdown-item" href="miegoreng">Mie Goreng</a></li>
                </ul>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link active" style="font-size: 20px;" aria-current="page" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" style="font-size: 20px;" aria-current="page" href="/contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

  <div class="container">
    <h1 class="my-4 text-center">Contact Us</h1>
    <p class="lead text-center">Feel free to reach out to us withany questions or comments.</p>
    <div class="row">
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-md-6">
        <p>You can also contact us by phone or mail:</p>
        <ul>
          <li><strong>Phone:</strong> (123) 456-7890</li>
          <li><strong>Email:</strong> <a href="mailto:info@wikramacanteen.com">info@wikramacanteen.com</a></li>
        </ul>
      </div>
    </div>
  </div>
  <footer class="bg-black py-5" style="position: fixed; bottom: 0; width: 100%; height:5%;">
    <div class="container text-center">
      <p class="text-white"><b>Copyright &copy; Wikrama Canteen 2024</b></p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLeSaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
