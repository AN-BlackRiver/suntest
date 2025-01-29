<?php

namespace App\Http\Controllers;

use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function __construct(
        private readonly CommentService $commentService
    )
    {
    }

    public function index(): array
    {
        return CommentResource::collection(Comment::all())->resolve();
    }

    public function show(Comment $comment): array
    {
        return CommentResource::make($comment)->resolve();
    }

    public function store(): Comment
    {
        $data = [
            "post" => "post 1",
            "content" => "content blabla",
            "user_id" => "1",
        ];

        return $this->commentService::store($data);
    }

    public function update(Comment $comment): Comment
    {
        $data = [
            "post" => "post 1",
            "content" => "updated content blabla",
            "user_id" => "1",
        ];

        return $this->commentService::update($comment, $data);
    }

    public function destroy(Comment $comment) : Response
    {
        $comment->delete();

        return response([
            'message' => 'comment deleted',
        ],  Response::HTTP_OK);
    }
}
