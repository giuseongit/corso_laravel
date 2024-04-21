<?php

namespace App\Http\Requests;


class UpdateAuthorRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
        ];
    }
}
