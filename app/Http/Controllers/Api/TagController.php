<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Tag\StoreTagRequest;
use App\Http\Requests\Api\Tag\UpdateTagRequest;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{

    public function index()
    {
        return TagResource::collection(Tag::all())->resolve();
    }


    public function store(StoreTagRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::query()->create($data);
        return TagResource::make($tag)->resolve();

    }


    public function show(Tag $tag)
    {
        return TagResource::make($tag)->resolve();
    }


    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $data  = $request->validated();
        $tag->update($data);
        return TagResource::make($tag)->resolve();
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response([
            'message' => 'Tag deleted'
        ], Response::HTTP_OK);
    }
}
