<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class stream_controller extends Controller
{
    public function stream_html($link){
    	$html=file_get_contents($link);	
    	return $html;
    }
}
