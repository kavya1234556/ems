<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getTotal()
    {
        $departments = Department::get()->count();
        $employees = Employee::get()->count();
        $employeesDeleted = Employee::onlyTrashed()->count();
        return view('/dashboard', compact('departments', 'employees', 'employeesDeleted'));
    }
}
