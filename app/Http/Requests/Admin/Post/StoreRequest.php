<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'nullable|string',
            'category_id' => 'required|integer|exists:categories,id',
            'published_at' => 'required|date_format:Y-m-d',
            'image' => 'nullable|file'
        ];
    }

    protected function passedValidation()
    {
        return $this->merge([
            'profile_id' => \Auth::user()->id
        ]);

    }
}
