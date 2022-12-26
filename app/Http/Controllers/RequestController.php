<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStore;
use App\Http\Requests\RequestUpdate;
use App\Models\Request;
use App\Services\LogService;
use App\Services\RequestService;

class RequestController extends Controller
{
    public function __construct(
        private RequestService $requestService
    ) {
    }

    public function index()
    {
        return view('requests.index', [
            'requests' => $this->requestService->index(),
            'logs' => (new LogService)->index()
        ]);
    }

    public function create()
    {
        return view('requests.create');
    }

    public function store(RequestStore $request)
    {
        $this->requestService->store($request);

        return redirect()->route('requests.index')->with('success');
    }

    public function edit(Request $request)
    {
        return view('requests.edit', [
            'request' => $request
        ]);
    }

    public function update(RequestUpdate $data, Request $request)
    {
        $this->requestService->update($data, $request);

        return redirect()->route('requests.index')->with('success');
    }
}
