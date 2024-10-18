<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'phone_number'=>'required|numeric|max:99999999999',
            'gender'=>'required',
            'password'=>'required|max:255|min:6',
        ];
    }
    public function messages(): array
    {
        return [
            //
            'name.required'=>'Không để trống tên!',
            'name.string'=>'Tên không hợp lệ!',
            'name.max'=>'Tên quá dài!',
            'email.required'=>'Không để trống email!',
            'email.emal'=>'Email không hợp lệ!',
            'email.max'=>'Email quá dài!',
            'phone_number.required'=>'Không để trống số điện thoại!',
            'phone_number.numeric'=>'Số điện thoại không hợp lệ!',
            'phone_number.max'=>'Số quá dài!',
            'gender.required'=>'Không để trống giới tính!',
            'password.required'=>'Không để trống mật khẩu!',
            'password.max'=>'Mật khẩu quá dài!',
            'password.min'=>'Mật khẩu quá ngắn!',
        ];
    }
}
