<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    
    public function build()
    {
        return $this->subject('nexus.anime.mv@gmail.com')->from('nexus.anime.mv@gmail.com')->view('myDashboard.pages.Email.EmailVerify');
    }
}
