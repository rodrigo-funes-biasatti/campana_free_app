<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    $primary_key = 'idReporte';

    protected $fillable=[
    	'fechaGeneracion',
    	'tipo'
    ]

    public function asistencia()
    {
    	return $this->belongsTo(Reporte::class, 'asistencia_id');
    }
}
