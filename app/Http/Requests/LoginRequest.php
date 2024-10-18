<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'email'=>'required|email|max:255',
            'password'=>'required|string|max:255'
        ];
    }
    public function messages(): array
    {
        return [
            //
            'email.required'=>'Vui lòng không bỏ trống email!',
            'email.email'=>'Email không hợp lệ!',
            'email.max'=>'Email quá dài!',
            'password.required'=>'Vui lòng không bỏ trống mật khẩu!',
            'password.string'=>'Mật khẩu không hợp lệ!',
            'password.max'=>'Mật khẩu quá dài!',
        ];
    }
}
