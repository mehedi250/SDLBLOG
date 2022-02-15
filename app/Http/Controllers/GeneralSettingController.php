<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = GeneralSetting::first();
        return view('admin.setting.index', compact('setting'));
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
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $generalSetting = GeneralSetting::find($id);
        // echo $post->id;
        // exit();
        $request->validate([
            'site_name' => 'required',
        ]);
        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' =>  'bail|required|mimes:jpg,jpeg,png,gif',
            ]);
        }
   
        $postData = $request->only(['site_name', 'facebook_link', 'twitter_link']);

        if ($request->hasFile('logo')) {
            unlinkFile($generalSetting->logo);
            $filename = imageName($request->logo->getClientOriginalName(), 1, 'site_logo');
            $postData['logo'] = $request->file('logo')->storeAs('uploads/logo', $filename);
        }

        $generalSetting->update($postData);
        

        return redirect()->route('general-setting.index')->with('success','Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
