<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use App\Events\PersonaWasEliminated;

class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create','store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pers = Persona::all();
        return view('persona.personas', compact('pers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persona.nuevaP');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(is_null((Persona::buscarPorDni($request->input('nroDNI'))))){
            $per = new Persona;
            $per->nroDNI = $request->input('nroDNI');
            $per->nombre = $request->input('nombre');
            $per->fechaNac = $request->input('fechaNac');
            $per->email = $request->input('email');
            $per->direccion = $request->input('direccion');
            $per->save();

            return redirect()
            ->route('home')
            ->with('perCreada', 'Te has registrado correctamente!!!, ahora puedes registrar la asistencia.');
        }
        else{
            return redirect()
            ->route('home')
            ->with('perError', 'Ya existe una persona con ese dni!');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        event(new PersonaWasEliminated($id));
        $per = Persona::findOrFail($id);
        $per->delete();

        return redirect()
        ->route('home')
        ->with('delPer', 'La persona ha sido eliminada con éxito');
    }
}
