<?php

namespace App\Models\Colors;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    protected $fillable = [
        'code'
    ];
}
