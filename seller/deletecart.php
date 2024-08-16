<?php
include "authguard.php";
include "../shared/connection.php";

$pid=$_GET['pid'];
$status=mysqli_query($conn,"delete from product Where pid=$pid");
if($status){
    echo"cart removed Successfully!";
    header("location:view.php");
}
else{
    echo mysqli_error($conn);
}

?>