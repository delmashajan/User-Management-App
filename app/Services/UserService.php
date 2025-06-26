<?php

namespace App\Services;

use App\BO\UserBO;
use App\DAO\UserDAO;
use Illuminate\Support\Facades\Cache;

class UserService
{
    protected $userDAO;
    protected $userBO;

    public function __construct(UserDAO $dao, UserBO $bo)
    {
        $this->userDAO = $dao;
        $this->userBO = $bo;
    }

    public function create(array $data)
    {
        $prepared = $this->userBO->prepareData($data);
        Cache::forget('users:all');
        return $this->userDAO->create($prepared);
        
    }

    public function update($id, array $data)
    {
        $user = $this->userDAO->find($id);
        if (!$user) return null;

        $prepared = $this->userBO->prepareData($data);
        $this->userDAO->update($user, $prepared);

        Cache::forget('users:all');

        return $user->fresh();
    }

    public function getById($id)
    {
        return Cache::remember("user:$id", 60, function () use ($id) {
            return $this->userDAO->find($id);
        });
    }

    public function getAll()
    {
        return Cache::remember('users:all', 60, function () {
            return $this->userDAO->getAll();
        });
    }
}
