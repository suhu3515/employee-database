<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'mobile' => 'required|digits:10',
            'email_address' => 'required|email',
            'permanent_address' => 'required',
        ],[ 'required' => 'This field is required']);

        $data = $request->all();
        $status = Employee::create($data);
        if($status)
        {
            Toastr::success('Employee created successfully', 'success');
            return redirect()->route('employees.index');
        }
        else
        {
            Toastr::error('Some error occurred', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'mobile' => 'required|digits:10',
            'email_address' => 'required|email',
            'permanent_address' => 'required',
        ],[ 'required' => 'This field is required']);

        $data = $request->all();
        $employee = Employee::find($id);
        $status = $employee->update($data);
        if($status)
        {
            Toastr::success('Employee updated successfully', 'success');
            return redirect()->route('employees.index');
        }
        else
        {
            Toastr::error('Some error occurred', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        if($employee)
        {
            $employee->delete();
            Toastr::success('Employee deleted successfully', 'Success');
            return redirect()->route('employees.index');
        }
        else
        {
            Toastr::error('Some error occurred', 'Error');
            return redirect()->back();
        }
    }
}
