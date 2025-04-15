<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public static function store(array $data): Post
    {
        $post = Post::query()->create($data['post']);
        $tagIds = TagService::storeBatch($data['tags']);
        $post->tags()->attach($tagIds);

        return $post;
    }
    public static function update(Post $post, array $data): Post
    {
        $post->update($data);

        return $post;
    }
}
