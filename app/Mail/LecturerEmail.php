<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LecturerEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $lecturer;
    public $dispatche;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lecturerObj,$dispatcheObj)
    {
        $this->lecturer = $lecturerObj;
        $this->dispatche = $dispatcheObj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Công Văn Đến Khoa CNTT UNETI')
            ->view('email.index',[
               'lecturer' => $this->lecturer,
               'dispatche' => $this->dispatche,
            ]);
    }
}
