<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\source as source;

class sources_controller extends Controller
{
    public function index (){
        
        $sources=[];
        $i=0;
        $sc_file = fopen(app_path() . '/includes/sources.txt', "r") or die("Unable to open file!");
        // Output one line until end-of-file
        while(!feof($sc_file)) {
          $sources[$i] = fgets($sc_file);
          $i++;
        }
        fclose($sc_file);
        
        foreach($sources as $link){
            $link = preg_replace('/\s+/', '', $link);
            $link = str_replace(' ', '', $link);
            $exist=source::where('link',$link)->count();
            if($exist==0) {
                // insert data
                $insert = new source;
                $insert->link = $link;
                $insert->save();
            }
       }
        return "added ^_^";
    }
}
