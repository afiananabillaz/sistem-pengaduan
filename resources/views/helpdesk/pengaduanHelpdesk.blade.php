<x-helpdesk-layout>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebarHelpdesk')
        </div>
        <div id="main" class='layout-navbar'>
            @include('layouts.headerHelpdesk')
            <div id="main-content">
                <div class="content-wrapper container">
                    <div class="page-heading">
                        <section class="section">
                            <div class="card">

                                <div class="card-body">
                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                        Tambah Pengaduan <i class="fa fa-plus"></i>
                                    </button>

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
                                                    <span class="badge bg-warning">Sedang Diproses</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info" data-bs-toggle="modal" data-bs-target="#inlineForm1" style="cursor:pointer">Disposisi</span>

                                                    <!--login form Modal -->
                                                    <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Disposisi</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="#">
                                                                    <div class="modal-body">
                                                                        <p>Disposisi Kepada</p>
                                                                        <fieldset class="form-group">
                                                                            <select class="form-select" id="basicSelect">
                                                                                <option>Nadia Asri</option>
                                                                                <option>Alit</option>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span><i class="fa fa-edit" style="color: #ffe600;"></i></span>
                                                    <span><i class="fa fa-trash-alt" style="color: red;"></i></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>02/03/2022</td>
                                                <td>12345</td>
                                                <td>Akun tidak bisa dibuka</td>
                                                <td>RS Awal Bros Pekanbaru</td>
                                                <td>
                                                    <span class="badge bg-success">Diterima</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info" data-bs-toggle="modal" data-bs-target="#inlineForm1" style="cursor:pointer">Disposisi</span>

                                                    <!--login form Modal -->
                                                    <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Disposisi</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="#">
                                                                    <div class="modal-body">
                                                                        <p>Disposisi Kepada</p>
                                                                        <fieldset class="form-group">
                                                                            <select class="form-select" id="basicSelect">
                                                                                <option>Nadia Asri</option>
                                                                                <option>Alit</option>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span><i class="fa fa-edit" style="color: #ffe600;"></i></span>
                                                    <span><i class="fa fa-trash-alt" style="color: red;"></i></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>3</td>
                                                <td>02/03/2022</td>
                                                <td>12345</td>
                                                <td>Akun tidak bisa dibuka</td>
                                                <td>RS Awal Bros Pekanbaru</td>
                                                <td>
                                                    <span class="badge bg-danger">Ditolak</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info" data-bs-toggle="modal" data-bs-target="#inlineForm1" style="cursor:pointer">Disposisi</span>

                                                    <!--login form Modal -->
                                                    <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Disposisi</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="#">
                                                                    <div class="modal-body">
                                                                        <p>Disposisi Kepada</p>
                                                                        <fieldset class="form-group">
                                                                            <select class="form-select" id="basicSelect">
                                                                                <option>Nadia Asri</option>
                                                                                <option>Alit</option>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span><i class="fa fa-edit" style="color: #ffe600;"></i></span>
                                                    <span><i class="fa fa-trash-alt" style="color: red;"></i></span>
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
</x-helpdesk-layout>