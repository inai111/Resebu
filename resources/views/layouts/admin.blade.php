<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RESEBU</title>
    <link rel="shortcut icon" type="image/jpg" href="{{ URL::asset('/assets/img/hat.png') }}" />


    <link href="{{ URL::asset('https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css') }}"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"
        rel="stylesheet" />
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/trix.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js') }}"
        crossorigin="anonymous"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>
</head>


<body class="sb-nav-fixed">
    <nav class="sb-topnav border-bottom navbar navbar-expand navbar-light bg-light">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/">!Resebu!<img src="assets/img/hat.png" class="img-fluid pb-3"
                style="width: 30px" alt=""></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form id="formIni" method="post"
            class="d-none d-md-inline-block form-inline ms-auto w-50 me-0 me-md-3 my-2 my-md-0">
            @csrf
            <div class="input-group">
                <input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="Cari">
                <button class="btn btn-secondary" id="cari" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item text-light">
                <a href="{{ route('resep.create') }}" class="nav-link border-end">Upload Video</a>
            </li>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('resep.create') }}">Tambah Resep</a></li>
                        <li><a class="dropdown-item" href="/profil">Profil</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                    </ul>
                </li>
            </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    @include('partials.dashboard')
                </div>
                <div class="sb-sidenav-footer bg-secondary">
                    <div class="small text-dark">Hallo Chef,</div>
                    <small class="text-dark">{{ auth()->user()->nama }} <img
                            src="{{ URL::asset('assets/img/hat.png') }}" class="img-fluid pb-3" style="width: 20px"
                            alt=""></small>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('container')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ URL::asset('https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="{{ URL::asset('js/scripts.js') }}"></script>
    <script src="{{ URL::asset('js/trix.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>
