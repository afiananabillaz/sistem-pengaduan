<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;

class RiwayatPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penyedia.riwayatPengaduanPenyedia', [
            'pengaduans' => Pengaduan::all(),
            'penyedias' => Penyedia::all(),
            'users' => User::all()
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
            'bukti' => $request->bukti,
            'email' => $request->email,
        ]);

        return redirect('/riwayatPengaduanPenyedia')->with('success', 'Pengaduan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyedia  $penyedia
     * @return \Illuminate\Http\Response
     */
    public function show(Penyedia $penyedia)
    {
        return view('penyedia.riwayatPengaduanPenyedia', [
            'pengaduans' => Pengaduan::all(),
            'penyedias' => Penyedia::all(),
            'users' => User::all()
        ]);
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
