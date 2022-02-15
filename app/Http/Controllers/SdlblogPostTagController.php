<?php

namespace App\Http\Controllers;

use App\Models\SdlblogPostTag;
use Illuminate\Http\Request;

class SdlblogPostTagController extends Controller
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
     * @param  \App\Models\SdlblogPostTag  $sdlblogPostTag
     * @return \Illuminate\Http\Response
     */
    public function show(SdlblogPostTag $sdlblogPostTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SdlblogPostTag  $sdlblogPostTag
     * @return \Illuminate\Http\Response
     */
    public function edit(SdlblogPostTag $sdlblogPostTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SdlblogPostTag  $sdlblogPostTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SdlblogPostTag $sdlblogPostTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SdlblogPostTag  $sdlblogPostTag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sdlblogPostTag = SdlblogPostTag ::find($id);
        $sdlblogPostTag->delete();
        return redirect()->back()->with('success','Tag Deleted Successfully!');
    }
}
