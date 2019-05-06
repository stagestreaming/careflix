<?php

namespace App\Http\Controllers;

use App\Party;

class PartiesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\StoreParty $request)
    {
        $payload = $request->only(['show_video_id']);

        $party = Party::create([
            'show_video_id' => $payload['show_video_id'],
            'is_playing' => false,
            'is_expired' => false,
            'current_time' => 0,
            'last_activity_at' => now()
        ]);

        $party->users()->attach($request->user()->id, [
            'is_active' => false
        ]);

        return $party;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $party = Party::with('video', 'video.show', 'users')->find($id);

        return $party;
    }

    /**
     * Update the specified resource in storage.
     *
     * @todo Permission for non-party users
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function state(Party $party, )
    {
        //
    }
}