<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required',
            'address' => 'required|string'
        ];
    }

    public function messages(){
        return [
            'firstname.required' => 'Firstname must be filled !.',
            'lastname.required' => 'Lastname must be filled.',
            'phone.required' => 'Phone must be filled',
            'address.required' => 'Address must be filled',
        ];
    }
}
