<html>
  <head>
    <style>
         .card{
          width:300px;
          height:300px;
          display:inline-block;
          background-color:lightskyblue;
          margin: 10px;
          padding: 10px;
         }
         img{
          width:100%;
          height:70%;
          }
          .name{
            font-size:24px;
          }
          .price{
            font-size:26px;
            font-weight:bold;
            color: red;
          }
          .price::after{
            content:"RS";
          }
          .action{
            text-align:center;
          }
    </style>
  </head>
  <body>
</body>
</html>
<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";
$sql_result=mysqli_query($conn,"select * from product");
$total=0;
while($row=mysqli_fetch_assoc($sql_result))
{
    $total+=$row['price'];
    echo"<div class='card'>
       <div class='name'>$row[name]</div>
       <div class='price'>$row[price]</div>
       <img src='$row[impath]'>
       <div class='detail'>$row[detail]</div>
       <div class='action'>
           <button class='btn'><a href='editcart.php'>Edit</a></button>
           <button class='btn'><a href='deletecart.php?pid=$row[pid]'>Delete</a></button>
        </div>
    </div>";
}
echo"<h1>Total Price=$total Rs</h1>";
?>