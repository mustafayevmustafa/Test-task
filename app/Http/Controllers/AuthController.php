<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('customer.index');
    }

    public function custom_login(Request $request){

        Auth::guard('customer')->attempt($request->only(['email', 'password']));

        return redirect()->back();
    }
}
