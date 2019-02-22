<?php
function rss_iw($link){

require_once(app_path() . '/includes/functions.php');
	    $rss_links=rss($link,0,20,'channel','item','link');
	    $i=0;
		$out=[];
	    foreach ($rss_links as $link) {
		    $is_real=strpos($link, 'ref=rss');
			if(!$is_real){
			$out[$i]=get_real_url($link);
			$i++;
			}		
	    }
return $out;
}