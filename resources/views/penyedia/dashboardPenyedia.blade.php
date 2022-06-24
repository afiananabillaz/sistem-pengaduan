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
                            <form action="{{ route('penyedia.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="tanggal" value="{{ date('d') }}">
                                        <input type="hidden" name="bulan" value="{{ date('m') }}">
                                        <input type="hidden" name="tahun" value="{{ date('Y') }}">

                                        <label for=" judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="bukti">Bukti</label>
                                        <input type="file" id="bukti" name="bukti" class="form-control" placeholder="Name" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary d-flex block justify-content-end">
                                        Kirim
                                    </button>
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