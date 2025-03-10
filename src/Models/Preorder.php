<?php

namespace SubalRoy\Preorder\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preorder extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'product'];
}
