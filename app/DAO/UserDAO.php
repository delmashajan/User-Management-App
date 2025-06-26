<?php

namespace App\DAO;

use App\Models\User;

class UserDAO
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(User $user, array $data)
    {
        return $user->update($data);
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function getAll()
    {
        return User::all();
    }
}
