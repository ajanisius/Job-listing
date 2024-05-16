<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_atributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],

        ]);

        $employer_atributes = $request->validate([
            'employer' => ['required'],
        ]);

        $user = User::create($user_atributes);

        $user->employer()->create([
            'name' => $employer_atributes['employer'],
        ]);
        Auth::login($user);

        return redirect('/');
    }
}
