<x-pegawai-layout>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebarPegawai')
        </div>
        <div id="main" class='layout-navbar'>
            @include('layouts.headerPegawai')
            <div id="main-content">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">Judul</label>
                                    <input type="text" class="form-control" id="basicInput">
                                </div>

                                <div class="form-group">
                                    <label for="helpInputTop">Keterangan</label>
                                    <textarea type="text" class="form-control" id="helpInputTop"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="helperText">Bukti</label>
                                    <input type="file" id="helperText" class="form-control" placeholder="Name">
                                </div>

                                <button type="submit" class="btn btn-primary d-flex block justify-content-end" data-bs-toggle="modal" data-bs-target="#default">
                                    Kirim
                                </button>

                                <!--Basic Modal -->
                                <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Kode Tiket Anda : PP001</h5>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Keluar</span>
                                                </button>
                                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Detail</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                @include('layouts.footer')
            </div>
        </div>
    </div>
</x-pegawai-layout>