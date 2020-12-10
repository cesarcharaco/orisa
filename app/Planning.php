<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Planning extends Model
{
	protected $table = 'plannings';

	protected $fillable = ['fecha_inicio', 'fecha_final', 'fechas', 'estatus'];

	public function dias() 
	{
		return $this->hasMany('App\Days_planning', 'planificacion_id', 'id');
	}

	public function pldays() 
	{
		return $this->hasMany('App\Holiday', 'planificacion_id', 'id');
	}

	public function getFullDatesAttribute()
	{
		return Carbon::parse($this->fecha_inicio)->format('d/m/Y') . ' AL ' . Carbon::parse($this->fecha_final)->format('d/m/Y');
	}

	// public function getFechaInicioAttribute($fecha_inicio)
	// {
	// 	return Carbon::parse($fecha_inicio)->format('d/m/Y');
	// }

	// public function getFechaFinalAttribute($fecha_final)
	// {
	// 	return Carbon::parse($fecha_final)->format('d/m/Y');
	// }

}
