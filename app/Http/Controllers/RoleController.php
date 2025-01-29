<?php

namespace App\Http\Controllers;

use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function __construct(
        private readonly RoleService $roleService
    )
    {
    }

    public function index(): array
    {
        return RoleResource::collection(Role::all())->resolve();
    }

    public function show(Role $role): array
    {
        return RoleResource::make($role)->resolve();
    }

    public function store(): Role
    {
        $data = [
            "title" => "New Role",
        ];

        return $this->roleService::store($data);
    }

    public function update(Role $role): Role
    {
        $data = [
            "title" => "Updated Role",
        ];

        return $this->roleService::update($role, $data);
    }

    public function destroy(Role $role) : Response
    {
        $role->delete();

        return response([
            'message' => 'role deleted',
        ],  Response::HTTP_OK);
    }
}
