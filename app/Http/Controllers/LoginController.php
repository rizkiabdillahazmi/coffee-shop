<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        // return $request;
        // $credentials = $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array($fieldType => $credentials['username'], 'password' => $credentials['password'])))
        {
            if (auth()->user()->role == 'user') {
                return redirect('/');
            }
            if (auth()->user()->role == 'admin') {
                return redirect('/admin');
            }
        }
        else{
            return redirect('/login')->with('gagal','Username atau Password Salah');
        }

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     // return redirect()->intended('/admin');
        //     if (auth()->user()->role == 'user') {
        //         return redirect('/');
        //     }
        //     if (auth()->user()->role == 'admin') {
        //         return redirect('/admin');
        //     }
        //     // if (auth()->user()->role == 'karyawan') {
        //     //     return redirect('/admin');
        //     // }
        // }

        // return back()->with('loginError', 'Login Failed !');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
