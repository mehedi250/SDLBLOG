<?php

namespace App\Http\Controllers;

use App\Models\SdlblogLanguage;
use Illuminate\Http\Request;

class SdlblogLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = SdlblogLanguage::all();
        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.language.create');
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
            'name' => 'required|unique:sdlblog_languages',
            'slug' => 'bail|required|string|unique:sdlblog_languages',
        ]);

        $postData = $request->only(['name', 'slug']);
        $language = SdlblogLanguage::create($postData);

        return redirect()->route('languages.index')->with('success','Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SdlblogLanguage  $sdlblogLanguage
     * @return \Illuminate\Http\Response
     */
    public function show(SdlblogLanguage $sdlblogLanguage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SdlblogLanguage  $sdlblogLanguage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sdlblogLanguage = SdlblogLanguage::find($id);
        return view('admin.language.edit', compact('sdlblogLanguage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SdlblogLanguage  $sdlblogLanguage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sdlblogLanguage = SdlblogLanguage::find($id);
        $request->validate([
            'name' => 'bail|required|min:2',
            'slug' => 'bail|required|unique:sdlblog_languages,slug,'.$sdlblogLanguage->id,
        ]);

        $postData = $request->only(['name', 'slug']);
        $sdlblogLanguage->update($postData);
        return redirect()->route('languages.index')->with('success','Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SdlblogLanguage  $sdlblogLanguage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sdlblogLanguage = SdlblogLanguage::find($id);
        $sdlblogLanguage->delete();
        return redirect()->route('languages.index')->with('success','Data Deleted Successfully!');

    }
}
