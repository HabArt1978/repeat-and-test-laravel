<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

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
        // dd($request->all());

        // validate
        $validatedAttributes = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(8)->letters()->numbers(), 'confirmed'], // 'password_confirmation'
        ]);

        // create user
        $newUser = DB::transaction(function () use ($validatedAttributes) {
            $newUser = User::create($validatedAttributes);

            $newUser->employer()->create([
                'name' => "ИП: {$validatedAttributes['first_name']} {$validatedAttributes['last_name']}"
            ]);

            return $newUser;
        });



        // log in
        Auth::login($newUser);

        // redirect
        return redirect('/jobs');
    }
}
