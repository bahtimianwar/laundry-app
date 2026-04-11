<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Laundry</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* CSS Custom buat efek Sidebar */
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }
        #wrapper {
            display: flex;
            transition: all 0.3s ease;
        }
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            background-color: #2c3e50;
            transition: all 0.3s ease;
        }
        #sidebar-wrapper .sidebar-heading {
            padding: 1.5rem 1.25rem;
            font-size: 1.2rem;
            color: #fff;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid #34495e;
        }
        #sidebar-wrapper .list-group-item {
            background-color: transparent;
            color: #bdc3c7;
            border: none;
            padding: 15px 20px;
            font-weight: 500;
        }
        #sidebar-wrapper .list-group-item:hover, 
        #sidebar-wrapper .list-group-item.active {
            color: #fff;
            background-color: #34495e;
            border-left: 4px solid #3498db;
        }
        #page-content-wrapper {
            width: 100%;
            transition: all 0.3s ease;
        }
        /* Mode ciut (toggled) */
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -250px;
        }
    </style>
</head>
<body>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">
                <i class="fas fa-tshirt me-2"></i> e-Laundry
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
                <a href="{{ route('pelanggan.index') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-users me-2"></i> Pelanggan
                </a>
                <a href="{{ route('layanan.index') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-list me-2"></i> Layanan
                </a>
                <a href="{{ route('transaksi.index') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-shopping-cart me-2"></i> Transaksi
                </a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 px-4 shadow-sm mb-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-bars fs-4 me-3 text-secondary" id="menu-toggle" style="cursor: pointer;"></i>
                    <h4 class="m-0 text-secondary">Manajemen Internal</h4>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-secondary fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-2"></i> {{ Auth::user()->name ?? 'Admin' }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid px-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>