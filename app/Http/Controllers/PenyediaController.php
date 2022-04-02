<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenyediaRequest;
use App\Models\Penyedia;
use App\Models\Pengaduan;
use App\Models\User;

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
        return view('penyedia.riwayatPengaduanPenyedia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PenyediaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenyediaRequest $request)
    {
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
            'pengaduans' => Pengaduan::all(),
            'penyedias' => Penyedia::all(),
            'users' => User::all()
        ]);
    }

}
