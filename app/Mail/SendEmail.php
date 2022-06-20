<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $filepath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file = Storage::disk('local')->get($this->filepath);
        return $this->from('inosoft@gmail.com')
        ->attach($file);
    }
}
