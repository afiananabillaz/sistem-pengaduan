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
                        <form action="{{ route('pegawai.kode') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="basicInput">Masukkan Kode Tiket</label>
                                        <input type="text" name="kode" class="form-control" id="basicInput" autofocus>
                                    </div>

                                    <div class="form-actions d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Lacak</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if ($tiket_layanans == null)

                        @else

                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <h5>Kode Tiket Anda: {{ $tiket_layanans[0]->kode }}</h5>
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
                                @forelse ($tiket_layanans as $tl)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date_format($tl->updated_at, 'd-m-Y H:i:s') }} </td>
                                    <td>{{ $tl->keterangan }}</td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Silahkan masukkan kode Tiket Anda</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm1">
                            Lihat Tanggapan
                        </button>

                        <!--login form Modal -->
                        <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Tanggapan</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <label for="helpInputTop"><strong>Keterangan:</strong> </label>
                                        @forelse ($tanggapan_layanans as $tl)

                                        <p>{{ $tl->status }}</p>

                                        @empty

                                        @endforelse

                                    </div>

                                    @forelse ($tanggapan_layanans as $tg)
                                    <div class="modal-body">
                                        <span><a style="background:#435ebe; border:1px solid transparent; color:white; border-radius:.25rem; padding:.35em .65em; cursor:pointer" href=" storage/dokumen/{{ $tg->dokumen  }}" download>Download Dokumen</a></span>
                                        <br>
                                    </div>
                                    @empty

                                    @endforelse

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Tutup</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                @include('layouts.footer')
            </div>
        </div>
    </div>
</x-trackingPegawai-layout>