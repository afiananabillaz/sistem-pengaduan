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
                            <form action="{{ route('pegawai.simpan') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

                                        <div class="form-group">
                                            <label for="penyedia">Penyedia</label>
                                            <select name="penyedia_id" id="penyedia" class="form-select">
                                                <option value="">---Pilih Penyedia---</option>
                                                @foreach ($penyedias as $penyedia)
                                                <option value="{{ $penyedia->id }}">{{ $penyedia->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label for=" judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul">
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="bukti">Bukti</label>
                                        <input type="file" id="bukti" name="bukti" class="form-control" placeholder="Name">
                                    </div>

                                    <button type="submit" class="btn btn-primary d-flex block justify-content-end">
                                        Kirim
                                    </button>

                                </div>
                            </form>

                        </div>

                    </div>
                </div>

                @include('layouts.footer')
            </div>
        </div>
    </div>
</x-pegawai-layout>