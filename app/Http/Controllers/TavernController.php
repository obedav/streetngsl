<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TavernController extends Controller
{
    public function index()
    {
        return view('tavern.index');
    }

    public function menu()
    {
        return view('tavern.menu');
    }

    public function about()
    {
        return view('tavern.about');
    }
}