<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\item as item;

use Carbon\Carbon;

use App\visitor as visitor;


function content($id){

    $item = item::find($id);
    $content=$item->section;
    switch($item->section){

        case "lesson":
        {
            $content=$item->content4."</br></br>المحاضره في ملف صوتي</br></br>"."<a style='margin: 0 auto;' target='_blank' href=".$item->content."><img class='img-responsive' style='margin: 0 auto;' src='".url('/main/images/play.png')."' alt='img'></a>"."</br></br>المحاضره في ملف مرئي</br></br>".$item->content3;
        }
            break;
        case "recitation":
        {
            $content="</br></br>التلاوه في ملف صوتي</br></br>"."<a style='margin: 0 auto;' target='_blank' href=".$item->content."><img class='img-responsive' style='margin: 0 auto;' src='".url('/main/images/play.png')."' alt='img'></a>";
        }
            break;
        case "fatwa":
        {
            $content='<div style="background-color:#F1F1F1;">'.$item->content.'</div></br></br>'.$item->content1;
        }
            break;
        case "video":
        {
            $content="</br></br>".$item->content1;
        }
            break;
        case "slider":
        {
            $content="<div class='col-xs-8'>
                        <p style='text-align: justify;line-height: 2;'>".$item->content."</p></div>
                    <div class='col-xs-4'>
                    <img src='".$item->f_img."' alt='' class='img-responsive'>
                    </div>";
        }
            break;
    }


    return $content;
}

?>