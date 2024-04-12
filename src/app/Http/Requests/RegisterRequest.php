<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class RegisterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'  => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
        ];
    }
}
