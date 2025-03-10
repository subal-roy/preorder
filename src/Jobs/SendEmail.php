<?php

namespace SubalRoy\Preorder\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use SubalRoy\Preorder\Mail\AdminEmail;
use SubalRoy\Preorder\Mail\UserEmail;
use SubalRoy\Preorder\Models\Preorder;

class SendEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private Preorder $preorder)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('admin@example.com')->send(new AdminEmail($this->preorder));
        Mail::to($this->preorder->email)->send(new UserEmail($this->preorder));
    }
}
