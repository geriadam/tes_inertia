<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyFormRequest;
use Illuminate\Http\Request;
use App\Model\Company;
use Validator;
use File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("company.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {
        if($request->has('file')){
            $file_name = Company::upload($request->file('file'));
            $request->request->add(['company_logo' => $file_name]);
        }


        $company = Company::create($request->all());
        if($company){
            $request->session()->flash('success', 'Data berhasil di simpan');
            return redirect()->route('company.index');
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
        $company   = Company::findOrFail($id);
        $employees = $company->employee()->paginate(10);
        return view('company.show', compact('company','employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, $id)
    {
        $company = Company::find($id);

        if($request->has('file')){

            // delete file
            unlink(Company::IMAGE_STORAGE.$company->company_logo);

            $file_name = Company::upload($request->file('file'));
            $request->request->add(['company_logo' => $file_name]);
        }

        $company->update($request->all());

        if($company){
            $request->session()->flash('success', 'Data berhasil di update');
            return redirect()->route('company.index');
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
        $company = Company::findOrFail($id);
        if($company){
            Company::find($id)->delete();
            $request->session()->flash('success', 'Data berhasil di hapus');
            return redirect()->route('company.index');
        }
    }
}
