<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Asistencia;

class Persona extends Model
{
	protected $fillable = [
		'nombre',
		'fechaNac',
		'direccion'
	];

	public static function buscarPorDni($dni)
	{
		$per = Persona::where('nroDNI', $dni)->first();

		if (is_null($per)) {
			return null;
		}
		else{
			return $per;
		}
	}

	public function asistencia()
	{
		$this->hasOne(Asistencia::class);
	}

	protected $primaryKey = 'idPersona';

}
