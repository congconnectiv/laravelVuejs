<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatPostRequest extends FormRequest
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
            'txtCatName' => 'required|unique:cat_posts,title_cat|max:255'
        ];
    }

    public function message(){
        return [
            'txtCatName.required' => 'This title is not null!',
            'txtCatName.unique' => 'This title already exists!',
            'txtCatName.max' => 'This title too long, max length 255 character!'
        ];
    }
}
