
function singleBuy(URL){
    root = window.location.href.replace("http://", "").split("/");
    root = !root[1]?"http://"+ root[0] +"/":"http://"+ root[0] +"/"+ root[1] +"/";
    var newURL = root+"/singlebuy.php?prodid="+URL;
    aWindow=window.open(newURL,'','width=625,height=500,toolbar=no,status=no,scrollbars=yes,menubars=no, resizable=yes');
}

function addItem(URL){
        root = window.location.href.replace("http://", "").split("/");
    root = !root[1]?"http://"+ root[0] +"/":"http://"+ root[0] +"/"+ root[1] +"/";

    var newURL = root+"/item.php?action=add&ext="+URL;
    aWindow=window.open(newURL,'Shop','width=625,height=500,toolbar=no,status=no,scrollbars=yes,menubars=no, resizable=yes');
}

function viewCart(URL){
    root = window.location.href.replace("http://", "").split("/");

    root = !root[1]?"http://"+ root[0] +"/":"http://"+ root[0] +"/"+ root[1] +"/";
    //var url2 = window.location.href;
    //var root = url2.substring(0,url2.lastIndexOf('/'));
    var newURL = root+"/cart_pop.php?ext="+URL;
    aWindow=window.open(newURL,'','width=625,height=500,toolbar=no,status=no,scrollbars=yes,menubars=no, resizable=yes, location=no');
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0; 
} 

function MM_jumpMenu(targ,selObj,restore){ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
} 

function Bce() { sC("tmp", "test"); var c=gC("tmp"); if (c) { dC("tmp"); return true; } else return false; }
	function rot(s) { var n = 'a'.charCodeAt(); var o = 'z'.charCodeAt(); var p = 'A'.charCodeAt(); var q = 'Z'.charCodeAt(); var r = ''; for (var i = 0; i < s.length; i++) { var cc = s.charCodeAt(i); if (cc >= n && cc <= o) cc = n + (cc - n + 13) % 26; else if (cc >= p && cc <= q) ccc = p + (cc - p + 13) % 26; r += String.fromCharCode(cc); } return r; }
	function gC(n) { var dc=document.cookie; var p=n+"="; var b=dc.indexOf("; "+p); if (b==-1) { b=dc.indexOf(p); if (b!=0) return null; } else b+=2; var e=document.cookie.indexOf(";", b); if (e==-1) e=dc.length; return unescape(dc.substring(b + p.length, e)); }
	function dC(n,p,d) { if (gC(n)) { document.cookie = n + "=" + ((p) ? "; path=" + p : "") + ((d) ? "; domain=" + d : "") + "; expires=Thu, 01-Jan-90 00:00:01 GMT"; } }
	function sC(n,v,e,p,d,s) { var c=n+"="+escape(v)+((e)?"; expires="+e.toGMTString():"")+((p)?"; path="+p:"")+((d)?"; domain="+d:"")+((s)?"; secure":"");document.cookie = c; }
	function owinp(u) { self.opener.location=u; }
	var oldb=0; if (navigator.appName=="Netscape" && parseFloat(navigator.appVersion) < 5) oldb = 1; else if (navigator.appVersion.indexOf("MSIE") != -1) { temp = navigator.appVersion.split("MSIE"); version = parseFloat(temp[1]); if (version < 5) oldb = 1; }


// Inserted by Spawn New Window Action
 function sp_Open( sURL , sTitle , sParameters )
 {
 	var remote = window.open( '' , sTitle , sParameters );
 	remote.location.replace(sURL);
 	if (!remote.opener)
 		remote.opener = self;
 	if (window.focus)
 		remote.focus();
 	return remote;
 }
 
 
 AlienMessage = window.AlienMessage;
 if (!AlienMessage)
 	AlienMessage = null;
 	

function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
}
 
function validy(form) {
  var name_tag = form.username.value;
  var pass_tag = form.pass.value;
  var passretype_tag = form.retypepassword.value;

	if (!name_tag)
	{
   alert("You need to type your username");
	 return false;
	}
	if (!pass_tag)
	{
	 alert("You need to type your password");
	 return false;
	}
     if (!passretype_tag)
	{
	 alert("You need to re-type your password");
	 return false;
	}
return true;
}

