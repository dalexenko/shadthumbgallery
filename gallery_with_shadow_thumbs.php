<?
//require_once "include/JsHttpRequest/JsHttpRequest.php";
//$JsHttpRequest =& new JsHttpRequest("windows-1251");
echo "<SCRIPT src='include\jscript.js'></SCRIPT>";
$pics_tr =4;
$pics_rows = 5;

if ($pic_id) //проверка переменной с данными о картинке (покадровый просмотр)
{
//записываем в массив файлы с фотографиями, вычисляем количество фотографий, первый и последний элемент в массиве
$i=1;
if ($image_dir = @opendir("images/".$dir))
{
	while (($fl = readdir($image_dir)) !== false)
	{
		if ($fl != "." && $fl != "..")
		{
		$pics[$i]=$fl;
		if ($pics[$i]==$pic_id){$current=$i;}
		$i++;
		}
	}
}
$num=count($pics);
$last=end($pics);
$first=$pics[1];
//конец записи в массив файлов с фотографиями

//рассчет ссылок для покадрового просмотра
$cicl= floor($num/($pics_tr*$pics_rows));
for($i=0; $i<=$cicl; $i++)
	{
	if ($current>($pics_tr*$pics_rows*$i))
		{
		$bg=($pics_tr*$pics_rows*$i)+1;
		}
		else
		{
		$i++;
		}
	}
switch ($pic_id)
{
    case $last:
        $prn = "<A HREF='?dir=".$dir."&pic_id=".$pics[$num-1]."&act=view' class=textlink><IMG SRC='include/previous.gif' ALT='предыдущий слайд' border=0></a><a href='?dir=".$dir."&bg=".$bg."' class=textlink><IMG SRC='include/home.gif' ALT='в галлерею' border=0></a>";
        break;
    case $first:
        $prn = "<a href='?dir=".$dir."&bg=".$bg."' class=textlink><IMG SRC='include/home.gif' ALT='up' border=0></a><A HREF='?dir=".$dir."&pic_id=".$pics[2]."&act=view' class=textlink><IMG SRC='include/next.gif' ALT='следующий слайд' border=0></a>";
        break;
    default:
        $prn = "<A HREF='?dir=".$dir."&pic_id=".$pics[$current-1]."&act=view' class=textlink><IMG SRC='include/previous.gif' ALT='предыдущий слайд' border=0></a><a href='?dir=".$dir."&bg=".$bg."' class=textlink><IMG SRC='include/home.gif' ALT='в галлерею' border=0></a><A HREF='?dir=".$dir."&pic_id=".$pics[$current+1]."&act=view' class=textlink><IMG SRC='include/next.gif' ALT='следующий слайд' border=0></a>";
}
//конец рассчета ссылок для покадрового просмотра

//вывод в окно броузера
if ($dir)
{
echo "<table align=center border=0 width=75%><tr><td align=center>";
?>
<a href="#"><img style="cursor:hand" id="bw" onClick="flipBW();return false;" src="include/i_bw.gif" width=16 height=16 border=0 vspace=5 hspace=5 alt="инструмент | убрать цвет"></a>
<?
echo "<font color=lime>".$current." из ".count($pics)."</font>".$prn."<hr>";
echo "<IMG id='mainpic' class=image SRC='shadow_thumb.php?dir=".$dir."&file=".$pic_id."&rc=3&act=view' border=0'><br>";
echo "<hr>".$prn."</td></tr></table>";
}
//конец вывода в окно броузера
}
else
{
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
//$last=end($link);$last=$link[$numl-1];}

for($i=0; $i<$cicl; $i++)
	{
	if ($link[$i]==$bg){$curr=$i;}
    }

if (!in_array ($bg, $link)){$bg=1;}
if ($first==$last){$bg=0;}

	    switch ($bg)
		{
    	case $last:
    	//$prn = "<A HREF='?bg=".$link[$numl-2]."&dir=".$dir."' class=textlink><IMG SRC='include/previous.gif' ALT='предыдущий слайд' border=0></a><a href='./' class=textlink><IMG SRC='include/home.gif' ALT='up' border=0></a>";
		$prn = "<A HREF='?bg=".$link[$numl-2]."&dir=".$dir."' class=textlink><IMG SRC='include/previous.gif' ALT='предыдущий слайд' border=0></a>";
		break;
		case $first:
		// $prn = "<a href='./' class=textlink><IMG SRC='include/home.gif' ALT='up' border=0></a><A HREF='?bg=".$link[1]."&dir=".$dir."' class=textlink><IMG SRC='include/next.gif' ALT='следующий слайд' border=0></a>";
		$prn = "<A HREF='?bg=".$link[1]."&dir=".$dir."' class=textlink><IMG SRC='include/next.gif' ALT='следующий слайд' border=0></a>";
		break;
		case 0:
		//$prn = "<a href='./' class=textlink><IMG SRC='include/home.gif' ALT='up' border=0></a>";
		$bg=1;
		break;
		default:
		//$prn = "<A HREF='?bg=".$link[$curr-1]."&dir=".$dir."' class=textlink><IMG SRC='include/previous.gif' ALT='предыдущий слайд' border=0></a><a href='./' class=textlink><IMG SRC='include/home.gif' ALT='up' border=0></a><A HREF='?bg=".$link[$curr+1]."&dir=".$dir."' class=textlink><IMG SRC='include/next.gif' ALT='следующий слайд' border=0></a>";
		  $prn = "<A HREF='?bg=".$link[$curr-1]."&dir=".$dir."' class=textlink><IMG SRC='include/previous.gif' ALT='предыдущий слайд' border=0></a><A HREF='?bg=".$link[$curr+1]."&dir=".$dir."' class=textlink><IMG SRC='include/next.gif' ALT='следующий слайд' border=0></a>";
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
	{	echo "<td align=center><a href='gallery_with_shadow_thumbs.php?dir=".$dir."&pic_id=".$pics[$i]."&act=view' target=main><img src='shadow_thumb.php?dir=".$dir."&file=".$pics[$i]."&rc=3&act=' border=0></a></td>";
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

//echo "</tr></table>";
?>