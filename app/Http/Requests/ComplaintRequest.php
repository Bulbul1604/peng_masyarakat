<?php

namespace App\Http\Requests;

use App\Models\Pengaduan;
use Illuminate\Foundation\Http\FormRequest;

class ComplaintRequest extends FormRequest
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
        $rules = [
            'user_id' => 'required',
            'tgl_pengaduan' => 'required|date',
            'foto' => 'required|image|max:2048|mimes:jpg,jpeg,png',
            'isi_pengaduan' => 'required',
        ];
        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':Attribute wajib diisi!',
            'date' => 'Silahkan isi dengan tanggal yang benar!',
            'image' => 'Silahkan upload hanya gambar!',
            'max' => 'Maksimal gambar berukuran 2MB!',
            'mimes' => 'Upload gambar yang berekstensi JPG, JPEG, dan PNG!'
        ];
    }
}
