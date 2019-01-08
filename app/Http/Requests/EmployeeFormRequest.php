<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
            'company_id'    => 'required',
            'employee_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'company_id.required'    => 'Nama perusahaan harus di isi',
            'employee_name.required' => 'Nama karyawan harus di isi',
        ];
    }
}
