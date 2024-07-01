<html>
  <head>
    <style>
         .card{
          width:310px;
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
          .id{
            font-size:24px;
            font-weight:bold;
            display:inline-block;
          }
          .bname{
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
$sql_result=mysqli_query($conn,"select * from cart  join product on cart.pid=product.pid");
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
       <div class='owner'>Ownerid=$row[owner] pid=$row[pid] orderid=$row[cartid]</div>
       </div>
    </div>";
}
echo"<h1>Total Price=$total Rs</h1>";
$sql_result=mysqli_query($conn,"select * from  user join cart on user.userid=cart.pid");
while($row=mysqli_fetch_assoc($sql_result))
{
   if($row['usertype']!='Buyer'){
    echo"<div class='place-order'>
       <hr>
       <div class='bname'>sellertid=$row[cartid] $row[usertype] name $row[username]</div>
       </div>";
   }
}
echo"<br>";
echo"<div class='place'>
     <a href='placeorder.php'>
     <button class='btn'>Place Order</button>
     </a>
     </div>";
?>
