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
                                        Tambah Pengguna <i class="fa fa-plus"></i>
                                    </button>

                                    <!--login form Modal -->
                                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Tambah Pengguna </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <label>Email </label>
                                                        <div class="form-group">
                                                            <input type="email" class="form-control">
                                                        </div>
                                                        <label>Role </label>
                                                        <div class="form-group">
                                                            <select class="form-select">
                                                                <option>Pegawai</option>
                                                                <option>Helpdesk</option>
                                                                <option>Penyedia</option>
                                                            </select>
                                                        </div>
                                                        <label>Password </label>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control">
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
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>afiananabilla@gmail.com</td>
                                                <td>12345</td>
                                                <td>Helpdesk</td>
                                                <td>
                                                    <span><i class="fa fa-edit" style="color: #ffe600;"></i></span>
                                                    <span><i class="fa fa-trash-alt" style="color: red;"></i></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>rahma@gmail.com</td>
                                                <td>12345</td>
                                                <td>Pegawai</td>
                                                <td>
                                                    <span><i class="fa fa-edit" style="color: #ffe600;"></i></span>
                                                    <span><i class="fa fa-trash-alt" style="color: red;"></i></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>3</td>
                                                <td>desy@gmail.com</td>
                                                <td>12345</td>
                                                <td>Penyedia</td>
                                                <td>
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