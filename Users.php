
<?php     
include('DBconfig.php');
error_reporting(E_ALL);
 // echo("the book with ISBN : " && $isbn && "is added");
   //   setcookie("false","false"); 
 
foreach($_POST as $key => $value)
       {   if ($key=="delete")
   $delete= $value;
    if ($key=="get")
   $get= $value;
    if ($key=="newPass")
   $newPass= $value;
                     
           if ($key=="id")
   $id= (int)$value;
     if ($key=="fname")
   $fname= $value;
   if ($key=="lname")
   $lname= $value;
   
    if ($key=="username")
   $username= $value;
    if ($key=="password")
   $password= $value;
              
       }
            parse_str(file_get_contents('php://input'), $_PUT);
          foreach($_PUT as $key => $value)
       {   if ($key=="delete")
   $delete= $value;
    if ($key=="get")
   $get= $value;
    if ($key=="newPass")
   $newPass= $value;
                     
           if ($key=="id")
   $id= (int)$value;
     if ($key=="fname")
   $fname= $value;
   if ($key=="lname")
   $lname= $value;
   
    if ($key=="username")
   $username= $value;
    if ($key=="password")
   $password= $value;
  //   print_r($username);         
       }
       
        foreach($_GET as $key => $value)
       {   if ($key=="delete")
   $delete= $value;
    if ($key=="get")
   $get= $value;
    if ($key=="newPass")
   $newPass= $value;
                     
           if ($key=="id")
   $id= (int)$value;
     if ($key=="fname")
   $fname= $value;
   if ($key=="lname")
   $lname= $value;
   
    if ($key=="username")
   $username= $value;
    if ($key=="password")
   $password= $value;
    // print_r($username);         
       }
       
       
    //  echo($_SERVER['REQUEST_METHOD']);
//       echo($_GET);
 //   print_r($username);
//    print_r($password);
//print_r($username) ;
//print_r ($password) ;
//print_r($newPass);
       
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

  //   print_r($_SERVER['REQUEST_METHOD']); 
//      print_r($_POST); 
//              print_r($_POST); 
//       print_r($_REQUEST);
//       
//       print_r("php://input");
       
 //print_r ($delete);
        //     print_r( var_dump($_POST)) ;
   if ((!empty($delete)) && ($_SERVER['REQUEST_METHOD']=='POST') && (!empty($id)))
    {  
                           
               $query=mysql_query("SELECT * FROM users where id='$id'");
         $rows=mysql_num_rows($query); 

if($rows>0)  {
                  // echo ($rows);
    $Delete=mysql_query("DELETE FROM users WHERE id='$id'");     
                   
                   print_r ("the following record has been deleted : " );
                   print_r($id);   }
            

else{
    die(mysql_error());   
    die("the user is not exist");
                   
    }    }      
        
    else if ((($postMethod==true) && (!empty($get))) ||  (($getMethod==true) && (!empty($username)) && (!empty($password)) ) )
         
        {   
             $username=mysql_real_escape_string($username);
$password=mysql_real_escape_string(md5($password));
           
      
    $query=mysql_query("SELECT fname FROM users where username='$username' and password='$password'");  
//$result=mysql_query($query);
$rows=mysql_num_rows($query);
echo   $rows;
if ($rows>0)
            {
                   
             echo("\n Welcome Back \n");
                 // print_r($query);
                      //setcookie("true");
                      setcookie("user", "", time()-3600);
       setcookie("true","true");
       //  setcookie("user", "", time()-3600);
                  echo ("\n successfully login !");  
                   
}else
{         setcookie("false","false");
       echo("\n Ooops,,, the username or password are wrong\n");
    
}
}       
            
       //     print_r( var_dump($_POST)) ;
   else if ((!empty($delete)) && ($_SERVER['REQUEST_METHOD']=='POST') && (!empty($username)))
    {  
                           
               $query=mysql_query("SELECT * FROM users where username='$username'");
         $rows=mysql_num_rows($query); 

if($rows>0)  {
                  // echo ($rows);
    $Delete=mysql_query("DELETE FROM users WHERE username='$username'");     
                   
                   print_r ("the following record has been deleted : " );
                   print_r($username);   }
            

else{
    die(mysql_error());   
    die("the user is not exist");
                   
    }    }                 
            
            
            
            
        
        
        
        
        
  else if (($postMethod==true) && (empty($get)))
    { 
    
    
    $username=mysql_real_escape_string($username);
$password=mysql_real_escape_string(md5($password));

        $query=mysql_query("SELECT * FROM users where username='$username'");
$rows=mysql_num_rows($query);

if($rows>0)  {
die("username taken");
}else{
$user_input=mysql_query("insert into users (fname,lname,username,password) values ('$fname','$lname','$username','$password')");
echo ("successfully registered !");


 echo "1 record added";
       echo("the username : " );
       print_r($username);
       echo("   is added");
        setcookie("user", "", time()-3600);
       setcookie("true","true");
          die(mysql_error());
           
}}
        
        
     if (($getMethod==true) &&  (empty($username)))
{
      
    $query=mysql_query("SELECT * FROM users ");  
//$result=mysql_query($query);
$rows=mysql_num_rows($query);
if ($rows>0)
            {
                
             echo("\n there is  \n");
               print_r($rows );
                          echo(" records  \n");
            
     
echo "<table border='1'>"; 
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Username</th><th>Password</th></tr>";   
$i=0;

 while ($i < $rows) {
   
$field1=mysql_result($query,$i,"id");
$field2=mysql_result($query,$i,"fname");
$field3=mysql_result($query,$i,"lname");
$field4=mysql_result($query,$i,"username");
$field5=mysql_result($query,$i,"password");  

echo "<tr><th>";echo $field1;echo "</th><th>";echo $field2;echo "</th><th>";echo $field3;echo  "</th><th>";echo $field4;echo  "</th><th>";echo $field5; echo  "</th></tr>";



 //$field2   $field3   $field4    $field5   $field6   $field7    $field8   $field9 ";
$i+=1;


}
echo "</table>";
}     









else
{
       echo("\n Ooops,,, there is no users registered \n");
    
}
}       
        
        
        
        
        
        
        
        
      //  
