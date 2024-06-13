<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Canteen Wikrama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .info {
            margin-top: 1rem;
            text-align: right;
        }
        .info a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: black;
        }
        .info img {
            margin-right: 0.5rem;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Dashboard Admin</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Admin</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/read">Home (Read)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/cartadmin">Carts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/usersadmin">Users</a>
                  </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </div>
      </nav>
    <h1 class="text-center mb-4">Data Barang</h1>
    <div class="container">
        <div class="position-relative">
          </div>
          @auth
    @if(Auth::user()->isAdmin())
        <!-- Tampilkan elemen hanya jika pengguna adalah admin -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('read') }}">Admin Dashboard</a>
        </li>
    @endif
@endauth
        <a href="/tambahdata" type="button" class="btn btn-success">+Data</a>
        <form class="d-flex" role="search" action="/read" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Barang ID</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data) && $data->count() > 0)
                    @foreach($data as $index => $row)
                            <tr>
                                <th scope="row">{{ $index + $data->firstitem() }}</th>
                                <td>{{ $row->user_id }}</td>
                                <td>{{ $row->barang_id }}</td>
                                <td>{{ $row->Quantity }}</td>
                                <td>{{ $row->Totalharga }}</td>
                                <td>{{ $row->created_at->format('D,M,Y') }}</td>
                                <td>
                                    <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
                                </td>
                            </tr>
                            {{ $data->links() }}
            @endforeach
                        @else
                        <tr>
                            <td colspan="8">No data found</td>
                        </tr>
                        @endif
                </tbody>
            </table>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLeSaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(".delete").click(function(){
            var id = $(this).attr("data-id");
            var nama = $(this).attr("data-nama");

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger mr-2" // Add a margin-right of 2px to the cancel button
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Apa Kamu Yakin?",
                text: "Kamu akan menghapus data barang dengan nama " + nama + "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus Data!",
                cancelButtonText: "Tidak, Kembali!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete/" + id;
                    swalWithBootstrapButtons.fire({
                        title: "Hapus!",
                        text: "Data kamu sudah dihapus",
                        icon: "success"
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Kembali",
                        text: "Data kamu aman",
                        icon: "error"
                    });
                }
            });
        });
    </script>
</body>
</html>
