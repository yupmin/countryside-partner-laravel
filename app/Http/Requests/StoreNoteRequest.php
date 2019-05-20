<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreNoteRequest extends FormRequest
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
            'to_member_srl' => 'required',
            'notes' => 'required',
        ];
    }

//    public function failedValidation(Validator $validator)
//    {
//
//        $json = [
//            'status' => 'input_error',
//            'errors' => $validator->errors()
//        ];
//        $response = new JsonResponse( $json, 400 );
//        throw (new ValidationException($validator, $response))->status(400);
//    }
}
