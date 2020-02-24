<?php

namespace App;

use App\Models\Messages\Message;
use App\Models\Products\Product;
use App\Models\Users\Contact;
use App\Models\Verify\Verify;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'activated',
        'role'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contact()
    {
        return $this->hasOne(Contact::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_id', 'id');
    }

    public function verify()
    {
        return $this->hasOne(Verify::class, 'user_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'email_from', 'email');
    }
}
