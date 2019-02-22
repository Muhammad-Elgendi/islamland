<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\item as item;

use Carbon\Carbon;

use App\visitor as visitor;

class shower_controller extends Controller
{
   public function index ($section,$title){
       // matching data
      $matching=[
            "section" => $section,
            "link_title" => $title,
            "working"=>1
        ];
       if(item::where($matching)->count()==0)
        return abort(404);

       else{
        //update visits counter     
        $item = item::where($matching)->first(); 
        $item_visits=$item['visits'];
        $item->visits =$item_visits+1;            
        $item->save();

        //register the visitor
      $register=\App::call('App\Http\Controllers\visits_controller@visit');

        //get readable date from DB
  //    $item = item::where($matching)->first();
      Carbon::setLocale('ar');      
      $time= $item->created_at->diffForHumans();

       //get the lastest item visited
       $viewnow = item::where([
           ['visits', '>', 0],
           ['id', '>', 7]
       ])->orderBy('updated_at', 'desc')->take(4)->get();

       //get the visitor counter
       $sitecounter=visitor::find(1);

       //get the matching data
           //as first becouse where() only return a collection but find return single model
   //    $item = item::where($matching)->first();

        //ar locate of section
       switch ($item->section) {
         case 'scholar':
           $section_ar="العلماء";
           break;
         
           case 'lesson':
           $section_ar="لقاءات";
           break;

           case 'music':
           $section_ar="الأناشيد";
           break;

           case 'recitation':
           $section_ar="التلاوات";
           break;

           case 'fatwa':
           $section_ar="فتاوي";
           break;

           case 'video':
           $section_ar="الفيديوهات";
           break;

           case 'slider':
           $section_ar="توصيات";
           break;

         default:
           # code...
           break;
       }

        //customize content
           switch ($item->source) {
               case 'طريق الإسلام':
                   require_once(app_path() . '/includes/core/islamway_sh.php');
                   $item->content=content($item->id);
                   break;

               default:
                   # code...
                   break;
           }




    return view('content')
    ->with('item',$item)
    ->with('section',$section_ar)
    ->with('time',$time)
    ->with('viewnow',$viewnow)
    ->with('sitecounter',$sitecounter);
      }
   }




}
