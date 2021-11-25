<?php

namespace App\Http\Controllers;

use App\Models\Chefs;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Faker\Provider\pt_BR\check_digit;

class AdminController extends Controller
{
    public function getUsers(){
        $user = User::all();
        return view('admin.users', compact('user'));
    }

    public function delete_users($id){
        $data=User::find($id);
        $data->delete();
        return redirect()->back()->with('message','User delete Successfully');
    }

    public function add_food_menu(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                return view('admin.addfoodmenu');

            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }

    }

    public function uploadmenu(Request $request){
        $data = new Food();

        $image = $request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('menuimage',$imagename);

        $data->image=$imagename;

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;

        $data->save();

        return redirect()->back()->with('message','FoodMenu added Successfully');
    }

    public function showfoodmenu(){
        $data=Food::all();
        return view('admin.showfoodmenu',compact('data'));

    }

    public function updateview($id){
        $data = Food::find($id);
        return view('admin.updateview',compact('data'));
    }

    public function updatemenu(Request $request, $id){
        $data = Food::find($id);
        $image = $request->file;

        if ($image){
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->file->move('menuimage', $imagename);
            $data->image = $imagename;
        }
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;

        $data->save();

        return redirect()->back()->with('message','Menu edited Successfully');
    }

    public function deletemenu($id){
        $data = Food::find($id);
        $data->delete();
        return redirect()->back()->with('message','Menu delete Successfully');
    }

    public function showreservation(){
        $data = Reservation::all();
        return view('admin.showreservation',compact('data'));
    }

    public function deletereservation($id){
        $data = Reservation::find($id);
        $data->delete();
        return redirect()->back()->with('message','Reservation delete Successfully');
    }

    public function showchefs(){
        $data = Chefs::all();
        return view('admin.showchefs',compact('data'));
    }

    public function add_chefs(Request $request){
        $data = new Chefs();

        $image = $request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('chefsimage',$imagename);

        $data->image=$imagename;

        $data->name=$request->name;
        $data->speciality=$request->speciality;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->instagram=$request->instagram;

        $data->save();

        return redirect()->back()->with('message','Chefs added Successfully');
    }


    public function show_addchefs(){
        return view('admin.addchefs');
    }

    public function delete_chefs($id){
        $data = Chefs::find($id);
        $data->delete();
        return redirect()->back()->with('message','Chefs deleted Successfully');
    }

    public function show_edit_chefs($id){
        $data = Chefs::find($id);
        return view('admin.showUpdateChefs',compact('data'));
    }

    public function edit_chefs(Request $request, $id){
        $data = Chefs::find($id);
        $image = $request->file;

        if ($image){
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->file->move('chefsimage', $imagename);
            $data->image = $imagename;
        }
        $data->name=$request->name;
        $data->speciality=$request->speciality;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->instagram=$request->instagram;

        $data->save();
        return redirect()->back()->with('message','Chefs edited Successfully');
    }





}
