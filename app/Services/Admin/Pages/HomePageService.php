<?php

namespace App\Services\Admin\Pages;

use App\Helpers\UploadFile;
use App\Models\GlobalSettings\HomePage;

class HomePageService
{
    const HOME_PAGE_ABOUT_SRC = 'pages/home/sections/about/';

    public function store(array $data, $file)
    {
        if (!empty($file))
        {
            $filename = UploadFile::upload($file, HomePageService::HOME_PAGE_ABOUT_SRC);
            $data['about_section_img'] = $filename;
        }

        $data['fields'] = json_encode($data['fields']);

        $item = HomePage::create($data);

        return $item;
    }

    public function update(array $data, $file, HomePage $item): HomePage
    {
        if (!empty($file))
        {
            UploadFile::remove($file, HomePageService::HOME_PAGE_ABOUT_SRC);
            $filename = UploadFile::upload($file, HomePageService::HOME_PAGE_ABOUT_SRC);
            $data['about_section_img'] = $filename;
        }

        $data['fields'] = json_encode($data['fields']);

        $item->update($data);

        return $item;
    }

    public function hp()
    {
        return new HomePage();
    }

}
