<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

//register 
Route::get('/', function () {
    return redirect()->route("login");
});
Route::get('/login', function () {
    return view(view: 'login');
})->name('login');
Route::post('/', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');


//employee
Route::get('/employee/add', function () {
    return view('employee/add');
})->middleware("auth")->name('store.employee');
Route::get('/employee', [EmployeeController::class, 'getAllActive'])->name('getAllEmployee');
// Route::get('/employee/filter', [EmployeeController::class, 'filterByDepartment'])->name('filter.employee');
Route::get('/employee/add', [EmployeeController::class, 'getDepartment'])->name('store.employee');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'getEditEmployee'])->name('get.employee');
Route::post('/employee/edit/{id}', [EmployeeController::class, 'editEmployee'])->name('edit.employee');
Route::post('/employee/add', [EmployeeController::class, 'create'])->name('add_employee');
Route::get('/employee/delete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('delete.employee');



//Department 
Route::get('/department/add', function () {
    return view('department/add');
})->middleware("auth")->name('addDepartment');
Route::get('/department', [DepartmentController::class, 'getAll'])->name('getAllDepartment');
Route::get('/department/edit/{id}', [DepartmentController::class, 'getbyId'])->name('edit_department');
Route::post('/department/add', [DepartmentController::class, 'add'])->name('add');
Route::put('/department/edit/{id}', [DepartmentController::class, 'updateDepartment'])->name('update_department');
Route::get('/department/delete/{id}', [DepartmentController::class, 'deleteDepartment'])->name('delete.department');




