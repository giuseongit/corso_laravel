<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreFilmRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'titolo' => [
                'required',
                'string',
                'max:50',
            ],
            'trama' => [
                'nullable',
                'string'
            ],
            'anno' => [
                'required',
                'date_format:Y',
            ]
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
