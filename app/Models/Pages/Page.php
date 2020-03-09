<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'alias',
        'content',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'menu_position',
        'locale'
    ];
}
