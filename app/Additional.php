<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'modo_pago', 'monto', 'tipo', 'id_prenomina'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'additional';

    public function adicionales()
    {
        return $this->belongsTo('App\Payroll', 'id_prenomina');
    }

    public function prenomina()
    {
        return $this->belongsToMany('App\Employee', 'payrolls_additional', 'adicional_id', 'id_prenomina')->withTimestamps();
    }
}
