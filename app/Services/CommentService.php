<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public static function store(array $data): Comment
    {

        return Comment::query()->create($data);

    }
    public static function update(Comment $comment, array $data): Comment
    {
        $comment->update($data);

        return $comment;
    }
}
