 
<?php  

 include('DBconfig.php');
error_reporting(E_ALL);
 // echo("the book with ISBN : " && $isbn && "is added");
 
 
foreach($_POST as $key => $value)
       {   
             if ($key=="id")
   $id= (int)$value;
           
           if ($key=="delete")
   $delete= $value;
    if ($key=="get")
   $get= $value;
    if ($key=="userid")
   $userid= (int)$value;
         if ($key=="ISBN")
   $isbn= (int)$value;
        
      if ($key=="quantity")
   $QU= (int)$value;
        
        if ($key=="state")
   $st= $value; 
     
     if ($key=="country")
   $cn= $value;
   
    if ($key=="zipcode")
   $zc= (int)$value;
 if ($key=="order_date")
   $order_date= $value;
              
       }
       
  foreach($_GET as $key => $value)
       {   
             if ($key=="id")
   $id= (int)$value;
           
           if ($key=="delete")
   $delete= $value;
    if ($key=="get")
   $get= $value;
    if ($key=="userid")
   $userid= (int)$value;
    if ($key=="name")
   $name= $value;
         if ($key=="ISBN")
   $isbn= (int)$value;
        
      if ($key=="quantity")
   $QU= (int)$value;
        
        if ($key=="state")
   $st= $value; 
     
     if ($key=="country")
   $cn= $value;
   
    if ($key=="zipcode")
   $zc= (int)$value;
 if ($key=="order_date")
   $order_date= $value;
              
       }     
             
      
       
       
       //echo $country;
       
       
 
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

if ($deleteMethod==true)
{
    
     
    $Delete=mysql_query("DELETE FROM orders");  
       echo("all the orders have been deleted ");
                die(mysql_error()); 
}



if ($getMethod==true)
{
     
    $query=mysql_query("SELECT * FROM orders");  
//$result=mysql_query($query);
$rows=mysql_num_rows($query);
             echo("\n Sussfully fitch the data base \n");
    if($rows>0) 
   // echo($rows); 
               echo("\n there is  \n");
               print_r($rows );
                 print_r(" rows ");  
                 
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



 //$field2   $field3   $field4    $field5   $field6   $field7    $field8   $field9 ";
$i+=1;


}
echo "</table>";
}                  
           
           //if ($getMethod==true)                                        
 if ($postMethod==true)
 
    {       //echo $cn;
    
        
   $sql=mysql_query("INSERT INTO orders (userid,ISBN,quantity,order_date,country,state,zipcode) VALUES
 ('$userid','$isbn','$QU',CURDATE(),'$cn','$st','$zc')");
  // die(mysql_error()); 
              echo "1 record added";
             
              die(mysql_error());

 
   }  
  if ($putMethod==true)
    {          parse_str(file_get_contents('php://input'), $_PUT);
           // print_r($_PUT);  
    
        foreach($_PUT as $key => $value)
       {   
             if ($key=="id")
   $id= (int)$value;
             if ($key=="name")
   $name= $value;
           
           if ($key=="delete")
   $delete= $value;
    if ($key=="get")
   $get= $value;
    if ($key=="userid")
   $userid= (int)$value;
         if ($key=="ISBN")
   $isbn= (int)$value;
        
      if ($key=="quantity")
   $QU= (int)$value;
        
        if ($key=="state")
   $st= $value; 
     
     if ($key=="country")
   $cn= $value;
   
    if ($key=="zipcode")
   $zc= $value;
 if ($key=="order_date")
   $order_date= $value;
              
       }
        
        
        
                 if (!empty($userid))
       {     
       
           $Insert=mysql_query("UPDATE orders d INNER JOIN books b ON d.ISBN = b.ISBN SET d.quantity = '$QU' WHERE userid='$userid'  and d.ISBN  in (SELECT ISBN FROM BOOKS WHERE name='$name')");
                echo("the order has  been updated with new quantity ");
                print_r($QU);
                //  echo("$Insert ");    
                      die(mysql_error());
       }   
    //}
     
     else if ((empty($userid))&& (empty($name)))
       {    
       $date = new DateTime($order_date); 
$sqldate = $date->format('Y-m-d'); 
                                
           $Insert=mysql_query("UPDATE orders SET quantity='$QU' WHERE country='$country' and state='$state' and zipcode='$zipcode' and order_date='$sqldate'");
                  echo("$Insert ");    
    
      }   else
      
      {  echo(" Sorry,, there is no order match the criteria ");
          
      } }     
           
           
           
      
     
   
//         if ($deleteMethod==true)
//    {  
//                          if (!empty($_POST['UserID']))
//                 {  $Delete=mysql_query("DELETE FROM orders WHERE UserID=$_POST[UserID]");     
//                   
//                       }
//                   
//                        if  (!empty($_POST['Ship_Country']))
//                 {  $Delete=mysql_query("DELETE FROM orders WHERE Ship_Country=$_POST[Ship_Country]");     
//                   
//                        }
//                   
//                      if  ((!empty($_POST['Ship_Country'])) && (!empty($_POST['State'])))
//                 {  $Delete=mysql_query("DELETE FROM orders WHERE Ship_Country=$_POST[Ship_Country] and State=$_POST[State]");     
//                   
//                     }
//                     
//                            if ((!empty($_POST['UserID'])) &&   (!empty($_POST['current']))&& (!empty($_POST['Offset'])))
//                 {  $Delete=mysql_query("DELETE FROM orders WHERE UserID=$_POST[UserID] and Order_Date=CURDATE() ");     
//                   
//                       }

//  if ((!empty($_POST['UserID'])) &&   (!empty($_POST['StartDate']))    &&   (!empty($_POST['EndDate'])))
//                    { $Delete=mysql_query("DELETE FROM orders WHERE Order_Date between $_POST[StartDate] and $_POST[EndDate]");
//                     }
//                     
//                      if (!empty($_POST['year']))    
//                    { $Delete=mysql_query("DELETE FROM orders WHERE year(Order_Date) = $_POST[Year]");
//                     }
//                     
//                     if ((!empty($_POST['UserID'])) &&   (!empty($_POST['StartDate']))    &&   (!empty($_POST['EndDate'])))
//                    { $Delete=mysql_query("DELETE FROM orders WHERE Order_Date between $_POST[StartDate] and $_POST[EndDate]");
//                     }
//                  
//                
//                        if ((!empty($_POST['UserID'])) &&   (!empty($_POST['StartDate']))    &&   (!empty($_POST['EndDate'])))
//                    { $Delete=mysql_query("DELETE FROM orders WHERE Order_Date between $_POST[StartDate] and $_POST[EndDate]");
//                     }
//                     
//                                if ((!empty($_POST['UserID'])) &&   (!empty($_POST['current'])) && (!empty($_POST['Offset'])) )
//                   {  $Delete=mysql_query("DELETE *  FROM orders
// WHERE id UserID (SELECT Top Offset orders FROM orders where UserID=$_POST[UserID]");
//                
//                   }
//                
//                         print_r ($Delete);   
//                   
//                   
//     
//   }



  
?>
        
