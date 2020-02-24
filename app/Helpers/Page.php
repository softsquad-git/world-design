<?php

namespace App\Helpers;

use App\Repositories\Front\Pages\PageRepository;

class Page
{

    public static function getPages()
    {
        $page = new PageRepository();

        return $page->items();
    }

}
