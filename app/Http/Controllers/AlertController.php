<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        return view('alerts.index', [
            'alerts' => (new LogService)->index(false)
        ]);
    }
}