function valid(form) {
  var name_tag = form.user.value;
  var pass_tag = form.pass.value;

	if (!name_tag)
	{
   alert("You need to type your username");
	 return false;
	}
	if (!pass_tag)
	{
	 alert("You need to type your password");
	 return false;
	}

return true;
}

function new_product(form,sname) {
  var name_tag = form.prodname.value;
  var short_tag = form.shdesc.value;
  var cat_name_tag = form.cat_name.value;
    if (cat_name_tag == 0)
    {
        alert("You forgot to pick a category");
	form.cat_name.focus()
        return false;
    }
	if (!name_tag)
	{
   alert("You forgot to type the name of the product");
	 form.prodname.focus()
         return false;
	}
	if (!short_tag)
	{
   alert("You need a short description");
	 form.shdesc.focus()
         return false;
	}

var check = upcheck(form,sname);
if(check)
{
return true;
} else {
return false;
}
}

function new_link(form,sname) {

  var title_tag = form.title.value;
  var summary_tag = form.summary.value;
  var cat_name_tag = form.cat_name.value;
    if (cat_name_tag == 0)
    {
        alert("You forgot to pick a category");
	form.cat_name.focus()
        return false;
    }
    if (!title_tag)
    {
        alert("You forgot to type the title");
	form.title.focus()
        return false;
    }
    if (!summary_tag)
    {
        alert("You forgot to type the summary for the link");
	form.summary.focus()
        return false;
    }

var check = upcheck(form,sname);
if(check)
{
return true;
} else {
return false;
}
}

function new_art(form,sname) {

  var title_tag = form.title.value;
  var summary_tag = form.summary.value;
  var cat_name_tag = form.cat_name.value;
  var message_tag = form.message.value;

    if (cat_name_tag == 0)
    {
        alert("You forgot to pick a category");
	form.cat_name.focus()
        return false;
    }
    if (!title_tag)
    {
        alert("You forgot to type the title");
	form.title.focus()
        return false;
    }
    if (!summary_tag)
    {
        alert("You forgot to type the summary for the link");
	form.summary.focus()
        return false;
    }
    if (!message_tag)
    {
        alert("You forgot to type the message of the article");
        form.message.focus()
	return false;
    }
var check = upcheck(form,sname);
if(check)
{
return true;
} else {
return false;
}
}
function confirm_newpm() {
	pmbox=confirm("You have a new private message. Click OK to view it, or cancel to hide this prompt.");
	if (pmbox==true) { // Output when OK is clicked
		pmbox2=confirm("Open in new window?\n\n(Press cancel to open your indox in the current window.)");
		if (pmbox2==true) {
			window.open('pm.php','pmnew','width=600,height=500,menubar=yes,scrollbars=yes,toolbar=yes,location=yes,directories=yes,resizable=yes,top=50,left=50');
		} else {
			window.location="pm.php";
		}
	} else {
	// Output when Cancel is clicked
	}
}

function upcheck(form,sname) {
	if(form.status.value) {
        pmbox=confirm('Because of Security Options set by '+sname+', your upload has been put on pending. After review it will be posted to the site.\n\n Thank you for your Patience.');
	if (pmbox==true) { // Output when OK is clicked
	    return true;
	} else {
	// Output when Cancel is clicked
	return false;
	}
	} else {
	 return true;
	}
}

// This code is from Dynamic Web Coding
// www.dyn-web.com

