<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'categorys_id'=>'required',
            'soles_id'=>'required',
            'materials_id'=>'required',
            'trademarks_id'=>'required',
            'description'=>'max:555',
        ];
    }
    
    public function messages(): array
    {
        return [
            //
            'name.required'=>'Không bỏ trống tên!',
            'name.string'=>'Tên không hợp lệ!',
            'name.max'=>'Tên quá dài!',
            'categorys_id.required'=>'Không bỏ trống loại!',
            'soles_id.required'=>'Không bỏ trống đế giày!',
            'materials_id.required'=>'Không bỏ trống chất liệu!',
            'trademarks_id.required'=>'Không bỏ trống thương hiệu!',
            'description.max'=>'Mô tả quá dài!',
        ];
    }
}
