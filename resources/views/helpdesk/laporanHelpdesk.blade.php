<x-helpdesk-layout>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebarHelpdesk')
        </div>
        <div id="main" class='layout-navbar'>
            @include('layouts.headerHelpdesk')
            <div id="basic-content ">
                <div class="content-wrapper container">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            --Pilih Cetak--
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Perbulan</a>
                                            <a class="dropdown-item" href="#">Pertahun</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="btn-group mt-3">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            --2020--
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">2021</a>
                                            <a class="dropdown-item" href="#">2022</a>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-success mt-3" data-bs-dismiss="modal">

                                    <span class="d-none d-sm-block">Cetak <i class="fa fa-print"></i></span>
                                </button>

                                <table class="table table-striped mt-2" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kode Tiket</th>
                                            <th>Judul</th>
                                            <th>Penyedia/Instansi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>02/03/2022</td>
                                            <td>12345</td>
                                            <td>Akun tidak bisa dibuka</td>
                                            <td>RS Awal Bros Pekanbaru</td>

                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>02/03/2022</td>
                                            <td>12345</td>
                                            <td>Akun tidak bisa dibuka</td>
                                            <td>RS Awal Bros Pekanbaru</td>

                                        </tr>

                                        <tr>
                                            <td>1</td>
                                            <td>02/03/2022</td>
                                            <td>12345</td>
                                            <td>Akun tidak bisa dibuka</td>
                                            <td>RS Awal Bros Pekanbaru</td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>
</x-helpdesk-layout>