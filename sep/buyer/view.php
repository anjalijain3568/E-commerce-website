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
while($row=mysqli_fetch_assoc($sql_result)){
    echo"<div class='card'>
       <div class='name'>$row[name]</div>
       <div class='price'>$row[price]</div>
       <img src='$row[impath]'>
       <div class='detail'>$row[detail]</div>
       <div class='action'>
          <a href='addcart.php?pid=$row[pid]'>
           <button class='btn'>Add to cart</button>
           </a>
       </div>
    </div>";
};


?>