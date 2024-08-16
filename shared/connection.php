<?php
try{
    $conn=new mysqli("127.0.0.1","root","","acmesep",3307);
    if($conn->connect_error){
     echo"Connection Failed";
    die;
   }
}
catch(Exception $err){
    print_r($err);
}
?>