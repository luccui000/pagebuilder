<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:3|max:30'
        ];
    }

    public function messages()
    {
        return [
            'email.required'  => 'Vui lòng nhập vào email',
            'email.email'  => 'Email không hợp lệ',
            'password.required'  => 'Vui lòng nhập vào mật khẩu',
            'password.min'  => 'Mật khẩu quá ngắn',
            'password.max'  => 'Mật khẩu quá dài',
        ];
    }
}
