<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/',[HomeController::class,'index']);
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/users', [AdminController::class,'getUsers']);
Route::get('/delete_users/{id}',[AdminController::class,'delete_users']);
Route::get('/addfoodmenu',[AdminController::class,'add_food_menu']);
Route::post('/uploadmenu',[AdminController::class,'uploadmenu']);
Route::get('/showfoodmenu',[AdminController::class,'showfoodmenu']);
Route::get('/updateview/{id}',[AdminController::class,'updateview']);
Route::post('/updatemenu/{id}',[AdminController::class,'updatemenu']);
Route::get('/deletemenu/{id}',[AdminController::class, 'deletemenu']);
Route::post('/reservation',[HomeController::class, 'reservation']);
Route::get('/showreservation',[AdminController::class, 'showreservation']);
Route::get('/deletereservation/{id}',[AdminController::class, 'deletereservation']);
Route::get('/showchefs',[AdminController::class, 'showchefs']);
Route::post('/addchefs',[AdminController::class, 'add_chefs']);
Route::get('/show_addchefs',[AdminController::class, 'show_addchefs']);
Route::get('/delete_chefs/{id}',[AdminController::class, 'delete_chefs']);
Route::post('/edit_chefs/{id}',[AdminController::class,'edit_chefs']);
Route::get('/show_edit_chefs/{id}',[AdminController::class, 'show_edit_chefs']);

