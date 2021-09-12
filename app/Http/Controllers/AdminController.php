<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodChef;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $data = User::all();
        return view("admin.users", compact("data"));
    }

    public function deleteUser($id){
        $data = User::find($id);
        $data->delete();
        
        return redirect()->back()->with('user_deleted', 'User has been successfully deleted.');
    }

    public function foodMenu(){
        $foodData = Food::all();
        return view("admin.foodmenu", compact('foodData'));
    }

    public function uploadmenu(Request $request){
        $data = new Food();
        $image = $request->image;
        
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;

        $data->save();

        return redirect()->back()->with('insert_food', 'Food menu has been successfully saved.');
    }

    public function deletemenu($id){
        $data = Food::find($id);
        $data->delete();

        return redirect()->back()->with('delete_food', 'Food menu has been succesfully deleted.');
    }

    public function updateview($id){
        $data = Food::find($id);
        return view('admin.updateview', compact('data'));
    }

    public function updatemenu(Request $request, $id){
        $data = Food::find($id);

        $image = $request->image;
        
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;

        $data->save();

        return redirect()->route('food.foodmenu')->with('update_food', 'Food menu has been succesfully updated.');
    }

    public function reservation(Request $request){
        $data = new Reservation;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;

        $data->save();

        return redirect()->back();
    }

    public function viewreservation(){
        $data = Reservation::all();
        return view('admin.adminreservation', compact('data'));
    }

    public function deletereservation($id){
        $data = Reservation::find($id);
        $data->delete();

        return redirect()->back()->with('delete_reservation', 'Reservation has been succesfully deleted.');
    }

    public function viewchef(){
        $chefData = FoodChef::all();
        return view('admin.adminchef', compact('chefData'));
    }

    public function uploadchef(Request $request){
        $data = new FoodChef();
        $image = $request->image;
        
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        
        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;

        $data->save();

        return redirect()->back()->with('insert_chef', 'Chef info has been successfully saved.');
    }

    public function deletechef($id){
        $chef = FoodChef::find($id);
        $chef->delete();

        return redirect()->back()->with('delete_chef', 'Chef info has been successfully deleted.');
    }

    public function updatechefview($id){
        $chef = FoodChef::find($id);
        return view('admin.updateChefview', compact('chef'));
    }

    public function updatechef(Request $request, $id){
        $data = FoodChef::find($id);

        $image = $request->image;
        
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        
        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;

        $data->save();

        return redirect()->route('chef.viewchef')->with('update_chef', 'Chef info has been succesfully updated.');
    }
}
