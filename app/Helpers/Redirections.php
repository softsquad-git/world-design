<?php

namespace App\Helpers;

class Redirections
{
    public static function redirectToError($controller)
    {
        return redirect()->action($controller)
            ->with('message', trans('softsquad.item.404'));
    }

    public static function redirectToSuccess($controller)
    {
        return redirect()->action($controller)
            ->with('message', trans('softsquad.item.saved'));
    }

    public static function redirectToRemoved($controller)
    {
        return redirect()->action($controller)
            ->with('message', trans('softsquad.item.removed'));
    }
}
