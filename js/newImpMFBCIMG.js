//document.getElementsByClassName("CFAD_URL")[0].getElementsByTagName("a")[0].href
setTimeout(function(){
	var a = document.getElementsByClassName("CFAD_URL")[0].getElementsByTagName("a")[0].href;
	var	cf_new_url = a.replace("cf.doublemax.net/delivery/?click&","events.doublemax.net/dspAlert/imp/newUrl?");
		add_new_cf_log(cf_new_url+"&url="+document.URL);
	var	cf_new_url = a.replace("cf.doublemax.net/delivery/?click&p=","events.doublemax.net/ytb/imp/index?link=");
		add_new_cf_log(cf_new_url);
} , 600);

function add_new_cf_log(url){
	var new_link = document.createElement("img");
	new_link.setAttribute('src', url);
	new_link.setAttribute('style', "display: none;");
	document.getElementsByClassName("CFAD_MT")[0].appendChild(new_link);
}
//4173|4142|4242|4250|4236
