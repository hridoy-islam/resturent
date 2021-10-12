<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){
        $data = Food::all();
        $chefs = Chef::all();
        return view('home', compact('data', 'chefs'));
    }

    public function checkuser(){

        $userType = Auth::user()->usertype;
        if($userType === '1'){
            return view('admin.home');
        }
        else {
            return view('home');
        }
    }
    public function booking(Request $request){

       //dd($request);

        $data = new Reservation;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->number_guests = $request->number_guests;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();

        return redirect()->back();
    }
}
