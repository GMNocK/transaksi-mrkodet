<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorenotificationRequest;
use App\Http\Requests\UpdatenotificationRequest;

class NotificationController extends Controller
{
    
    public function index()
    {
        return view('myDashboard.pages.notifications.all');
    }


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
    public function store(StorenotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notif)
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
    public function update(UpdatenotificationRequest $request, Notification $notif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notif  $notif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notif)
    {
        //
    }
}
