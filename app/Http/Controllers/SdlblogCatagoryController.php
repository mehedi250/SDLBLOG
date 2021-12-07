<?php

namespace App\Http\Controllers;

use App\Models\SdlblogCatagory;
use App\Models\SdlblogLanguage;
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
        return view('admin.catagory.index', compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = SdlblogLanguage::where('status', 1)->get();
        return view('admin.catagory.create',compact('languages'));
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
        return redirect()->route('catagories.index')->with('success','Data Added Successfully!');
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
    public function edit($id)
    {
        $catagory = SdlblogCatagory::find($id);
        $languages = SdlblogLanguage::where('status', 1)->get();
        $data['catagory'] = $catagory;
        $data['languages'] = $languages;
        return view('admin.catagory.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SdlblogCatagory  $sdlblogCatagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $catagory = SdlblogCatagory::find($id);
        $request->validate([
            'name' => 'bail|required|max:60',
            'slug' => 'bail|required|unique:sdlblog_catagories,slug,'.$catagory->id,
            'language_id' => 'required',
        ]);

        $postData = $request->only(['name', 'slug', 'description', 'language_id']);
        $catagory->update($postData);
        return redirect()->route('catagories.index')->with('success','Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SdlblogCatagory  $sdlblogCatagory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catagory = SdlblogCatagory::find($id);
        $catagory->delete();
        return redirect()->route('catagories.index')->with('success','Data Deleted Successfully!');
    }
}
