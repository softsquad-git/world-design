<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'references';

    protected $fillable = [
        'name',
        'reference',
        'token',
        'status'
    ];
}
