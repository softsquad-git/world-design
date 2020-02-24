<?php


namespace App\Repositories\Front\Pages;


use App\Models\Pages\Page;

class PageRepository
{

    public function items()
    {
        $items = Page::orderBy('menu_position', 'ASC')
            ->get();

        return $items;
    }

    public function find($alias)
    {
        $item = Page::where('alias', $alias)
            ->first();

        return $item;
    }

}
