<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Default route
Route::get('/', [HomeController::class, "index"]);

// After login route
Route::get('/home', [HomeController::class, "redirects"]);

//Admin dashboard with data
Route::get('/users', [AdminController::class, "index"]);

//Delete user from dashboard
Route::get('/deleteuser/{id}', [AdminController::class, "deleteUser"])->name("user.delete");

//Food menu
Route::get('/foodmenu', [AdminController::class, "foodMenu"])->name('food.foodmenu');

//Food menu CRUD
Route::post('/uploadFood', [AdminController::class, "uploadmenu"]);

Route::get('/deletemenu/{id}', [AdminController::class, "deletemenu"]);

Route::get('/updateview/{id}', [AdminController::class, "updateview"]);

Route::post('/udpate/{id}', [AdminController::class, "updatemenu"])->name('food.update');

//-------

// Reservation
Route::post('/reservation', [AdminController::class, "reservation"])->name('food.reservation');

Route::get('/viewreservation', [AdminController::class, "viewreservation"]);

Route::get('/deletereservation/{id}', [AdminController::class, "deletereservation"])->name('reservation.delete');

//Chef
Route::get('/viewchef', [AdminController::class, "viewchef"])->name('chef.viewchef');

Route::post('/uploadChef', [AdminController::class, "uploadchef"])->name('chef.uploadchef');

Route::get('/deletechef/{id}', [AdminController::class, "deletechef"])->name('chef.deletechef');

Route::get('/updatechefview/{id}', [AdminController::class, "updatechefview"]);

Route::post('/updatechef/{id}', [AdminController::class, "updatechef"])->name('chef.updatechef');

//Cart
Route::post('/addcart/{id}', [HomeController::class, "addCart"])->name('cart.addcart');

Route::get('/showcart/{id}', [HomeController::class, "showCart"])->name('cart.viewcart');

Route::get('/foodinfo/{id}', [HomeController::class, "viewFoodInfo"])->name('cart.foodinfo');

Route::get('/deletecart/{id}', [HomeController::class, "deleteFood"])->name('cart.deletefood');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
