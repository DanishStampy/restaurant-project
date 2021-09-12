<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\FoodChef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data = Food::all();
        $chefData = FoodChef::all();
        return view('home', compact('data', 'chefData'));
    }

    public function redirects(){
        $data = Food::all();
        $chefData = FoodChef::all();

        $usertype = Auth::user()->usertype;

        if($usertype == '1'){
            return view('admin.adminhome');
        }else{
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
            return view('home', compact('data', 'chefData', 'count'));
        }
    }

    public function addCart(Request $request, $id){

        if(Auth::id()){
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;

            $cart = new Cart();

            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;

            $cart->save();

            return redirect()->back()->with('insert_cart', 'Food item has been successfully inserted.');
        }else{
            return redirect('/login');
        }
    }

    public function showCart(Request $request, $id) {

        if(Auth::id() == $id){

            $data = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
            return view('cart', compact('data'));
        }else{
            return redirect()->back();
        }
    }

    public function viewFoodInfo($id){

        $data = Food::find($id);

        return view('foodinfo', compact('data'));
    }

    public function deleteFood($id){

        $userid = Auth::id();

        Cart::where('user_id',$userid)
            ->where('food_id',$id)
            ->delete();

        return redirect()->back()->with('delete_cart', 'Food item has been successfully deleted.');
    }

}
