<?php
function islamway($link){

    require_once(app_path() . '/includes/functions.php');

    //get html

   $html = file_get_contents($link);

    //parsing url
    $first_parse=parse_url($link)['path'];
    if($first_parse=="spotlights-archive"){

    }
    $secound_parse = substr($first_parse, 0, strpos($first_parse, '%'));
    $third = preg_replace('/\d+/u', '', $secound_parse);
    $fourth=str_replace("-","",$third);
    $section=str_replace("/","",$fourth);

    //Golbal variables
    $content='';
    $content1='';
    $content2='';
    $content3='';
    $content4='';
    $content5='';
    $content6='';
    $keywords=geturl($html)['keywords'];
    $description= geturl($html)['description'];
    $skip="";
    $f_img=$sc_ico=$ico=url('/ico/iswy-ico.png');
    $author='طريق الاسلام';


    switch($section){
        case "scholar":
        {
            $skip=1;
            /*
            $content_1st=html('var',$html,'ul',0,'class','properties','text');
            $content_2nd=html('var',$html,'div',0,'id','biography-wpr','text');
            $author_1st=html('var',$html,'div',0,'class','scholar-header clearfix','all');
            $author=html('var',$author_1st,'h1',0,'class','normal-float','text');
            $content="$author </br> $content_1st <br/> $content_2nd";
            $f_img="";
            $ico= getarr ($html,'img','class','normal-float','src');
            */

        }
        break;
        case "lesson":
        {
            $skip=0;
            try {
                $content4 = html('var', $html, 'p', 0, 'id', 'entry-summary', 'text');
                // get the mp3 and mp4 files
                $mp3_pos_start = strpos($html, "'http://media.islamway.net");
                $mp3_pos_end = strpos($html, "image: '");
                $length = $mp3_pos_end - $mp3_pos_start;
                $mp3_1st = substr($html, $mp3_pos_start, $length);
                $mp3_2nd = str_replace("'", "", $mp3_1st);
                $mp3 = str_replace(",", "", $mp3_2nd);
                //mp3 location
                $content = str_replace("
      ", "", $mp3);
                //mp4 location
                $content1 = str_replace("mp3", "mp4", $mp3);
                $content2 = "<div id='islamland_mp3_player' style='width: 100%;height: 300px;'></div>
            <script src='https://content.jwplatform.com/libraries/GkWl5iHb.js'></script>
            <script>
             jwplayer('islamland_mp3_player').setup({      
             file: '" . $content . "',width: '100%', 
             aspectratio: '16:9'});</script>";

                $content3 = "<div id='islamland_mp4_player' style='width: 100%;height: 300px;'></div>
             <script src='https://content.jwplatform.com/libraries/GkWl5iHb.js'></script>            
            <script>
            jwplayer('islamland_mp4_player').setup({
             file: '" . $content1 . "',width: '100%',
             aspectratio: '16:9'});</script>";

                $author = html('var', $html, 'a', 0, 'class', 'scholar', 'text');
            }
            catch (Exception $e){
                $content="error:fetcher:lesson ".$e->getMessage();
            }
              
        }
            break;
        case "collection":
        {
            $skip=0;    
            $div=html('var',$html,'div',0,'class','wrapper','all');
            $links=allhtml('var',$div,'a[class=large-text]','href');
            $i=0;
            $out=[];
            foreach ($links as $one) {  
            $out[$i] ="http://ar.islamway.net".$one;
            $i++;
            }
        }        
            break;
        case "recitation":
        {
            $skip=0;
            try {
                $ico = url('/ico/iswy-recitation.gif');
                // get the mp3 and mp4 files
                $mp3_pos_start = strpos($html, "'http://quran");
                $mp3_pos_end = strpos($html, "image: '");
                $length = $mp3_pos_end - $mp3_pos_start;
                $mp3_1st = substr($html, $mp3_pos_start, $length);
                $mp3_2nd = str_replace("'", "", $mp3_1st);
                $mp3 = str_replace(",", "", $mp3_2nd);
                $content = str_replace("
      ", "", $mp3);
                $content1 = "<div id='islamland_mp3_player' style='width: 100%;height: 300px;'></div>
            <script src='https://content.jwplatform.com/libraries/GkWl5iHb.js'></script>
            <script>
             jwplayer('islamland_mp3_player').setup({      
             file: '" . $content . "',width: '100%', 
             aspectratio: '16:9'});</script>";
                $author = html('var', $html, 'a', 0, 'class', 'scholar', 'text');
                $auther_all = html('var', $html, 'a', 0, 'class', 'scholar', 'all');
                $auther_id = getarr($auther_all, 'a', 'class', 'scholar', 'data-id');
                $ico_try = "http://static.islamway.net/uploads/scholars/$auther_id.jpg";
                if (get_headers($ico_try)[0] == 'HTTP/1.1 200 OK') {
                    // copy img
                    $fileExtension = \File::extension($ico);
                    $newName = "recitation-$auther_id." . $fileExtension;
                    $newPathWithName = public_path("/ico/") . $newName;
                    if (\File::copy($ico_try, $newPathWithName)) {
                        $ico = url("/ico/$newName");
                    }
                }
            }
            catch (Exception $e){
                $content="error:fetcher:recitation ".$e->getMessage();
            }

        }
            break;
        case "fatwa":
        {
            $skip=0;
            try {
                $ask_1 = html('var', $html, 'div', 0, 'class', 'text-block filled-panel', 'all');
                $content = html('var', $ask_1, 'span', 0, 'itemprop', 'text', 'text');
                $answer_1 = html('var', $html, 'div', 0, 'class', 'text-block', 'all');
                $pattern = "/[a-zA-Z]*[:\/\/]*[A-Za-z0-9\-_]+\.+[A-Za-z0-9\.\/%&=\?\-_]+/i";
                $replacement = "";
                $content1 = preg_replace($pattern, $replacement, $answer_1);
                $author = html('var', $html, 'a', 0, 'class', 'scholar', 'text');
            }
            catch (Exception $e){
                $content="error:fetcher:fatwa ".$e->getMessage();
            }
            
        }
            break;
        case "article":
        {
            $skip=1;
        }
            break;
        case "nasheed":
        {
            $skip=1;
            /*
            // get the mp3 and mp4 files
            $mp3_pos_start=strpos($html,"'http://media.islamway.net");
            $mp3_pos_end=strpos($html,"image: '");
            $length=$mp3_pos_end-$mp3_pos_start;
            $mp3_1st=substr($html,$mp3_pos_start,$length);
            $mp3_2nd=str_replace("'","",$mp3_1st);
            $mp3=str_replace(",","",$mp3_2nd);
            $mp3=str_replace("
      ","",$mp3);
            $mp3_player="<div id='islamland_mp3_player' style='width: 100%;height: 300px;'></div>
            <script src='https://content.jwplatform.com/libraries/GkWl5iHb.js'></script>
            <script>
             jwplayer('islamland_mp3_player').setup({      
             file: '".$mp3."',width: '100%', 
             aspectratio: '16:9'});</script>";
            $content="</br></br>النشيد في ملف صوتي</br></br>"."<a style='margin: 0 auto;' target='_blank' href=".$mp3."><img class='img-responsive' style='margin: 0 auto;' src='".url('/main/images/play.png')."' alt='img'></a>";
            $author=html('var',$html,'a',0,'class','scholar','text');
            $section="music";
            */
        }
            break;
        case "video":
        {   

            $skip=0;
            try {
                $author = html('var', $html, 'a', 0, 'class', 'scholar', 'text');
                // get the mp3 and mp4 files
                $mp4_pos_start = strpos($html, "'http://media");
                $mp4_pos_end = strpos($html, "image: '");
                $length = $mp4_pos_end - $mp4_pos_start;
                $mp4_1st = substr($html, $mp4_pos_start, $length);
                $mp4_2nd = str_replace("'", "", $mp4_1st);
                $mp4 = str_replace(",", "", $mp4_2nd);
                $content = str_replace("
      ", "", $mp4);

                $content1 = "<div id='islamland_mp4_player' style='width: 100%;height: 300px;'></div>
             <script src='https://content.jwplatform.com/libraries/GkWl5iHb.js'></script>            
            <script>
            jwplayer('islamland_mp4_player').setup({
             file: '" . $content . "',width: '100%',
             aspectratio: '16:9'});</script>";
            }
            catch (Exception $e){
                $content="error:fetcher:video ".$e->getMessage();
            }
               
        }
            break;

        case "spotlight":
        {   

            $skip=0;
            try {
                $spot_1 = html('var', $html, 'div', 0, 'class', 'text-block', 'all');
                $spot_2 = substr($spot_1, 0, strpos($spot_1, '::'));
                if ($spot_2 == 0) {
                    $spot_2 = $spot_1;
                }
                $text = html('var', $spot_2, 'div', 0, 'class', 'text-block', 'text');
                $text_1 = $text . "END/*";
                $text_end_pos = strpos($text_1, "END/*");
                $text_start_pos = strpos($text_1, " 1437");
                $length_text = $text_end_pos - $text_start_pos;
                $text_2 = substr($text_1, $text_start_pos, $length_text);
                $content = str_replace(' 1437    ', '', $text_2);
                $f_img = getarr($spot_2, 'img', 'class', 'reversed-float', 'src');
                $f_img_try = getarr($spot_2, 'img', 'class', 'reversed-float', 'src');
                if (get_headers($f_img_try)[0] == 'HTTP/1.1 200 OK') {

                    $error_arr = array('http://', 'https://', 'static', '.', 'islamway', 'net', 'uploads', 'spotlights', '/', 'png', 'jpg', 'gif');

                    $name = str_replace($error_arr, '', $f_img_try);
                    // copy img
                    $fileExtension = \File::extension($f_img_try);
                    $newName = "img-1-$name." . $fileExtension;
                    $newPathWithName = public_path("/ico/") . $newName;
                    if (\File::copy($f_img_try, $newPathWithName)) {
                        $f_img = url("/ico/$newName");
                    }
                }
                $section = 'slider';
            }
            catch (Exception $e){
                $content="error:fetcher:spotlight ".$e->getMessage();
            }
        }
            break;          
    }

    if($skip==1)
        $item=0;    
    elseif($section=='collection')
        {
            $item=[];
            $item=$out;
            $item['redirect']=1;
        }


        $title=geturl($html)['title_meta'];
        $link_title=str_replace(" ","-",$title);
        $errors=array('[',']','(',')','{','}','--','!','?');
        $link_title=str_replace($errors,"",$link_title);

        $item=[
            "sc_link" => $link,
            "link" => url("/$section/$link_title"),
            "link_title" => $link_title,
            "title" => $title,
            "source" => 'طريق الإسلام',
            "description" =>$description,
            "keywords" => $keywords,
            "content" => $content,
            "content1" => $content1,
            "content2" => $content2,
            "content3" => $content3,
            "content4" => $content4,
            "content5" => $content5,
            "content6" => $content6,
            "ico" => $ico,
            "section" => $section,
            "author" => $author,
            "sc_ico" => $sc_ico,
            "redirect" => 0,
            "f_img" => $f_img];     


    return $item;
}
?>