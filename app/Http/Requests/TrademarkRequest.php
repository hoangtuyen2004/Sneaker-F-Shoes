<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrademarkRequest extends FormRequest
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
            'name.required'=>'Vui lòng không để trống tên thương hiệu!',
            'name.string'=>'Tên thương hiệu phải là một chuỗi!',
            'name.max'=>'Quá nhiều ký tự!',
            'name.unique'=>'Thương hiệu đã tồn tại!',
        ];
    }
}
