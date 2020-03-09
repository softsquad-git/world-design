<?php


namespace App\Repositories\Front\Pages;


use App\Models\Pages\Page;
use Illuminate\Support\Facades\Session;

class PageRepository
{

    public function items()
    {
        $locale = Session::get('locale');
        $items = Page::orderBy('menu_position', 'ASC')
            ->where('locale', $locale)
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
