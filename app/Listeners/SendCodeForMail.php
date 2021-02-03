<?php

namespace App\Listeners;

use Mail;
use App\Events\AsistenciaWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCodeForMail
{
    /**
     * Handle the event.
     *
     * @param  AsistenciaWasCreated  $event
     * @return void
     */
    public function handle(AsistenciaWasCreated $event)
    {

        //dd($event->code);
        //dd($event->e->nombre);
        //dd($event->p->email);
        Mail::send('mail.sendingCode', ['event' => $event->e, 'code' => $event->code, 'per' => $event->p], function($m) use ($event){
            $m->to($event->p->email, $event->p->nombre)->subject('Hemos recibido tu confirmación de asistencia');
        }); //send(vista,variables_para_la_vista,funcion);
    }
}
