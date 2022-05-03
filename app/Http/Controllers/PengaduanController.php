<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Penyedia;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PengaduanRequest;
use App\Models\Helpdesk;

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
            'helpdesks' => Helpdesk::all(),
            'pengaduans' => Pengaduan::all(),
            'tikets' => Tiket::all(),
            'penyedias' => Penyedia::all(),
            'pegawais' => Penyedia::where('user_id', Auth::user()->id)->get(),
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
            'keterangan' => 'belum diproses',
        ]);

        return to_route('pengaduan.index');
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
        return view('helpdesk.pengaduanHelpdesk', [
            'pengaduan' => $pengaduan,
            'tikets' => Tiket::all(),
            'penyedias' => Penyedia::all(),
            'pegawais' => Penyedia::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PengaduanRequest  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(PengaduanRequest $request, $pengaduan)
    {
        $bukti = $request->file('bukti');
        $tujuan = 'storage/bukti';
        $bukti->move($tujuan, $bukti->getClientOriginalName());

        $data = $request->all();

        if ($request->file('bukti')) {
            $data['bukti'] = $request->file('bukti')->getClientOriginalName();
        } else {
            $bukti = Pengaduan::where('id', $pengaduan)->get();
            $data['bukti'] = $bukti[0]->bukti;
        }

        $cek = Pengaduan::findOrFail($pengaduan);
        $cek->update($data);

        return to_route('pengaduan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($pengaduan)
    {
        Pengaduan::destroy($pengaduan);

        return to_route('pengaduan.index');
    }

    public function laporan()
    {
        return view('helpdesk.laporanHelpdesk', [
            'pengaduans' => Pengaduan::all(),
            'helpdesks' => Helpdesk::all(),
        ]);
    }
}
