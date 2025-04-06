<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use App\Services\TagService;

class TagController extends Controller
{
    public function index()
    {
        $tags = TagResource::collection(Tag::all())->resolve();
        return inertia('Admin/Tag/Index', compact('tags'));
    }

    public function show(Tag $tag)
    {

        $tag = TagResource::make($tag)->resolve();
        return inertia('Admin/Tag/Show', compact('tag'));
    }

    public function create()
    {
        return inertia('Admin/Tag/Create');
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        $tag = TagService::store($data);
        return TagResource::make($tag)->resolve();
    }


}
