<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'pass' => 'required',
            'repass' => 'same:pass'
        ];
    }
    public function messages(){
      return [
        'name.required' => 'Vui Lòng Nhập Tên',
        'email.required' => 'Vui Lòng Nhập Email',
        'email.email' => 'Vui Lòng Nhập Đúng Email',
        'email.unique'=> 'Email Này Đã Có Rồi',
        'pass.required' => 'Vui Lòng Nhập Password',
        'repass.same' => '2 Password Phải Giống Nhau'
      ];

    }
}
