<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("login");
});
Route::get('/login', function () {
    return view(view: 'login');
})->name('login');
Route::get('/home', function () {
    return view('home');
})->middleware("auth");


//register 
Route::post('/', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');