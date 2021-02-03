<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Lugar;
use App\Events\EventWasEliminated;

class EventoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$eventos = Evento::all();

        //dd($eventos);

        //return dd($eventos);
       //return view('index.welcome')->with('eventos', $eventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lugares = Lugar::all();
        return view("evento.nuevoEvento", compact('lugares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'fecha' => 'date_format:"d-m-Y"|required'
        // ]);

        //dd($request);
        $lugar_id = $request->input('lugar');
        $l = Lugar::where('idLugar', $lugar_id)->first();
        //dd($l);
        $cap = $l->capacidadTotal;
        //dd($cap);

        $evento = new Evento;
        $evento->nombre = $request->input('nombre');
        $evento->nombreArtista = $request->input('nombreArtista');
        $evento->capacidadRestante = $cap;
        $evento->lugar_id = $lugar_id;
        $evento->fecha = $request->input('fecha');
        $evento->hora = $request->input('hora');
        $evento->minutos = $request->input('minutos');
        $evento->preNormal = $request->input('preNormal');
        $evento->preVIP = $request->input('preVIP');
        $evento->foto = $request->file('foto')->store('public');
        $evento->save();
        // Evento::create($request->all());

        return redirect()
        ->route('home')
        ->with('creado', 'El evento se ha creado correctamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lugares = Lugar::all();
        $evento = Evento::findOrFail($id);
        return view('evento.editar', compact('evento', 'lugares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $evento = Evento::findOrFail($id);
        $evento->nombre = $request->input('nombre');
        $evento->nombreArtista = $request->input('nombreArtista');
        $evento->lugar_id = $request->input('lugar');
        $evento->fecha = $request->input('fecha');
        $evento->preNormal = $request->input('preNormal');
        $evento->preVIP = $request->input('preVip');
        $evento->foto = $request->file('foto')->store('public');
        $evento->update();

        return redirect()
        ->route('home')
        ->with('editado', 'El evento ha sido editado correctamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $evento = Evento::where('idEvento','=',$id)->firstOrFail();
        // $evento->delete();

        event(new EventWasEliminated($id));
        
        Evento::findOrFail($id)->delete();

        return redirect()
        ->route('home')
        ->with('eliminado', 'Se eliminó correctamente el evento!');
    }

    public function visible(Request $request)
    {
        //dd($request);
        $e = Evento::where('idEvento', $request->input('idEvento'))->first();
        //dd($e);
        if($e->visible == 1){
            $e->visible = 0;
            $e->save();
            return redirect()
            ->route('home')
            ->with('noVisible', 'Has puesto como <strong style="font-weight: bold;">NO VISIBLE</strong> el evento: '. $e->nombre.'!');
        }else{
            if ($e->visible == 0){
                $e->visible = 1;
                $e->save();
                return redirect()
                ->route('home')
                ->with('visible', 'Has puesto como <strong style="font-weight: bold;">VISIBLE</strong> el evento: '. $e->nombre.'!');
            }
        }
    }
}
