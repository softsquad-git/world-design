<?php


namespace App\Services\Admin\Settings;


use App\Helpers\UploadFile;
use App\Models\GlobalSettings\GlobalSetting;

class SettingService
{

    public function store(array $data): GlobalSetting
    {
        if (!empty($data['logo']))
        {
            $filename = UploadFile::upload($data['logo'], 'logo');
            $data['logo'] = $filename;
        }
        if (!empty($data['homepage_image']))
        {
            $filename = UploadFile::upload($data['homepage_image'], 'banners');
            $data['homepage_image'] = $filename;
        }

        $item = GlobalSetting::create($data);

        return $item;
    }

    public function update(array $data, GlobalSetting $item): GlobalSetting
    {
        if (!empty($data['logo'])){
            UploadFile::remove($item->logo, 'logo');
            $filename = UploadFile::upload($data['logo'], 'logo');
            $data['logo'] = $filename;
        }
        if (!empty($data['homepage_image'])){
            UploadFile::remove($item->homepage_image, 'banners');
            $filename = UploadFile::upload($data['homepage_image'], 'banners');
            $data['homepage_image'] = $filename;
        }

        $item->update($data);

        return $item;
    }

    public function delete($item)
    {
        UploadFile::remove($item->logo, 'logo');
        UploadFile::remove($item->homepage_image, 'banners');

        $item->delete();

        return true;
    }

    public function globalSetting()
    {
        return new GlobalSetting();
    }

}
