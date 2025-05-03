<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrendyController extends Controller
{
    public function index()
    {
        return view('trendy.index');
    }

    public function services()
    {
        return view('trendy.services');
    }

    public function gallery()
    {
        return view('trendy.gallery');
    }
}