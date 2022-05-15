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
                                        Tambah Pengguna <i class="fa fa-plus"></i>
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
                                                    <h4 class="modal-title" id="myModalLabel33">Tambah Pengguna </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="{{ route('helpdesk.store') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label for="email">Email </label>
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" name="email">
                                                        </div>
                                                        <label for="nama">Nama </label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="nama">
                                                        </div>
                                                        <label for="role">Role </label>
                                                        <div class="form-group">
                                                            <select class="form-select" id="tambah" name="role" onchange="pilih()">
                                                                <option selected>---Pilih Role---</option>
                                                                <option value="helpdesk">Helpdesk</option>
                                                                <option value="pegawai">Pegawai</option>
                                                                <option value="penyedia">Penyedia</option>
                                                            </select>
                                                        </div>

                                                        <div hidden class="form-group" id="pegawai">
                                                            <label for="nip">NIP </label>
                                                            <input type="text" name="nip" class="form-control" name="nama">
                                                        </div>

                                                        <div hidden class="form-group" id="penyedia">
                                                            <div class="control-group">
                                                                <label>NPWP</label>
                                                                <input type="text" name="npwp" class="form-control">
                                                            </div>
                                                            <div class="control-group">
                                                                <label>Nomor HP</label>
                                                                <input type="tel" name="no_hp" class="form-control">
                                                            </div>
                                                        </div>

                                                        <label for="password">Password </label>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
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
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>
                                                    <button data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}" class="badge bg-success border-0"><i class="fa fa-edit"></i></button>

                                                    <button data-bs-toggle="modal" data-bs-target="#hapus{{ $user->id }}" class="badge bg-danger border-0"><i class="fa fa-trash"></i></button>

                                                    <div class="modal fade text-left" id="edit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Edit Pengguna </h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('helpdesk.update', ['id'=> $user->id]) }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <label for="email">Email </label>
                                                                        <div class="form-group">
                                                                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email)}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="role">Role</label>
                                                                            <select class="form-select" name="role" disabled>
                                                                                <option selected value=" {{ old('role', $user->role) }}">{{ $user->role }}</option>
                                                                                <option value="helpdesk">Helpdesk</option>
                                                                                <option value="pegawai">Pegawai</option>
                                                                                <option value="penyedia">Penyedia</option>
                                                                            </select>
                                                                        </div>
                                                                        <label for="password">Password </label>
                                                                        <div class="form-group">
                                                                            <input type="password" class="form-control" name="password" value="{{ old('password', $user->password)}}">
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

                                                    <div class="modal fade text-left" id="hapus{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Hapus Pengguna</h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <p>
                                                                        Apakah Anda yakin ingin menghapus pengguna ini?
                                                                    </p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <form action="{{ route('helpdesk.destroy', ['id' => $user->id]) }}" method="POST">
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
    @section('pilih')
    <script>
        function pilih() {
            let tambah = document.getElementById('tambah').value;

            if (tambah == 'pegawai') {
                document.getElementById('pegawai').removeAttribute('hidden');
                document.getElementById('penyedia').setAttribute('hidden', true);
            } else if (tambah == 'penyedia') {
                document.getElementById('penyedia').removeAttribute('hidden');
                document.getElementById('pegawai').setAttribute('hidden', true);
            } else {
                document.getElementById('penyedia').setAttribute('hidden', true);
                document.getElementById('pegawai').setAttribute('hidden', true);
            }
        }
    </script>
    @endsection
</x-helpdesk-layout>