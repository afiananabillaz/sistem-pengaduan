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
                                <h4 class="card-header">
                                    Riwayat Layanan
                                </h4>
                                <div class="card-body">
                                    <table class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Kode Tiket</th>
                                                <th>Judul</th>
                                                <th>Keterangan</th>
                                                <th>File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($layanans as $layanan)
                                            <tr>
                                                @foreach ($layanan->tiketLayanan as $tp )

                                                @endforeach

                                                <td>{{ $tp->kode }}</td>
                                                <td>{{ $layanan->judul }}</td>
                                                <td>{{ $layanan->keterangan }}</td>
                                                <td><a style="background:#435ebe; border:1px solid transparent; color:white; border-radius:.25rem; padding:.35em .65em; cursor:pointer" href="storage/bukti/{{ $layanan->bukti  }}" download>Download File</a></td>
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