<x-trackingPenyedia-layout>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('layouts.headerPenyedia')
            <div class="content-wrapper container">
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('penyedia.kode') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="basicInput">Masukkan Kode Tiket</label>
                                            <input type="text" class="form-control" id="basicInput" name="kode">
                                        </div>

                                        <div class="form-actions d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Lacak</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @if ($tikets == null)
                            
                            @else

                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        @foreach ($tikets as $kodetiket )                                            
                                        @endforeach
                                        <h5>Kode Tiket Anda: {{ $kodetiket->kode }}</h5>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped w-50" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Waktu</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tikets as $tiket)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date_format($tiket->updated_at, 'Y-m-d H:i:s') }} </td>
                                        <td>{{ $tiket->keterangan }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3">Silahkan masukkan kode Tiket Anda</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>


                </section>

                @include('layouts.footer')
            </div>


            </x-penyedia-layout>