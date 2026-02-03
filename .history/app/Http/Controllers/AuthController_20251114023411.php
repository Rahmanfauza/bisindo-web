<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('onboarding');
        }

        // PERBAIKAN: Ganti back() dengan redirect ke homepage
        return redirect('/')->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:100',
            'lastName'  => 'required|string|max:100',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|same:confirmPassword',
        ]);

        $user = User::create([
            'name'     => $validated['firstName'] . ' ' . $validated['lastName'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);

        return redirect('onboarding');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}