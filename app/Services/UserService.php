<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function store(array $data): User
    {

        return User::query()->create($data);

    }
    public static function update(User $user, array $data): User
    {
        $user->update($data);

        return $user;
    }
}
