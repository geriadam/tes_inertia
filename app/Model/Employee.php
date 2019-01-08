<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table	= "employee";
	protected $fillable	= ["company_id","employee_name","employee_phone"];
	public $timestamps	= true;

    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'company_id', 'id');
    }
}
