<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreMentorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'password' => 'required',
            'name' => 'required',
            'birthday' => 'required',
            'sex' => 'required|in:male,female',
            'address' => 'required',
            'farm_name' => 'required',
            'career' => 'required',
            'introduce' => 'required',
            'crops' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        $json = [
            'status' => 'input_error',
            'errors' => $validator->errors()
        ];
        $response = new JsonResponse( $json, 400 );
        throw (new ValidationException($validator, $response))->status(400);
    }
}
