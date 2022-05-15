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

                                    @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif

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

                                                <form action="{{ route('pengaduan.store') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="tanggal" value="{{ date('d') }}">
                                                        <input type="hidden" name="bulan" value="{{ date('m') }}">
                                                        <input type="hidden" name="tahun" value="{{ date('Y') }}">

                                                        <div class="form-group">
                                                            <label for="penyedia">Penyedia</label>
                                                            <select name="penyedia_id" id="penyedia" class="form-select">
                                                                <option value="">---Pilih Penyedia---</option>
                                                                @foreach ($penyedias as $penyedia)
                                                                <option value="{{ $penyedia->id }}">{{ $penyedia->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <label for="judul">Judul</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="judul" name="judul" required>
                                                        </div>
                                                        <label for="keterangan">Keterangan</label>
                                                        <div class="form-group">
                                                            <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bukti">Bukti</label>
                                                            <input type="file" id="bukti" name="bukti" class="form-control" placeholder="Name" required>
                                                        </div>
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
                                            @foreach ($pengaduans as $pengaduan )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pengaduan->tanggal }}-<span>{{ $pengaduan->bulan }}-</span><span>{{ $pengaduan->tahun }}</span></td>

                                                @foreach ($pengaduan->tiketPengaduan as $tp )

                                                @endforeach

                                                <td>{{ $tp->kode }}</td>

                                                <td>{{ $pengaduan->judul }}</td>
                                                <td>{{ $pengaduan->penyedia->nama }}</td>

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
                                                </td>

                                                <td>
                                                    <span class="badge bg-info" data-bs-toggle="modal" data-bs-target="#disposisi{{ $pengaduan->id }}" style="cursor:pointer">Disposisi</span>

                                                    <!--login form Modal -->
                                                    <div class="modal fade text-left" id="disposisi{{ $pengaduan->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Disposisi</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('pengaduan.disposisi', ['id'=> $pengaduan->id]) }}" method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <p>Disposisi Kepada</p>
                                                                        <fieldset class="form-group">
                                                                            <select class="form-select" id="pegawai_id" name="disposisi">
                                                                                <option value="">---Pilih Dipsosisi---</option>
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
                                                    <button data-bs-toggle="modal" data-bs-target="#edit{{ $pengaduan->id }}" class="badge bg-success border-0"><i class="fa fa-edit"></i></button>

                                                    <button data-bs-toggle="modal" data-bs-target="#hapus{{ $pengaduan->id }}" class="badge bg-danger border-0"><i class="fa fa-trash"></i></button>


                                                    <div class="modal fade text-left" id="edit{{ $pengaduan->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Edit Pengaduan</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('pengaduan.update', ['id'=> $pengaduan->id]) }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <label for="judul">Judul</label>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $pengaduan->judul) }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="penyedia">Penyedia</label>
                                                                            <select name="penyedia_id" id="penyedia" class="form-select">
                                                                                <option value="{{ old('penyedia_id', $pengaduan->penyedia_id) }}">{{ $pengaduan->penyedia->nama }}</option>
                                                                                @foreach ($penyedias as $penyedia)
                                                                                <option value="{{ old('penyedia_id', $penyedia->id) }}">{{ $penyedia->nama }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <label for="keterangan">Keterangan</label>
                                                                        <div class="form-group">
                                                                            <textarea type="text" class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $pengaduan->keterangan) }}</textarea>
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

                                    <div class="modal fade text-left" id="hapus{{ $pengaduan->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Hapus Pengaduan</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <p>
                                                        Apakah Anda yakin ingin menghapus pengaduan ini?
                                                    </p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Batal</span>
                                                    </button>
                                                    <form action="{{ route('pengaduan.destroy', ['id' => $pengaduan->id]) }}" method="POST">
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