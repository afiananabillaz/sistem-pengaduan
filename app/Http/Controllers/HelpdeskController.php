<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tiket;
use App\Models\Pegawai;
use App\Models\Helpdesk;
use App\Models\Penyedia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
        $diterima = Tiket::where('keterangan', '=', 'diterima')->count();
        $ditolak = Tiket::where('keterangan', '=', 'ditolak')->count();

        return view('helpdesk.dashboardHelpdesk', [
            'helpdesks' => Helpdesk::all(),
            'penyedias' => Penyedia::all(),
            'pegawais' => Pegawai::all(),
            'sedangproses' => $sedangproses,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\HelpdeskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

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

        Alert::success('Berhasil', 'Pengguna berhasil ditambahkan');

        return redirect()->route('helpdesk.pengguna');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\HelpdeskRequest $request
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $helpdesk)
    {
        $data = $request->all();

        if ($request->role == 'helpdesk') {
            $data['user_id'] = User::where('email', $request->email)->get();
            $data['nama'] = $request->nama;
            $data['password'] = Hash::make($request->password);
        } elseif ($request->role == 'pegawai') {
            $data['user_id'] = User::where('email', $request->email)->get();
            $data['nama'] = $request->nama;
            $data['nip'] = $request->nip;
            $data['password'] = Hash::make($request->password);
        } else {
            $data['user_id'] = User::where('email', $request->email)->get();
            $data['nama'] = $request->nama;
            $data['npwp'] = $request->npwp;
            $data['no_hp'] = $request->no_hp;
            $data['password'] = Hash::make($request->password);
        }

        $cek = User::findOrFail($helpdesk);
        $cek->update($data);

        Alert::success('Berhasil', 'Pengguna berhasil diubah');

        return to_route('helpdesk.pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Helpdesk  $helpdesk
     * @return \Illuminate\Http\Response
     */
    public function destroy($helpdesk)
    {
        User::destroy($helpdesk);

        Alert::success('Berhasil', 'Pengguna berhasil dihapus');

        return to_route('helpdesk.pengguna');
    }

    public function show(Helpdesk $helpdesk)
    {
        return view('helpdesk.laporanHelpdesk', [
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
