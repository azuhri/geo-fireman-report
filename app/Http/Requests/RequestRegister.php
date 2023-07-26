<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $phonenumber = "62".request()->phonenumber;
        return [
            "name" => ["required"],
            "phonenumber" => [
                "required",
                "min:10",
            ],
            "email" => ["required", "unique:users,email", "email:dns"],
            "password" => ["required"],
            "confirm_password" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "nama unit/pengguna harus diisi",
            "phonenumber.required" => "nomor wa/telepon harus diisi",
            "phonenumber.unique" => "nomor wa/telepon telah digunakan sebelumnya",
            "address.required" => "alamat harus diisi",
            "email.required" => "email harus diisi",
            "password.required" => "password harus diisi",
            "email.unique" => "email ini telah digunakan oleh pengguna lain",
            "email.dns" => "email ini tidak valid untuk didaftarkan",
        ];
    }
}
