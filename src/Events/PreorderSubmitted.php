<?php

namespace SubalRoy\Preorder\Events;

use SubalRoy\Preorder\Models\Preorder;

class PreorderSubmitted
{
    public $preorder;

    public function __construct(Preorder $preorder)
    {
        $this->preorder = $preorder;
    }
}
