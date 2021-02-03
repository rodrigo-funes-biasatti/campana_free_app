<?php

namespace App\Listeners;

use App\Events\PersonaWasEliminated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Asistencia;

class RemoveAssociatedAssistancesPersonas
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PersonaWasEliminated  $event
     * @return void
     */
    public function handle(PersonaWasEliminated $event)
    {
        //dd($event->idPersona);
        Asistencia::where('idPersona',$event->idPersona)->delete();
    }
}
