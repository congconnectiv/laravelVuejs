<?php

namespace App\Http\Requests;

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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtPostName' => 'required|unique:cat_posts|max:255'
        ];
    }

    public function message(){
        return [
            'txtPostName.require' => 'This title is not null!',
            'txtPostName.unique' => 'This title already exists!',
            'txtPostName.max' => 'This title too long, max length 255 character!'
        ];
    }
}
