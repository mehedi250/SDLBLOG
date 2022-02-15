<?php

namespace App\Http\Controllers;

use App\Models\SdlblogPost;
use App\Models\SdlblogCatagory;
use App\Models\SdlblogLanguage;
use App\Models\SdlblogTag;
use App\Models\SdlblogPostTag;
use Auth;

use Illuminate\Http\Request;

class SdlblogPostController extends Controller
{
    public function countTag()
    {
        $tags = SdlblogTag::all();
        foreach($tags as $tag){
            $sdlTag = SdlblogTag::find($tag->id);
            $sdlposts = SdlblogPostTag::where('keyword', $sdlTag->keyword)->count();
            $sdlTag->update(['count'=>$sdlposts]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SdlblogPostController::countTag();
        $posts = SdlblogPost::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = SdlblogCatagory::all();
        $languages = SdlblogLanguage::where('status', 1)->get();
        $tags = SdlblogTag::orderby('keyword')->pluck('keyword');
        $data['catagories'] = $catagories;
        $data['languages'] = $languages;
        $data['tags'] = $tags;
        return view('admin.post.create', $data);
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
            'language_id' =>  'required',
            'catagory_id' =>  'required',
            'image' =>  'bail|required|mimes:jpg,jpeg,png,gif',
            'post_body' =>  'required',
        ]);
        $postData = $request->only(['title', 'slug', 'language_id', 'catagory_id', 'post_body', 'short_description']);
    
        if($request->is_published==="on"){
            $postData['is_published'] = 1;  
        }
    
        if ($request->hasFile('image')) {
            $filename = imageName($request->image->getClientOriginalName(), 1, 'blog_image');
            $postData['image'] = $request->file('image')->storeAs('uploads/blog_image', $filename);
        }

        $postData['user_id'] = auth()->id();
        $post = SdlblogPost::create($postData);
        
        if($post && count($request->keyword) > 0){
            $post_id = $post->id;
            foreach($request->keyword as $tag){
                $postTag["post_id"] = $post_id;
                $postTag['keyword'] = $tag;
                SdlblogPostTag::create($postTag);

                $tag_check = SdlblogTag::where('keyword', $tag)->count();
                if($tag_check<1){
                    $sdlTag['keyword']= $tag;
                    SdlblogTag::create($sdlTag);
                }
            }    
        }

        
        return redirect()->route('posts.index')->with('success','Data Added Successfully!');
        
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
    public function edit($id)
    {
        $catagories = SdlblogCatagory::all();
        $languages = SdlblogLanguage::where('status', 1)->get();
        $tags = SdlblogTag::orderby('keyword')->pluck('keyword');
        $post = SdlblogPost::find($id);
        $data['catagories'] = $catagories;
        $data['languages'] = $languages;
        $data['tags'] = $tags;
        $data['post'] = $post;

        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SdlblogPost  $sdlblogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = SdlblogPost::find($id);
        // echo $post->id;
        // exit();
        $request->validate([
            'title' => 'required',
            'slug' => 'bail|required|unique:sdlblog_posts,slug,'.$post->id,
            'language_id' =>  'required',
            'catagory_id' =>  'required',
            'post_body' =>  'required',
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' =>  'bail|required|mimes:jpg,jpeg,png,gif',
            ]);
        }
   
        $postData = $request->only(['title', 'slug', 'language_id', 'catagory_id', 'post_body', 'short_description']);
    
        if($request->is_published==="on"){
            $postData['is_published'] = 1;  
        }
        else{
            $postData['is_published'] = 0;  
        }
    
        if ($request->hasFile('image')) {
            unlinkFile($post->image);
            $filename = imageName($request->image->getClientOriginalName(), 1, 'blog_image');
            $postData['image'] = $request->file('image')->storeAs('uploads/blog_image', $filename);
        }

        $post->update($postData);
        
        if($post && $request->has('keyword')){
            $post_id = $id;
            foreach($request->keyword as $tag){
                $postTag["post_id"] = $post_id;
                $postTag['keyword'] = $tag;
                SdlblogPostTag::create($postTag);

                $tag_check = SdlblogTag::where('keyword', $tag)->count();
                if($tag_check<1){
                    $sdlTag['keyword']= $tag;
                    SdlblogTag::create($sdlTag);
                }
            }    
        }

        
        return redirect()->route('posts.index')->with('success','Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SdlblogPost  $sdlblogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sdlblogPost = SdlblogPost::find($id);
        unlinkFile($sdlblogPost->image);
        $sdlblogPost->delete();
        return redirect()->route('posts.index')->with('success','Data Deleted Successfully!');
    }
}