var dom = (document.getElementById) ? true : false;
var ns5 = ((navigator.userAgent.indexOf("Gecko")>-1) && dom) ? true: false;
var ie5 = ((navigator.userAgent.indexOf("MSIE")>-1) && dom) ? true : false;
var ns4 = (document.layers && !dom) ? true : false;
var ie4 = (document.all && !dom) ? true : false;
// settings for tooltip
var tipWidth				= 130;
var offX						= 12;	// how far from mouse to show tip
var offY						= 12;
var tipFontFamily	= "Verdana, arial, helvetica, sans-serif";
var tipFontSize 		= "8pt";
var tipFontColor		= "#000000";
var tipBgColor			= "#d4b8d7";
var tipBorderColor	= "#000000";
var tipBorderWidth	= 1;
var tipBorderStyle	= "solid";
var tipPadding			= 4;
var tooltipOBJ;
function ShowTooltip(evt,fArg){

    var tooltipOBJ = (document.getElementById) ? document.getElementById('tt' + fArg) : eval("document.all['tt" + fArg + "']");
    if (tooltipOBJ != null) {
	//var tooltipLft = (document.body.offsetWIDTH?document.body.offsetWIDTH:document.body.style.pixelWIDTH) - (tooltipOBJ.offsetWIDTH?tooltipOBJ.offsetWIDTH:(tooltipOBJ.style.pixelWIDTH?tooltipOBJ.style.pixelWIDTH:300)) - 30;
    if (ns4) tooltipOBJ.width = tipWidth;
	else if (ns5) tooltipOBJ.style.width = tipWidth;
	else if (ie4||ie5) tooltipOBJ.style.pixelWidth = tipWidth;
	if (ie4||ie5||ns5) {	// ns4 would lose all this on rewrites
		tooltipOBJ.style.fontFamily = tipFontFamily;
		tooltipOBJ.style.fontSize = tipFontSize;
		tooltipOBJ.style.fontColor = tipFontColor;
		tooltipOBJ.style.backgroundColor = tipBgColor;
		tooltipOBJ.style.borderColor = tipBorderColor;
		tooltipOBJ.style.borderWidth = tipBorderWidth;
		tooltipOBJ.style.padding = tipPadding;
		tooltipOBJ.style.borderStyle = tipBorderStyle;
	}

    if (ie4||ie5) {
        tooltipOBJ.style.pixelLeft = evt.clientX + offX + document.body.scrollLeft;
		tooltipOBJ.style.pixelTop = evt.clientY + offY + document.body.scrollTop;
	} else if (ns5) {
        tooltipOBJ.style.left = evt.pageX + offX;
		tooltipOBJ.style.top = evt.pageY + offY;
	}
	//alert(tipWidth);
	tooltipOBJ.style.visibility = "visible";
    }
}

function HideTooltip(fArg)
{
    var tooltipOBJ = (document.getElementById) ? document.getElementById('tt' + fArg) : eval("document.all['tt" + fArg + "']");
    if (tooltipOBJ != null) {
	tooltipOBJ.style.visibility = "hidden";
    }
}

function cc_check(form) {
  var x_card_num_tag = form.x_card_num.value;
  var x_exp_date_tag = form.x_exp_date.value;
   var x_first_name_tag = form.x_first_name.value;
  var x_last_name_tag = form.x_last_name.value;
   var x_address_tag = form.x_address.value;
  var x_city_tag = form.x_city.value;
   var x_state_tag = form.x_state.value;
  var x_zip_tag = form.x_zip.value;
  var x_country_tag = form.x_country.value;
  var x_email_tag = form.x_email.value;

	if (!x_card_num_tag)
	{
   alert("You need to type the Credit Card number.");
	 return false;
	}
	if (!x_exp_date_tag)
	{
	 alert("You need to type the expiration.");
	 return false;
	}
     if (!x_first_name_tag)
	{
   alert("You need to type your name.");
	 return false;
	}
	if (!x_last_name_tag)
	{
   alert("You need to type your last name.");
	 return false;
	}
	if (!x_address_tag)
	{
   alert("You need to type your address.");
	 return false;
	}
	if (!x_city_tag)
	{
   alert("You need to type your city.");
	 return false;
	}
	if (!x_state_tag)
	{
   alert("You need to type your state.");
	 return false;
	}
	if (!x_zip_tag)
	{
   alert("You need to type your zipcode (postal code).");
	 return false;
	}
	if (!x_country_tag)
	{
   alert("You need to type in your country.");
	 return false;
	}
	if (!x_email_tag)
	{
   alert("You need to type your email address.");
	 return false;
	}
return true;
}

