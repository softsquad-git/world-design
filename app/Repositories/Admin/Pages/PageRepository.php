<?php

namespace App\Repositories\Admin\Pages;

use App\Models\Pages\Page;

class PageRepository
{

    public function items()
    {
        $items = Page::orderBy('created_at', 'DESC')
            ->paginate(20);

        return $items;
    }

    public function find($id)
    {
        return Page::find($id);
    }

}
