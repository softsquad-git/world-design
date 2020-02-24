<?php

namespace App\Helpers;

class GlobalSetting
{

    const LOGO_PAGE_URL = 'assets/data/logo/';
    const TOP_BANNER_URL = 'assets/data/banners/';

    public static function getSettings(){
        return \App\Models\GlobalSettings\GlobalSetting::find(1);
    }

    public static function getLogo()
    {
        $globalSetting = self::getSettings();
        if (!empty($globalSetting->logo)) {
            return asset(GlobalSetting::LOGO_PAGE_URL . $globalSetting->logo);
        }

        return asset(GlobalSetting::LOGO_PAGE_URL . 'df-top.png');
    }

    public static function getTitlePage()
    {
        $globalSetting = self::getSettings();
        if (!empty($globalSetting->title_page)) {
            return $globalSetting->title_page;
        }

        return config('app.df.title');
    }

    public static function getHomePageImg()
    {
        $globalSetting = self::getSettings();
        if (!empty($globalSetting->homepage_image)) {
            return asset(self::TOP_BANNER_URL . $globalSetting->homepage_image);
        }

        return asset(GlobalSetting::TOP_BANNER_URL . 'df-banner.jpg');
    }

    public static function getHomePageTitle()
    {
        $globalSetting = self::getSettings();
        if (!empty($globalSetting->title_top_home_page)) {
            return $globalSetting->title_top_home_page;
        }

        return '';
    }

    public static function getHomePageIntro()
    {
        $globalSetting = self::getSettings();
        if (!empty($globalSetting->intro_top_home_page)) {
            return $globalSetting->intro_top_home_page;
        }

        return '';
    }

    public static function getEmail()
    {
        $globalSetting = self::getSettings();
        if (!empty($globalSetting->email)) {
            return $globalSetting->email;
        }

        return config('app.df.email');
    }

    public static function getPhone()
    {
        $globalSetting = self::getSettings();
        if (!empty($globalSetting->phone)) {
            return $globalSetting->phone;
        }

        return config('app.df.phone');
    }

    public static function getLocation()
    {
        $globalSetting = self::getSettings();
        if (!empty($globalSetting->location)) {
            return $globalSetting->location;
        }

        return config('app.df.location');
    }

    public static function getFbUrl()
    {
        $globalSetting = self::getSettings();
        if (!empty($globalSetting->fb_url)) {
            return $globalSetting->fb_url;
        }

        return config('app.df.fb_url');
    }

    public static function isLogo()
    {
        $globalSetting = self::getSettings();
        if (!empty($globalSetting->is_logo)) {
            if ($globalSetting->is_logo == 1) {
                return 1;
            }

            return 0;
        }

        return 0;
    }

}
