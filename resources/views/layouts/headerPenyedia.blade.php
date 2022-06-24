<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div>
                <a href="index.html"><img src="{{ asset('img/bpj1.png') }}" style="width: 450px;"></a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar">
                        </div>
                        <div class="text">
                            @foreach ($penyedias as $penyedia )
                            @endforeach
                            <h6 class="user-dropdown-name">{{ $penyedia->nama }}</h6>
                            <p class="user-dropdown-status text-sm text-muted">Penyedia</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li>
                            @foreach ($penyedias as $penyedia )
                            @endforeach
                            <h6 class="dropdown-header">Hello, {{ $penyedia->nama }}</h6>
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Keluar</button>
                            </form>
                        </li>
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
                    <a href="{{ route('penyedia.index') }}" class='menu-link'>
                        <i class="fa fa-plus-circle"></i>
                        <span>Tambah Pengaduan</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('riwayat.index') }}" class='menu-link'>
                        <i class="fa fa-history"></i>
                        <span>Riwayat Pengaduan</span>
                    </a>
                </li>

                <li class="menu-item  ">
                    <a href="{{ route('penyedia.tracking') }}" class='menu-link'>
                        <i class="fa fa-eye"></i>
                        <span>Lacak</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

</header>