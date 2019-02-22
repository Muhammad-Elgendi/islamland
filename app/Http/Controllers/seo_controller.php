<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\item as item;

class seo_controller extends Controller
{
    public function xmlSiteMap(){
        $xml="";
        $xml.= '<?xml version="1.0" encoding="UTF-8" ?>'.
            '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $items = item::where('id','>',7)->where('working',1)->orderBy('updated_at', 'desc')->get();

        foreach ($items as $item){
            $xml.= '<url><loc>'.$item->link.'</loc><lastmod>'.$item->updated_at->toAtomString()
            .'</lastmod><changefreq>always</changefreq><priority>0.9</priority></url>';
        }
        $xml.='</urlset>';
        return response($xml)->header('Content-Type', 'text/xml');
    }

public function rssfeed(){

    $items = item::where('id','>',7)->where('working',1)->orderBy('updated_at', 'desc')->get();
    $xml='';
    $xml.= '<?xml version="1.0" encoding="UTF-8" ?>'.'<rss version="2.0">
<channel>
<title>أرض الإسلام</title>
<description>نشرة موقع أرض الإسلام لكل جديد الموقع والمواقع الإسلاميه الأخري</description>
<link>https://www.islamland.net/feed</link>';
    foreach ($items as $item){

        $xml.='<item><title>'.str_replace("&nbsp;","",$item->title).'</title><description>'.
            str_replace("&nbsp;","",$item->description).'</description><link>'.$item->link.'</link></item>';

    }
    $xml.='</channel></rss>';
    return response($xml)->header('Content-Type', 'application/xml');
}



}
