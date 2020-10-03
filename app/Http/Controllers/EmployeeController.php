<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();
        return response($employees, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['numeric', 'exists:users,id', 'unique:employees,user_id'],
            'fullname' => ['required', 'string', 'max:255'],
            'bod' => ['required', 'date'],
            'gender' => ['required', 'boolean'],
            'join_date' => ['required', 'date'],
            'job_title' => ['required', 'string', 'max:255'],
        ]);

        $employee = Employee::create($request->only('user_id', 'fullname', 'bod', 'gender', 'join_date', 'job_title'));

        return response($employee, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return response($employee, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'user_id' => ['numeric', 'exists:users,id', 'unique:employees,user_id'],
            'fullname' => ['required', 'string', 'max:255'],
            'bod' => ['required', 'date'],
            'gender' => ['required', 'boolean'],
            'join_date' => ['required', 'date'],
            'job_title' => ['required', 'string', 'max:255'],
        ]);

        if (!$request->all()) {
            return response('No parameter', 422);
        }

        $employee->update([
            'user_id' => $request->input('user_id', $employee->user_id),
            'fullname' => $request->input('fullname', $employee->fullname),
            'bod' => $request->input('bod', $employee->bod),
            'gender' => $request->input('gender', $employee->gender),
            'join_date' => $request->input('join_date', $employee->join_date),
            'job_title' => $request->input('job_title', $employee->job_title),
        ]);

        return response($employee, 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employeeOld = $employee;
        $employee->delete();

        return response("$employeeOld->fullname has deleted", 200);
    }
}
