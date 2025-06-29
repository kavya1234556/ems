<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("login");
});
Route::get('/login', function () {
    return view(view: 'login');
})->name('login');

Route::get('/employee', function () {
    return view('/employee');
})->middleware("auth");

Route::get('/department/add', function () {
    return view('department/add');
})->middleware("auth");
Route::get('/employee/add', function () {
    return view('employee/add');
})->middleware("auth");

//register 
Route::post('/', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

//Department 
Route::get('/department', [DepartmentController::class, 'getAll'])->name('getAll');
Route::post('/department/add', [DepartmentController::class, 'add'])->name('add');