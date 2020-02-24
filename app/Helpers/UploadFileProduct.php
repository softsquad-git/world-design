<?php

namespace App\Helpers;

use App\Models\Products\Image;
use App\Services\Admin\Products\ProductService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UploadFileProduct
{

    public static function upload($product_id, $files, $dir)
    {
        foreach ($files as $file) {
            $name = $file->getClientOriginalExtension();
            $filename = substr(md5(time().rand(0, 1000)), 10, 40) . '.' . $name;
            $file->move($dir, $filename);
            DB::table('product_images')
                ->insert([
                    'product_id' => $product_id,
                    'file' => $filename
                ]);
        }

        return true;
    }

    public static function remove($id)
    {
        $file = Image::find($id);
        if (isset($file->id) && $file->id > 0) {
            if (File::exists(ProductService::IMAGE_PATH . $file)) {
                File::delete(ProductService::IMAGE_PATH . $file);
            }
            $file->delete();

            return true;
        }

        return false;
    }

}
