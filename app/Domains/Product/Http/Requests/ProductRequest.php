<?php

namespace App\Domains\Product\Http\Requests;

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
            'name' => ['required','string','max:255','unique:products,name'],
            'price' => ['required','numeric','min:0', ],
            'description' => ['required','string','max:1000'],
            'stock' => ['required','integer','min:0'],
            'image' => ['nullable','image','mimes:jpg,png,gif,jpeg,svg,max=2048'],
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.string' => 'Tên sản phẩm phải để dạng chuỗi',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 kí tự',
            'name.unique' => 'Tên sản phẩm đã tồn tại trong hệ thống',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm không được nhỏ hơn 0',
            'description.required' => 'Mô tả không được để trống',
            'description.string' => 'Mô tả sản phẩm phải để dạng chuỗi',
            'description.max' => 'Mô tả không được vượt quá 1000 ký tự',
            'stock.required' => 'Số lượng sản phẩm không được để trống',
            'stock.integer' => 'Tên sản phẩm phải là số nguyên',
            'stock.min' => 'Số lượng sản phẩm không được nhỏ hơn 0',
            'image.image' => 'Tệp tải lên phải là hình ảnh',
            'image.mimes' => 'Ảnh chỉ được có định dạng: jpeg, png, jpg, gif, svg',
            'image.max' => 'Dung lượng ảnh không được vượt quá 2MB',
    
         
        ];
    }
}
