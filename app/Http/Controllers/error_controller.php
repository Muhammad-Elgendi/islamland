<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\source as source;

use App\link as link;

use App\item as item;

use App\visitor as visitor;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class error_controller extends Controller
{
    public function error_monitor(){
        $xml='';
        $xml.= '<?xml version="1.0" encoding="UTF-8" ?>'.'<rss version="2.0">
<channel>
<title>أرض الإسلام - الأخطاء</title>
<description>نشرة موقع أرض الإسلام لكل التبليغات للمواضيع التي تحتوي علي أخطاء</description>
<link>https://www.islamland.net/report</link>';
        $columns = Schema::getColumnListing('items');
        $query = item::query();
        $search = 'error';
        foreach($columns as $column){
            $query->orWhere($column, 'like', '%'.$search.'%');
        }
        $errors = $query->where('working',1)->get();
        foreach ($errors as $error) {
            $item = item::find($error->id);

            $item->working = False;

            $item->save();
            $xml.='<item><title>تم تصحيح : '.str_replace("&nbsp;","",$item->title).'</title><description>'.
                str_replace("&nbsp;","",$item->description).'</description><link>'.$item->link.'</link></item>';
        }
        /*
         * App\Flight::where('active', 1)
            ->where('destination', 'San Diego')
            ->update(['delayed' => 1]);
        */
        $xml.='</channel></rss>';
        return response($xml)->header('Content-Type', 'application/xml');
    }
}
