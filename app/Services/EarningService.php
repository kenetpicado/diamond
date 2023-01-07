<?php

namespace App\Services;

use App\Models\Request;

class EarningService
{
    public function index()
    {
        return Request::where('is_paid', true)
            ->latest('id')
            ->selectEarning()
            ->get();
    }
}
