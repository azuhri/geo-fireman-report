<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends ValidatorRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required"],
            "phonenumber" => ["required","min:10"],
            "email" => ["required"],
            "password" => ["required"],
            "confirm_password" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "nama unit/pengguna harus diisi",
            "phonenumber.required" => "nomor wa/telepon harus diisi",
            "address.required" => "alamat harus diisi",
            "email.required" => "email harus diisi",
            "password.required" => "password harus diisi",
        ];
    }
}
