<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table	= "company";
	protected $fillable	= ["company_name","company_website","company_logo"];
	public $timestamps	= true;

    const IMAGE_PATH = "public/logo/";
    const IMAGE_STORAGE = "storage/logo/";

    public static function rules()
    {
        return [
			'company_name' => 'required',
			'file'         => 'required',
        ];
    }

    public static function message()
    {
        return [
			'company_name.required' => 'Nama perusahaan harus di isi',
			'file.required'         => 'Logo harus di isi',
        ];
    }

    public function employee()
    {
        return $this->hasMany('App\Model\Employee', 'company_id', 'id');
    }

    public static function dropDownCompany()
    {
        return self::orderBy('company_name')->pluck('company_name', 'id');
    }

    public static function upload($file)
    {
        $path       = self::IMAGE_PATH;
        $file_name  =  str_random(20).".".$file->getClientOriginalExtension();
        $file->storeAs($path, $file_name);

        return $file_name;
    }
}
