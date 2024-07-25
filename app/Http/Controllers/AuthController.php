<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::with('role')->where('email', $credentials['email'])->with('role')->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email not registered.',
            ])->withInput();
        }

        if (!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return back()->withErrors([
                'password' => 'Wrong password.',
            ])->withInput();
        }

        $request->session()->regenerate();

        if ($user->user_status == "active") {
            if ($user->id_role == "2") {
                return redirect()->intended('/home');
            } else {
                return redirect()->intended('/dashboard');
            }
        } else {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login')->with('error', 'Your account is not active. Please contact administrator.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }

    public function registration()
    {
        return view('admin.auth.registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'id_role' => '2',
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_status' => 'active',
        ]);

        if ($user) {
            return redirect('/login')->with('success', 'Registration successful. Please login.');
        } else {
            return redirect('/registration')->with('error', 'Registration failed. Please try again.');
        }
    }
}
