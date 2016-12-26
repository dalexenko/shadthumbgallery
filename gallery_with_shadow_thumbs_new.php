<?
//require_once "include/JsHttpRequest/JsHttpRequest.php";
//$JsHttpRequest =& new JsHttpRequest("windows-1251");
$act = $_REQUEST['act'];
$bg = $_REQUEST['bg'];
$dir = $_REQUEST['dir'];
$pic_id = $_REQUEST['pic_id'];
if (!$act or !$bg or !$dir){header("Location: gallery_with_shadow_thumbs_new.php?dir=333&bg='0'&act='NULL'");}
echo "<SCRIPT src='include\jscript.js'></SCRIPT>";
$pics_col =5;
$pics_row = 5;
if ($act=='view')
{
$pics_tr =1;
$pics_rows = 1;
$pics_list = glob("images/".$dir."/*.jpg");

$num=count($pics_list);

$cicl = floor($num/($pics_tr*$pics_rows));

for($i=0; $i<=$cicl; $i++)
	{
	$link[$i]=(($pics_tr*$pics_rows*$i)+1);
  	}
$numl=count($link);
$first=$link[0];
if (floor($num/($pics_tr*$pics_rows)) == ($num/($pics_tr*$pics_rows)))
{
$last=$link[$numl-2];

}
else
{
$last=$link[$numl-1];}

for($i=0; $i<$cicl; $i++)
	{
	if ($link[$i]==$bg){$curr=$i;}
    }

if (!in_array ($bg, $link)){$bg=1;}
if ($first==$last){$bg=0;}

	    switch ($bg)
		{
    	case $last:
    	$prn = "<A HREF='?dir=".$dir."&bg=".$link[$numl-3]."&act=view' class=textlink><IMG SRC='include/previous.gif' ALT='предыдущий слайд' border=0></a><a href='?dir=".$dir."&bg=".$bg."&act=NULL' class=textlink><IMG SRC='include/home.gif' ALT='в галлерею' border=0></a>";
		break;
		case $first:
		$prn = "<a href='?dir=".$dir."&bg=".$bg."&act=NULL' class=textlink><IMG SRC='include/home.gif' ALT='в галлерею' border=0></a><A HREF='?dir=".$dir."&bg=".$link[1]."&act=view' class=textlink><IMG SRC='include/next.gif' ALT='следующий слайд' border=0></a>";
		break;
		case 0:
		$bg=1;
		if ($num == 1)
		{		$prn = "<a href='?dir=".$dir."&bg=".$bg."&act=NULL' class=textlink><IMG SRC='include/home.gif' ALT='в галлерею' border=0></a>";
		}
		else
		{
		$prn = '';
		}
		break;
		default:
		$up = floor($bg/($pics_col*$pics_row))*$pics_col*$pics_row+1;
		$prn = "<A HREF='?bg=".$link[$curr-1]."&dir=".$dir."&act=view' class=textlink><IMG SRC='include/previous.gif' ALT='предыдущий слайд' border=0></a><a href='?dir=".$dir."&bg=".$up."&act=NULL' class=textlink><IMG SRC='include/home.gif' ALT='в галлерею' border=0></a><A HREF='?bg=".$link[$curr+1]."&dir=".$dir."&act=view' class=textlink><IMG SRC='include/next.gif' ALT='следующий слайд' border=0></a>";
		}

if ($dir)
{
echo "<table align=center border=1 width=75%>";

echo "<tr align=\"center\" valign=\"top\"><td colspan=".$pics_tr.">";

echo $prn."<hr>";
echo "</td></tr>";
echo "<tr>";
$i=1;
foreach($pics_list as $thumbpics)
{
$pics[$i]=basename($thumbpics);
$i++;
}
if (($bg+$pics_tr*$pics_rows-1)>$num)
	{
	$end=$num;
	}
	else
		{
		$end=$bg+$pics_tr*$pics_rows-1;
		}
for($i=$bg; $i<=$end; $i++)
	{	echo "<td align=center><a href='gallery_with_shadow_thumbs_new.php?dir=".$dir."&pic_id=".$pics[$i]."&act=view&bg=".$i."' target=main><img src='shadow_thumb.php?dir=".$dir."&file=".$pics[$i]."&rc=3&act=view' border=0></a></td>";
     if ( ($i/($pics_tr))==ceil($i/($pics_tr)))
			{
			echo "</tr>";
			}
			else
			{

			}
	}
echo "<tr align='center' valign='top'><td colspan=".$pics_tr.">";
echo "<hr>".$prn;
echo "</td></tr><table>";        }
}
else
{
$pics_tr =$pics_col;
$pics_rows = $pics_row;
$pics_list = glob("images/".$dir."/*.jpg");

$num=count($pics_list);

$cicl = floor($num/($pics_tr*$pics_rows));

for($i=0; $i<=$cicl; $i++)
	{
	$link[$i]=(($pics_tr*$pics_rows*$i)+1);
  	}
$numl=count($link);
$first=$link[0];
if (floor($num/($pics_tr*$pics_rows)) == ($num/($pics_tr*$pics_rows)))
{

$last=$link[$numl-2];

}
else
{
//$last=end($link);
$last=$link[$numl-1];
}

for($i=0; $i<$cicl; $i++)
	{
	if ($link[$i]==$bg){$curr=$i;}
    }

if (!in_array ($bg, $link)){$bg=1;}
if ($first==$last){$bg=0;}

	    switch ($bg)
		{
    	case $last:
    	$prn = "<A HREF='?dir=".$dir."&bg=".$link[$numl-2]."&act=NULL' class=textlink><IMG SRC='include/previous.gif' ALT='предыдущий слайд' border=0></a>";
		break;
		case $first:
		$prn = "<A HREF='?dir=".$dir."&bg=".$link[1]."&act=NULL' class=textlink><IMG SRC='include/next.gif' ALT='следующий слайд' border=0></a>";
		break;
		case 0:
		$bg=1;
		$prn = '';
		break;
		default:
		$prn = "<A HREF='?dir=".$dir."&bg=".$link[$curr-1]."&act=NULL' class=textlink><IMG SRC='include/previous.gif' ALT='предыдущий слайд' border=0></a><A HREF='?bg=".$link[$curr+1]."&dir=".$dir."&act=NULL' class=textlink><IMG SRC='include/next.gif' ALT='следующий слайд' border=0></a>";
		}

if ($dir)
{
echo "<table align=center border=1 width=75%>";

echo "<tr align=\"center\" valign=\"top\"><td colspan=".$pics_tr.">";

echo $prn."<hr>";
echo "</td></tr>";
echo "<tr>";
$i=1;
foreach($pics_list as $thumbpics)
{
$pics[$i]=basename($thumbpics);
$i++;
}
if (($bg+$pics_tr*$pics_rows-1)>$num)
	{
	$end=$num;
	}
	else
		{
		$end=$bg+$pics_tr*$pics_rows-1;
		}
for($i=$bg; $i<=$end; $i++)
	{
	echo "<td align=center><a href='gallery_with_shadow_thumbs_new.php?dir=".$dir."&pic_id=".$pics[$i]."&act=view&bg=".$i."' target=main><img src='shadow_thumb.php?dir=".$dir."&file=".$pics[$i]."&rc=3&act=' border=0></a></td>";

     if ( ($i/($pics_tr))==ceil($i/($pics_tr)))
			{
			echo "</tr>";
			}
			else
			{

			}
	}
echo "<tr align='center' valign='top'><td colspan=".$pics_tr.">";
echo "<hr>".$prn;
echo "</td></tr><table>";
}
}
?>