<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [LoginController::class, 'user'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::get('/dashboard',[LoginController::class, 'dashboard'])->name('dashboard');

Route::get('/edit-post/{id}',[LoginController::class,'update']);
Route::post('/update',[LoginController::class,'edit'])->name('update');
Route::get('/delete/{id}',[LoginController::class,'delete']);

Route::get('/userdashboard',[LoginController::class,'viewUser'])->name('userdashboard');
Route::get('/logout',[LoginController::class, 'logout']);

Route::post('/search',[LoginController::class,'search']);
