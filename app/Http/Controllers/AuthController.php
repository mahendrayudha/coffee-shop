<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $credentials['email'])->first();

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
            if ($user->id_role !== "1") {
                return redirect()->intended('/home');
                // return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/home');
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
}
