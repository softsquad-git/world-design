<?php

namespace App\Helpers;

use App\Repositories\Front\Pages\PageRepository;

class Page
{

    public static function getPagesTop()
    {
        $page = new PageRepository();

        return $page->items()->where('menu_position', '!=', 777);
    }

    public static function getPagesFooter()
    {
        $page = new PageRepository();

        return $page->items()->where('menu_position', 777);
    }

}
