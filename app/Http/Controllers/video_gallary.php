<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\videos_gallary as video;
class video_gallary extends Controller
{
    public function index(){
        //https://www.youtube.com/embed/qscrfQ5mVkI?rel=0&modestbranding=1
        $videos=array('https://www.youtube.com/embed/M4tQqHr8MeY',
            'https://www.youtube.com/embed/_neI8bPuMUI',
            'https://www.youtube.com/embed/uyUaNzqmrBI',
            'https://www.youtube.com/embed/AoUR_I6734s',
            'https://www.youtube.com/embed/ZT6_3Li0BIU',
            'https://www.youtube.com/embed/_xWEmoZOx-g',
            'https://www.youtube.com/embed/A4AbQ6JW370',
            'https://www.youtube.com/embed/qhphhwmiLxY',
            'https://www.youtube.com/embed/qscrfQ5mVkI'
            );
        foreach ($videos as $one) {
            $insert = new video;
            $insert->link = $one."?rel=0&modestbranding=1";
            $insert->save();
        }
        return 'woo';
    }
}

