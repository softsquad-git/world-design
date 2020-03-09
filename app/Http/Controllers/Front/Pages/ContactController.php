<?php

namespace App\Http\Controllers\Front\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Pages\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function message(ContactRequest $request)
    {
        Mail::to('contact@world-design.pl')->send(new ContactMail($request->all()));

        return redirect()->back()
            ->with('message', trans('softsquad.item.saved'));
    }
}
