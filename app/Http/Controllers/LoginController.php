<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //
    const title = 'dr. Reynaldi - Specialist Penyakit Cinta || Login';

    public function index()
    {
        return view('auth.login', [
            'title' => self::title
        ]);
    }
    public function login(Request $req)
    {

        $data = $req->validate([
            'email' => 'email:dns|required',
            'password' => 'required'
        ]);

        $email = $data['email'];
        $password = $data['password'];

        if (Auth::attempt(array('email' => $email, 'password' => $password))) {
            // return Redirect::intended('dashboard');
            return "Redirect::intended('dashboard')";
        }
        
       return back()->with('salah','Silahkan cek kembali email atau password anda')->with('email',$email);
    }
}
