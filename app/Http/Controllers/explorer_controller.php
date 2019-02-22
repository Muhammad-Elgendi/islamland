<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\source as source;

use App\link as link;


class explorer_controller extends Controller
{
  public function index(){

      //update source DB
      $current_source=source::find(1)['link'];
      $source=source::find($current_source)['link'];
      //parsing link and choose function
     switch(parse_url($source)['host']){
         //islamway_ex
         case "ar.islamway.net":
             {
              $first_parse=parse_url($source)['path'];
              $is_feed=strpos($first_parse, 'feeds');
              if($is_feed){
                require_once(app_path() . '/includes/core/islamway_ex_rss.php');
                $out=rss_iw($source);
              }
              else{
                require_once(app_path() . '/includes/core/islamway_ex_html.php');
                $html=\App::call('App\Http\Controllers\stream_controller@stream_html',['link' => $source]);
                $out=html_iw($html);
              } 
                 foreach($out as $link)
                 {                     
                     $exist=link::where('link',$link)->count();
                     if($exist==0) {
                         // insert data
                         $insert = new link;
                         $insert->link = $link;
                         $insert->save();
                     }
                 }
               //  $out="inserted ^_^" or die("couldn't out a thing -_-");
             }
             break;
         /*case"":
             {

             }
             break;
         */
    }
  
      //update source DB
      $current_source++;
      $max_id = source::orderBy('id', 'desc')->first()['id'];
      if (source::find(1)['link']>=$max_id){     
          $current_source ='2';
      }
      $insert =source::find(1);
      $insert->link =$current_source ;
      $insert->save();
      //output Message
      //return $out;
      return "Done ^^";
  }
}
