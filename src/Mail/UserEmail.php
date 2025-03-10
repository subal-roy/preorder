<?php

namespace SubalRoy\Preorder\Mail;

use Illuminate\Mail\Mailable;
use SubalRoy\Preorder\Models\Preorder;

class UserEmail extends Mailable
{
    public $preorder;

    public function __construct(Preorder $preorder)
    {
        $this->preorder = $preorder;
    }

    public function build()
    {
        $emailContent = "<h1>Preorder Confirmation</h1>";
        $emailContent .= "<p><strong>Thank you " . $this->preorder->name ." for your preorder.</strong></p>";
        $emailContent .= "<p><strong>Product:</strong> " . $this->preorder->product . "</p>";
        $emailContent .= "<p>Our Addmin will contact to you shortly.</p>";
        $emailContent .= "<p>Best Regards</p>";
        $emailContent .= "<p>Grocery Shop Team</p>";

        return $this->subject('Preorder Confirmation')
                    ->html($emailContent);
    }
}
