<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.home.dashboard');
    }

    public function translator()
    {
        return view('user.translator.index');
    }

    public function bisindo()
    {
        return view('user.translator.bisindo');
    }

    public function sibi()
    {
        return view('user.translator.sibi');
    }

    public function tts()
    {
        return view('user.translator.tts');
    }

    public function dictionary()
    {
        return view('user.dictionary.index');
    }

    public function onboarding()
    {
        if (auth()->user()->has_completed_onboarding) {
            return redirect()->route('dashboard');
        }
        return view('user.home.onboarding');
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
        return view('user.profile.index');
    }

    public function edit()
    {
        return view('user.profile.edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists (optional logic can be added here)

            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function settings()
    {
        return view('user.profile.settings');
    }
}