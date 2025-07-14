<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use File;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // public function getAllActive()
    // {
    //     $employees = Employee::with('departments')->latest()->paginate(10);
    //     $departments = Department::get();
    //     return view("employee", compact("employees", "departments"));
    // }
    public function getDepartment()
    {
        $departments = Department::all();
        return view("employee.add", compact('departments'))
        ;
    }
    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:employees,email',
            'phone' => 'required|max:10|min:10',
            'position' => 'required|string',
            'salary' => 'required|numeric|gt:0',
            'hire_date' => 'required|date|before:today',
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
        return redirect('employee/view')->with('success', "New Employee has been added");
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
            'email' => 'required|email',
            'phone' => 'required|max:10|min:10',
            'position' => 'required|string',
            'salary' => 'required|numeric|gt:0',
            'hire_date' => 'required|date|before:today',
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

        return redirect('employee/view')->with('success', "Employee detail has been updated");
    }
    public function getAllActive(Request $request)
    {
        $departments = Department::get();
        $query = Employee::query();
        $id = $request->dept_id;
        $searchData = $request->input('search');
        if ($id) {

            $department = Department::findOrFail($id);
            $query->where('dept_id', $department->id);
        }
        if ($searchData) {

            $query->where(function ($query) use ($searchData) {
                $query->where('first_name', 'like', '%' . $searchData . '%')->orWhere('last_name', 'like', '%' . $searchData . '%');
            });
        }
        $employees = $query->with('departments')->latest()->paginate(10);
        return view("employee.view", compact('employees', 'departments'));
    }


    public function deleteEmployee(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->back()->with("success", "Deleted the employee successfully");
    }

    public function getAllDeletedEmployee(Request $request)
    {
        $departments = Department::get();
        $query = Employee::query()->onlyTrashed();
        $id = $request->dept_id;
        $searchData = $request->input('search');
        // dd($searchData);
        if ($id) {

            $department = Department::findOrFail($id);
            $query->where('dept_id', $department->id);
        }
        if ($searchData) {
            // dd($searchData);
            // $query->where('first_name', 'like', '%' . $searchData . '%')->orWhere('last_name', 'like', '%' . $searchData . '%');

            $query->where(function ($query) use ($searchData) {
                $query->where('first_name', 'like', '%' . $searchData . '%')->orWhere('last_name', 'like', '%' . $searchData . '%');
            });
        }
        // dd($query);
        $employees = $query->paginate(10);
        // dd($employees);
        //  else {
        //     $employees = Employee::with('departments')->latest()->paginate(10);
        // }
        return view("employee.restore", compact('employees', 'departments'));
    }
    public function restoreEmployee(string $id)
    {
        $employee = Employee::onlyTrashed()->findOrFail($id);
        $employee->restore();
        return redirect()->back()->with("success", "Restored the employee successfully");
    }

}
