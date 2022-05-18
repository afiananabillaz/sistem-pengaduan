<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;

class RiwayatPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyedia = Penyedia::where('user_id', Auth::user()->id)->first();

        return view('penyedia.riwayatPengaduanPenyedia', [
            'pengaduans' => Pengaduan::where('penyedia_id', $penyedia['id'])->get(),
            'penyedias' => Penyedia::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengaduan::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'penyedia_id' => $request->penyedia_id,
            'bukti' => $request->file('bukti')->store('assets/bukti', 'public'),
            'email' => $request->email,
        ]);

        return to_route('riwayat.index');
    }
}
