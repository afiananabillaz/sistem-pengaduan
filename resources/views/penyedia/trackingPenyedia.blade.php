<x-trackingPenyedia-layout>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('layouts.headerPenyedia')
            <div class="content-wrapper container">
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('penyedia.kode') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="basicInput">Masukkan Kode Tiket</label>
                                            <input type="text" name="kode" class="form-control" id="basicInput" required>
                                        </div>

                                        <div class="form-actions d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Lacak</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @if ($tikets == null)

                            @else

                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <h5>Kode Tiket Anda: {{ $tikets[0]->kode }}</h5>
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
                                    @forelse ($tikets as $tiket)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date_format($tiket->updated_at, 'd-m-Y H:i:s') }} </td>
                                        <td>{{ $tiket->keterangan }}</td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3">Silahkan masukkan kode tiket Anda</td>
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
                                            <label for="helpInputTop"><strong>Keterangan: </strong></label>
                                            @forelse ($tanggapans as $tanggapan)

                                            <p>{{ $tanggapan->status }}</p>

                                            @empty

                                            @endforelse


                                        </div>

                                        @forelse ($tanggapans as $tanggapan1)
                                        <div class="modal-body">
                                            <span><a style="background:#435ebe; border:1px solid transparent; color:white; border-radius:.25rem; padding:.35em .65em; cursor:pointer" href=" storage/dokumen/{{ $tanggapan1->dokumen  }}" download>Download Dokumen</a></span>
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

                </section>

                @include('layouts.footer')
            </div>

</x-trackingPenyedia-layout>