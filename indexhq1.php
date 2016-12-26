<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">

<script src="lib/JsHttpRequest/JsHttpRequest.js"></script>
<script language="JavaScript">
  // Функция вызывается при нажатии на кнопку.

  function test() {
    JsHttpRequest.query(
      'gallery_with_shadow_thumbs.php', // путь к backend-скрипту
      {
        // передаем текстовые данные
        //'str1': document.getElementById("mystr").value,
        // передаем файл для закачки
        //'str2': document.getElementById("mytest")
      },
      // Функция-обработчик, вызывается при ответе сервера.
      function(result, errors) {
        // Вывести отладочные сообщения (если нужно).
        document.getElementById("debug").innerHTML = errors;
        // Вывести результат работы.
        document.getElementById("ans").innerHTML = result;
      }
    );
  }
</script>
 </HEAD>

 <BODY>
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

//echo "<a href='gallery_with_shadow_thumbs.php?dir=".$fl."' target=main>".$name_link."</a><br>";
//<a href='#'>;'
echo "<a href='#' style='cursor: hand' onclick='test()'>".$name_link."</a><br>" ;
$t[$i]=$i;
$i++;
}
}
closedir($handle);
$maxpicgal=count($t);
echo "<hr><p>количество галлерей -<b>".$maxpicgal."</b>";
?>

<table border=1><tr><td>
<div id="ans">
  Результат работы отобразится в этом блоке.
</div>
</td>
</tr>
<tr>
<td>
<div id="debug">
  Отладочные сообщения отобразятся в этом блоке.
</div>
</td>
</tr>
</table>

 </BODY>
</HTML>
