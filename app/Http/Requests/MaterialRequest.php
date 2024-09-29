<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'name'=>'required|string|max:255|unique:categorys,name,'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Vui lòng không để trống tên chất liệu!',
            'name.string'=>'Tên chất liệu phải là một chuỗi!',
            'name.max'=>'Quá nhiều ký tự!',
            'name.unique'=>'Chất liệu đã tồn tại!',
        ];
    }
}
