<?php


namespace App\Repositories\Admin\Settings;


use App\Models\GlobalSettings\GlobalSetting;

class SettingRepository
{

    public function find($id)
    {
        $item = GlobalSetting::find($id);

        return $item;
    }

    public function items()
    {
        $items = GlobalSetting::orderBy('id', 'DESC')
            ->get();

        return $items;
    }

}
