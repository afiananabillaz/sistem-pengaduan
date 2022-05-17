<x-penyedia-layout>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('layouts.headerPenyedia')
            <div class="content-wrapper container">
                <div class="page-heading">
                    <section class="section">
                        <div class="card">
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
                                        @foreach ($pengaduans as $pengaduan)
                                        <tr>
                                            @foreach ($pengaduan->tiketPengaduan as $tp )

                                            @endforeach

                                            <td>{{ $tp->kode }}</td>
                                            <td>{{ $pengaduan->judul }}</td>
                                            <td>{{ $pengaduan->keterangan }}</td>
                                            <td><a style="background:#435ebe; border:1px solid transparent; color:white; border-radius:.25rem; padding:.35em .65em; cursor:pointer" href="storage/bukti/{{ $pengaduan->bukti  }}" download>Download File</a></td>
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