<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Evento;

class Lugar extends Model
{
    protected $primaryKey = 'idLugar';

    //public function evento()
    //{
    //	return $this->hasMany(Evento::class,'lugar_id','idLugar');
    //}
}
