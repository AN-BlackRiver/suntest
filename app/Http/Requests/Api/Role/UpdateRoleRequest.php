<?php

namespace App\Http\Requests\Api\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|unique:roles,title,' . $this->role->id,
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
