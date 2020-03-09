<?php

namespace App\Models\Newsletters;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletter';

    protected $fillable = [
        'email'
    ];
}
