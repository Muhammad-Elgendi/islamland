<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\visitor as visitor;

class visits_controller extends Controller
{
    public function visit(){
        $user_ip = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);
    	$visit=visitor::firstOrCreate(['ip' => $user_ip]);
    	$visit->hits=$visit->hits+1;    	
    	$visit->save();    	
    	$sum_row=visitor::find(1);
    	$sum_row->ip=visitor::count()-1;
    	$hits_now=$sum_row['hits'];
    	$sum_row->hits=$hits_now+1;
    	$sum_row->save();

    	return 0;
    }
}
