<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
        ];
    }
}
