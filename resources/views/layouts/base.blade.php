<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin-Panel - لوحة القيادة</title>
    <style>
        * {
            font-family: 'Nunito', sans-serif;
            color: white
        }
        
    </style>
</head>

<body>
    <Header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark text-white">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button data-mdb-collapse-init class="navbar-toggler" type="button"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15"
                            alt="MDB Logo" loading="lazy" />
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="text-white">Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="text-white">Team</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="text-white">Projects</span></a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a>

                    <!-- Notifications -->
                    {{-- <div class="dropdown">
                        {{-- <a
                        data-mdb-dropdown-init
                        class="text-reset me-3 dropdown-toggle hidden-arrow"
                        href="#"
                        id="navbarDropdownMenuLink"
                        role="button"
                        aria-expanded="false"
                    >
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a> --}}
                    {{-- <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <li>
                        <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul> 
                    </div> --}}
                    <!-- Avatar -->
                    <div class="dropdown">
                        <a class="dropdown-toggle d-inline-flex align-items-center hidden-arrow" href="#"
                            id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                height="40" alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">
                                    My profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/logout">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </Header>

    <main>

        <div class="row">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products') }}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span
                                    class="ms-1 d-none d-sm-inline">Product</span> </a>

                        </li>
                        <li>
                            <a href="{{ route('product-details') }}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Product
                                    Deatals</span></a>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-bootstrap"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Cards</span></a>

                        </li>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-grid"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Invoice</span> </a>

                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Customers</span> </a>
                        </li>
                    </ul>
                    <hr>
                    

                </div>

            </div>
            <div class="col-sm-8">
                @yield('content')
            </div>
        </div>
    </main>

    <footer>

    </footer>

</body>

</html>
