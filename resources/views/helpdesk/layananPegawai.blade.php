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
                                    <h3>Layanan</h3>
                                    <table class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Kode Tiket</th>
                                                <th>Judul</th>
                                                <th>Pegawai</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($layanans as $layanan )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $layanan->tanggal }}-<span>{{ $layanan->bulan }}-</span><span>{{ $layanan->tahun }}</span></td>

                                                @foreach ($layanan->tiketLayanan as $tp )

                                                @endforeach

                                                <td>{{ $tp->kode }}</td>

                                                <td>{{ $layanan->judul }}</td>
                                                <td>{{ $layanan->pegawai->nama }}</td>
                                                <td>

                                                    @if ($tp->keterangan == 'belum diproses')
                                                    <span class="badge bg-warning">Belum Diproses</span>
                                                    @elseif ($tp->keterangan == 'sedang diproses')
                                                    <span class="badge bg-primary">Sedang Diproses</span>
                                                    @elseif ($tp->keterangan == 'diterima')
                                                    <span class="badge bg-success">Diterima</span>
                                                    @else
                                                    <span class="badge bg-danger">Ditolak</span>
                                                    @endif

                                                <td>
                                                    <span class="badge bg-info" data-bs-toggle="modal" data-bs-target="#disposisi{{ $layanan->id }}" style="cursor:pointer">Disposisi</span>

                                                    <!--login form Modal -->
                                                    <div class="modal fade text-left" id="disposisi{{ $layanan->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Disposisi Layanan</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('layanan.disposisi', ['id'=> $layanan->id]) }}" method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <p>Disposisi Kepada</p>
                                                                        <fieldset class="form-group">
                                                                            <select class="form-select" id="pegawai_id" name="disposisi">
                                                                                <option value="">---Pilih Disposisi---</option>
                                                                                @foreach ($pegawais as $pegawai)
                                                                                <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Batal</span>
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary ml-1">
                                                                            Simpan
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button data-bs-toggle="modal" data-bs-target="#edit{{ $layanan->id }}" class="badge bg-success border-0"><i class="fa fa-edit"></i></button>

                                                    <button data-bs-toggle="modal" data-bs-target="#hapus{{ $layanan->id }}" class="badge bg-danger border-0"><i class="fa fa-trash"></i></button>


                                                    <div class="modal fade text-left" id="edit{{ $layanan->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Edit Layanan</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('layanan.update', ['id'=> $layanan->id]) }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                                                                        <label for="judul">Judul</label>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $layanan->judul) }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="pegawai">Pegawai</label>
                                                                            <select name="pegawai_id" id="pegawai" class="form-select">
                                                                                <option value="{{ old('pegawai_id', $layanan->pegawai_id) }}">{{ $layanan->pegawai->nama }}</option>
                                                                                @foreach ($pegawais as $pegawai)
                                                                                <option value="{{ old('pegawai_id', $pegawai->id) }}">{{ $pegawai->nama }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <label for="keterangan">Keterangan</label>
                                                                        <div class="form-group">
                                                                            <textarea type="text" class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $layanan->keterangan) }}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="bukti">Bukti</label>
                                                                            <input type="file" id="bukti" name="bukti" class="form-control" placeholder="Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Batal</span>
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary ml-1">
                                                                            Ubah Data
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade text-left" id="hapus{{ $layanan->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Hapus Layanan</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <p>
                                                                        Apakah Anda yakin ingin menghapus layanan ini?
                                                                    </p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <form action="{{ route('layanan.destroy', ['id' => $layanan->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger ml-1">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Hapus</span>
                                                                        </button>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
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