<?php
  include('DBconfig.php');
error_reporting(E_ALL);
 //echo(" after swith");
 // echo("the book with ISBN : " && $isbn && "is added");
  $true=false;
 // echo ($true);
foreach($_POST as $key => $value)
       {
           if ($key=="ISBN")
   $isbn= (int)$value;
     if ($key=="name")
   $name= $value;
   if ($key=="version")
   $vr= (int)$value;
     if ($key=="author")
   $Aut= $value;
  if ($key=="publisher")
   $PB= $value;
   
   if ($key=="quantity")
   $QU= (int)$value;
  if ($key=="review")
   $RV= $value;
   
    if ($key=="type")
   $TP= $value;
  if ($key=="date_Published")
   $DP= $value;
             
       }
       
       foreach($_GET as $key => $value)
       {
           if ($key=="ISBN")
   $isbn= (int)$value;
     if ($key=="name")
   $name= $value;
   if ($key=="version")
   $vr= (int)$value;
     if ($key=="author")
   $Aut= $value;
  if ($key=="publisher")
   $PB= $value;
   
   if ($key=="quantity")
   $QU= (int)$value;
  if ($key=="review")
   $RV= $value;
   
    if ($key=="type")
   $TP= $value;
  if ($key=="date_Published")
   $DP= $value;
             
       }
       
       
       
       
       
  $postMethod=false;
  
         //echo ("before switch");
       //  print_r($_POST);
//  set the method sent to true
switch($_SERVER['REQUEST_METHOD'])

{ case 'POST':   $postMethod=true;break;
case 'GET':   $postMethod=true;
break;
 
  default: 
       echo("Sorry this method is not allowed here "); 
}
      // print_r($_POST);
      //  print_r($_GET);

 if ($postMethod==true)
{
                             
         if ((!empty($isbn))&& (empty($name))) {
    $query=mysql_query("SELECT * FROM books WHERE ISBN='$isbn'");  
            $true=true;
         }
              
            else if ((!empty($name)) && (empty($isbn))){
    $query=mysql_query("SELECT * FROM books WHERE name='$name'"); 
    $true=true; 
  }
   
            
  else if ((!empty($Aut))&& (empty($name))) {
    $query=mysql_query("SELECT * FROM books WHERE author='$Aut'"); 
    $true=true; 
 }
     
       elseif (!empty($vr)) {
    $query=mysql_query("SELECT * FROM books WHERE version='$vr'"); 
    $true=true; 
 }
     
     
     else if (!empty($TP)) {
    $query=mysql_query("SELECT * FROM books WHERE type='$TP'"); 
    $true=true; 
 }
 
   else if ((!empty($name))&& (!empty($Aut)) && (!empty($PB))) {
    $query=mysql_query("SELECT * FROM books WHERE name='$name' and author='$Aut' and publisher='$PB'"); 
    $true=true; 
 }
                           
                          // die(mysql_error()); 
                      if ($true==true){
                   $rows=mysql_num_rows($query);
  echo("\n there is  \n");
               print_r($rows );
               print_r(" rows ");

 echo "<table border='1'>"; 
echo "<tr><th>ISBN</th><th>name</th><th>version</th><th>author</th><th>publisher</th><th>quantity</th><th>review</th><th>type</th><th>date_Published</th></tr>";   
$i=0;

 while ($i < $rows) {
   
$field1=mysql_result($query,$i,"ISBN");
$field2=mysql_result($query,$i,"name");
$field3=mysql_result($query,$i,"version");
$field4=mysql_result($query,$i,"author");
$field5=mysql_result($query,$i,"publisher");
$field6=mysql_result($query,$i,"quantity");
$field7=mysql_result($query,$i,"review");
$field8=mysql_result($query,$i,"type");
$field9=mysql_result($query,$i,"date_Published");  

echo "<tr><th>";echo $field1;echo "</th><th>";echo $field2;echo "</th><th>";echo $field3;echo  "</th><th>";echo $field4;echo  "</th><th>";echo $field5;echo  "</th><th>";echo $field6;echo  "</th><th>";echo  $field7;echo  "</th><th>";echo  $field8;echo  "</th><th>"; echo  $field9; echo  "</th></tr>";



 //$field2   $field3   $field4    $field5   $field6   $field7    $field8   $field9 ";
$i+=1;


}
echo "</table>";
}   else

echo("Sorry there is no records match your criteria ");
}  
       //}                      







//    
       
       
  
  
  
?>
