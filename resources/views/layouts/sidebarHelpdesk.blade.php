<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="index.html"><img src="{{ asset('img/bpj.png') }}" style="width: 100%; height:100%"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-item @if($menu == 'dashboard') active @endif">
                    <a href="{{ route('helpdesk.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                <li class="sidebar-item @if($menu == 'pengaduan') active @endif has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-plus-fill"></i>
                        <span>Pengaduan & Layanan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('pengaduan.index') }}">Pengaduan</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('layanan.index') }}">Layanan</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if($menu == 'laporan') active @endif has-sub has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-book-fill"></i>
                        <span>Laporan</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('pengaduan.laporan') }}">Pengaduan</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('layanan.laporan') }}">Layanan</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if($menu == 'pengguna') active @endif">
                    <a href="{{ route('helpdesk.pengguna') }}" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Kelola Pengguna</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>