<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function index()
    {
        return view('users.index', [
            'users' => $this->userService->index()
        ]);
    }

    public function create()
    {
        return view('users.create', [
            'roles' => (new RoleService)->index()
        ]);
    }

    public function store(UserRequest $request)
    {
        $this->userService->store($request);

        return redirect()->route('users.index')->with('success');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user->load('roles:id,name'),
            'roles' => (new RoleService)->index()
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $this->userService->update($request, $user);

        return redirect()->route('users.index')->with('success');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success');
    }
}
