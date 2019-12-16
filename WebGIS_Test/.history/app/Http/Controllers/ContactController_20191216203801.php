<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function sendEmail()
    {
        $data['title'] = "This is Test Mail";

        Mail::send('emails.email', $data, function($message) {

            $message->to('tamht298@gmail.com', 'Receiver Name')

                    ->subject('Test Mail');
        });

        
    }
}
