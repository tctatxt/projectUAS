<?php

use App\Models\City;
use App\Models\User;
use App\Models\Field;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    $people = User::all();
    return view('home', compact('people'));
});

Route::get('/register', function () {
    $fields = Field::all();
    $cities = City::all();
    return view('register', compact('cities', 'fields'));
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/payment', function () {
    return view('payment');
});

Route::post('/registerAcc', [RegisterController::class, 'addUser']);
Route::post('/loginAcc', [RegisterController::class, 'loginUser']);
Route::post('/paymentAcc', [UserController::class, 'payment']);
Route::post('/pricekurangin', [UserController::class, 'pricekurang']);
Route::post('/pricebiasa', [UserController::class, 'pricebiasa']);
Route::post('/selectgender', [UserController::class, 'selectgender']);
Route::post('/yukconnect', [UserController::class, 'yukconnect']);
Route::post('/connect', [UserController::class, 'connect'])->middleware('auth');

Route::fallback(function () {
    return view('login');
});

Route::get('/logout', [UserController::class, 'logout']);
