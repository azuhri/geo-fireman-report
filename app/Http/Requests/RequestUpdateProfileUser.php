<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateProfileUser extends ValidatorRequest
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
            "email" => ["required", "email:dns"],
            "address" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "nama unit/pengguna harus diisi",
            "phonenumber.required" => "nomor wa/telepon harus diisi",
            "email.required" => "email harus diisi",
            "email.dns" => "email yang diisi harus valid",
            "address.required" => "alamat harus diisi",
        ];
    }
}
