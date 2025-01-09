<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // ubah menjadi true, agar request dianggap authorized
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule_task_unique = Rule::unique('tasks', 'task'); // membuat rule unique, untuk mengecek data task yang diinputkan
        if ($this->method() !== 'POST') { // jika request bukan POST
            $rule_task_unique->ignore($this->route()->parameter('id')); // abaikan data dengan id tertentu
        }

        return [ // validasi data
            'task' => ['required', $rule_task_unique], // data task wajib diisi, dan harus unique, jika request bukan POST
            'user' => ['required'], // data user wajib diisi
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Isian :attribute harus diisi!', // pesan error jika data kosong, :attribute akan diganti dengan nama field
            'user.required' => 'Nama pengguna harus diisi!'
        ];
    }
}