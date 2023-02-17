<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\drug;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class welcomePageController extends Controller
{
    public function index()
    {
        $drugs =  drug::all();
        $categories =  category::all();
        return view("welcome", ["drugs" => $drugs , "categories"=> $categories]);
    }
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
}
