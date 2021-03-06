<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'employees';

    protected $fillable = [
        'cargo_id', 'turno_id', 'dni_cedula', 'nombres', 'apellidos', 'fecha_nacimiento', 'estado_civil', 'ciudad', 'calle', 'habitacion', 'direccion', 'operadora', 'telefono', 'genero'
    ];

    public function user()
    {
      return $this->belongsToMany('App\User', 'employees_has_users', 'empleado_id', 'usuario_id');
    }

    public function info() #info
    {
        return $this->hasOne('App\Data_employee', 'empleado_id', 'id');
    }

    public function assignmentsTemporary()
    {
        return $this->belongsToMany('App\Assignment', 'temporary_assignments', 'empleado_id', 'asignacion_id')->withPivot('estatus');
    }

    public function deductionsTemporary()
    {
        return $this->belongsToMany('App\DeductionExtra', 'temporary_deductions', 'empleado_id', 'deduccion_id')->withPivot('estatus');
    }

    public function attendance() #Attendances
    {
        return $this->hasMany('App\Assistance', 'empleado_id', 'id');
    }

    public function hoem() #Holiday
    {
        return $this->hasMany('App\Holiday', 'empleado_id', 'id');
    }

    public function turno() #Turn
    {
        return $this->hasOne('App\Turn', 'id', 'turno_id');
    }

    public function cargo() #Position
    {
        return $this->hasOne('App\Position', 'id', 'cargo_id');
    }

    public function getFullNameAttribute()
    {
        return $this->nombres . ' ' . $this->apellidos;
    }

    public function getPhoneAttribute()
    {
        return $this->operadora . '-' . $this->telefono;
    }
}
