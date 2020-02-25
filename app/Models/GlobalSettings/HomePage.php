<?php

namespace App\Models\GlobalSettings;

use App\Services\Admin\Pages\HomePageService;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_page_setting';

    protected $fillable = [
        'about_section_img',
        'fields'
    ];

    public function getImgAboutSection()
    {
        if (!empty($this->about_section_img))
            return asset('assets/data/'.HomePageService::HOME_PAGE_ABOUT_SRC . $this->about_section_img);

        return '';
    }
}
