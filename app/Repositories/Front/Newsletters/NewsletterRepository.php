<?php

namespace App\Repositories\Front\Newsletters;

use App\Models\Newsletters\Newsletter;

class NewsletterRepository
{

    public function find($email)
    {
        $item = Newsletter::where('email', $email)
            ->first();

        return $item;
    }

}
