<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $users = $this->service->getAll();
        return response()->json($users);
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->service->create($request->validated());
        return response()->json($user, 201);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->service->update($id, $request->validated());

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function show($id)
    {
        $user = $this->service->getById($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}
