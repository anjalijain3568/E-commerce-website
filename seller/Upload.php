<?php
$source_path=$_FILES['pdtimg']['tmp_name'];
$target_path="../shared/images/" . $_FILES['pdtimg']['name'];
move_uploaded_file($source_path,$target_path);
include "authguard.php";
include "menu.html";
include "../shared/connection.php";
$status=mysqli_query($conn,"insert into product(name,price,detail,impath,owner) values('$_POST[name]',$_POST[price],'$_POST[detail]','$target_path','$_SESSION[userid]')");
if($status){
    echo"product Uploaded Successfully!";
}
else{
    echo mysqli_error($conn);
}
?>