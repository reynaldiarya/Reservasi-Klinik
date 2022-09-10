<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    const title = 'dr. Reynaldi - Specialist Penyakit Cinta || Register';

    public function index()
    {
        # code...
        return view('auth.register',[
            'title' => self::title
        ]);
    }
    public function register(Request $request)
    {
        $valid =  $request->validate([
            'name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'email' => 'email:dns|unique:users|required',
            'telp' => 'numeric|required',
            'password' => 'min:8|required',
            'password_confirmation' => 'min:8|required|same:password'

        ]);
        $valid['password'] = bcrypt($request['password']);
        User::create($valid);
        return view('auth.login', [
            'registberhasil' => 'true',
            'email' => $valid['email'],
            'title' => 'dr. Reynaldi - Specialist Penyakit Cinta'

        ]);
    }
}
