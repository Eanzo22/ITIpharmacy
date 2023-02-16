<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =  User::all();
        return view("admin.users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "2eshta";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findorfail($id);
        return view("admin.users.show", ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorfail($id);
        return view("admin.users.edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'id' => 'required | numeric | gt:0',
            'name' => 'required  | alpha',
            'address' => 'required  | alpha',
            'email' => 'required |email',
            'password' => 'required | min:5' ,
        ]);
        $user = User::findorfail($id);
        $user->update([
            'id' => $request->id,
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect(route("users.index"))->with("msg", "edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect(route("users.index"))->with("msg", "deleted successfully");
    }
}
