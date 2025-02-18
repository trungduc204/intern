<?php

namespace App\Domains\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpCategoryRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
          
            'description' => ['required','string','max:1000'],
        
            'image' => ['nullable','image','mimes:jpg,png,gif,jpeg,svg,max=2048'],
            'parent_id' => 'nullable|integer|exists:categories,id',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Tên danh mục không được để trống',
            'name.string' => 'Tên danh mục phải để dạng chuỗi',
            'name.max' => 'Tên danh mục không được vượt quá 255 kí tự',
            // 'name.unique' => 'Tên danh mục đã tồn tại trong hệ thống',
            'description.required' => 'Mô tả không được để trống',
            'description.string' => 'Mô tả danh mục phải để dạng chuỗi',
            'description.max' => 'Mô tả không được vượt quá 1000 ký tự',
            'parent_id.integer' => 'ID của danh mục cha phải là một số nguyên.',
            'parent_id.exists' => 'Danh mục cha không tồn tại.',
            'image.image' => 'Tệp tải lên phải là hình ảnh',
            'image.mimes' => 'Ảnh chỉ được có định dạng: jpeg, png, jpg, gif, svg',
            'image.max' => 'Dung lượng ảnh không được vượt quá 2MB',
    
         
        ];
    }
}
