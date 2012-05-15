<html>

<head>

<style type="text/css">




h1
{
background-color:#FFCC99;
}
body
{
background-color:"#FFE7BA";
background-image:url('banner.png');
background-repeat:no-repeat;
padding:1px; border:1px solid #021a40; 
background-position:70% 50%;

} 


</style>

</head>


<body>



<h1><center> Welcome to CIS e_Library </center></h1>

</body>

</html>


<?php     
include('DBconfig.php');
error_reporting(E_ALL);
 // echo("the book with ISBN : " && $isbn && "is added");
foreach($_POST as $key => $value)
       {   if ($key=="delete")
   $delete= $value;
           
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
       {   if ($key=="delete")
   $delete= $value;
           
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
       
       
       
       
       
       
$getMethod=false;
$postMethod=false;
$putMethod=false;
$deleteMethod=false;
//  set the method sent to true
switch($_SERVER['REQUEST_METHOD'])

{ case 'GET':   $getMethod=true;
break;
 case 'POST':   $postMethod=true;
  break;
  case 'PUT':   $putMethod=true;
break;
 case 'DELETE':   $deleteMethod=true;
  break;
  default: 
       echo("Sorry this method is not allowed here "); 
}

     //print_r($_SERVER['REQUEST_METHOD']); 
//      print_r($_POST); 
//              print_r($_POST); 
//       print_r($_REQUEST);
//       
//       print_r("php://input");
       
 //print_r ($delete);
        //     print_r( var_dump($_POST)) ;
     if ((!empty($delete)) && ($_SERVER['REQUEST_METHOD']=='POST'))
    {  
        
               $query=mysql_query("SELECT * FROM books where ISBN='$isbn'");
         $rows=mysql_num_rows($query); 

if($rows>0)  {
    
    $Delete=mysql_query("DELETE FROM books WHERE ISBN='$isbn'");     
                   
                   print_r ("the following record has been deleted : " );
                   print_r($isbn);   }
            

else{
    die(mysql_error());   
    die("the book is not exist");
                   
    }    }
    
  
          
else if (($getMethod==true) && (empty($delete)))
{
      
    $query=mysql_query("SELECT * FROM books");  
//$result=mysql_query($query);
$rows=mysql_num_rows($query);
             echo("\n Sussfully fitch the data base \n");
    //if($rows>0) 
//    echo($rows); 
   echo("\n there is  \n");
               print_r($rows );
                          echo(" records  \n");
            
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
}                                     
 else if (($postMethod==true) && (empty($delete)))
    {  
         $query=mysql_query("SELECT * FROM books where ISBN='$isbn'");
         $rows=mysql_num_rows($query);

if($rows>0)  {
die("the book is alreadfy exist you can updte the quantity");
}else{
    
   
    $date = new DateTime($DP); 
$sqldate = $date->format('Y-m-d'); 

    
   $sql=mysql_query("INSERT INTO books (ISBN, name, version,author,publisher, quantity, review,type,date_Published) values ('$isbn','$name','$vr','$Aut','$PB','$QU','$RV','$TP','$sqldate')");
                                                                                                                             

 echo "1 record added";
       echo("the book with ISBN : " && $isbn && "is added");
          die(mysql_error()); 
}}
       

 else if ($putMethod==true)
    {        //   echo("in put "); 
              parse_str(file_get_contents('php://input'), $_PUT);
  //print_r($_PUT); 
        foreach($_PUT as $key => $value)
       {       if ($key=="ISBN")
   $isbn= (int)$value;
                  // print_r($isbn);
         if ($key=="name")
   $name= $value;
   // print_r($name);
   if ($key=="version")
   $vr= (int)$value;
     //          print_r($vr)  ;
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
   $DP= $value;}
       //print_r("here is ");
       //print_r($QU);
    
    //            print_r($QU);
      if ((!empty($name))&& (!empty($QU) ) && (empty($RV) ) && (empty($isbn) ) )
       { $Insert=mysql_query("UPDATE books SET quantity='$QU' WHERE name='$name'");
                       print_r( $name  ) ;
                        print_r("has been updated with quantity ");
                                
                            print_r( $QU  );}
    
   //  echo("in put ");  
      
     else if   ((empty($name))&& (!empty($QU) ) && (empty($RV) ) && (!empty($isbn) ) )
     
                        { 
                            
                            //echo"right con"  ;
                        
                         $Insert=mysql_query("UPDATE books SET quantity='$QU' WHERE ISBN='$isbn'");
                        print_r( $isbn  );
                        print_r("   has been updated with quantity : ");
                        print_r( $QU  );
                        
                        }
        
             else if     ((empty($name))&& (empty($QU) ) && (!empty($RV) ) && (!empty($isbn) ) )
     
                        { $Insert=mysql_query("UPDATE books SET review='$RV' WHERE ISBN='$isbn'");
                           print_r( $isbn  );
                        print_r("has been updated with review ");
                                
                            print_r( $RV  );
                        }
                         
                         
                  else if     ((!empty($isbn))&& (!empty($Aut)) && (empty($name))&& (empty($QU)) && (empty($RV) ))
                                
                        { $Insert=mysql_query("UPDATE books SET author='$Aut' WHERE ISBN='$isbn'");
                        print_r( $isbn  );
                        print_r("has been updated with review ");
                                
                            print_r( $RV  );}
                            
                           //  if ((!empty($RV) ) && (!empty($isbn) ) )
//       { $Insert=mysql_query("UPDATE books SET review='$RV' WHERE name='$isbn'");
//                       print_r( $isbn  ) ;
//                        print_r("has been update with review ");
//                                
//                            print_r( $RV  );}
                            
                            
    }
      
   
    if (($_SERVER['REQUEST_METHOD']=='GET') && (!empty($delete)))
    
    {
          $query=mysql_query("DELETE FROM books WHERE ISBN='$isbn'");
                        print_r( $isbn  );
                        print_r("has been deleted ");
                                
                           // print_r( $RV  );
        
        
    }
    
       
   //    mysql_close($sql);
 
     

  
?>
        
