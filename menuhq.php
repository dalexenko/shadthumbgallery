<?
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<link href='include/hqscans.css' rel='styleSheet' type='text/css'>";
?>
<TABLE BORDER=1 BORDERCOLOR=green>
<TR>
<TD>
<?
echo "<h4>topmodels list</h4><hr>";
$i=1;
$handle=opendir('images/');
while (false !== ($fl = readdir($handle))) {
if ($fl != "." && $fl != ".." && $fl != ".htaccess" && $fl != "index.php" && $fl != "index.html" && $fl != "menu.php" && $fl != "top.php" && $fl != "main.php"&& $fl != "dir.php"&& $fl != "gal.php"&& $fl != "include" && $fl != "thumbmaker" && $fl != "indexhq.php" && $fl != "indexhq.html" && $fl != "menuhq.php" && $fl != "galadmin") {
	$name_fl = explode("_", $fl);
	$name_link = implode(" ", $name_fl);

echo "<a href=gallery_with_shadow_thumbs_new.php?dir=".$fl."&bg='0'&act='NULL' target=main>".$name_link."</a><br>";
$t[$i]=$i;
$i++;
}
}
closedir($handle);
$maxpicgal=count($t);
echo "<hr><p>кол-во галлерей -<b>".$maxpicgal."</b>";
?>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>