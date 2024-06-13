<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - Wikrama Canteen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-body-tertiary sticky-top" data-bs-theme="dark">
        <!-- Navbar content -->
    </header>

    <main class="container mt-5">
        <h1 class="text-center">Informasi Pengiriman</h1>
        <form action="{{ route('process_shipping_info') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label for="autocomplete" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="autocomplete" name="alamat" placeholder="Masukkan alamat lengkap" onFocus="initAutocomplete()" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukan Nomor Telepon" required>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </main>

    <footer class="bg-dark text-white py-3 mt-5">
        <div class="container">
            <p class="mb-0">&copy; <a href="about" class="text-white">Canteen Wikrama 2024</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        // Inisialisasi Autocomplete untuk input alamat
        function initAutocomplete() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
    </script>
    <!-- Load Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiLISf1bKMfrqtbAoyJMeIG4Jt6agABlA&libraries=places&callback=initAutocomplete" async defer></script>
</body>
</html>
