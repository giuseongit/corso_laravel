<?php

namespace App\Http\Requests;

class UpdatePostsRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'author_id' => 'nullable|exists:authors,id',
            'titolo' => 'nullable|max:255',
            'corpo' => 'nullable',
        ];
    }
}
