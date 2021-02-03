<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lugar;

class LugarController extends Controller
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
        $lugares = Lugar::all();
        return view('lugar.lugares', compact('lugares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lugar.nuevoLugar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $cp = $request->input('capacidadTotal');
        $lg = $request->input('libreG');

        $lugar = new Lugar;
        $lugar->nombre = $request->input('nombre');
        $lugar->urlMaps = $request->input('urlMaps');
        if (isset($cp)){
            //dd('aguante boca ct');
            $lugar->capacidadTotal = $cp;
        }else{
            if(isset($lg)){
                //dd('aguante boca lg');
                $lugar->capacidadTotal = -1;
            }
        }
        $lugar->descripcion = $request->input('descripcion');
        $lugar->save();

        return redirect()
        ->route('lugar.index')
        ->with('lugarCreado','El lugar se ha creado correctamente!!!');

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
        $lugar = Lugar::findOrFail($id);
        //dd($lugar);
        return view('lugar.editarLugar', compact('lugar'));
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
       $cp = $request->input('capacidadTotal');
       $lg = $request->input('libreG');

       $nuevo = Lugar::findOrFail($id);
       $nuevo->nombre = $request->input('nombre');
       $nuevo->urlMaps = $request->input('urlMaps');
       if (isset($cp)){
            //dd('aguante boca ct');
        $nuevo->capacidadTotal = $cp;
    }else{
        if(isset($lg)){
                //dd('aguante boca lg');
            $nuevo->capacidadTotal = -1;
        }
    }
    $nuevo->descripcion = $request->input('descripcion');
    $nuevo->update();

    return redirect()
    ->route('lugar.index')
    ->with('lugarEditado', 'Se ha editado el lugar correctamente.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lugar::findOrFail($id)->delete();

        return redirect()
        ->route('lugar.index')
        ->with('lugarEliminado', 'El lugar se eliminó correctamente!');
    }
}
