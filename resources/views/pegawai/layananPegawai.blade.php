<x-pegawai-layout>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebarPegawai')
        </div>
        <div id="main" class='layout-navbar'>
            @include('layouts.headerPegawai')
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
                                            @foreach ($layanans as $layanan)
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
                                                </td>
                                                <td>
                                                    <span class="badge bg-info" data-bs-toggle="modal" data-bs-target="#tanggapi{{ $layanan->id }}" style="cursor:pointer">Tanggapi</span>

                                                    <!--login form Modal -->
                                                    <div class="modal fade text-left" id="tanggapi{{ $layanan->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Tanggapi</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>

                                                                <form action="{{ route('pegawai.tanggapanLayanan', ['id'=> $layanan->id]) }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

                                                                    <div class="modal-body">
                                                                        <label for="helpInputTop">Keterangan</label>
                                                                        <textarea name="status" type="text" class="form-control" id="keterangan" required></textarea>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <label for="helperText">Dokumen</label>
                                                                        <input type="file" id="dokumen" class="form-control" placeholder="Name" name="dokumen" required>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <label for="keterangan">Status</label>
                                                                        <select class="form-select" name="keterangan">
                                                                            <option value="diterima">Diterima</option>
                                                                            <option value="ditolak">Ditolak</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Batal</span>
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary ml-1">
                                                                            Kirim
                                                                        </button>
                                                                    </div>

                                                                </form>
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
</x-pegawai-layout>