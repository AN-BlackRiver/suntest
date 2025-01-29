<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public static function store(array $data): Role
    {

        return Role::query()->create($data);

    }
    public static function update(Role $role, array $data): Role
    {
        $role->update($data);

        return $role;
    }
}
