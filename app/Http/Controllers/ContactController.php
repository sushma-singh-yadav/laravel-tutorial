<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
       $roles = config('constants.roles');
       print_r($roles);
    }
}
