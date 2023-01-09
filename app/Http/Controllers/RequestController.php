<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStore;
use App\Http\Requests\RequestUpdate;
use App\Models\Request;
use App\Models\User;
use App\Services\LogService;
use App\Services\RequestService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RequestController extends Controller
{
    public function __construct(private RequestService $requestService)
    {
    }

    public function index(): View
    {
        return view('requests.index', [
            'requests' => $this->requestService->index(),
            'logs' => (new LogService)->index()
        ]);
    }

    public function create(): View
    {
        return view('requests.create', [
            'users' => User::all(['id', 'name'])
        ]);
    }

    public function store(RequestStore $request): RedirectResponse
    {
        $this->requestService->store($request);

        return redirect()->route('requests.index')
            ->with('success', 'Request created successfully.');
    }

    public function edit(Request $request): View
    {
        return view('requests.edit', [
            'request' => $request
        ]);
    }

    public function update(RequestUpdate $data, Request $request): RedirectResponse
    {
        $this->requestService->update($data, $request);

        return redirect()->route('requests.index')
            ->with('success', 'Request updated successfully');
    }

    public function destroy(Request $request)
    {
        if ($request->is_sent) {
            return redirect()->route('requests.index')->with('error', 'Request could not be deleted');
        }

        $request->delete();

        return redirect()->route('requests.index')
            ->with('success', 'Deleted successfully');
    }
}
