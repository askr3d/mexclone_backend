<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view("auth.guest.login");
    }

    public function store(LoginRequest $request){
        if(!auth()->attempt($request->only("email","password"))){
            return back()->with("mensaje","Credenciales Incorrectas");
        }
        return redirect()->route('admin.dashboard');
    }
}
