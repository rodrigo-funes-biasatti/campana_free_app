<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{

	protected $primaryKey = 'idAsistencia';

    public function idEvento()
    {
    	$this->belongsTo(Evento::class, 'evento_id');
    }

    public function idPersona()
    {
    	$this->belongsTo(Persona::class, 'persona_id');
    }

    public function hasTipo($tipo)
    {
    	if ($tipo == 0){
    		return 'Normal';
    	}else{
    		if($tipo == 1){
    			return 'VIP';
    		}
    	}
    }

    public function hasPagado($pagado)
    {
    	if ($pagado == 0){
    		return 'No';
    	}else{
    		if($pagado == 1){
    			return 'Si';
    		}
    	}
    }
}
