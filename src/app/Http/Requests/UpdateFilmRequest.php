<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as HttpCode;

class UpdateFilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

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
            'description'  => ['nullable', 'string'],
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     *
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'message' => 'Validation failed',
                    'errors'  => $validator->errors(),
                ],
                HttpCode::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
