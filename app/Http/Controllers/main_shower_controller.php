<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\item as item;

use App\visitor as visitor;

use App\videos_gallary as video_g;

class main_shower_controller extends Controller
{
   public function index(){    
   	$sliders =    item::where([
        ['section', '=', 'slider'],
        ['working', '=', 1]
    ])->orderBy('created_at', 'desc')->take(5)->get();
   	$videos = 	  item::where([
        ['section', '=', 'video'],
        ['working', '=', 1]
    ])->orderBy('created_at', 'desc')->take(12)->get();
   	$recitations = item::where([
        ['section', '=', 'recitation'],
        ['working', '=', 1]
    ])->orderBy('created_at', 'desc')->take(8)->get();
   	$lessons =  item::where([
        ['section', '=', 'lesson'],
        ['working', '=', 1]
    ])->orderBy('created_at', 'desc')->take(8)->get();
   	$fatawas = item::where([
        ['section', '=', 'fatwa'],
        ['working', '=', 1]
    ])->orderBy('created_at', 'desc')->take(8)->get();
       $breaking_recitations=$recitations->take(3);
       $breaking_videos=$videos->take(3);
       $breaking_lessons=$lessons->take(3);
       $breaking_fatawas=$fatawas->take(3);
  	$books = item::where([
       ['section', '=', 'book'],
       ['working', '=', 1]
    ])->orderBy('created_at', 'desc')->take(8)->get();
   	$tweets = item::where([
        ['section', '=', 'tweet'],
        ['working', '=', 1]
    ])->orderBy('created_at', 'desc')->take(8)->get();
  	$music =    item::where([
     ['section', '=', 'music'],
    ['working', '=', 1]
      ])->orderBy('created_at', 'desc')->take(8)->get();
    	$articles = item::where([
         ['section', '=', 'article'],
         ['working', '=', 1]
     ])->orderBy('created_at', 'desc')->take(8)->get();

    //register the visitor
    $register=\App::call('App\Http\Controllers\visits_controller@visit');

    //update visits counter
    $home_visits=item::find(1)['visits'];
    $home_item=item::find(1);
    $home_item->visits =$home_visits+1;            
    $home_item->save();

    //get the visitor counter
       $sitecounter=visitor::find(1);
   //get the lastest item visited
      $viewnow = item::where([
          ['visits', '>', 0],
          ['id', '>', 7]
])->orderBy('updated_at', 'desc')->take(3)->get();

       //get gallary for test
        $videos_g=video_g::take(9)->get();
   return view('home')
    ->with('sliders',$sliders)
    ->with('videos',$videos)
    ->with('recitations',$recitations)
    ->with('lessons',$lessons)
    ->with('fatawas',$fatawas)
    ->with('sitecounter',$sitecounter)
    ->with('viewnow',$viewnow)
    ->with('books',$books)
    ->with('tweets',$tweets)
    ->with('music',$music)
    ->with('articles',$articles)
    ->with('breaking_recitations',$breaking_recitations)
    ->with('breaking_videos',$breaking_videos)
    ->with('breaking_lessons',$breaking_lessons)
    ->with('breaking_fatawas',$breaking_fatawas)

       //test
    ->with('videos_g',$videos_g)
     ;
   }
}
