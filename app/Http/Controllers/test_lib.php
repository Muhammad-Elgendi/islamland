<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\source as source;

use App\link as link;

use App\item as item;

use App\test as test;

use Carbon\Carbon;

class test_lib extends Controller
{
    public function index(){
        header('Content-Type: text/html; charset=utf-8');
        //update link DB table
        $link="http://ar.islamway.net/recitation/128647/%D8%B3%D9%88%D8%B1%D8%A9-%D9%8A%D9%88%D8%B3%D9%81";
        switch(parse_url($link)['host']) {
            //islamway_fe
            case "ar.islamway.net": {
                require_once(app_path() . '/includes/core/islamway_fe.php');
                $data = islamway($link);
                break;
            }
        }
        if($data!=0){
            if($data["redirect"]==0){
                //remove redirect flag
                unset($data['redirect']);
                //insert data to DB
                $exist = item::where('link', $data["link"])->count();
                if ($exist == 0) {
                    if(strpos($data["content"],'error')!== FALSE){
                        $working=FALSE;
                    }
                    else{
                        $working=TRUE;
                    }
                    // insert data
                    $insert = new test;
                    $insert->sc_link = $data["sc_link"];
                    $insert->link = $data["link"];
                    $insert->link_title = $data["link_title"];
                    $insert->title = $data["title"];
                    $insert->f_img = $data["f_img"];
                    $insert->content = $data["content"];
                    $insert->content1 = $data["content1"];
                    $insert->content2 = $data["content2"];
                    $insert->content3 = $data["content3"];
                    $insert->content4 = $data["content4"];
                    $insert->content5 = $data["content5"];
                    $insert->content6 = $data["content6"];
                    $insert->visits = 0;
                    $insert->working = $working;
                    $insert->report = False;
                    $insert->source = $data["source"];
                    $insert->section = $data["section"];
                    $insert->author = $data["author"];
                    $insert->source_ico = $data["sc_ico"];
                    $insert->ico = $data["ico"];
                    $insert->description = $data["description"];
                    $insert->keywords = $data["keywords"];
                    $insert->save();
                }
            }
            else{
                //remove redirect flag
                unset($data['redirect']);
               return "Redirect ditected";
            }}


        //output Message
        return "Sucsess ^^";

    }
    public function backup(){
        system("mysqldump -h localhost -u root -pqwqwertgb123forallah MG_islamland_base > DBauto.sql");
     /*   $dbhost ="127.0.0.1";// usually localhost
        $dbuser ="root";
        $dbpass ="qwqwertgb123forallah";
        $dbname ="MG_islamland_base";

// don't need to edit below this section

        $backupfile = $dbname . date("Y-m-d") . '.sql';
        $backupzip = $backupfile . '.tar.gz';
        system("mysqldump -h $dbhost -u $dbuser -p$dbpass $dbname > $backupfile");
        system("tar -czvf $backupzip $backupfile");
*/
// Mail the file
/*
        include(app_path() . '/includes/backupUtility/Mail.php');
        include(app_path() . '/includes/backupUtility/Mail/mime.php');


        $message = new Mail_mime();
        $text = "$bodyofemail";
        $message->setTXTBody($text);
        $message->AddAttachment($backupzip);
        $body = $message->get();
        $extraheaders = array("From"=>"$sendfrom", "Subject"=>"$sendsubject");
        $headers = $message->headers($extraheaders);
        $mail = Mail::factory("mail");
        $mail->send("$sendto", $headers, $body);


// Delete the file from your server
        unlink($backupfile);
        unlink($backupzip);
*/
return "backup ^^";
    }
}
