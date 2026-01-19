<?php

namespace Illuminate\Support\Testing\Fakes;

class PendingMailFake extends \Illuminate\Mail\PendingMail
{
    /**
     * Create a new instance.
     *
     * @param  \Illuminate\Support\Testing\Fakes\MailFake  $mailer
     * @return void
     */
    public function __construct($mailer)
    {
    }
    /**
     * Send a new mailable message instance.
     *
     * @param  \Illuminate\Contracts\Mail\Mailable  $mailable
     * @return void
     */
    public function send(\Illuminate\Contracts\Mail\Mailable $mailable)
    {
    }
    /**
     * Push the given mailable onto the queue.
     *
     * @param  \Illuminate\Contracts\Mail\Mailable  $mailable
     * @return mixed
     */
    public function queue(\Illuminate\Contracts\Mail\Mailable $mailable)
    {
    }
}