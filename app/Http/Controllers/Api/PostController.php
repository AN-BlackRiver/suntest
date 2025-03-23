<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filter\PostFilter;
use App\Http\Middleware\IsPostCreatorMiddleware;
use App\Http\Requests\Api\Post\IndexRequest;
use App\Http\Requests\Api\Post\StorePostRequest;
use App\Http\Requests\Api\Post\UpdatePostRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller
{

    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $posts = Post::filter($data)->get();

        return PostResource::collection($posts)->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return PostResource::make($post)->resolve();

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return PostResource::make($post)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response([
            'message' => 'post deleted',
        ],  Response::HTTP_OK);
    }
}
