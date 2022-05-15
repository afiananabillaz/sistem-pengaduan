<x-helpdesk-layout>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebarHelpdesk')
        </div>
        <div id="main" class='layout-navbar'>
            @include('layouts.headerHelpdesk')
            <div id="basic-content ">
                <div class="content-wrapper container">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <select class="form-select" aria-label="Default select example" style="width: 25%;" name="pilih" id="pilih" onchange="pilih()">
                                    <option selected>---Pilih Cetak---</option>
                                    <option value="perbulan">Perbulan</option>
                                    <option value="pertahun">Pertahun</option>
                                </select>
                                <br>
                                <form action="" method="get" hidden id="bulan">
                                    <div class=" input-group" style="width: 30%;">
                                        <select class="form-select" aria-label="Default select example" style="width: 15%;" name="bulan">
                                            <option selected>---Pilih Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="d-none d-sm-block">Tampilkan</span>
                                        </button>
                                    </div>
                                </form>

                                <form action="" method="get" hidden id="tahun">
                                    <div class=" input-group" style="width: 30%;">
                                        <select class="form-select" aria-label="Default select example" style="width: 15%;" name="tahun" id="date-dropdown">
                                        </select>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="d-none d-sm-block">Tampilkan</span>
                                        </button>
                                    </div>
                                </form>

                                <button type="button" onclick="pdf()" class="btn btn-warning mt-3">
                                    <span class="d-none d-sm-block">Cetak PDF <i class="fa fa-print"></i></span>
                                </button>

                                <button type="button" onclick="excel('table2', 'Laporan Layanan Biro Pengadaan Barang dan Jasa Sekretariat Daerah Provinsi Riau')" class="btn btn-success mt-3">
                                    <span class="d-none d-sm-block">Cetak Excel <i class="fa fa-file-excel"></i></span>
                                </button>

                                <table class="table table-striped mt-2" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kode Tiket</th>
                                            <th>Judul</th>
                                            <th>Pegawai</th>
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
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <table hidden class="table table-striped mt-2" id="table2">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kode Tiket</th>
                                        <th>Judul</th>
                                        <th>Pegawai</th>
                                    </tr>
                                    @foreach ($layanans as $layanan )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $layanan->tanggal }}-<span>{{ $layanan->bulan }}-</span><span>{{ $layanan->tahun }}</span></td>
                                        @foreach ($layanan->tiketLayanan as $tp )

                                        @endforeach
                                        <td>{{ $tp->kode }}</td>
                                        <td>{{ $layanan->judul }}</td>
                                        <td>{{ $layanan->pegawai->nama }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>
    @section('pilih')

    <script>
        function pdf() {
            var doc = new jspdf.jsPDF()

            // Simple html example
            doc.autoTable({
                html: '#table1'
            })

            doc.save('Laporan Layanan Biro Pengadaan Barang dan Jasa Sekretariat Daerah Provinsi Riau.pdf')
        }

        function excel(tableID, filename = '') {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename ? filename + '.xls' : 'excel_data.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }

        let dateDropdown = document.getElementById('date-dropdown');
        let currentYear = new Date().getFullYear();
        let earliestYear = 2021;

        while (currentYear >= earliestYear) {
            let dateOption = document.createElement('option');
            dateOption.text = currentYear;
            dateOption.value = currentYear;
            dateDropdown.add(dateOption);
            currentYear -= 1;
        }

        function pilih() {
            let pilih = document.getElementById('pilih').value;

            if (pilih == 'perbulan') {
                document.getElementById('bulan').removeAttribute('hidden');
                document.getElementById('tahun').setAttribute('hidden', true);
            } else {
                document.getElementById('tahun').removeAttribute('hidden');
                document.getElementById('bulan').setAttribute('hidden', true);
            }
        }
    </script>

    @endsection
</x-helpdesk-layout>