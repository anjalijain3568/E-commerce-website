<?php
session_start();
$_SESSION['login_status']=false;

 $uname=$_POST['uname'];
 $upass=$_POST['upass'];
 
 //$conn=new mysqli("127.0.0.1","root","","acme23_aug",3307);
 include "../shared/connection.php";
 $sql_result=mysqli_query($conn,"select * from user where username='$uname' and password='$upass'");
 $row=mysqli_fetch_assoc($sql_result);
 $rows=mysqli_num_rows($sql_result);
if($rows>0){
    echo"login success";
        $_SESSION['login_status']=true;
        $_SESSION['usertype']=$row['usertype'];
        $_SESSION['username']=$row['username'];
        $_SESSION['userid']=$row['userid'];
    if($row['usertype']=='Seller'){
        header("location:../seller/home.php");
    }
    else if($row['usertype']=='Buyer'){
        $_SESSION['login_status']=true;
        header("location:../buyer/view.php");
    }
        
    }

else{
    echo"Invalid credentials";
}
 ?>