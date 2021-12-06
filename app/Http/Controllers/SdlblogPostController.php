<?php

namespace App\Http\Controllers;

use App\Models\SdlblogPost;
use Illuminate\Http\Request;

class SdlblogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = SdlblogPost::all();
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
            'title' => 'required',
            'slug' => 'bail|required|unique:sdlblog_posts',

        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SdlblogPost  $sdlblogPost
     * @return \Illuminate\Http\Response
     */
    public function show(SdlblogPost $sdlblogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SdlblogPost  $sdlblogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(SdlblogPost $sdlblogPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SdlblogPost  $sdlblogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SdlblogPost $sdlblogPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SdlblogPost  $sdlblogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(SdlblogPost $sdlblogPost)
    {
        $sdlblogPost->delete();
    }
}
