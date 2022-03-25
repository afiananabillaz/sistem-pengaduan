<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengaduanRequest;
use App\Models\Tiket;
use App\Models\Penyedia;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('helpdesk.pengaduanHelpdesk', [
            'pengaduans' => Pengaduan::all(),
            'tikets' => Tiket::where('kode')->get(),
            'penyedias' => Penyedia::where('nama')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('helpdesk.pengaduanHelpdesk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PengaduanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengaduanRequest $request)
    {
        Pengaduan::create([
            'tiket_id' => $request->tiket_id,
            'penyedia_id' => $request->penyedia_id,
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'bukti' => $request->bukti,
            'nama' => $request->nama,
        ]);

        return redirect()->route('pengaduan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PengaduanRequest  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(PengaduanRequest $request, Pengaduan $pengaduan)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        Pengaduan::destroy($pengaduan->id);

        return redirect('/pengaduanHelpdesk')->with('success', 'Pengaduan Berhasil Dihapus');
    }
}
