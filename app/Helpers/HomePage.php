<?php


namespace App\Helpers;


use App\Services\Admin\Pages\HomePageService;

class HomePage
{

    public static function getDataHomePage()
    {
        $item = \App\Models\GlobalSettings\HomePage::first();
        if (!empty($item->fields))
           return $field = json_decode($item->fields);

        return false;

    }

    public static function getDataHomePageItem()
    {
        $item = \App\Models\GlobalSettings\HomePage::first();

        return $item;
    }

    public static function getTxtLeft()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->text_left))
            return $hp->text_left;

        return config('app.df.hp.text_left');
    }

    public static function getTxtRight()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->text_right))
            return $hp->text_right;

        return config('app.df.hp.text_right');
    }

    public static function getTitleFirst()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->title_first))
            return $hp->title_first;

        return config('app.df.hp.title_first');
    }

    public static function getTitleAbout()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->title_about))
            return $hp->title_about;

        return config('app.df.hp.title_about');
    }

    public static function getDescriptionAbout()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->description_about))
            return $hp->description_about;

        return config('app.df.hp.description_about');
    }

    public static function getTitleSecond()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->title_second))
            return $hp->title_second;

        return config('app.df.hp.title_second');
    }

    public static function getInfoVOne()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->info_v_one))
            return $hp->info_v_one;

        return config('app.df.hp.v.one');
    }

    public static function getInfoVTwo()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->info_v_two))
            return $hp->info_v_two;

        return config('app.df.hp.v.two');
    }

    public static function getInfoVThree()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->info_v_three))
            return $hp->info_v_three;

        return config('app.df.hp.v.three');
    }

    public static function getInfoVFour()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->info_v_four))
            return $hp->info_v_four;

        return config('app.df.hp.v.four');
    }

    public static function getInfoTOne()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->info_t_one))
            return $hp->info_t_one;

        return config('app.df.hp.t.one');
    }

    public static function getInfoTTwo()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->info_t_two))
            return $hp->info_t_two;

        return config('app.df.hp.t.two');
    }

    public static function getInfoTThree()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->info_t_three))
            return $hp->info_t_three;

        return config('app.df.hp.t.three');
    }

    public static function getInfoTFour()
    {
        $hp = self::getDataHomePage();
        if (!empty($hp->info_t_four))
            return $hp->info_t_four;

        return config('app.df.hp.t.four');
    }

    public static function getIMGAbout()
    {
        $hp = self::getDataHomePageItem();
        if (!empty($hp->about_section_img))
            return asset('assets/data/'.HomePageService::HOME_PAGE_ABOUT_SRC.$hp->about_section_img);

        return asset('assets/data/front/images/bg_2.jpg');
    }

}
