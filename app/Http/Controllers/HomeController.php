<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('seller'))
            return redirect()->route('requests.index');
            
        return view('home');
    }
}
