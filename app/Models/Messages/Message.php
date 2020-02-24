<?php

namespace App\Models\Messages;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'email_from',
        'email_to',
        'recipient_id',
        'message',
        'product_id',
        'read'
    ];
}
