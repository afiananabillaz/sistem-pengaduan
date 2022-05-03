<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Penyedia;
use App\Models\Pengaduan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PenyediaRequest;
use App\Http\Requests\PengaduanRequest;
use Illuminate\Http\Request;

class PenyediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penyedia.dashboardPenyedia', [
            'penyedias' => Penyedia::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PengaduanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengaduanRequest $request)
    {
        $bukti = $request->file('bukti');
        $tujuan = 'storage/bukti';
        $bukti->move($tujuan, $bukti->getClientOriginalName());

        $data = $request->all();
        $data['penyedia_id'] = auth()->user()->id;
        $data['bukti'] = $request->file('bukti')->getClientOriginalName();
        Pengaduan::create($data);

        $pengaduan = Pengaduan::where('penyedia_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();

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
            'keterangan' => 'belum diproses',
        ]);

        return to_route('penyedia.tiket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyedia  $penyedia
     * @return \Illuminate\Http\Response
     */
    public function show(Penyedia $penyedia)
    {
        //
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
     * @param  \App\Http\Requests\PenyediaRequest  $request
     * @param  \App\Models\Penyedia  $penyedia
     * @return \Illuminate\Http\Response
     */
    public function update(PenyediaRequest $request, Penyedia $penyedia)
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

    public function tracking()
    {
        return view('penyedia.trackingPenyedia', [
            'tikets' => [],
            'penyedias' => Penyedia::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function kode(Request $request)
    {
        return view('penyedia.trackingPenyedia', [
            'tikets' => Tiket::where('kode', $request->kode)->get(),
            'penyedias' => Penyedia::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function tiket()
    {
        $pengaduan = Pengaduan::where('penyedia_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();

        return view('penyedia.tiketPenyedia', [
            'tikets' => Tiket::where('pengaduan_id', $pengaduan['id'])->get(),
            'penyedias' => Penyedia::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
