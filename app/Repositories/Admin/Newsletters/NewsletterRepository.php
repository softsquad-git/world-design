<?php

namespace App\Repositories\Admin\Newsletters;

use App\Models\Newsletters\Newsletter;

class NewsletterRepository
{

    public function items()
    {
        $items = Newsletter::orderBy('id', 'DESC')
            ->get();

        return $items;
    }

}
