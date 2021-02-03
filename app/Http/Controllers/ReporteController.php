<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use Carbon\Carbon;
use App\Asistencia;
use App\Persona;
use \PDF;

class ReporteController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}


    public function index()
    {
        $eventos = Evento::all();
        return view('reporte.reportes', compact('eventos'));
    }

    public function generateGenRep(Request $request)
    {

        if($request->input('evento') == null){
            //dd($request);

            return redirect()
            ->route('reportes')
            ->with('errorEvento', 'Te faltó seleccionar el evento.');

        }else{
            $evento = Evento::findOrFail($request->input('evento'));
        //dd($evento);
            $asistencias = Asistencia::where('idEvento', '=', $evento->idEvento)->get();
            $normal = 0;
            $vip = 0;
            foreach ($asistencias as $a) {
                if ($a->tipo == 0){
                    $normal += 1;
                }else{
                    $vip += 1;
                }
            };
            $pers= Persona::all()->sortBy('nombre');

            $pag = Asistencia::where('idEvento', '=', $evento->idEvento)->where('pagado', 1)->count();
            $total = $asistencias->count();
            //dd($pag);
    	//dd($asistencias);
        //dd($pers);
        //dd($vip);

            return view('reporte.reportGen', compact('evento', 'asistencias', 'pers', 'normal', 'vip', 'pag', 'total'));
    	//$pdf = PDF::loadView('reporte.reportGen',compact('evento', 'asistencias', 'pers', 'normal', 'vip'));
    	//return $pdf->setPaper('a4', 'landscape')->stream();
        }

    }

    public function downloadRepGen(Request $request)
    {
        //dd($request);
        $normal = 0;
        $vip = 0;
        $idEvento = $request->input('evento');
        $evento = Evento::findOrFail($idEvento);
        $asistencias = Asistencia::where('idEvento', '=', $idEvento)->get();
        $pers= Persona::all()->sortBy('nombre');
        //dd($evento);
        $pdf = PDF::loadView('reporte.desReportGen', compact('evento', 'asistencias', 'pers', 'normal', 'vip'));
        $pdf->setOptions(['isPhpEnabled' => true]);
        return $pdf->setPaper('a4', 'landscape')->stream('reporteGeneral.pdf');
    }

    public function generateCatRep(Request $request)
    {
        //dd($request);
        if($request->input('eventoCategoria') == null){
            return redirect()
            ->route('reportes')
            ->with('errorEvento', 'Te faltó seleccionar el evento.');

        }
        else{
            if($request->input('categoria') == null){
                return redirect()
                ->route('reportes')
                ->with('errorCategoria', 'Te faltó seleccionar la categoría.');
            }
            else{
                $e = Evento::findOrFail($request->input('eventoCategoria'));
                $pers= Persona::all();
        //dd($e);
                $cat = $request->input('categoria');
        //dd($cat);
                $asis = Asistencia::where('idEvento', $e->idEvento)->where('tipo', $cat)->get();
                $total = Asistencia::where('idEvento', $e->idEvento)->count();
                $count = $asis->count();
                //dd($total);
                //dd($count);
        //dd($asis);
                return view('reporte.reportCat', compact('e', 'cat', 'asis', 'pers', 'total', 'count'));


                //$pdf = PDF::loadView('reporte.reportCat', compact('e', 'cat', 'asis', 'pers'));
                //return $pdf->setPaper('a4', 'landscape')->stream();
            }
        }
    }

    public function downloadCatRep(Request $request)
    {
        //dd($request);
        $e = Evento::findOrFail($request->input('eventoCategoria'));
        $pers= Persona::all();
        //dd($e);
        $cat = $request->input('categoria');
        //dd($cat);
        $asis = Asistencia::where('idEvento', $e->idEvento)->where('tipo', $cat)->get();
        //dd($asis);

        $pdf = PDF::loadView('reporte.desReportCat', compact('e', 'cat', 'asis', 'pers'));
        return $pdf->setPaper('a4', 'landscape')->stream();
    }

    public function generateDateRep(Request $request)
    {
        //dd($request);
        if($request->input('desde') == null || $request->input('hasta') == null){
            return redirect()
            ->route('reportes')
            ->with('errorDate', 'Te faltó seleccionar alguna fecha.');
        }else{
            $desde = $request->input('desde');
            $hasta = $request->input('hasta');

            $es = Evento::whereBetween('fecha', [$desde,$hasta])->get();
        //dd($es);
        //$col = collect([]);

            foreach ($es as $e) {
            //dd($e);
                $asi = Asistencia::where('idEvento', $e->idEvento)->get();
                $e->cA = $asi->count();
            //dd($asi->count());
            //$col->push($asi->count());
            };
        //dd($col);
            return view('reporte.reportDate',compact('es', 'desde', 'hasta'));
            //$pdf = PDF::loadView('reporte.reportDate', compact('es', 'range', 'desde', 'hasta'));

            //return $pdf->setPaper('a4', 'landscape')->stream();
        }
    }
}
