<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function translator()
    {
        return view('user.translator.index');
    }

    public function bisindo()
    {
        return view('user.translator.bisindo');
    }

    public function bisindoKata()
    {
        return view('user.translator.bisindo_kata');
    }

    public function sibi()
    {
        return view('user.translator.sibi');
    }

    public function tts()
    {
        return view('user.translator.tts');
    }
}