<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $categoryService
    )
    {
    }

    public function index(): array
    {
        return CategoryResource::collection(Category::all())->resolve();
    }

    public function show(Category $category): array
    {
        return CategoryResource::make($category)->resolve();
    }

    public function store(): Category
    {
        $data = [
            "title" => "New Category",
        ];

        return $this->categoryService::store($data);
    }

    public function update(Category $category): Category
    {
        $data = [
            "title" => "Updated Category",
        ];

        return $this->categoryService::update($category, $data);
    }

    public function destroy(Category $category) : Response
    {
        $category->delete();

        return response([
            'message' => 'category deleted',
        ],  Response::HTTP_OK);
    }
}
