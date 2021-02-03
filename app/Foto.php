<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
	protected $fillable = [
		'nombre',
		'fecha',
		'resolucion',
	]

	public function evento()
	{
		return $this->hasOne(Evento::class);
	}
}
