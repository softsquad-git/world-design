<?php

namespace App\Services\Admin\Pages;

use App\Models\Pages\Page;

class PageService
{

    public function store(array $data): Page
    {
        $item = Page::create($data);

        return $item;
    }

    public function update(array $data, Page $item): Page
    {
        $item->update($data);

        return $item;
    }

    public function delete($item)
    {
        $item->delete();

        return true;
    }

    public function page(){
        return new Page();
    }

}
