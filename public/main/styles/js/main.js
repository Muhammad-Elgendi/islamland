var z=1;
	document.getElementById("counter-content-next").onclick = function() {next()};
	document.getElementById("counter-content-prev").onclick = function() {prev()};
	var x=document.getElementById("search-bar");
	x.onclick = function(){search();}
	x.onmouseenter = function(){search();}
	x.onmouseleave = function(){search_leave()};
	function search(){
		document.getElementById("search-bar").value = "";
	}
	function search_leave(){
		document.getElementById("search-bar").value = "  البحث عن ...";
	}
	function next(){
		if (z<=2){
			z++;
		}
		else{z=1;}

           document.getElementById("counter-content").innerHTML = "صفحه "+z+" من 3";
		}
	function prev(){
		if (z>1){
			z--;
		}
		else{z=3;}
		   document.getElementById("counter-content").innerHTML = "صفحه "+z+" من 3";
		}