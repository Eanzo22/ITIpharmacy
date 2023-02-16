<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\drug;
use App\Models\company;

class drugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs =  drug::all();
        return view("admin.drugs.index", ["drugs" => $drugs]);
    }
    public function archive()
    {
        $drugs =  drug::onlyTrashed()->get();
        return view("admin.drugs.archive", ["drugs" => $drugs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = company::all();
        return view("admin.drugs.create", ["companies" => $companies]);
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
            'id' => 'required | unique:drugs| numeric | gt:0',
            'name' => 'required | unique:drugs| alpha',
            'quantity' => 'required | numeric |gt:0',
            'company' => 'required | numeric ' , 
            'image'=>'required ' , 
            'price' => 'required | numeric ' 
        ]);
        $img = $request->file("image");
        $ext = $img->getClientOriginalExtension();
        $img_name = "drug-$request->id.$ext";

        $img->move(public_path("images\drugs"), $img_name);
        drug::create([
            'id' => $request->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price'=>$request->price , 
            'company_id' => $request->company,
            'image' => $img_name
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
        $drug = drug::findorfail($id);
        return view("admin.drugs.show", ["drug" => $drug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drug = drug::findorfail($id);
        $companies = company::all();
        return view("admin.drugs.edit", ["drug" => $drug, "companies" => $companies]);
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
            'name' => 'required  | alpha',
            'quantity' => 'required | numeric |gt:0',
            'company' => 'required | numeric ' , 
            'price' => 'required | numeric '
        ]);
        $drug = drug::findorfail($id);
        $drug->update([
            'id' => $request->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'company_id' => $request->company , 
            'price'=>$request->price
        ]);
        return redirect(route("drugs.index"))->with("msg", "edited successfully");
    }

    public function restore_archive($id)
    {
        $drug = drug::withTrashed()->findOrFail($id);
        $drug->restore();
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
        $drug = drug::findorfail($id);
        $drug->delete();
        return redirect(route("drugs.index"))->with("msg", "deleted successfully");
    }
    public function destroy_archive($id)
    {
        $drug = drug::withTrashed()->findorfail($id);
        $drug->forceDelete();
        return redirect(route("drugs.archive"))->with("msg", "deleted successfully");
    }
}
