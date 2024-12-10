/*  Begin custom UCDHS page functions  */

function pgInit()
{
	doLoadProc();
}

function copyright() {
	var copydate = new Date();
	var copyd = copydate.getFullYear();
	
	return copyd;
}

/*  End custom UCDHS page functions  */

/*  Begin pop-up window functions  */

function popUp(URL) {
 	day = new Date();
 	id = day.getTime();
 	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=450,height=450,left = 287,top = 159');");
}
function OpenLink(where) {
	theleft = (screen.width - 800) / 2;
	thetop = (screen.height - 700) / 2;
	window.open (where, '','scrollbars=no,menubar=no,resizable=no,status=no,width=450,height=450,top='+thetop+',left='+theleft);
}
function OpenBig(where) {
	theleft = (screen.width - 800) / 2;
	thetop = (screen.height - 700) / 2;
	window.open (where, '','scrollbars=yes,menubar=no,resizable=no,status=no,width=450,height=450,top='+thetop+',left='+theleft);
}
function OpenFlash(where) {
	theleft = (screen.width - 600) / 2;
	thetop = (screen.height - 350) / 2;
	window.open (where, '','scrollbars=no,menubar=no,resizable=no,status=no,width=550,height=300,top='+thetop+',left='+theleft);
}
function OpenMap(where) {
	theleft = (screen.width - 800) / 2;
	thetop = (screen.height - 800) / 2;
	window.open (where, '','scrollbars=yes,menubar=yes,resizable=no,status=no,width=800,height=555,top='+thetop+',left='+theleft);
}

/*  End pop-up window functions  */

/*  Begin Center Layout Image Rotation Functions  */

function MM_preloadImages() { //v3.0
  var d=document; 
  if(d.images){ 
  	if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; 
		for(i=0; i<a.length; i++)
    		if (a[i].indexOf("#")!=0){ 
				d.MM_p[j]=new Image;
				d.MM_p[j++].src=a[i];
			}
	}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr;
  for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;
  if(!d) d=document;
  	if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document;
		n=n.substring(0,p);
	}
  	if(!(x=d[n])&&d.all) x=d.all[n];
		for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
		for (i=0;!x&&d.layers&&i<d.layers.length;i++)
		x=MM_findObj(n,d.layers[i].document);

	if(!x && d.getElementById)
		x=d.getElementById(n);
		return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments;
  document.MM_sr=new Array;
  for(i=0;i<(a.length-2);i+=3)
  	if ((x=MM_findObj(a[i]))!=null){
		document.MM_sr[j++]=x;
		if(!x.oSrc)
			x.oSrc=x.src;
			x.src=a[i+2];
	}
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
	if (init==true) with (navigator) {
		if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
		  document.MM_pgW=innerWidth;
		  document.MM_pgH=innerHeight;
		  onresize=MM_reloadPage;
		}
		else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) {
			location.reload();
		}
	}
MM_reloadPage(true);
}

/*  End Center Layout Image Rotation Functions  */
