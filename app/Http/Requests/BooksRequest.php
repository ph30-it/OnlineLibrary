<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksRequest extends FormRequest
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
            //
            'name'=>'required|string',
            'author'=>'required|string',
            'published_year'=>'required|integer',
            'price'=>'required|integer|min:0',
            'quantity'=>'required|integer|min:1',
            'img'=>'required|mimes:jpeg,jpg,png,gif'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Please enter the title of the book',
            'author.required' => 'Please enter the author\'s name',
            'published_year.required' => 'Please enter the publication year',
            'quantity.min' => 'Invalid Quantity',
            'price.min' => 'Invalid Price'
        ];
    }
}
