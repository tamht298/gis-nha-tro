<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendMaill;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $req)
    {
        $title = $req->tieude;
        $title = $req->ten;
        $title = $req->sdt;
        $title = $req->email;
        $title = $req->noidung;

        $details = [
            'title' => 'Title: '+,
            'body' => 'Body: this is for testing'
        ];
        Mail::to('tamht298@gmail.com')->send(new SendMaill($details));
        return view('pages.user.contact');

    }
}
