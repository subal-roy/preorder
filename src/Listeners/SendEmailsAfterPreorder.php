<?php

namespace SubalRoy\Preorder\Listeners;

use SubalRoy\Preorder\Events\PreorderSubmitted;
use SubalRoy\Preorder\Jobs\SendEmail;

class SendEmailsAfterPreorder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PreorderSubmitted $event): void
    {
        SendEmail::dispatch($event->preorder);
    }
}
