<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function view()
    {
        return view('admin.settings.password');
    }

    public function changePass()
    {
        return view('admin.accounts.form');
    }

    public function newPass()
    {

    }
}
