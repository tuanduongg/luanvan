<?php

namespace App\Observers;

use App\Models\Dispatche;
use Illuminate\Support\Facades\Mail;

class DispatcheObserver
{
    /**
     * Handle the Dispatche "created" event.
     *
     * @param  \App\Models\Dispatche  $dispatche
     * @return void
     */
    public function created(Dispatche $dispatche)
    {
        // Mail::send('email.test',['name'=>'this is my test name'],function($mail) {
        //     $mail->to('sv.19103100193@uneti.edu.vn','thảo chó');
        //     $mail->subject('thảo chó');
        // });
    }

    /**
     * Handle the Dispatche "updated" event.
     *
     * @param  \App\Models\Dispatche  $dispatche
     * @return void
     */
    public function updated(Dispatche $dispatche)
    {
        //
    }

    /**
     * Handle the Dispatche "deleted" event.
     *
     * @param  \App\Models\Dispatche  $dispatche
     * @return void
     */
    public function deleted(Dispatche $dispatche)
    {
        //
    }

    /**
     * Handle the Dispatche "restored" event.
     *
     * @param  \App\Models\Dispatche  $dispatche
     * @return void
     */
    public function restored(Dispatche $dispatche)
    {
        //
    }

    /**
     * Handle the Dispatche "force deleted" event.
     *
     * @param  \App\Models\Dispatche  $dispatche
     * @return void
     */
    public function forceDeleted(Dispatche $dispatche)
    {
        //
    }
}
