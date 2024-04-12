<?php

namespace App\Http\Requests\Films;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreFilmRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:50',
            ],
            'description' => [
                'nullable',
                'string'
            ],
            'year' => [
                'required',
                'date_format:Y',
            ],
            'director_id' => [
                'nullable',
                Rule::exists('directors', 'id'),
            ],
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $errors
        ], 422));
    }
}
