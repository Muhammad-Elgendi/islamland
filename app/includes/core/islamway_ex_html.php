<?php
function html_iw($html){

require_once(app_path() . '/includes/functions.php');
    	$div=html('var',$html,'div',0,'class','wrapper','all');
		$links=allhtml('var',$div,'a[class=large-text]','href');
		$i=0;
		$out=[];
		foreach ($links as $one) {	
		$out[$i] ="http://ar.islamway.net".$one;
		$i++;
		}    
return $out;
}