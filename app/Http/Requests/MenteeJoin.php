<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;



class MenteeJoin extends FormRequest
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
            'introduce' => 'required',
            'crops' => 'required',
            'target_area' => 'required',
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
