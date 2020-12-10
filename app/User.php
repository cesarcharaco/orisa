<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['email', 'password', 'permissions', 'last_login', 'first_name', 'last_name', 'attempts', 'status'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function employee()
	{
	  return $this->belongsToMany('App\Employee', 'employees_has_users', 'usuario_id', 'empleado_id');
	}

	public function client()
	{
		return $this->hasOne('App\Client', 'correo', 'email');
	}

}
