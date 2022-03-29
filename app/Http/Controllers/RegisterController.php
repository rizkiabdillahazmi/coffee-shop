<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
        ]);
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role'] = 'user';

        User::create($validatedData);

        return redirect('/login')->with('sukses','Akun Berhasil dibuat, silahkan Login !');;
    }
}
