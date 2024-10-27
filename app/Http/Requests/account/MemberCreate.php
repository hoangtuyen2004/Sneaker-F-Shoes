<?php

namespace App\Http\Requests\account;

use Illuminate\Foundation\Http\FormRequest;

class MemberCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'email'=>'required|email|max:255|unique:users,email',
            'birthday'=>'date',
            'phone_number'=>'required|numeric|max:11',
            'gender'=>'required',
            'password'=>'required|string|max:255',
            'role'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Tên chưa được nhập!',
            'name.string'=>'Tên không hợp lệ!',
            'name.max'=>'Tên quá dài!',
            'email.required'=>'Email chưa được nhập!',
            'email.email'=>'Email không hợp lệ!',
            'email.max'=>'Email quá dài!',
            'email.unique'=>'Email đã tồn tại trong hệ thống!',
            'birthday.date'=>'Ngày sinh không hợp lệ!',
            'phone_number.required'=>'Số điện chưa được nhập!',
            'phone_number.numeric'=>'Số điện thoại không hợp lệ',
            'phone_number.max'=>'Số điện thoại quá dài!',
            'gender.required'=>'Giới tính chưa được nhập!',
            'password.required'=>'Mật khẩu chưa được Nhập!',
            'password.string'=>'Mật khẩu không hợp lệ!',
            'password.max'=>'Mật khẩu quá dài!',
            'role.required'=>'Chức vụ chưa được nhập!',
        ];
    }
}
