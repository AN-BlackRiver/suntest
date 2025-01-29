<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public static function store(array $data): Post
    {

        return Post::query()->create($data);

    }
    public static function update(Post $post, array $data): Post
    {
        $post->update($data);

        return $post;
    }
}
