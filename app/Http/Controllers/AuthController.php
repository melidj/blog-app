<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('authentication.signup');
    }

    public function signup(Request $request)
    {


        $request->validate([
            'name'=> 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect('/login')->with('success', 'You Signup Successfully. Please Login.');
    }

    public function showLoginForm()
    {
        return view('authentication.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $users = $request->only('email', 'password');

    if (Auth::attempt($users)) {
        $request->session()->regenerate();
        return redirect()->route('index')->with('success', 'You Logged in successfully!');
    }

    return back()->with('error', 'Invalid User! Please Signup first');
}

    public function index()
    {
        //get only users posts
        $user = Auth::user();
        $posts = $user->posts;

        return view('blogs.index', compact('posts'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate(); // data remove here
        $request->session()->regenerate(); // csrf regenerate

        return redirect('/login')->with('warning', 'You have been logged out.');
    }
}
