<?php

namespace App\Http\Controllers;

use App\Models\drug;
use App\Models\order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders =  order::all();
        return view("admin.orders.index", ["orders" => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $drug = drug::findorfail($id);
        $user = Auth::user() ; 
        return view("user.orders.create" , ["drug"=>$drug  , "user" =>$user] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "sdfdsf" ; 
        $drug = drug::where('name', $request->drugName)->get() ;
        $user = Auth::user() ; 
        $validate = $request->validate([
            'quantity' => 'required | numeric|gt:0 |max:'. $drug[0]->quantity,
        ]);
        order::create([
            'quantity' => $request->quantity,
            'price'=>$request->price *  $request->quantity, 
            'drug_id' => $drug[0]->id , 
            'user_id'=>  $user->id 
        ]);
        return redirect(route("home"))->with("msg", "added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = order::findorfail($id) ; 
        return view("admin.orders.show" , ["order"=>$order]) ; 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request , $id)
    {
        $order = order::findorfail($id);
        return view("admin.orders.edit", ["order" => $order] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $validate = $request->validate([
            'quantity' => 'required | numeric |gt:0'
        ]);
        $order = order::findorfail($id);
        $order->update([
            'quantity' => $request->quantity,
        ]);
        return redirect(route("orders.index"))->with("msg", "edited successfully");
    }

    public function restore_archive($id)
    {
        $order = order::withTrashed()->findOrFail($id);
        $order->restore();
        return redirect()->back()->with("msg", "edited successfully");
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = order::findorfail($id);
        $order->delete();
        return redirect(route("orders.index"))->with("msg", "deleted successfully");
    }
}
