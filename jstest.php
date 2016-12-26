<?php
require_once "include/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest =& new JsHttpRequest("windows-1251");

$id = $_REQUEST['id'];
$rt = $_REQUEST['rt'];

if ($id==5)
{
echo "<table border=1><tr><td>id=".$id."</td></tr></table>";
}
else
{
echo "<table border=".$id."><tr><td>id=".$rt."</td></tr></table>";
}
?>