<?php

namespace App\Http\Controllers;

use App\Jobs\sendMailJob;
use App\Mail\MyFirstMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    //
    public function index(){
       $emailJOb = new sendMailJob();
       $this->dispatch($emailJOb);
    }
}
