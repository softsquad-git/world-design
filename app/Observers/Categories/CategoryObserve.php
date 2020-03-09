<?php


namespace App\Observers\Categories;


use App\Models\Categories\Category;

class CategoryObserve
{

    public function deleting(Category $category)
    {
        $category->products()->delete();
    }

}
