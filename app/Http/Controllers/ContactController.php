<?php

namespace App\Http\Controllers;

use App\Mail\MyFirstMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index(){
        Mail::to('knowledgethrusters@gmail.com')->send(new MyFirstMail());
        return 'success';
    }
}
