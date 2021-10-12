<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Blog::all();
        return view('admin.blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        return view('admin.blog.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'image' => 'required',
        //     'category_id' => 'required',
        // ]);


    $data = new Blog;
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('blogimage'), $imageName);

        $slug = Str::slug($request->title);
        $data->title = $request->title;
        $data->slug = $slug;
        $data->image = $imageName;
        $data->description = $request->description;
        $data->category_id = $request->category;
        $data->save();


        return redirect()->route('blog.index')
            ->with('success','You have successfully Added Blog Post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Blog::find($id);
        return view('admin.blog.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Blog::find($id);
        $cat = Category::all();
        return view('admin.blog.edit', compact('data', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = new Blog;
        $slug = Str::slug($request->title);

    if($request->hasFile('image')){
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('blogimage'), $imageName);
        $data->title = $request->title;
        $data->slug = $slug;
        $data->image = $imageName;
        $data->description = $request->description;
        $data->category_id = $request->category;
        $data->update();
    }
    else {

        $data->title = $request->title;
        $data->slug = $slug;
        $data->description = $request->description;
        $data->category_id = $request->category;
        $data->update();
    }


        return redirect()->route('blog.index')
            ->with('success','You have successfully Added Blog Post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
