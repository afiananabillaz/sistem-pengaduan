<x-penyedia-layout>

    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('layouts.headerPenyedia')
            <div class="content-wrapper container">
                <div class="page-heading">
                    <section class="section">
                        <div class="card">
                            <h4 class="card-header">
                                Riwayat Pengaduan
                            </h4>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                            <th>File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengaduans as $pengaduan)
                                        <tr>
                                            <td>{{ $pengaduan->email }}</td>
                                            <td>{{ $pengaduan->judul }}</td>
                                            <td>{{ $pengaduan->keterangan }}</td>
                                            <td><a href="">{{ $pengaduan->bukti }}</a></td>
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

</x-penyedia-layout>