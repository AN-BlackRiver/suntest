<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class  IndexRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'category' => 'nullable|string',
            'views_from'=> 'nullable|integer',
            'views_to'=> 'nullable|integer',
            'published_at_from'=> 'nullable|date_format:Y-m-d',
            'published_at_to'=> 'nullable|date_format:Y-m-d',
        ];
    }
}
