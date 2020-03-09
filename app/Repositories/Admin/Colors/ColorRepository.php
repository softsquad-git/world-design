<?php


namespace App\Repositories\Admin\Colors;


use App\Models\Colors\Color;

class ColorRepository
{

    public function items()
    {
        $items = Color::all();

        return $items;
    }

    public function find($id)
    {
        $item = Color::find($id);

        return $item;
    }

}
