<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    public function rules(): array
    {
        return [

            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'user' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
            'categories' => ['nullable', 'string'],
            'likes' => ['nullable', 'integer'],
            'image_path' => ['nullable', 'string', 'unique:posts,image_path'],
            'tag' => ['nullable', 'string'],
            'views' => ['nullable', 'integer'],
            'published_at' => ['nullable', 'date_format:Y-m-d'],
        ];

    }
}

