<?php

namespace App\Http\Requests\Author;

use App\Http\Requests\Abstracts\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreAuthorRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
        ];
    }
}
