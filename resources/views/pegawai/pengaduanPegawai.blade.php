<x-pegawai-layout>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebarPegawai')
        </div>
        <div id="main" class='layout-navbar'>
            @include('layouts.headerPegawai')
            <div id="main-content">
                <div class="content-wrapper container">
                    <div class="page-heading">
                        <section class="section">
                            <div class="card">

                                <div class="card-body">
                                    <h3>Pengaduan</h3>

                                    <!--login form Modal -->
                                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Tambah Pengaduan </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <label>Judul </label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <label>Keterangan</label>
                                                        <div class="form-group">
                                                            <textarea type="text" class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="helperText">Bukti</label>
                                                            <input type="file" id="helperText" class="form-control" placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Batal</span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Simpan</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Kode Tiket</th>
                                                <th>Judul</th>
                                                <th>Penyedia/Instansi</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>02/03/2022</td>
                                                <td>12345</td>
                                                <td>Akun tidak bisa dibuka</td>
                                                <td>RS Awal Bros Pekanbaru</td>
                                                <td>
                                                    <span class="badge bg-success">Diterima</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info" data-bs-toggle="modal" data-bs-target="#inlineForm1" style="cursor:pointer">Tanggapi</span>

                                                    <!--login form Modal -->
                                                    <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Tanggapi</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="#">
                                                                    <div class="modal-body">
                                                                        <label for="basicInput">Judul</label>
                                                                        <input type="text" class="form-control" id="basicInput">
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <label for="helpInputTop">Keterangan</label>
                                                                        <textarea type="text" class="form-control" id="helpInputTop"></textarea>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <label for="helperText">Dokumen</label>
                                                                        <input type="file" id="helperText" class="form-control" placeholder="Name">
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Ditolak</span>
                                                                        </button>
                                                                        <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Diterima</span>
                                                                        </button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>02/03/2022</td>
                                                <td>12345</td>
                                                <td>Akun tidak bisa dibuka</td>
                                                <td>RS Awal Bros Pekanbaru</td>
                                                <td>
                                                    <span class="badge bg-danger">Ditolak</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info" data-bs-toggle="modal" data-bs-target="#inlineForm1" style="cursor:pointer">Tanggapi</span>

                                                    <!--login form Modal -->
                                                    <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Tanggapi</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="#">
                                                                    <div class="modal-body">
                                                                        <label for="basicInput">Judul</label>
                                                                        <input type="text" class="form-control" id="basicInput">
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <label for="helpInputTop">Keterangan</label>
                                                                        <textarea type="text" class="form-control" id="helpInputTop"></textarea>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <label for="helperText">Dokumen</label>
                                                                        <input type="file" id="helperText" class="form-control" placeholder="Name">
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Ditolak</span>
                                                                        </button>
                                                                        <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Dierima</span>
                                                                        </button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </section>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>
</x-pegawai-layout>