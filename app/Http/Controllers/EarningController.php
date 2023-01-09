<?php

namespace App\Http\Controllers;

use App\Services\EarningService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EarningController extends Controller
{
    public function __construct(private EarningService $earningService)
    {
    }

    public function index(): View
    {
        return view('earnings.index', [
            'earnings' => $this->earningService->index()
        ]);
    }
}
