<?php

namespace App;

use App\Lugar;
use App\Asistencia;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
    	'nombre',
    	'lugar',
    	'fecha',
    	'preNormal',
    	'preVIP',
    	'visible',
    	'eliminado',
    ];

    protected $primaryKey = "idEvento";

    // public function foto()
    // {
    // 	return $this->belongsTo(Foto::class);
    // }

    public function lugar()
    {
        return $this->belongsTo(Lugar::class,'lugar_id');
    }

    // public function lugar1()
    // {
    //     $lugar = Lugar::where('idLugar', '=', $this->lugar_id)->get();
    //     return $lugar;
    // }

    public function asistencia()
    {
        $this->hasOne(Asistencia::class);
    }

    public static function restarCap($id)
    {
        $e = Evento::where('idEvento', $id)->first();
        $e->capacidadRestante -= 1;
        $e->save();
    }
}
