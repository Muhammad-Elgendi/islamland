<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\item as item;

use App\visitor as visitor;

class section_shower_controller extends Controller
{
    public function index($section){
        if(item::where('section',$section)->count()==0)
            return abort(404);
        //update visits counter
      $section_item=item::where('section',$section)->first();
      $section_visits=$section_item['visits'];
      $section_item->visits =$section_visits+1;            
      $section_item->save(); 

      //register the visitor
      $register=\App::call('App\Http\Controllers\visits_controller@visit');

    	 $items = item::where('section',$section)->where('working',1)->orderBy('created_at', 'desc')->paginate(8);

        //get the lastest item visited
        $viewnow = item::where([
            ['visits', '>', 0],
            ['id', '>', 7]
        ])->orderBy('updated_at', 'desc')->take(4)->get();

        //get the visitor counter
        $sitecounter=visitor::find(1);

        //update visits counter
        $sec_visits=item::where('section',"/$section")->first()['visits'];
        $sec_item=item::where('section',"/$section")->first();
        $sec_item->visits =$sec_visits+1;
        $sec_item->save();

        switch ($section) {
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

        return view('section')
            ->with('items',$items)
            ->with('viewnow',$viewnow)
            ->with('sitecounter',$sitecounter)
            ->with('section_ar',$section_ar)
            ;
    }
}
