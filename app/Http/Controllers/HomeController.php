<?php

namespace App\Http\Controllers;

use App\Models\Chefs;
use App\Models\Food;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else{
            $data = Food::all();
            $showchefs = Chefs::all();
            return view('user.home',compact('data','showchefs'));
        }
    }

    public function index(){
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else{
            $data = Food::all();
            $showchefs = Chefs::all();
            return  view('user.home',compact('data', 'showchefs') );

        }
    }

    public function reservation(Request $request){
        $data = new Reservation();

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone_number;
        $data->guest=$request->guest_number;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;

        $data->save();
        return redirect()->back();

    }




}
