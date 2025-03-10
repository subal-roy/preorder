<?php

namespace SubalRoy\Preorder\Mail;

use Illuminate\Mail\Mailable;
use SubalRoy\Preorder\Models\Preorder;

class AdminEmail extends Mailable
{
    public $preorder;

    public function __construct(Preorder $preorder)
    {
        $this->preorder = $preorder;
    }

    public function build()
    {
        $emailContent = "<h1>New Preorder Recieved</h1>";
        $emailContent .= "<p><strong>Customer Name:</strong> " . $this->preorder->name . "</p>";
        $emailContent .= "<p><strong>Product:</strong> " . $this->preorder->product . "</p>";
        $emailContent .= "<p><strong>Email:</strong> " . $this->preorder->email . "</p>";
        $emailContent .= "<p><strong>Phone:</strong> " . $this->preorder->phone . "</p>";

        
        return $this->subject('New Preorder Received')
                    ->html($emailContent);
    }
}
