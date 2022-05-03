<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Pegawai;
use App\Models\Penyedia;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PegawaiRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedangproses = Tiket::where('keterangan', '=', 'sedang diproses')->count();

        return view('pegawai.dashboardPegawai', [
            'pegawais' => Pegawai::where('user_id', Auth::user()->id)->get(),
            'sedangproses' => $sedangproses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
        // $bukti = $request->file('bukti');
        // $tujuan = 'storage/bukti';
        // $bukti->move($tujuan, $bukti->getClientOriginalName());

        // $data = $request->all();
        // $data['bukti'] = $request->file('bukti')->getClientOriginalName();
        // Pengaduan::create($data);

        // $pengaduan = Pengaduan::where('penyedia_id', $request->penyedia_id)->orderBy('created_at', 'desc')->first();

        // $kode = Tiket::orderBy('created_at', 'desc')->first();

        // if ($kode) {
        //     $orderNr = $kode['kode'];
        //     $removed1char = substr($orderNr, 4);
        //     $int = (int)$removed1char;
        //     $generateOrder_nr = $stpad = 'BPJ-' . str_pad($int + 1, 4, "0", STR_PAD_LEFT);
        // } else {
        //     $generateOrder_nr = 'BPJ-' . str_pad(1, 4, "0", STR_PAD_LEFT);
        // }

        // Tiket::create([
        //     'pengaduan_id' => $pengaduan['id'],
        //     'kode' => $generateOrder_nr,
        //     'keterangan' => 'belum diproses',
        // ]);

        // return to_route('pengaduan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai.pengaduanPegawai', [
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }

    public function layanan()
    {
        return view('pegawai.tambahLayananPegawai', [
            'pegawais' => Pegawai::all(),
            'penyedias' => Penyedia::all(),
        ]);
    }

    public function riwayat()
    {
        return view('pegawai.riwayatLayananPegawai', [
            'pegawais' => Pegawai::all(),
            'pengaduans' => Pengaduan::all(),
            'penyedias' => Penyedia::all(),
        ]);
    }

    public function tracking()
    {
        return view('pegawai.trackingPegawai', [
            'pegawais' => Pegawai::all(),
        ]);
    }

    public function simpan(Request $request)
    {
        $bukti = $request->file('bukti');
        $tujuan = 'storage/bukti';
        $bukti->move($tujuan, $bukti->getClientOriginalName());

        $data = $request->all();
        $data['bukti'] = $request->file('bukti')->getClientOriginalName();
        Pengaduan::create($data);

        $pengaduan = Pengaduan::where('penyedia_id', $request->penyedia_id)->orderBy('created_at', 'desc')->first();

        $kode = Tiket::orderBy('created_at', 'desc')->first();

        if ($kode) {
            $orderNr = $kode['kode'];
            $removed1char = substr($orderNr, 4);
            $int = (int)$removed1char;
            $generateOrder_nr = $stpad = 'BPJ-' . str_pad($int + 1, 4, "0", STR_PAD_LEFT);
        } else {
            $generateOrder_nr = 'BPJ-' . str_pad(1, 4, "0", STR_PAD_LEFT);
        }

        Tiket::create([
            'pengaduan_id' => $pengaduan['id'],
            'kode' => $generateOrder_nr,
            'keterangan' => 'sedang diproses',
        ]);

        return redirect()->route('pegawai.riwayat');
    }
}
