<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Evento;
use App\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\AsistenciaWasCreated;
use Keygen;

class AsistenciaController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth')->except('index','store', 'nueva', 'destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asistencia.buscarDni');
    }

    public function buscarDni(Request $request)
    {
        //dd($request);

        $nroDni = $request->input('nroDni');

        $pers = Persona::where('nroDNI', $nroDni)->first();
        if (is_null($pers)){
            return redirect()
            ->route('home')
            ->with('errorAsis', 'No se ha encontrado el DNI solicitado.');
        }
        else{
            $eventos = Evento::all();
            $asis = Asistencia::where('idPersona','=', $pers->idPersona)->get();
            //dd($asis);
            return view('asistencia.asistencias', compact('asis','pers','eventos'));
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function nueva($evento_id,Request $request)
    {
        //dd($request->nroDni);
        $even = Evento::where('idEvento', $evento_id)->first();

        $pers = Persona::buscarPorDni($request->nroDni);

        //$asis = Asistencia::where('idPersona','=', $pers->idPersona)->get();

        //dd($even);
        if (is_null($pers)){
            return redirect()
            ->route('home')
            ->with('errorBusq', 'No se ha encontrado el dni');
        }
        else{
            return view('asistencia.nuevaAsistencia', compact('even','pers'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$this->validate($request,[
            'fechaPago' => 'required|date|after:now'
        ]);*/
        
        //dd($request);
        $per = Persona::where('nroDNI', $request->nroDNI)->first();
        //dd($id_per);
        $existAsis = Asistencia::where('idPersona', $per->idPersona)->where('idEvento', $request->input('idEvento'))->first();
        //dd($existAsis);
        $idEvento = $request->input('idEvento');
        $e = Evento::where('idEvento', $idEvento)->first();

        if(is_null($existAsis)){
            if($e->capacidadRestante == 0){
                return redirect()
                ->route('home')
                ->with('errorNewAsisCap', 'Todas las entradas han sido vendidas, lo sentimos :\'(');
            }
            else{
                $asis = new Asistencia;
                $asis->codUnico = Keygen::numeric(6)->generate();
                $asis->idPersona = $per->idPersona;
                $asis->idEvento = $idEvento;
                $asis->tipo = $request->input('tipo');
                $asis->fechaPago = $request->input('fechaPago');
                $asis->save();
                Evento::restarCap($idEvento);

                event(new AsistenciaWasCreated($asis->codUnico, $e, $per));

                return redirect()
                ->route('home')
                ->with('newAsis', 'Registraste tu asistencia con éxito!!!, te hemos enviado un mail con tu código: <strong>' . $asis->codUnico . '</strong> para futuras transacciones.' );
            }
        }
        else{
            return redirect()
            ->route('home')
            ->with('errorNewAsis', 'Ya asistirás en este evento!');
        }
        //dd($asis);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //dd($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $asis = Asistencia::findOrFail($id);
        if ($asis->codUnico == $request->codUnico){
            $asis->delete();
            return redirect()
            ->route('home')
            ->with('asisDel', 'Has eliminado correctamente tu asistencia!!!' );
        }else
        {
            return redirect()
            ->route('home')
            ->with('errorDelAsis', 'El código que ingresaste es incorrecto.' );
        }
    }

    public function regPago(Request $request)
    {
        $idAsistencia = $request->input('idAsistencia');
        $asistencia = Asistencia::findOrFail($idAsistencia);
        //dd($asistencia);
        if($asistencia->pagado == 0){
        //dd($per);
        //dd($asistencia);
            $asistencia->pagado = 1;
            $asistencia->update();

            return redirect()
            ->route('home')
            ->with('asisPag', 'Se ha registrado el pago de la asistencia exitosamente!');
        }else{
            return redirect()
            ->route('home')
            ->with('errorRegPag', 'Ya se ha registrado el pago de esta asistencia.');
        }
    }
}
