<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function __construct(
        private readonly PostService $postService
    )
    {
    }

    public function index(): array
    {
        return PostResource::collection(Post::all())->resolve();
    }

    public function show(Post $post): array
    {
        return PostResource::make($post)->resolve();
    }

    public function store(): Post
    {
        $data = [
            "title" => "New Title",
            "content" => "New Content"
        ];

        return $this->postService::store($data);
    }

    public function update(Post $post): Post
    {
        $data = [
            "title" => "SOBAKA",
            "content" => "PES"
        ];

        return $this->postService::update($post, $data);
    }

    public function destroy(Post $post) : Response
    {
        $post->delete();

        return response([
           'message' => 'post deleted',
        ],  Response::HTTP_OK);
    }
}
