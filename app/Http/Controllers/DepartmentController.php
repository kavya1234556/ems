<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DepartmentController extends Controller
{
    public function getAll()
    {
        $department = Department::latest()->get();
        return view("department.view", compact('department'));
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
        return redirect('department/view')->with('success', "New Department has been added");
    }
    public function getbyId(string $id)
    {
        $department = Department::findOrFail($id);
        return view("department.edit", compact('department'));
    }
    public function updateDepartment(Request $request, string $id)
    {
        $request->validate(rules: [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        $department = Department::findOrFail($id);

        $department->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('department/view')->with('success', "Department has been edited");
    }

    public function deleteDepartment(string $id)
    {
        $department = Department::findOrFail($id);
        $filteredValue = Employee::where('dept_id', $department->id)->get()->count();
        if ($filteredValue > 1) {
            return redirect()->back()->with('error', "Departments with active account cannot be deleted");
        } else {
            $department->delete();
            return redirect()->back()->with('success', 'Department deleted successfully');
        }


    }
}
