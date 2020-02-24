<?php

namespace App\Repositories\Admin\Categories;

use App\Models\Categories\Category;

class CategoryRepository
{

    public function items()
    {
        $items = Category
            ::orderBy('created_at', 'DESC')
            ->paginate(20);

        return $items;
    }

    public function find($id)
    {
        $item = Category::find($id);

        return $item;
    }

}
