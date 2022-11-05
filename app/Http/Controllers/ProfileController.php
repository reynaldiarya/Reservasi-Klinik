<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    const title = 'Profil - dr. Reynaldi';

    public function profile()
    {
        return view('pasien.profilepasien', [
            'title' => self::title
        ]);
    }
    public function profiledokter()
    {
        return view('dokter.profiledokter', [
            'title' => self::title
        ]);
    }
    public function profilestaff()
    {
        return view('staff.profilestaff', [
            'title' => self::title
        ]);
    }

    public function updatepasien(Request $request)
    {
        $user = User::where('id', $request['id'])->first();
        $user->name = $request['name'];
        $user->birthday = $request['birthday'];
        $user->address = $request['address'];
        $user->telp = $request['telp'];


        $user->save();

        return redirect()->back()->withSuccess('Profil berhasil diperbarui');
    }

    public function updatedokter(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'telp' => 'required|numeric',
            'email' => 'required||string|email:dns|max:255|unique:users,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->telp = $request->input('telp');
        $user->email = $request->input('email');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();
        return back()->with('benar', 'Profil berhasil diperbarui');
    }
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'email' => 'required||string|email:dns|max:255|unique:users,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->telp = $request->input('telp');
        $user->email = $request->input('email');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                return redirect()->back()->withInput()->with('benar', 'Profil berhasil diperbarui');
            }
        }

        $user->save();
        return back()->with('benar', 'Profil berhasil diperbarui');
    }
    public function updatestaff(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'telp' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->telp = $request->input('telp');
        $user->email = $request->input('email');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();

        return redirect()->route('profile-staff')->withSuccess('Profil berhasil diperbarui');
    }
}
