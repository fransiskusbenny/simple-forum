<?php

namespace App\Http\Requests\User;

use Auth;
use Hash;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class PasswordRequest extends FormRequest
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
        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::user()->password);
        });

        return [
            'current_password'      => 'required|password',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
