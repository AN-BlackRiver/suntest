<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Services\CategoryService;
use App\Services\ImageUploadService;
use App\Services\PostService;

class PostController extends Controller
{
    public function __construct(public PostService $postService, public ImageUploadService  $imageUploadService)
    {
    }

    public function index()
    {
        $posts = PostResource::collection( Post::latest()->get())->resolve();
        return inertia('Admin/Post/Index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = PostResource::make($post)->resolve();
        return inertia('Admin/Post/Show', compact('post'));
    }

    public function create()
    {
        $categories = CategoryResource::collection(Category::all())->resolve();

        return inertia('Admin/Post/Create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {

        $data = $request->except(['image']);

        $imagePath = $data['image_path'] ?? null;

        unset($data['image_path']);

        $post = $this->postService::store($data);

        if ($imagePath) {
            $post->image()->create(['path' => $imagePath]);
        }

        return PostResource::make($post)->resolve();
    }
}
