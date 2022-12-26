<?php

namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService
{
    public function index()
    {
        return Role::all(['id', 'name']);
    }

}
