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
                                                <form action="{{ route('helpdesk.pengguna') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label for="email">Email </label>
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" id="email" name="email">
                                                        </div>
                                                        <label for="role">Role </label>
                                                        <div class="form-group">
                                                            <select class="form-select" id="role" name="role">
                                                                <option>Pegawai</option>
                                                                <option>Helpdesk</option>
                                                                <option>Penyedia</option>
                                                            </select>
                                                        </div>
                                                        <label for="password">Password </label>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control" id="password" name="password">
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
                                                    <button data-bs-toggle="modal" data-bs-target="#inlineForm2" class="badge bg-success border-0"><i class="fa fa-edit"></i></button>

                                                    <div class="modal fade text-left" id="inlineForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Edit Pengguna </h4>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('helpdesk.pengguna') }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <label for="email">Email </label>
                                                                        <div class="form-group">
                                                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email)}}">
                                                                        </div>
                                                                        <label for="role">Role </label>
                                                                        <div class="form-group">
                                                                            <select class="form-select" id="role" name="role">
                                                                                <option>Pegawai</option>
                                                                                <option>Helpdesk</option>
                                                                                <option>Penyedia</option>
                                                                            </select>
                                                                        </div>
                                                                        <label for="password">Password </label>
                                                                        <div class="form-group">
                                                                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $user->password)}}">
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

                                                    <form action="{{ route('helpdesk.pengguna') }}" method="post" class="d-inline">
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