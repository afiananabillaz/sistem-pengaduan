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

                                                <form action="{{ route('pengaduan.index') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                                                        <label for="judul">Judul</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="judul" name="judul">
                                                        </div>
                                                        <label for="penyedia_id">Penyedia/Instansi</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="penyedia_id" name="penyedia_id">
                                                        </div>
                                                        <label for="keterangan">Keterangan</label>
                                                        <div class="form-group">
                                                            <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
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
                                                <td>{{ $pengaduan->tanggal }}</td>
                                                <td>{{ $pengaduan->kode }}</td>
                                                <td>{{ $pengaduan->judul }}</td>
                                                <td>{{ $pengaduan->penyedia_id }}</td>
                                                <td>
                                                    <span class="badge bg-warning">Sedang Diproses</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info" data-bs-toggle="modal" data-bs-target="#inlineForm1" style="cursor:pointer">Disposisi</span>

                                                    <!--login form Modal -->
                                                    <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Disposisi</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="#">
                                                                    <div class="modal-body">
                                                                        <p>Disposisi Kepada</p>
                                                                        <fieldset class="form-group">
                                                                            <select class="form-select" id="basicSelect">
                                                                                <option>Nadia Asri</option>
                                                                                <option>Alit</option>
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button data-bs-toggle="modal" data-bs-target="#inlineForm2" class="badge bg-success border-0"><i class="fa fa-edit"></i></button>

                                                    <div class="modal fade text-left" id="inlineForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Edit Pengaduan</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('pengaduan.index') }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                                                                        <label for="judul">Judul</label>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $pengaduan->judul) }}">
                                                                        </div>
                                                                        <label for="penyedia_id">Penyedia/Instansi</label>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="penyedia_id" name="penyedia_id" value="{{ old('penyedia_id', $pengaduan->penyedia_id) }}">
                                                                        </div>
                                                                        <label for="keterangan">Keterangan</label>
                                                                        <div class="form-group">
                                                                            <textarea type="text" class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $pengaduan->keterangan) }}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="bukti">Bukti</label>
                                                                            <input type="file" id="bukti" name="bukti" class="form-control" placeholder="Name" value="{{ old('bukti', $pengaduan->bukti) }}">
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

                                                    <form action="/pengaduanHelpdesk/{{ $pengaduan->id }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf

                                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"><i class="fa fa-trash-alt"></i></span></button>

                                                    </form>
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