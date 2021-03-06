<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_employee extends Model
{   
    protected $table = 'info_employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'empleado_id', 'codigo', 'fecha_de_admision', 'account_em', 'contrato', 'duracion', 'cestaticket', 'duracion', 'banco', 'cuenta_tipo', 'cuenta_numero'
    ];

    public $timestamps = false;


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function em() 
    {
        return $this->belongsTo('App\Employee', 'empleado_id');
    } 
}