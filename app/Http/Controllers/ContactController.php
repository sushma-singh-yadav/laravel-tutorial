<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        echo "Hello world";
    }

    public function show($id){
        echo $id;
    }
}
