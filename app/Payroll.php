<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
	/**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $table = 'payrolls_saved';
    protected $fillable = ['mes', 'quincena', 'year'];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    public function payrolls()
    {
        return $this->belongsToMany('App\Employee', 'payrolls', 'nominasaved_id', 'empleado_id');
    }
    
    public function getFullDatesAttribute()
    {
        return $this->quincena . ' quincena del mes ' . $this->mes . ' del año ' . $this->year;
    }

    public function adicionales()
    {
        return $this->hasMany('App\Additional', 'id_prenomina', 'id');
    }

    public function nominas()
    {
        return $this->hasMany('App\PayrollMade', 'id_prenomina', 'id');
    }
}
