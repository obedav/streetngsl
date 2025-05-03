<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RealtorsController extends Controller
{
    public function index()
    {
        return view('realtors.index');
    }

    public function brokerage()
    {
        return view('realtors.brokerage');
    }

    public function management()
    {
        return view('realtors.management');
    }
}