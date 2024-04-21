<?php

namespace App\Http\Requests;

class StorePostsRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'author_id' => 'nullable|exists:authors,id',
            'titolo' => 'required|max:255',
            'corpo' => 'required',
        ];
    }
}
