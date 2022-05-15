<x-penyedia-layout>
    <div>
        <div style="text-align: center; background-image:url('img/tiket1.svg'); background-size: cover; display:grid; height:400px; width: 90%; margin-left:70px; margin-top:100px">
            @foreach ($tiket_layanans as $tiketl )
            @endforeach
            <h1 class="text-white" style="margin-top: 80px; margin-left: 83px; text-align:left">{{ $tiketl->kode }}</h1>

            @foreach ($pegawais as $pegawai )
            @endforeach
            <p class="text-white" style="margin-top: -50px; margin-left: 168px; text-align:left; font-size:18px">{{ $pegawai->nama }}</p>

            <p class="text-white" style="margin-top: -89px; margin-left: 160px; text-align:left; font-size:18px">{{ Auth::user()->email }}</p>
        </div>
    </div>
</x-penyedia-layout>