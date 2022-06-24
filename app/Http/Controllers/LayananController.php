<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pegawai;
use App\Models\Helpdesk;
use App\Models\TiketLayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LayananRequest;
use RealRashid\SweetAlert\Facades\Alert;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('helpdesk.layananPegawai', [
            'helpdesks' => Helpdesk::all(),
            'pegawais' => Pegawai::all(),
            'layanans' => Layanan::all(),
            'tiket_layanans' => TiketLayanan::all(),
        ])->with('menu', 'pengaduan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $layanan)
    {
        return view('helpdesk.layananPegawai', [
            'layanan' => $layanan,
            'tiket_layanans' => TiketLayanan::all(),
            'pegawais' => Pegawai::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LayananRequest  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(LayananRequest $request, $layanan)
    {
        $data = $request->all();
        $data['disposisi'] = 0;

        if ($request->file('bukti')) {
            $tujuan = 'storage/bukti';
            $bukti = $request->file('bukti');
            $bukti->move($tujuan, $bukti->getClientOriginalName());
            $data['bukti'] = $request->file('bukti')->getClientOriginalName();
        } else {
            $bukti = Layanan::where('id', $layanan)->get();
            $data['bukti'] = $bukti[0]->bukti;
        }

        $cek = Layanan::findOrFail($layanan);
        $cek->update($data);

        Alert::success('Berhasil', 'Layanan berhasil diubah');

        return to_route('layanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($layanan)
    {
        Layanan::destroy($layanan);

        Alert::success('Berhasil', 'Layanan berhasil dihapus');

        return to_route('layanan.index');
    }

    public function laporan(Request $request)
    {

        if ($request->bulan == '' && $request->tahun == '') {
            $layanan = Layanan::all();
        } elseif ($request->bulan != '') {
            $layanan = Layanan::where('bulan', $request->bulan)->get();
        } elseif ($request->tahun != '') {
            $layanan = Layanan::where('tahun', $request->tahun)->get();
        }

        return view('helpdesk.laporanLayanan', [
            'layanans' => $layanan,
            'helpdesks' => Helpdesk::all(),
        ])->with('menu', 'laporan');
    }

    public function disposisi(Request $request, $layanan)
    {
        $cek = Layanan::findOrFail($layanan);

        $tiket = TiketLayanan::where('layanan_id', $layanan)->orderBy('created_at', 'desc')->first();

        $int = (int)$request->disposisi;
        $cek->update(['disposisi' => $int]);

        $tiket->create([
            'keterangan' => 'sedang diproses',
            'kode' => $tiket['kode'],
            'layanan_id' => $layanan,
        ]);

        Alert::info('Berhasil', 'Layanan berhasil didisposisikan');

        return to_route('layanan.index');
    }
}
