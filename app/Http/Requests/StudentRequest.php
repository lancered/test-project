<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
            'registration_date' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()

        ]));
    }


    public function messages()
    {
        return [
            'firstName.required' =>'firstName is required',
            'lastName.required' => 'lastName is required',
            'phone.required' => 'phone is required',
            'email.required' => 'email is required',
            'status.required' => 'status is required',
            'registration_date.required' => 'registration_date is required'
        ];

    }
}
