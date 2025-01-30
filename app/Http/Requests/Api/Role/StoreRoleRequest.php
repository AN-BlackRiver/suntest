<?php

namespace App\Http\Requests\Api\Role;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|string|unique:roles,title',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => "Название должно быть заполнено",
            'title.unique' => "Такая роль уже существует",
        ];
    }
}
