<?php

namespace App\Http\Controllers;

use App\Models\notif;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorenotifRequest;
use App\Http\Requests\UpdatenotifRequest;

class NotifController extends Controller
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
     * @param  \App\Http\Requests\StorenotifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorenotifRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function show(notif $notif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function edit(notif $notif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatenotifRequest  $request
     * @param  \App\Models\notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatenotifRequest $request, notif $notif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function destroy(notif $notif)
    {
        //
    }
}
