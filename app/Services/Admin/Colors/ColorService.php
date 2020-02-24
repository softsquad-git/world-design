<?php


namespace App\Services\Admin\Colors;


use App\Models\Colors\Color;

class ColorService
{

    public function store(array $data): Color
    {
        $item = Color::create($data);

        return $item;
    }

    public function update(array $data, Color $item): Color
    {
        $item->update($data);

        return $item;
    }

    public function delete($item)
    {
        $item->delete();

        return true;
    }

    public function color(){
        return new Color();
    }

}
