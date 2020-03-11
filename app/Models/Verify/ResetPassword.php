<?php

namespace App\Models\Verify;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table = 'reset_password';

    protected $fillable = [
        'email',
        '_token'
    ];
}
