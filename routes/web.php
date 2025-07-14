<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

//register 
Route::get('/', function () {
    return redirect()->route("login");
});
Route::get('/login', function () {
    return view(view: 'login');
})->name('login')->middleware("guest");
Route::post('/', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//employee
Route::get('/employee/add', function () {
    return view('employee/add');
})->middleware("auth")->name('store.employee');
Route::get('/employee/view', [EmployeeController::class, 'getAllActive'])->middleware("auth")->name('getAllEmployee');
// Route::get('/employee/filter', [EmployeeController::class, 'filterByDepartment'])->name('filter.employee');
Route::get('/employee/add', [EmployeeController::class, 'getDepartment'])->middleware("auth")->name('store.employee');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'getEditEmployee'])->middleware("auth")->name('get.employee');
Route::post('/employee/edit/{id}', [EmployeeController::class, 'editEmployee'])->middleware("auth")->name('edit.employee');
Route::post('/employee/add', [EmployeeController::class, 'create'])->middleware("auth")->name('add_employee');
Route::get('/employee/delete/{id}', [EmployeeController::class, 'deleteEmployee'])->middleware("auth")->name('delete.employee');
Route::get('/employee/restore/{id}', [EmployeeController::class, 'restoreEmployee'])->middleware("auth")->name('restore.employee');
Route::get('/employee/restore', [EmployeeController::class, 'getAllDeletedEmployee'])->middleware("auth")->name('get.all.deleted.employee');



//Department 
Route::get('/department/add', function () {
    return view('department/add');
})->middleware("auth")->name('addDepartment');
Route::get('/department/view', [DepartmentController::class, 'getAll'])->middleware("auth")->name('getAllDepartment');
Route::get('/department/edit/{id}', [DepartmentController::class, 'getbyId'])->middleware("auth")->name('edit_department');
Route::post('/department/add', [DepartmentController::class, 'add'])->middleware("auth")->name('add');
Route::put('/department/edit/{id}', [DepartmentController::class, 'updateDepartment'])->middleware("auth")->name('update_department');
Route::get('/department/delete/{id}', [DepartmentController::class, 'deleteDepartment'])->middleware("auth")->name('delete.department');



//Dashboard
Route::get('/dashboard', [DashboardController::class, 'getTotal'])->middleware("auth")->name("get.total");
