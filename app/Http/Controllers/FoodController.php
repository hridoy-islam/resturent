<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Food::all();
        return view('admin.food.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Food;
        $request->validate([
            'title' => 'required|unique:food',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('foodimage'), $imageName);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->image = $imageName;
        $data->save();

        return back()
            ->with('success','You have successfully Added Food');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Food::find($id);
        return view('admin.food.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image',
        ]);

        $data = Food::find($id);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('foodimage'), $imageName);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->image = $imageName;
        $data->update();
        return back()
            ->with('success','You have successfully Updated Food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Food::find($id);
        $data->delete();
        return back()
            ->with('success','You have successfully Deleted Food');

    }
}
