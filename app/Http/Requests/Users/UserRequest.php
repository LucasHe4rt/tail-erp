<?php

namespace App\Http\Requests\Users;

use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Urameshibr\Requests\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'document_id' => 'numeric',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        if (!empty($this->get('password'))) {
            $this->merge([
                'password' => Hash::make($this->get('password'))
            ]);
        }
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'success' => false,
                    'message' => 'invalid parameters',
                    'errors' => $validator->errors()
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
