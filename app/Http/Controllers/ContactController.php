<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    //
    public function index(){

        $data = array("fruit" => "apple");
      Log::info('Info logging tutorial', ['id' => 4]);
      Log::warning('warning logging tutorial', $data);
      Log::notice('notice logging tutorial');
      Log::error('error logging tutorial');
      Log::debug('debug logging tutorial');
      Log::critical('critical logging tutorial');
      Log::emergency('emergency logging tutorial');
      Log::alert('alert logging tutorial');

      Log::channel('customLog')->info("Custom Channel Log");

      echo "welcome";
    }
}
