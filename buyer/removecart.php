<?php
include "authguard.php";
include "../shared/connection.php";

$cartid=$_GET['cartid'];
$status=mysqli_query($conn,"delete from cart Where cartid=$cartid");
if($status){
    echo"cart removed Successfully!";
    header("location:viewcart.php");
}
else{
    echo mysqli_error($conn);
}

?>