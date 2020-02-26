<?php

namespace App\Http\Controllers\Admin;

use App\Config;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;
use App\Mail\CreateAdminAccountMail;
use App\Models\Users\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ConfigController extends Controller
{
    public function __construct()
    {
        $config = Config::first();
        if (!empty($config))
            return redirect()->route('home');
    }

    public function getKey()
    {
        $key = Str::random(32);
        Config::create([
            'key_admin' => $key
        ]);
        Mail::to('michallosak@gmail.com')->send(new CreateAdminAccountMail($key));

        return redirect()->route('config-account');
    }

    public function create(){
        return view('admin.config');
    }

    public function createAdminAccount(ConfigRequest $request)
    {
        $keyDB = Config::where('key_admin', $request->key)->first();
        if (empty($keyDB))
            return redirect()->action('Admin\ConfigController@create');
        $user = $request->only(['name', 'email', 'password']);
        $user['password'] = Hash::make($user['password']);
        $contact = $request->only(['city', 'address', 'post_code', 'phone', 'country']);

        $admin = User::create($user);
        $contact['user_id'] = $admin->id;
        Contact::create($contact);

        return redirect('login');
    }
}
