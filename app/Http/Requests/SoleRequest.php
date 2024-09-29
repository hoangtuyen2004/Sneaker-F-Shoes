<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoleRequest extends FormRequest
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
            'name'=>'required|string|max:255|unique:soles,name,'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Vui lòng không để trống tên đế giày!',
            'name.string'=>'Tên đế giày phải là một chuỗi!',
            'name.max'=>'Quá nhiều ký tự!',
            'name.unique'=>'Đế giày đã tồn tại!',
        ];
    }
}
