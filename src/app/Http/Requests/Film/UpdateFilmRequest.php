<?php

namespace App\Http\Requests\Film;

use App\Http\Requests\Abstracts\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateFilmRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'        => ['nullable', 'string', 'max:50'],
            'release_year' => ['nullable', 'date_format:Y'],
            'author_id'    => ['nullable', 'exists:authors'],
            'description'  => ['nullable', 'string'],
        ];
    }
}
