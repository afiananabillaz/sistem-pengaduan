<x-penyedia-layout>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('layouts.headerPenyedia')
            <div class="content-wrapper container">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sampaikan laporan Anda langsung kepada <br> Biro Pengadaan Barang dan Jasa Sekretariat Provinsi Riau</h4>
                        </div>

                        <div class="card-body">
                            <form action="/riwayatPengaduanPenyedia" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

                                        <label for=" judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul">
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
                                    </div>

                                    <label for="penyedia_id">Penyedia/Instansi</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="penyedia_id" name="penyedia_id">
                                    </div>

                                    <div class="form-group">
                                        <label for="bukti">Bukti</label>
                                        <input type="file" id="bukti" name="bukti" class="form-control" placeholder="Name">
                                    </div>

                                    <button type="submit" class="btn btn-primary d-flex block justify-content-end" data-bs-toggle="modal" data-bs-target="#default">
                                        Kirim
                                    </button>

                                    <!--Basic Modal -->
                                    <!-- <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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
                                </div> -->
                            </form>
                        </div>

                    </div>

            </div>
        </div>
        </section>

        @include('layouts.footer')
    </div>
    </div>

</x-penyedia-layout>