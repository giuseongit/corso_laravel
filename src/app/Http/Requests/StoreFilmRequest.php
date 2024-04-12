<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreFilmRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:50'],
            'release_year' => ['required', 'date_format:Y'],
            'description'  => ['nullable', 'string'],
        ];
    }
}
