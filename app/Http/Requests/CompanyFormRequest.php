<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
                return [
                    'company_name' => 'required',
                    'file'         => 'required',
                ];
            case 'PUT':
                return [
                    'company_name' => 'required',
                ];
            default:break;
        }
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Nama perusahaan harus di isi',
            'file.required'         => 'Logo harus di isi',
        ];
    }
}
