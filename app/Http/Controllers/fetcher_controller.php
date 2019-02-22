<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\source as source;

use App\link as link;

use App\item as item;



class fetcher_controller extends Controller
{
    public function index(){
        header('Content-Type: text/html; charset=utf-8');
        //update link DB table
        $current_link=link::find(1)['link'];
        $link=link::find($current_link)['link'];
        //parsing link and choose function
        switch(parse_url($link)['host']) {
            //islamway_fe
            case "ar.islamway.net": {
                require_once(app_path() . '/includes/core/islamway_fe.php');
                $data = islamway($link);            
                break;
        }
    }
    if($data!=0){
        if($data["redirect"]==0){
        //remove redirect flag
        unset($data['redirect']);
        //insert data to DB
        $exist = item::where('link', $data["link"])->count();
        if ($exist == 0) {
            if((strpos($data["content"],'error')!== FALSE)|
                (strpos($data["content1"],'error')!== FALSE)|
                (strpos($data["content2"],'error')!== FALSE)|
                (strpos($data["content3"],'error')!== FALSE)|
                (strpos($data["content4"],'error')!== FALSE)|
                (strpos($data["content5"],'error')!== FALSE)|
                (strpos($data["content6"],'error')!== FALSE)){
                $working=FALSE;
            }
            else{
                $working=TRUE;
            }
            // insert data
            $insert = new item;            
            $insert->sc_link = $data["sc_link"];
            $insert->link = $data["link"];
            $insert->link_title = $data["link_title"];
            $insert->title = $data["title"];
            $insert->f_img = $data["f_img"];
            $insert->content = $data["content"];
            $insert->content1 = $data["content1"];
            $insert->content2 = $data["content2"];
            $insert->content3 = $data["content3"];
            $insert->content4 = $data["content4"];
            $insert->content5 = $data["content5"];
            $insert->content6 = $data["content6"];
            $insert->visits = 0;
            $insert->working = $working;
            $insert->report = False;
            $insert->source = $data["source"];
            $insert->section = $data["section"];
            $insert->author = $data["author"];
            $insert->source_ico = $data["sc_ico"];
            $insert->ico = $data["ico"];
            $insert->description = $data["description"];
            $insert->keywords = $data["keywords"];
            $insert->save();
        }
}
else{
                 //remove redirect flag
                 unset($data['redirect']);
                 foreach($data as $link)
                 {                     
                     $exist=link::where('link',$link)->count();
                     if($exist==0) {
                         // insert data
                         $insert = new link;
                         $insert->link = $link;
                         $insert->save();
                     }
                 }
     }}    
        //Delete current link after insert its info to items table
        $delete=link::find($current_link);
        $delete->delete();

        //update source DB
        $current_link++;
        $max_id = link::orderBy('id', 'desc')->first()['id'];
        if (link::find(1)['link']>=$max_id){
            $current_link ='2';
        }
        $insert =link::find(1);
        $insert->link =$current_link ;
        $insert->save();

        //output Message
        return "Done ^^";
    }
}