<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function translator()
    {
        return view('user.translator');
    }

    public function dictionary()
    {
        return view('user.dictionary');
    }

    public function onboarding()
    {
        if (auth()->user()->has_completed_onboarding) {
            return redirect()->route('dashboard');
        }
        return view('user.onboarding');
    }

    public function completeOnboarding()
    {
        $user = auth()->user();
        $user->has_completed_onboarding = true;
        $user->save();

        return redirect()->route('dashboard');
    }

    public function profile()
    {
        return view('user.profile');
    }
}