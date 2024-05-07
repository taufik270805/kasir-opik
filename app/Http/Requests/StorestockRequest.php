<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorestockRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'menu_id' => 'required|unique:stock,menu_id',
            'jumlah' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'menu.required' => 'Menu tidak boleh kodong',
            'menu.unique' => 'Data stok menu sudah ada',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
        ];
    }
}
