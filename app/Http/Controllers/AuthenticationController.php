<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('authentication.v-login');
    }
    public function register()
    {
        return view('authentication.v-registration');
    }
    public function userLogin(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/banner');
        }
        return back()->with('loginEror', 'Gagal login !!');
    }
    public function userRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|unique:users|min:3|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['roles_id'] = 2;
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Data berhasil tersimpan !! Silahkan login !!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
