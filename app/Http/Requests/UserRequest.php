<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Auth::user()->role == 'doctor') {
            return [
                'name' => ['required', 'string', 'max:100'],
                'user_name' => ['required', 'string', 'max:100', 'unique:users'],
                'email' => ['required','string', 'email:rfc,dns', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg',],
                'card' => ['required', 'image', 'mimes:jpeg,png,jpg',]
            ];
        } elseif(Auth::user()->role == 'clinic') {
            return [
                'name' => ['required', 'string', 'max:100'],
                'user_name' => ['required', 'string', 'max:100', 'unique:users'],
                'email' => ['required','string', 'email:rfc,dns', 'unique:users'],
                // 'password' => ['required', 'string', 'min:8', 'confirmed'],
                // 'image' => ['required', 'image', 'mimes:jpeg,png,jpg',],
                // 'card' => ['required', 'image', 'mimes:jpeg,png,jpg',],
                'phone' => ['required','numeric','regex:/(01)[0-2]{1}[0-9]{8}/', 'unique:users'],
                'address' =>['required', 'string','max:250'],
                // 'location' =>['required', 'string', 'max:500'],
                'country_id' => ['required'],
                'state_id' => ['required'],
            ];        }
        
        
    }
}
