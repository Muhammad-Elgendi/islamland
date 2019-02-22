<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\source as source;

use App\link as link;

use App\item as item;

use App\visitor as visitor;

class first_time_conf extends Controller
{
    public function index(){
    	$current_source=source::find(1)['link'];
        if ($current_source == 0) {
            // insert data
            $insert = new source;            
            $insert->link = '2';
            $insert->save();
        }
        $current_link=link::find(1)['link'];
        if ($current_link == 0) {
            $insert = new link;            
            $insert->link = '2';
            $insert->save();
        }
        $visits_sum=visitor::find(1)['ip'];
        if ($visits_sum == 0) {
            $insert = new visitor;            
            $insert->ip = 0;
            $insert->hits = 0;
            $insert->save();
        }
        $main_pages=['home','scholar','lesson','recitation','music','fatwa','video',
            'empty',
            'empty',
            'empty',
            'empty',
            'empty'          
        ];

        $i=1;
        foreach ($main_pages as $page) {

        $current_item=item::find($i)['link'];
            if ($current_item == 0) {
                if($page!='empty'){
                $insert = new item;            
                $insert->link = '/'.$page;
                $insert->sc_link = '/'.$page;
                $insert->link_title = '/'.$page;
                $insert->title = '/'.$page;
                $insert->f_img = '/'.$page;
                $insert->content = '/'.$page;
                $insert->content1 = '/'.$page;
                $insert->content2 = '/'.$page;
                $insert->content3 = '/'.$page;
                $insert->content4 = '/'.$page;
                $insert->content5 = '/'.$page;
                $insert->content6 = '/'.$page;
                $insert->visits = 0;
                $insert->working = TRUE;
                $insert->report = False;
                $insert->source = '/'.$page;
                $insert->section = '/'.$page;
                $insert->author = '/'.$page;
                $insert->source_ico = '/'.$page;
                $insert->ico = '/'.$page;
                $insert->description = '/'.$page;
                $insert->keywords = '/'.$page;
                $insert->save();
                }
            $i++;
            }
        }       
    	return"DB is Ready ^^";
    }
}
