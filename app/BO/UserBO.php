<?php

namespace App\BO;

class UserBO
{
    public function prepareData(array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        return $data;
    }
}
