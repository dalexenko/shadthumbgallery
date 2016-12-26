function right(e)
{
if (navigator.appName == 'Netscape' && (e.which == 3 || e.which == 2))
return false;
else if (navigator.appName == 'Microsoft Internet Explorer' && (event.button == 2 || event.button == 3))
{
//alert("don't do it!!!");
return false;
}
return true;
}
document.onmousedown=right;
if (document.layers) window.captureEvents(Event.MOUSEDOWN);
window.onmousedown=right;

function fullscreen(website)
{
   var winwidth = screen.availWidth;
   var winheight = screen.availHeight;

if (document.all)
	{
   var sizer = window.open("","",'left=0,top=0,width='+winwidth+',height='+winheight+',scrollbars=auto,fullscreen=yes');
   sizer.location = website;
   } else
	{

	}
}

var BWflag = false;

var Initialized = false;

function InitFilters()
{
	if(Initialized) return;
	Initialized = true;
	document.all.mainpic.style.filter = "Gray";
	document.all.mainpic.filters["Gray"].enabled = BWflag;
}

function flipBW()
{
	InitFilters();
	BWflag = !BWflag;

	document.all.mainpic.filters["Gray"].enabled = BWflag;

	if(BWflag) document.all.bw.src = "include/i_bw_on.gif";
	else document.all.bw.src = "include/i_bw.gif";
}

var Cropflag = false;
var Gridflag = false;

var CurrentSide = null;
var x0 = 0;
var y0 = 0;