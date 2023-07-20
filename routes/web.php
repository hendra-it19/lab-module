<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingpagesController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [LandingpagesController::class, 'home']);
Route::get('/contact', [LandingpagesController::class, 'contact']);
Route::get('/services', [LandingpagesController::class, 'services']);
Route::get('/properties', [LandingpagesController::class, 'properties']);
Route::get('/properties/{id}', [LandingpagesController::class, 'propertiesDetail']);


// route untuk autentikasi / auth user
Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('post-register', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    $title = 'main';
    return view('dashboardpages.dashboard', compact('title'));
})->middleware('auth');
// grouping route
Route::prefix('dashboard')->group(function () {
    Route::resource('properties', PropertyController::class);
})->middleware('auth');
