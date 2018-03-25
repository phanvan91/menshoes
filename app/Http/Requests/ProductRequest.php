<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_product' => 'required',
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'pricesale' => 'required',
            'des'=>'required',
            'content' => 'required',
            'img_product' => 'required|image'
        ];
    }
    public function messages(){
      return [
        'id_product.required' => 'Vui Lòng Nhập Danh Mục Sản Phẩm',
        'name.required' => 'Vui Lòng Nhập Tên Sản Phẩm',
        'price.required' => 'Vui Lòng Nhập Giá sản phẩm',
        'pricesale.required'=> 'Vui Lòng Nhập Giá Sale Sản Phẩm',
        'des.required'=>'Vui Lòng Nhập Mô Tả Sản Phẩm',
        'content.required'=>'Vui Lòng Nhập Nội Dung Sản Phẩm',
        'img_product.required'=>'Vui Lòng Nhập Ảnh Sản Phẩm',
        'img_product.image'=> 'File Này Không Phải File Ảnh'
      ];
    }
}
