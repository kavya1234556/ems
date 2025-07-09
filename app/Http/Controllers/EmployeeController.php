<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use File;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getAllActive()
    {
        $employees = Employee::with('departments')->get();
        return view("employee", compact("employees"));
    }
    public function getDepartment()
    {
        $departments = Department::all();
        return view("employee.add", compact('departments'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|max:10|min:10',
            'position' => 'required|string',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dept_id' => 'required|numeric'
        ]);

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'salary' => $request->salary,
            'image' => $request->file('image')->store('images', 'public'),
            'hire_date' => $request->hire_date,
            'dept_id' => $request->dept_id
        ]);
        return redirect('employee')->with('message', "New Employee has been added");
    }
    public function getEditEmployee(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        return view('employee.edit', compact("employee", "departments"));
    }
    public function editEmployee(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|max:10|min:10',
            'position' => 'required|string',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dept_id' => 'required|numeric'
        ]);

        $employee = Employee::findOrFail($id);

        $data = $request->only([
            'first_name',
            'last_name',
            'email',
            'phone',
            'position',
            'salary',
            'hire_date',
            'dept_id'
        ]);
        if ($request->hasFile('image')) {

            $oldImagePath = 'storage/' . $employee->image;
            if (File::exists(public_path($oldImagePath))) {
                File::delete(public_path($oldImagePath));
            }

            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $employee->update($data);

        return redirect('employee')->with('message', "Employee detail has been updated");
    }


    public function deleteEmployee(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->back();
    }
}
