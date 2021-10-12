<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Chef::all();
        return view('admin.chef.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Chef;
        $request->validate([
            'name' => 'required|unique:chefs',
            'title' => 'required',
            'image' => 'required|image',
            'facebook'=> 'required',
            'twitter'=> 'required',
            'instagram'=> 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('chefsimage'), $imageName);

        $data->name = $request->name;
        $data->title = $request->title;
        $data->image = $imageName;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;
        $data->save();

        return back()
            ->with('success','You have successfully Added Chef');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function show(Chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Chef::find($id);
        return view('admin.chef.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'image' => 'required|image',
            'facebook'=> 'required',
            'twitter'=> 'required',
            'instagram'=> 'required',
        ]);
        $data = Chef::find($id);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('chefsimage'), $imageName);

        $data->name = $request->name;
        $data->title = $request->title;
        $data->image = $imageName;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;
        $data->save();

        return back()
            ->with('success','You have successfully Updated Chef');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Chef::find($id);
        $data->delete();
        return back()
            ->with('success','You have successfully Deleted Chef');
    }
}
