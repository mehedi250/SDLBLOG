<?php

namespace App\Http\Controllers;

use App\Models\SdlblogComment;
use Illuminate\Http\Request;

class SdlblogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sdlblogComment = SdlblogComment::all();
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
     * @param  \App\Models\SdlblogComment  $sdlblogComment
     * @return \Illuminate\Http\Response
     */
    public function show(SdlblogComment $sdlblogComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SdlblogComment  $sdlblogComment
     * @return \Illuminate\Http\Response
     */
    public function edit(SdlblogComment $sdlblogComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SdlblogComment  $sdlblogComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SdlblogComment $sdlblogComment)
    {
        $request->validate([
            'comment' => 'required',

        ]);

        $postData = $request->only(['comment']);
        $sdlblogComment->update($postData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SdlblogComment  $sdlblogComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SdlblogComment $sdlblogComment)
    {
        $sdlblogComment->delete();
    }
}
