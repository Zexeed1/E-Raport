<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'oldpassword' => 'confirmed',
            'password' => 'min:6|confirmed',
            'password_confirm' => 'confirmed'
        ];
    }
    public function messages()
    {
        return [
            'oldpassword' => 'Password yang anda masukkan salah',
            'password' => 'Password minimal 6 karakter',
            'password_confirm' => 'Password baru tidak sama'
        ];
    }
}
