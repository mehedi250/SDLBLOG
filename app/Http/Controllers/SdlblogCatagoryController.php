<?php

namespace App\Http\Controllers;

use App\Models\SdlblogCatagory;
use Illuminate\Http\Request;

class SdlblogCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = SdlblogCatagory::all();
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
        $request->validate([
            'name' => 'required|max:60',
            'slug' => 'bail|required|string|unique:sdlblog_catagories',
            'language_id' => 'required',
        ]);

        $postData = $request->only(['name', 'slug', 'description', 'language_id']);
        $catagory = SdlblogCatagory::create($postData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SdlblogCatagory  $sdlblogCatagory
     * @return \Illuminate\Http\Response
     */
    public function show(SdlblogCatagory $sdlblogCatagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SdlblogCatagory  $sdlblogCatagory
     * @return \Illuminate\Http\Response
     */
    public function edit(SdlblogCatagory $sdlblogCatagory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SdlblogCatagory  $sdlblogCatagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SdlblogCatagory $sdlblogCatagory)
    {
        $request->validate([
            'name' => 'bail|required|max:60',
            'slug' => 'bail|required|string|unique:sdlblog_catagories',
            'language_id' => 'required',
        ]);

        $postData = $request->only(['name', 'slug', 'description', 'language_id']);
        $sdlblogCatagory->update($postData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SdlblogCatagory  $sdlblogCatagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SdlblogCatagory $sdlblogCatagory)
    {
        $sdlblogCatagory->delete();
    }
}
