<?php

namespace App\Http\Requests\Api\Tag;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'string|required|max:255|unique:tags,title',
        ];
    }
}
