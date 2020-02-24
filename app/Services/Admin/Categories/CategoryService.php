<?php


namespace App\Services\Admin\Categories;


use App\Models\Categories\Category;

class CategoryService
{

    public function store(array $data): Category
    {
        $item = Category::create($data);

        return $item;
    }

    public function update(array $data, Category $item): Category
    {
        $item->update($data);

        return $item;
    }

    public function delete($item)
    {
        $item->delete();

        return true;
    }

    public function category()
    {
        return new Category();
    }

}
