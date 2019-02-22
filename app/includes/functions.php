<?php
header('Content-Type: text/html; charset=utf-8');

/*
 * Developed by : Muhammad Elgendi
 */

function url_get_contents ($Url) {
    if (!function_exists('curl_init')){
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); //get the code of request
    curl_close($ch);

    if($httpCode == 400)
        return 'No donuts for you.';

    if($httpCode == 200) //is ok?
        return $output;
}

function get_real_url($url){
    stream_context_set_default(array(
        'http' => array(
            'method' => 'HEAD'
        )
    ));
    $headers = get_headers($url, 1);
    if (isset($headers['Location'])) {
        return is_array($headers['Location']) ? 'http://'.parse_url($url)['host'].array_pop($headers['Location']) : 'http://'.parse_url($url)['host'].$headers['Location'];
    }
    return false;
}

function rss($url,$nodecnt,$count,$node,$childnode,$tag){

    $xml=  simplexml_load_file($url);


    $out=[];
    if($count=='all')
    {
        $count =substr_count($xml->asXML(), $childnode);
    }
    if($nodecnt==1 &&$tag=='link'){

        for ($i=0;$i<$count;$i++){

            $link =$xml->$childnode[$i]->link[4]['href'];
            $out[$i]=$link;
        }
    }

    if($nodecnt==1&&$tag!='link') {

        for ($i=0;$i<$count;$i++){
            $tag =$xml->$childnode[$i]->$tag ;
            $out[$i]=$tag;
        }
    }

    if($nodecnt!=1&&$tag=='link') {

        for ($i=0;$i<$count;$i++){
            $link =$xml->$node->$childnode[$i]->link ;
            $out[$i]=$link;
        }
    }

    if($nodecnt!=1&&$tag!='link') {

        for ($i=0;$i<$count;$i++){
            $tag =$xml->$node->$childnode[$i]->$tag  ;
            $out[$i]=$tag;
        }
    }

    return $out;
}

function html($sc_type,$sc,$tag,$tag_nth,$arr,$arr_value,$get){
    require_once 'simple_html_dom.php';
    try {
        // str or file
        if ($sc_type  =='url')
            $html= file_get_html($sc);
        if ($sc_type  =='var')
            $html= str_get_html($sc);


        // get specific element
        if ($arr == '' && $arr_value == '')
            $ten = $tag;
        if ($arr_value == '' && $arr != '')
            $ten = $tag . '[' . $arr . ']';
        else
            $ten = $tag . '[' . $arr . '=' . $arr_value . ']';

        // n-th of array
        if ($tag_nth < -1)
            $n = $html->find("$ten");
        if ($tag_nth == 'last')
            $n = $html->find("$ten", -1);
        else
            $n = $html->find("$ten", $tag_nth);


        // things to get
        switch ($get) {
            case 'link':
                $found= $n->href;
                break;
            case 'all':
                $found= $n->outertext;
                break;
            case 'inner':
                $found= $n->innertext;
                break;
            case 'text':
                $found= $n->plaintext;
                break;
            case 'image':
                $found= $n->src;
                break;
            default:
                $found= $n->$get;
                break;
        }
    }
        //catch exception
    catch(Exception $e) {
        $found= 'error:'.$e->getMessage().'line:'.$e->getLine();
    }

    return $found;
}

function allhtml($sc_type,$sc,$tag,$get){
    require_once 'simple_html_dom.php';

    // str or file
    if ($sc_type == 'url')
        $html = file_get_html($sc);
    if ($sc_type == 'var')
        $html = str_get_html($sc);

    // get all html
    foreach ($html->find("$tag") as $element)
        $found[]= $element->$get;

    return $found;
}

function getarr ($html,$tag,$arr,$arr_value,$target_arr){
    $doc = new DOMDocument;
    libxml_use_internal_errors(true);
    $doc->loadHTML($html);
    libxml_use_internal_errors(false);
    $tags = $doc->getElementsByTagName($tag);
    for ($i = 0; $i < $tags->length; $i++) {
        $tag_item = $tags->item($i);
        if ($tag_item->getAttribute($arr) == $arr_value) {
            $target_arr = $tag_item->getAttribute($target_arr);
        }
    }
    return $target_arr;
}

function gettag($html,$tag,$tag_nth){

    $doc = new DOMDocument;
    libxml_use_internal_errors(true);
    $doc->loadHTML($html);
    libxml_use_internal_errors(false);
    $tags = $doc->getElementsByTagName($tag);
    $target_tag = $tags->item($tag_nth)->nodeValue;

    return $target_tag;
}

function geturl($html){

    $title=         gettag($html,'title',0);

    $title_meta=    getarr($html,'meta','name','title','content');

    $description=   getarr($html,'meta','name','description','content');

    $keywords=      getarr($html,'meta','name','keywords','content');

    $news_keywords= getarr($html,'meta','name','news_keywords','content');

    $app_name=      getarr($html,'meta','name','application-name','content');

    $site_name=     getarr($html,'meta','property','og:site_name','content');

    $link_par=array('title'=>$title,
        'title_meta'=>$title_meta,
        'description'=>$description,
        'keywords'=>$keywords,
        'news_keywords'=>$news_keywords,
        'app_name'=>$app_name,
        'site_name'=>$site_name
    );
    return $link_par;
}

// ready functions

/*
 * parse_url()
 * it return an array
 * scheme - e.g. http
 * host
 * port
 * user
 * pass
 * path
 * query - after the question mark ?
 * fragment - after the hashmark #
*/

/*
 * file_get_contents('http://www.example.com/');
 * The function returns the readed data or FALSE on failure.
 * A URL can be used as a filename with this function if the fopen wrappers have been enabled. See fopen()
 */

?>