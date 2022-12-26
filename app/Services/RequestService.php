<?php

namespace App\Services;

use App\Models\Log;
use App\Models\Request;

class RequestService
{
    public function index()
    {
        return Request::query()
            ->when(
                auth()->user()->hasRole('seller'),
                fn ($q) => $q->where('user_id', auth()->user()->id)
            )
            ->where('is_paid', false)
            ->withCasts(['sent_at' => 'datetime'])
            ->latest('id')
            ->get();
    }

    public function store($request)
    {
        Request::create($request->validated());
    }

    public function update($data, $request)
    {
        (new LogService)->create($data, $request);

        $request->update($data->all());
    }
}
