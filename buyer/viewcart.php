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
$sql_result=mysqli_query($conn,"select * from cart  join product on cart.pid=product.pid  where userid=$_SESSION[userid]");
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
       <a href='removecart.php?cartid=$row[cartid]'>
        <button class='btn'>Remove Item</button>
        </a>
    </div>
 </div>";
}
$sql_result=mysqli_query($conn,"select * from cart  join product on cart.pid=product.pid  where userid=$_SESSION[userid]");
$row=mysqli_fetch_assoc($sql_result);
echo"<hr>";
echo"<div class='place-order'>
     <h1>Total Price=$total Rs</h1>
     <div class='placeorder'>
     <a href='placeorder.php?pid=$row[pid]'>
     <button class='btn'>Place Order</button>
     </a>
     </div>
     </div>";
?>