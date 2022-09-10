<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birthday' =>'required',
            'address' => 'required',
            'email' => 'email:dns|unique:users|required',
            'telp' => 'numeric|required',
            'password' => 'min:8|required',
            'password_confirmation' => 'min:8|required|same:password'

        ]);
        // $request['password'] = bcrypt($request['password']);


    }
}
