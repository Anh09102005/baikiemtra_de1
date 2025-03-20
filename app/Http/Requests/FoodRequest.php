<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cho phép sử dụng request này
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:1000|max:1000000',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Ảnh tối đa 2MB
            'description' => 'nullable|string|max:500',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'name.max' => 'Tên sản phẩm tối đa 255 ký tự.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
            'price.required' => 'Giá sản phẩm không được để trống.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá tối thiểu là 1.000 VNĐ.',
            'price.max' => 'Giá tối đa là 1.000.000 VNĐ.',
            'image.image' => 'File tải lên phải là ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng JPG, PNG hoặc JPEG.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
            'description.max' => 'Mô tả tối đa 500 ký tự.',
        ];
    }
}
