<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;

class companyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies =  company::all();
        return view("admin.companies.index", ["companies" => $companies]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = company::all();
        return view("admin.companies.create", ["companies" => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required | unique:companies| numeric | gt:0',
            'name' => 'required | unique:companies|lowercase | alpha',
        ]);
        company::create([
            'id' => $request->id,
            'name' => $request->name,
        ]);
        return redirect()->back()->with("msg", "added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = company::findorfail($id);
        return view("admin.companies.show", ["company" => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = company::findorfail($id);
        $companies = company::all();
        return view("admin.companies.edit", ["company" => $company, "companies" => $companies]);
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
        $validate = $request->validate([
            'id' => 'required | numeric | gt:0',
            'name' => 'required | alpha',
        ]);
        $company = company::findorfail($id);
        $company->update([
            'id' => $request->id,
            'name' => $request->name,
        ]);
        return redirect(route("companies.index"))->with("msg", "edited successfully");
    }

    public function restore_archive($id)
    {
        $company = company::withTrashed()->findOrFail($id);
        $company->restore();
        return redirect()->back()->with("msg", "edited successfully");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = company::findorfail($id);
        $company->delete();
        return redirect(route("companies.index"))->with("msg", "deleted successfully");
    }

}
