<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\Company;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::dropDownCompany();
        return view("employee.create", compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'), Employee::rules(), Employee::message());
        if ($validator->fails()) 
            return redirect()->route('employee.create')->withErrors($validator)->withInput();

        $employee = Employee::create($request->all());
        if($employee){
            $request->session()->flash('success', 'Data berhasil di simpan');
            return redirect()->route('employee.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $company  = Company::dropDownCompany();
        return view('employee.edit', compact('employee','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->except('_token'), Employee::rules(), Employee::message());
        if ($validator->fails()) 
            return redirect()->route('employee.edit', ["id" => $id])->withErrors($validator)->withInput(); 

        $employee = Employee::find($id)->update($request->all());
        if($employee){
            $request->session()->flash('success', 'Data berhasil di update');
            return redirect()->route('employee.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        if($employee){
            Employee::find($id)->delete();
            $request->session()->flash('success', 'Data berhasil di hapus');
            return redirect()->route('employee.index');
        }
    }
}
