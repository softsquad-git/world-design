<?php

namespace App\Models\GlobalSettings;

use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'logo',
        'title_page',
        'homepage_image',
        'title_top_home_page',
        'intro_top_home_page',
        'email',
        'phone',
        'location',
        'fb_url',
        'is_logo'
    ];
}
