<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    function register (Request $request){
        return view("register");
    }
    function handleRegister (Request $request){
        
        $validate = $request->validate([
            'name' => 'required |alpha',
            'address' => 'required ',
            'email'=>'required |email' , 
            'password' => 'required |min:5 ' 
        ]); 
        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email'=>$request->email , 
            'password' => Hash:: make($request->password) ,
        ]);
        Auth::login($user) ;
        return redirect(route("home"))->with("msg", "added successfully");
    }
    function login (Request $request){
        return view("login");
    }

    function handleLogin (Request $request){
        $request->validate([
            'email'=> 'required|email' ,
            'password'=>'required' 
        ]);
        $is_login = Auth::attempt(['email'=>$request->email , 'password'=>$request->password ]) ; 
        if (!$is_login) {
            return redirect()->back() ; 
        }
        if (Auth::user()->isAdmin == 0){
            return redirect(route("home")) ; 
        }
        else if (Auth::user()->isAdmin == 1) {
            return redirect(route("home")) ;
        }
    }
    function logout (Request $request){
        Auth::logout() ; 
        return redirect(route("home")) ;  
    }
    
}
