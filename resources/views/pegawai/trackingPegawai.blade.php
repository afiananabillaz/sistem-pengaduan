<x-trackingPegawai-layout>
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="basicInput">Masukkan Kode Tiket</label>
                                    <input type="text" class="form-control" id="basicInput">
                                </div>

                                <div class="form-actions d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Lacak</button>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label for="basicInput"><strong>Kode Tiket Anda: PP01</strong></label>

                                </div>

                            </div>

                        </div>
                        <table class="table table-striped w-50" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>03-03-2022 23:01:00</td>
                                    <td>Sedang Diproses</td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>04-03-2022 23:01:00</td>
                                    <td>Diterima <i class="bi bi-zoom-in"></i></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                @include('layouts.footer')
            </div>
        </div>
    </div>
</x-trackingPegawai-layout>