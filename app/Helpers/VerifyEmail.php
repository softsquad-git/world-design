<?php


namespace App\Helpers;


use App\Mail\User\VerifyMail;
use App\Models\Verify\Verify;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerifyEmail
{

    public static function verifyEmail($user_id)
    {
        $new_key = self::generateKey();
        $key = self::getKeyDB($user_id);
        if (isset($key->id) && $key->id > 0)
        {
            self::removeKey();
            self::saveKeyDB($user_id, $new_key);
            return self::sendVerifyEmail($user_id);
        }

        self::saveKeyDB($user_id, $new_key);
        return self::sendVerifyEmail($user_id);

    }

    public static function checkKeys($key)
    {
        $key_db = self::getKeyDB(Auth::id())->_key;
        if ($key_db != $key)
        {
            return false;
        }

        self::removeKey();
        return true;
    }

    private static function generateKey()
    {
        return substr(md5(time()), 15, 15);
    }

    private static function saveKeyDB($user_id, $key)
    {
        $arr = [
            'user_id' => $user_id,
            '_key' => $key
        ];

        return Verify::create($arr);
    }

    private static function getKeyDB($user_id){
        return Verify::where('user_id', $user_id)->first();
    }

    private static function removeKey()
    {
        $key = self::getKeyDB(Auth::id());
        if (isset($key->id) && $key->id > 0)
        {
            $key->delete();

            return true;
        }

        return false;
    }

    private static function getDataUser($user_id)
    {
        $user = User::find($user_id);
        if (isset($user->id) && $user->id > 0)
        {
            return $user;
        }

        return false;
    }

    private static function sendVerifyEmail($user_id)
    {
        $user = self::getDataUser($user_id);

        return Mail::to($user->email)->send(new VerifyMail($user));
    }

}
