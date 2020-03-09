<?php

namespace App\Services\Front\Newsletters;

use App\Models\Newsletters\Newsletter;

class NewsletterService
{

    public function store(array $data): Newsletter
    {
        $item = Newsletter::create($data);

        return $item;
    }

    public function delete($item)
    {
        $item->delete();

        return true;
    }

}
