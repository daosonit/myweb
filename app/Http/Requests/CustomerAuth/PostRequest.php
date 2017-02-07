<?php

namespace App\Http\Requests\CustomerAuth;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name'        => 'required|max:255',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'       => 'required|max:255',
            'keyword'     => 'required|max:255',
            'description' => 'required|max:255',
            'excerpt'     => 'required',
            'content'     => 'required'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'        => 'Vui lòng nhập!',
            'title.required'       => 'Vui lòng nhập!',
            'keyword.required'     => 'Vui lòng nhập!',
            'description.required' => 'Vui lòng nhập!',
            'excerpt.required'     => 'Vui lòng nhập!',
            'content.required'     => 'Vui lòng nhập!',
        ];
    }
}
