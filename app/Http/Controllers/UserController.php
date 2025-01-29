<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    )
    {
    }

    public function index(): array
    {
        return UserResource::collection(User::all())->resolve();
    }

    public function show(User $user): array
    {
        return UserResource::make($user)->resolve();
    }

    public function store(): User
    {
        $data = [
            "name" => "Arthur",
            "email" => "arthur@email.com",
            "password" => "123456",
        ];

        return $this->userService::store($data);
    }

    public function update(User $user): User
    {
        $data = [
            "name" => "Arthur",
            "email" => "blackriver@email.com",
            "password" => "123456",
        ];

        return $this->userService::update($user, $data);
    }

    public function destroy(User $user) : Response
    {
        $user->delete();

        return response([
            'message' => 'user deleted',
        ],  Response::HTTP_OK);
    }
}
