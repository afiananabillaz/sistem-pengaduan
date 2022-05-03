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
                <a href="{{ route('helpdesk.index') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Beranda</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="{{ route('pengaduan.index') }}" class='sidebar-link'>
                    <i class="bi bi-person-plus-fill"></i>
                    <span>Pengaduan</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="{{ route('pengaduan.laporan') }}" class='sidebar-link'>
                    <i class="bi bi-book-fill"></i>
                    <span>Laporan</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="{{ route('helpdesk.akumulasi') }}" class='sidebar-link'>
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Akumulasi</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="{{ route('helpdesk.pengguna') }}" class='sidebar-link'>
                    <i class="bi bi-person-fill"></i>
                    <span>Kelola Pengguna</span>
                </a>
            </li>

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>