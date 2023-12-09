<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //show register page
    public function create()
    {
        return view('users.register');
    }

    //store new user
    public function store(Request $request)
    {
        //validate the form data
       $formFields= $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //store user in database
        $user = User::create($formFields);

        //sign the user in
        auth()->login($user);

        //redirect to home page
        return redirect()->route('home');
    }

    //logout user
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    //login user
    public function login()
    {
        return view('users.login');
    }

    //authenticate user
    public function authenticate(Request $request)
    {
        //validate the form data
        $formFields= $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //attempt to log the user in
        if(auth()->attempt($formFields))
        {
           $request->session()->regenerate();
           //redirect to home page
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
