<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function index()
    {
        return User::query()
            ->with('roles')
            ->orderBy('name')
            ->get();
    }

    public function store($request)
    {
        $user = User::create($request->validated());

        $user->assignRole($request->roles);
    }

    public function update($request, $user)
    {
        $user->update($request->all());

        $user->syncRoles($request->roles);
    }
}
