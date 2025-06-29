<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DepartmentController extends Controller
{
    public function getAll()
    {
        $department = Department::get();
        return View("department", compact('department'));
    }

    public function add(Request $request)
    {
        $request->validate(rules: [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        Department::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => User::where('email', 'admin@gmail.com')->get()->first()->id
        ]);
        return redirect('department')->with('message', "New Department has been added");
    }
}
