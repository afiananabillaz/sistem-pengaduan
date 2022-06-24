<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Layanan;
use App\Models\Pegawai;
use App\Models\Penyedia;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\TiketLayanan;
use Illuminate\Http\Request;
use App\Models\TanggapanLayanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LayananRequest;
use App\Http\Requests\TanggapanRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedangproses = TiketLayanan::where('keterangan', '=', 'sedang diproses')->count();
        $diterima = Tiket::where('keterangan', '=', 'diterima')->count();
        $ditolak = Tiket::where('keterangan', '=', 'ditolak')->count();

        return view('pegawai.dashboardPegawai', [
            'pegawais' => Pegawai::where('user_id', Auth::user()->id)->get(),
            'sedangproses' => $sedangproses,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
        ])->with('menu', 'dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();

        return view('pegawai.pengaduanPegawai', [
            'pegawais' => Pegawai::where('user_id', Auth::user()->id)->get(),
            'pengaduans' => Pengaduan::where('disposisi', $pegawai['id'])->get(),
            'tikets' => Tiket::all(),
            'tanggapans' => Tanggapan::all(),
        ])->with('menu', 'pengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function showLayanan(Pegawai $pegawai)
    {
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();

        return view('pegawai.layananPegawai', [
            'pegawais' => Pegawai::where('user_id', Auth::user()->id)->get(),
            'layanans' => Layanan::where('disposisi', $pegawai['id'])->get(),
            'tiket_layanans' => TiketLayanan::all(),
            'tanggapans' => Tanggapan::all(),
        ])->with('menu', 'pengaduan');
    }

    public function layanan()
    {
        return view('pegawai.tambahLayananPegawai', [
            'pegawais' => Pegawai::where('user_id', auth()->user()->id)->get(),
            'penyedias' => Penyedia::all(),
        ])->with('menu', 'layanan');
    }

    public function riwayat()
    {
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();

        return view('pegawai.riwayatLayananPegawai', [
            'pegawais' => Pegawai::where('user_id', auth()->user()->id)->get(),
            'layanans' => Layanan::where('pegawai_id', $pegawai['id'])->get(),
        ])->with('menu', 'layanan');
    }

    public function tracking()
    {
        return view('pegawai.trackingPegawai', [
            'tiket_layanans' => [],
            'pegawais' => Pegawai::where('user_id', auth()->user()->id)->get(),
        ])->with('menu', 'lacak');
    }

    public function kode(Request $request)
    {
        $kode = TiketLayanan::where('kode', $request->kode)->get();

        if ($kode->count() == 0) {
            return view('pegawai.trackingPegawai', [
                'tiket_layanans' => '',
                'pegawais' => Pegawai::where('user_id', auth()->user()->id)->get(),
                'tanggapan_layanans' => ''
            ])->with('menu', 'lacak');
        }

        $kode = TiketLayanan::where('kode', $request->kode)->first();

        return view('pegawai.trackingPegawai', [
            'tiket_layanans' => TiketLayanan::where('kode', $request->kode)->get(),
            'pegawais' => Pegawai::where('user_id', auth()->user()->id)->get(),
            'tanggapan_layanans' => TanggapanLayanan::where('layanan_id', $kode->layanan_id)->get(),
        ])->with('menu', 'lacak');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LayananRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function simpan(LayananRequest $request)
    {
        $bukti = $request->file('bukti');
        $tujuan = 'storage/bukti';
        $bukti->move($tujuan, $bukti->getClientOriginalName());

        $data = $request->all();
        $data['disposisi'] = 0;

        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();

        $data['pegawai_id'] = $pegawai['id'];
        $data['bukti'] = $request->file('bukti')->getClientOriginalName();
        Layanan::create($data);

        $layanan = Layanan::where('pegawai_id', $pegawai['id'])->orderBy('created_at', 'desc')->first();

        $kode = TiketLayanan::orderBy('created_at', 'desc')->first();

        if ($kode) {
            $orderNr = $kode['kode'];
            $removed1char = substr($orderNr, 4);
            $int = (int)$removed1char;
            $generateOrder_nr = $stpad = 'LBJ-' . str_pad($int + 1, 4, "0", STR_PAD_LEFT);
        } else {
            $generateOrder_nr = 'LBJ-' . str_pad(1, 4, "0", STR_PAD_LEFT);
        }

        TiketLayanan::create([
            'layanan_id' => $layanan['id'],
            'kode' => $generateOrder_nr,
            'keterangan' => 'belum diproses',
        ]);

        return to_route('pegawai.tiket');
    }

    public function tiket()
    {
        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();

        $layanan = Layanan::where('pegawai_id', $pegawai['id'])->orderBy('created_at', 'desc')->first();

        return view('pegawai.tiketPegawai', [
            'tiket_layanans' => TiketLayanan::where('layanan_id', $layanan['id'])->get(),
            'pegawais' => Pegawai::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function tanggapan(TanggapanRequest $request, $id)
    {
        $dokumen = $request->file('dokumen');
        $tujuan = 'storage/dokumen';
        $dokumen->move($tujuan, $dokumen->getClientOriginalName());

        $data = $request->all();

        $tiket = Tiket::where('pengaduan_id', $id)->orderBy('created_at', 'desc')->first();

        $tiket->create([
            'keterangan' => $request->keterangan,
            'kode' => $tiket['kode'],
            'pengaduan_id' => $id,
        ]);

        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();
        $data['pegawai_id'] = $pegawai['id'];

        $data['pengaduan_id'] = (int)$id;

        $data['dokumen'] = $request->file('dokumen')->getClientOriginalName();

        Tanggapan::create($data);

        return to_route('pegawai.show');
    }

    public function tanggapanLayanan(TanggapanRequest $request, $id)
    {
        $dokumen = $request->file('dokumen');
        $tujuan = 'storage/dokumen';
        $dokumen->move($tujuan, $dokumen->getClientOriginalName());

        $data = $request->all();

        $tiket = TiketLayanan::where('layanan_id', $id)->orderBy('created_at', 'desc')->first();

        $tiket->create([
            'keterangan' => $request->keterangan,
            'kode' => $tiket['kode'],
            'layanan_id' => $id,
        ]);

        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();
        $data['pegawai_id'] = $pegawai['id'];

        $data['layanan_id'] = (int)$id;

        $data['dokumen'] = $request->file('dokumen')->getClientOriginalName();

        TanggapanLayanan::create($data);

        return to_route('pegawai.showLayanan');
    }
}
