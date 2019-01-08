<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table	= "employee";
	protected $fillable	= ["company_id","employee_name","employee_phone"];
	public $timestamps	= true;

    public static function rules()
    {
        return [
			'company_id'    => 'required',
			'employee_name' => 'required',
        ];
    }

    public static function message()
    {
        return [
			'company_id.required'    => 'Nama perusahaan harus di isi',
			'employee_name.required' => 'Nama karyawan harus di isi',
        ];
    }

    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'company_id', 'id');
    }
}
