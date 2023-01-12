<?php

namespace App\Services;

use App\Models\Log;

class LogService
{
    public function index($take5 = true)
    {
        return Log::query()
            ->when(
                auth()->user()->hasRole('seller'),
                fn ($q) => $q->where('user_id', auth()->user()->id)
            )
            ->latest('id')
            ->when($take5, fn ($q) => $q->take(5))
            ->get();
    }

    public function create($data, $request)
    {
        $was_sent = $request->is_sent == false & $data->is_sent == true;
        $was_paid = $request->is_paid == false & $data->is_paid == true;

        if ($was_sent) {
            $this->sent($request);
            $request->touch('sent_at');
        }

        if ($was_paid) {
            $this->paid($request);
        }
    }

    public function sent($request)
    {
        Log::create([
            'message' => "Sent $" . $this->build_message($request),
            'icon' => "<i class='fas fa-bell text-white'></i>",
            'type' => 'primary',
            'user_id' => $request->user_id
        ]);
    }

    public function paid($request)
    {
        Log::create([
            'message' => "Paid $" . $this->build_message($request),
            'icon' => "<i class='fas fa-donate text-white'></i>",
            'type' => 'success',
            'user_id' => $request->user_id
        ]);
    }

    public function build_message($request)
    {
        return $request->amount . " player ID: " . $request->player_id . " " . $request->player_name;
    }
}
