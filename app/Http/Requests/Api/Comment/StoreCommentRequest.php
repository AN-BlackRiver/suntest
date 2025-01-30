<?php

namespace App\Http\Requests\Api\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'post' => 'required',
            'content' => 'required',
            'user_id' => 'required',
        ];
    }
}
