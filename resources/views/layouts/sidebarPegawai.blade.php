            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <h4 href="index.html">E-TICKETING</h4>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-item  ">
                            <a href="{{ route('pegawai.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Beranda</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-plus-fill"></i>
                                <span>Pengaduan & Layanan</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('pegawai.show') }}">Pengaduan</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('pegawai.showLayanan') }}">Layanan</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-bar-chart-fill"></i>
                                <span>Layanan</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('pegawai.layanan') }}">Tambah Layanan</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('pegawai.riwayat') }}">Riwayat</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('pegawai.tracking') }}" class='sidebar-link'>
                                <i class="bi bi-eye-fill"></i>
                                <span>Lacak</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>