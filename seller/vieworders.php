<html>
  <head>
    <style>
         .card{
          width:300px;
          height:350px;
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
          .id{
            display:inline-block;
            font-size:24px;
            font-weight:bold;
          }
          .sname{
            font-size:20px;
            font-weight:bold;
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
$sql_result=mysqli_query($conn,"select * from product join cart on product.pid=cart.pid");
$total=0;
while($row=mysqli_fetch_assoc($sql_result))
{
     $total+=$row['price'];
     echo"<div class='card'>
       <div class='name'>$row[name]</div>
       <div class='price'>$row[price]</div>
       <img src='$row[impath]'>
       <div class='detail'>$row[detail]</div>
       <div class='id'>
       <div class='id'>pid=$row[pid] userid=$row[userid] orderid=$row[cartid]</div>
       </div>
     </div>";
}
echo"<h1>Total Price=$total Rs</h1>";
$sql_result=mysqli_query($conn,"select * from cart join user on cart.userid=user.userid");
while($row=mysqli_fetch_assoc($sql_result))
{
     if($row['usertype']!='Seller'){
     echo"<div class='place-order'>
     <hr>
     <div class='sname'>pid=$row[pid] userid=$row[userid] orderid=$row[cartid] $row[usertype] name $row[username]</div>
     </div>";
   }
}
echo"<br>";
echo"<div class='Cancel Order'>
     <a href='Cancelorder.php'>
     <button class='btn'>Cancel Order</button>
     </a>
     </div>";
?>