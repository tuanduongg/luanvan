<?php

namespace App\Jobs;

use App\Mail\LecturerEmail;
use App\Repositories\Lecturer\LecturerRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     * 
     */
    public $dispatche;
    public function __construct($dispatcheObj)
    {
        $this->dispatche = $dispatcheObj;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $lecturers = (new LecturerRepository())->getNameAndEmail();

        foreach ($lecturers as $key => $lecturer) {
            Mail::to($lecturer->email)->send(new LecturerEmail($lecturer, $this->dispatche));
        }

        dd('Send email successfully.');
    }
    public function failed()
    {
        dd('Send email failed.');
    }
}
