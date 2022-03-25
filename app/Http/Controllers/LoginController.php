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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return redirect()->intended('/admin');
            if (auth()->user()->role == 'user') {
                return redirect('/');
            }
            if (auth()->user()->role == 'admin') {
                return redirect('/admin');
            }
            // if (auth()->user()->role == 'karyawan') {
            //     return redirect('/admin');
            // }
        }

        return back()->with('loginError', 'Login Failed !');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}