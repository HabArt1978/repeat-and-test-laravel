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

    public function store(Request $request)
    {
        // dd($request->all());

        // validation
        $validatedAttributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // attempt to login the user
        if (!Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'password' => 'Извините, ваши данные на совпадают.'
            ]);
        }

        // regenerate the session token
        $request->session()->regenerate();

        // redirect
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
