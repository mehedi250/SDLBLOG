<?php

namespace App\Http\Controllers;

use App\Models\SdlblogTag;
use Illuminate\Http\Request;

class SdlblogTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tages = SdlblogTag::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SdlblogTag  $sdlblogTag
     * @return \Illuminate\Http\Response
     */
    public function show(SdlblogTag $sdlblogTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SdlblogTag  $sdlblogTag
     * @return \Illuminate\Http\Response
     */
    public function edit(SdlblogTag $sdlblogTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SdlblogTag  $sdlblogTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SdlblogTag $sdlblogTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SdlblogTag  $sdlblogTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(SdlblogTag $sdlblogTag)
    {
        $sdlblogTag->delete();
    }
}
