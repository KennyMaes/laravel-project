<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProfileUpdateRoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'is_admin' => ['required', 'string', 'max:255'],
        ];
    }
}
