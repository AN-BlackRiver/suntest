<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Response;


class TagController extends Controller
{
    public function __construct(
        private readonly TagService $tagService
    )
    {
    }

    public function index(): array
    {
        return TagResource::collection(Tag::all())->resolve();
    }

    public function show(Tag $tag): array
    {
        return TagResource::make($tag)->resolve();
    }

    public function store(): Tag
    {
        $data = [
            "title" => "New Tag",
        ];

        return $this->tagService::store($data);
    }

    public function update(Tag $tag): Tag
    {
        $data = [
            "title" => "Updated Rag",
        ];

        return $this->tagService::update($tag, $data);
    }

    public function destroy(Tag $tag) : Response
    {
        $tag->delete();

        return response([
            'message' => 'tag deleted',
        ],  Response::HTTP_OK);
    }
}
