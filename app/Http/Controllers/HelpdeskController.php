<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Helpdesk;
use App\Models\Penyedia;
use App\Http\Controllers\Controller;
use App\Http\Requests\HelpdeskRequest;
use App\Models\Pegawai;
use App\Models\Pengaduan;
use App\Models\Tiket;
use Illuminate\Support\Facades\Hash;

class HelpdeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedangproses = Tiket::where('keterangan', '=', 'sedang diproses')->count();

        return view('helpdesk.dashboardHelpdesk', [
            'helpdesks' => Helpdesk::all(),
            'penyedias' => Penyedia::all(),
            'pegawais' => Pegawai::all(),
            'sedangproses' => $sedangproses,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\HelpdeskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HelpdeskRequest $request)
    {
        if ($request->role == 'helpdesk') {
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            Helpdesk::create([
                'user_id' => User::where('email', $request->email)->first()->id,
                'nama' => $request->nama,
            ]);
        } elseif ($request->role == 'pegawai') {
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            Pegawai::create([
                'user_id' => User::where('email', $request->email)->first()->id,
                'nama' => $request->nama,
                'nip' => $request->nip,
            ]);
        } else {
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            Penyedia::create([
                'user_id' => User::where('email', $request->email)->first()->id,
                'nama' => $request->nama,
                'npwp' => $request->npwp,
                'no_hp' => $request->no_hp,
            ]);
        }
        return redirect()->route('helpdesk.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\HelpdeskRequest $request
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return \Illuminate\Http\Response
     */
    public function update(HelpdeskRequest $request, Helpdesk $helpdesk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helpdesk $helpdesk)
    {
        Helpdesk::destroy($helpdesk->id);

        return redirect()->route('helpdesk.index');
    }

    public function show(Helpdesk $helpdesk)
    {
        return view('helpdesk.laporanHelpdesk', [
            'helpdesks' => Helpdesk::all(),
            'penyedias' => Penyedia::all(),
            'pegawais' => Pegawai::all()
        ]);
    }

    public function akumulasi(Helpdesk $helpdesk)
    {
        return view('helpdesk.akumulasiHelpdesk', [
            'helpdesks' => Helpdesk::all(),
            'penyedias' => Penyedia::all(),
            'pegawais' => Pegawai::all()
        ]);
    }

    public function pengguna(Helpdesk $helpdesk)
    {
        return view('helpdesk.kelolaPengguna', [
            'helpdesks' => Helpdesk::all(),
            'penyedias' => Penyedia::all(),
            'pegawais' => Pegawai::all(),
            'users' => User::all()
        ]);
    }
}
