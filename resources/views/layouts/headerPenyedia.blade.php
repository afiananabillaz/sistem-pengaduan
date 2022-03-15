<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <h4 href="index.html">E-TICKETING</h4>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">Anita</h6>
                            <p class="user-dropdown-status text-sm text-muted">Penyedia</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <!-- <li><a class="dropdown-item" href="#">My Account</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li> -->
                        <li><a class="dropdown-item" href="auth-login.html">Logout</a></li>
                    </ul>
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>

                <li class="menu-item">
                    <a href="/dashboardPenyedia" class='menu-link'>
                        <i class="fa fa-plus-circle"></i>
                        <span>Tambah Pengaduan</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="/riwayatPengaduanPenyedia" class='menu-link'>
                        <i class="fa fa-history"></i>
                        <span>Riwayat Pengaduan</span>
                    </a>
                </li>

                <li class="menu-item  ">
                    <a href="/trackingPenyedia" class='menu-link'>
                        <i class="fa fa-location-arrow"></i>
                        <span>Tracking</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

</header>