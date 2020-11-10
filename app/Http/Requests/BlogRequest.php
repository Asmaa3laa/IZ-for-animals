<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
            'title'=>[
                'required',
                Rule::unique('blogs')->ignore($this->route('blog')),
                'max:50',
            ],
            'content' => 'required:blogs|min:200',
            'tags' => 'required:blogs',
            'image' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
        ];
    }
}
