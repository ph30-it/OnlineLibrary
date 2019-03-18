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
            'img'=>'mimes:jpeg,jpg,png,gif'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Tên sách không được trống.',
            'author.required' => 'Tên tác giả không được trống.',
            'published_year.required' => 'Năm xuất bản không được trống.',
            'quantity.min' => 'Số lượng tối thiểu là 1.',
            'price.min' => 'Giá tối thiểu là 0đ.',
            'img.mimes' => 'File tải lên phải là một hình ảnh.'
        ];
    }
}
