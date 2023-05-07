<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $email = $this->request->get('email');
        $id = $this->request->get('id');
        $userOld = User::where('id', $id)->first();
        if ($userOld == null) {
            $email = 'required|email|unique:users,email';
        } elseif ($userOld->email == $email) {
            $email = 'required|email';
        } else {
            $email = 'required|email|unique:users,email';
        }
        $rules = [
            'name' => 'required',
            'email' => $email,
            'akses' => 'required|in:pimpinan,petugas,masyarakat',
            'keterangan' => 'required'
        ];
        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':Attribute wajib diisi!',
            'in' => 'Pilihan :attribute tidak sesuai!',
            'email' => 'Masukkan email yang benar!',
            'unique' => 'Email telah terdaftar!'
        ];
    }
}
