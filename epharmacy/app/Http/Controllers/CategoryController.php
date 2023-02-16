<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =  category::all();
        return view("admin.categories.index", ["categories" => $categories]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view("admin.categories.create", ["categories" => $categories]);
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
            'id' => 'required | unique:categories| numeric | gt:0',
            'name' => 'required | unique:categories|lowercase | alpha',
        ]);
        category::create([
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
        $category = category::findorfail($id);
        return view("admin.categories.show", ["category" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::findorfail($id);
        $categories = category::all();
        return view("admin.categories.edit", ["category" => $category, "categories" => $categories]);
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
        $category = category::findorfail($id);
        $category->update([
            'id' => $request->id,
            'name' => $request->name,
        ]);
        return redirect(route("categories.index"))->with("msg", "edited successfully");
    }

    public function restore_archive($id)
    {
        $category = category::withTrashed()->findOrFail($id);
        $category->restore();
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
        $category = category::findorfail($id);
        $category->delete();
        return redirect(route("categories.index"))->with("msg", "deleted successfully");
    }

}
