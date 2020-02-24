<?php


namespace App\Helpers;


use Illuminate\Support\Facades\File;

class UploadFile
{

    public static function upload($file, $dir)
    {
        $path = 'assets/data/' . $dir . '/';
        $fileName = substr(md5(time()), 10, 40) . '.' . $file->getClientOriginalExtension();

        $file->move($path, $fileName);

        return $fileName;
    }

    public static function remove($file, $dir)
    {
        $path = 'assets/data/' . $dir . '/' . $file;
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }

        return true;
    }

}
