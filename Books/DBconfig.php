<?php
$sql=mysql_connect("localhost","root","") or die(mysql_error());
$select_db=mysql_select_db("waproject",$sql);
if(isset($select_db))   {
echo"Connected to DB!";
}
?>