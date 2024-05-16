<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    //Log In 
    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Check Login credentials.'
            ]);
        }
        request()->session()->regenerate();

        return redirect('/');
    }

    //Log Out
    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
