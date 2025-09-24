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
        if (Auth::attempt($validatedAttributes)) {
            //  regenerate the session token
            $request->session()->regenerate();
            // redirect
            return redirect('/');
        }

        //
        return back()->withErrors([
            'email' => 'Предоставленные учетные данные не соответствуют нашим записям.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        // https://laravel.com/docs/12.x/authentication#logging-out
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
