<?php

namespace App\Http\Controllers;

use File;
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


    public function updateprofilepicture(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=1024,max_height=1024',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $user = User::findOrFail(Auth::user()->id);
        $user->image = $imageName;

        $user->save();

        return back()
            ->with('success','Foto Profil Berhasil di Update');
    }


    public function hapusfoto()
    {
        if(!is_null(Auth::user()->image)){
            unlink(public_path('images/'.Auth::user()->image));
            }else{
            return back()->withFail('Maaf foto sudah terhapus');
            }
        $image = User::where('id',Auth::user()->id);
        $image->update(['image' => null]);

        return back()->withSuccess('Foto berhasil di hapus');
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
        return redirect()->route('profile-dokter')->withSuccess('Profil berhasil diperbarui');
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
        return redirect()->route('profile')->withSuccess('Profil berhasil diperbarui');
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
