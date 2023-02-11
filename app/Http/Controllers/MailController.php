<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function store()
    {
        request()->validate(['email' => 'required|email']);

    Mail::raw('It Works',function($message){
        $message->to(request('email'))
        ->subject('Hello There');
    });
    return redirect('/')->with('success','You are now signed up for our news letter');
    }
}
