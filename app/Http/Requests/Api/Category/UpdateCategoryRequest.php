<?php

namespace App\Http\Requests\Api\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|string|unique:categories,title,' . $this->category->id ,
        ];
    }
}
