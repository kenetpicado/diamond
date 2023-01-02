<?php

namespace App\Http\Controllers;

use App\Services\EarningService;
use Illuminate\Http\Request;

class EarningController extends Controller
{
    public function __construct(
        private EarningService $earningService
    ) {
    }

    public function index()
    {
        return view('earnings.index', [
            'earnings' => $this->earningService->index()
        ]);
    }
}
