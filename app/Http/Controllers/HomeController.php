<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index(): RedirectResponse|View
    {
        if (auth()->user()->hasRole('seller'))
            return redirect()->route('requests.index');

        return view('home', [
            'requests' => Request::SelectHome()->get()
        ]);
    }
}
