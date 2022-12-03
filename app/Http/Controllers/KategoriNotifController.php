<?php

namespace App\Http\Controllers;

use App\Models\kategori_notif;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storekategori_notifRequest;
use App\Http\Requests\Updatekategori_notifRequest;

class KategoriNotifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storekategori_notifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storekategori_notifRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori_notif  $kategori_notif
     * @return \Illuminate\Http\Response
     */
    public function show(kategori_notif $kategori_notif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori_notif  $kategori_notif
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori_notif $kategori_notif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatekategori_notifRequest  $request
     * @param  \App\Models\kategori_notif  $kategori_notif
     * @return \Illuminate\Http\Response
     */
    public function update(Updatekategori_notifRequest $request, kategori_notif $kategori_notif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori_notif  $kategori_notif
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori_notif $kategori_notif)
    {
        //
    }
}
