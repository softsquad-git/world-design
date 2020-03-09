<?php


namespace App\Repositories\Admin\Pages;


use App\Models\GlobalSettings\HomePage;

class HomePageRepository
{

    public function find()
    {
        $item = HomePage::first();

        return $item;
    }

    public function findID($id)
    {
        $item = HomePage::find($id);

        return $item;
    }

}
