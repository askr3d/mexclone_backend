<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view("auth.guest.register");
    }

    public function store(RegisterRequest $request){
        User::create([
            "name" => $request->name,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
        ]);

        auth()->attempt($request->only("email","password"));


        return redirect()->route("admin.index");
    }
}
