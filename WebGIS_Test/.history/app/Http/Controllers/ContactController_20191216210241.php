<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendMaill;
use Illuminate\Support\Facades\Mail

class ContactController extends Controller
{
    public function sendEmail()
    {

        $details = [
            'title' => 'Title: Test',
            'body' => 'Body: this is for testing'
        ];
        Mail::to('tamht298@gmail.com')->send(new SendMaill($details));
        return view('user.thanks');

    }
}
