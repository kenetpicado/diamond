<?php

namespace App\Services;

use App\Models\Request;

class EarningService
{
    public function index()
    {
        return Request::query()
            ->latest('id')
            ->where('is_paid', true)
            ->selectEarning()
            ->get();
    }
}
