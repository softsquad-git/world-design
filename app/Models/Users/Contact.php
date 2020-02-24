<?php

namespace App\Models\Users;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact_user';

    protected $fillable = [
        'user_id',
        'city',
        'address',
        'post_code',
        'phone',
        'country'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
