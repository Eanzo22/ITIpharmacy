<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    function register (Request $request){
        return view("register");
    }
    
}
