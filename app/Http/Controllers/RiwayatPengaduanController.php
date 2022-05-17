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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyedia  $penyedia
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyedia $penyedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penyedia  $penyedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyedia $penyedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyedia  $penyedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyedia $penyedia)
    {
        //
    }
}
