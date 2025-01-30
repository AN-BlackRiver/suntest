<?php

namespace App\Http\Requests\Api\Comment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'content' => 'required',
        ];
    }
}
