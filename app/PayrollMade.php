<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollMade extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $table = 'payrolls_made';
    protected $fillable = ['id_usuario', 'cedula', 'nombre_completo', 'cargo', 'diasLaborados', 'feriadosDescanso', 'horasExtas', 'totalAsignacion', 'asignacionesExtras', 'deduccionesExtras', 'totalCancelar', 'sso', 'rpe', 'rpvh', 'totalDeducciones', 'totalNeto', 'salarioMensual', 'salarioDiario', 'unidad_tributaria', 'monto_cestaticket', 'faltas', 'descuentoCestaticket', 'id_prenomina'];
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_usuario', 'id');
    }


}