//    
//  
//          
//else if (($getMethod==true) && (empty($delete)))
//{
//      
//    $query=mysql_query("SELECT * FROM users where username='$username' and password='$password'");  
//$result=mysql_query($query);
//$rows=mysql_num_rows($query);
//if ($rows>0)
//            {
//                
//             echo("\n Welcome Back \n");
//                  print_r($fname);
//                  echo ("\n successfully login !"); }
    //if($rows>0) 
//    echo($rows); 
//   
//}                                                    
 //else if (($postMethod==true) && (empty($delete)))
// else if ($postMethod==true)
//    {  
//        $query=mysql_query("SELECT * FROM users where username='$username'");
//$rows=mysql_num_rows($query);

//if($rows>0)  {
//die("username taken");
//}else{
//$user_input=mysql_query("insert into users (fname,lname,username,password) values ('$fname','$lname','$username','$password')");
//echo ("successfully registered !");


// echo "1 record added";
//       echo("the username : " );
//       print_r($username);
//       echo("is added");
//          die(mysql_error()); 
//}}
//       

 else if ($putMethod==true)
    {         echo("in put "); 
              parse_str(file_get_contents('php://input'), $_PUT);
            //print_r($_PUT); 
        foreach($_PUT as $key => $value)
       {       if ($key=="id")
   $id= (int)$value;
                  // print_r($isbn);
         if ($key=="username")
   $username= $value;
   // print_r($name);
 if ($key=="password")
  $password= $value;
     //          print_r($vr)  ;
     if ($key=="newPass")
   $newPass= $value;
   
       } 
    $username=mysql_real_escape_string($username);
$password=mysql_real_escape_string(md5($password));
$newPass=mysql_real_escape_string(md5($newPass));   
    
 $query=mysql_query("SELECT * FROM users where username='$username' and password='$password'");
$rows=mysql_num_rows($query);

if($rows>0)  {
    
    $Insert=mysql_query("UPDATE users SET password='$newPass' WHERE username='$username'");
                       print_r( $username  ) ;
                        print_r("  has been update with new password ");
    

}
else
{ die("No username match");

    }     }
    
 
    

  
?>
        
