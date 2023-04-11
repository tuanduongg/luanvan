<?php

namespace App\Observers;

use App\Jobs\EmailJob;
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
        if ($dispatche->role == 1) {
            dispatch(new EmailJob($dispatche));
        }
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
