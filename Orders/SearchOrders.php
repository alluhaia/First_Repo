<?php
  include('DBconfig.php');
error_reporting(E_ALL);
 //echo(" after swith");
 // echo("the book with ISBN : " && $isbn && "is added");
$true=false;
foreach($_POST as $key => $value)
       {
           if ($key=="order_date")
   $order_date= $value;
     if ($key=="start")
   $start= $value;
   if ($key=="end")
   $end= $value;
     if ($key=="current")
   $current= $value;
  if ($key=="offset")
   $offset= $value;
   if ($key=="country")
   $country= $value;
   
   
if ($key=="delete")
   $delete= $value;
           
       }
       
     

   
       foreach($_GET as $key => $value)
       {
           if ($key=="order_date")
   $order_date= $value;
     if ($key=="start")
   $start= $value;
   if ($key=="end")
   $end= $value;
     if ($key=="current")
   $current= $value;
  if ($key=="offset")
   $offset= $value;
   if ($key=="country")
   $country= $value;
   
   
if ($key=="delete")
   $delete= $value;

             
       }
       
       //  $str = $_SERVER["REQUEST_URI"]."/".$current;
//print_r (explode("/",$str)); 

 
 
 
    
       
     // print_r($start);
//      print_r($end); 
       
//     $search=false;   
  $postMethod=false;
         //echo ("before switch");
       //  print_r($_POST);
//  set the method sent to true
switch($_SERVER['REQUEST_METHOD'])

{ case 'POST':   $postMethod=true;
break;
  case 'GET':   $postMethod=true;   $search=true;
break;
  default: 
       echo("Sorry this method is not allowed here "); 
}
       

       
       
   $str = $_SERVER["REQUEST_URI"];
         $str= explode("/",$str); 
              // print_r (explode("/",$str)); 
         if ((in_array("current",$str)) &&  ($_SERVER['REQUEST_METHOD']='GET')){
             
             
           $query=mysql_query("SELECT * FROM orders WHERE order_date=CURDATE()");  
    $true=true;      
         }
   // echo "Haaay Irix";    
       
    print_r($start);
    print_r($end);   
       
       
       
 if ($postMethod==true)
{
       if ((!empty($current))&& (empty($offset))) {
    $query=mysql_query("SELECT * FROM orders WHERE order_date=CURDATE()");  
    $true=true;    
}                           
       
               
         
            else if ((!empty($start)) && (!empty($end))){
    $query=mysql_query("SELECT * FROM orders WHERE order_date between '$start' and '$end'");  
            $true=true;       
            }
   
            
  else if (!empty($order_date)) {
    $query=mysql_query("SELECT * FROM orders WHERE order_date='$order_date'");

  $true=true;  
  }
//     
       elseif (!empty($offset)) {
    $query=mysql_query("SELECT * FROM orders WHERE order_date=CURDATE() OFFSET '$offset'");  
 
       $true=true;
       }

 
    elseif (!empty($offset)) {
    $query=mysql_query("SELECT * FROM orders WHERE order_date=CURDATE() OFFSET '$offset'");  
   $true=true;  
    }
 
              // print_r($search);
               
                     if ($true==true){
  $rows=mysql_num_rows($query);
             echo("\n Sussfully fitch the data base \n");
       
        echo("\n there is  \n");
               print_r($rows );
                          echo(" records  \n");
            echo "<table border='1'>";  
         echo "<tr><th>ID</th><th>UserID</th><th>ISBN</th><th>quantity</th><th>order_date</th><th>country</th><th>state</th><th>zip code</th></tr>";   
$i=0;

 while ($i < $rows) {
   
$field1=mysql_result($query,$i,"id");
$field2=mysql_result($query,$i,"userid");
$field3=mysql_result($query,$i,"ISBN");
$field4=mysql_result($query,$i,"quantity");
$field5=mysql_result($query,$i,"order_date");
$field6=mysql_result($query,$i,"country");
$field7=mysql_result($query,$i,"state");
$field8=mysql_result($query,$i,"zipcode"); 

echo "<tr><th>";echo $field1;echo "</th><th>";echo $field2;echo "</th><th>";echo $field3;echo  "</th><th>";echo $field4;echo  "</th><th>";echo $field5;echo  "</th><th>";echo $field6;echo  "</th><th>";echo  $field7;echo  "</th><th>";echo  $field8; echo  "</th></tr>";
$i+=1;


}
echo "</table>";
} }         
 
   if (($postMethod==true)&&(!empty($country)) && (!empty($delete)))
    {
    $query=mysql_query("DELETE FROM orders WHERE country='$country'");  
 
   echo(" the record has been deleted with country");
            
                  print_r($country);
               die(mysql_error());
   }
 
 
   if ($true==false)
   echo("Sorry there is no records match your criteria");
 
 
 
 
    

  
  
  
?>
