<?php

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

Route::get('/dashboard', function () {
    $title = 'main';
    return view('dashboardpages.dashboard', compact('title'));
});

Route::get('/login', function () {
    return view('authpages.login');
});
Route::get('/register', function () {
    return view('authpages.register');
});

// grouping route
Route::prefix('dashboard')->group(function () {
    Route::resource('properties', PropertyController::class);
});
