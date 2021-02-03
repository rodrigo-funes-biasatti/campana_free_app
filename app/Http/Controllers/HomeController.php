<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Asistencia;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = null;
        if (Auth::check()){
            $eventos = Evento::all()->sortBy('fecha');
        }else{
            $eventos = Evento::where('visible', 1)->get()->sortBy('fecha');
        }
        //dd($eventos);
        foreach ($eventos as $e) {
            $e->recaudacion = 0;
            $as = Asistencia::where('idEvento', $e->idEvento)->get();
            //dd($as);
            foreach($as as $a){
                if ($a->tipo == 0){
                    $e->recaudacion += $e->preNormal;
                }
                else{
                    if ($a->tipo == 1){
                        $e->recaudacion += $e->preVip;
                    }
                };
            };
        };
        return view('index.welcome', compact('eventos', 'lugares'));
    }
}

