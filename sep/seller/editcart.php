<!DOCTYPE html>
<html lang="en">
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
          #popup{
            width:300px;
            height:300px;
            padding:10px;
            background-color: lightpink;
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
             display: none;
        }
        .form{
            display: flex;
            flex-direction: column;            
            align-items: center;
            justify-content: space-around;
            gap:10px;
        }
        .form input{
            border-radius: 12px;
            padding:10px;
            font-size: 16px;
        }
        .btn-save,.btn-cancel{
            padding:10px;
        }
        .btn-save{background-color: greenyellow;}
        .btn-cancel{background-color: red;}
    </style>
</head>
<body>
    <input type="text" placeholder="product Name" id="name">
    <input type="number" placeholder="product price" id="price">
    <textarea rows="1"  placeholder="product description" id="detail"></textarea>
    <button onclick="addproduct()">add</button>
    <hr>
    <div id="container"></div>
    <div id="popup">
    <h3 style="text-align: center;">Edit product</h3>
        <div class="form">
            <input type="text" id="ename">
            <input type="number" id="eprice">
            <input type="file" id="epdtimg">
            <textarea rows="1" id="edetail"></textarea>
            <div class="action">
                <button class="btn-save" onclick="saveproduct()">Save</button>
                <button class="btn-cancel" onclick="cancelproduct()">Cancel</button>
            </div>
        </div>
    </div>
    <script>
        containerObj=document.getElementById("container");
        popup=document.getElementById("popup");
        enameObj=document.getElementById("ename")
        epriceObj=document.getElementById("eprice")
        edetailObj=document.getElementById("edetail")
        var globalIndex;
        row=[
            {name:"wallpaper",price:24000,pdtimg:"../shared/images/wallpaper.jpg",detail:"so..nice"},
            {name:"children",price:33000,pdtimg:"../shared/images/children.jpg",detail:"childrens"},
            {name:"sunflower",price:55000,pdtimg:"../shared/images/Sunflower_from_Silesia2.jpg",detail:"flowers.."}
        ]
        render()
        function render(){
            containerObj.innerHTML=''
            for(i=0;i<row.length;i++){
                containerObj.innerHTML+=`<div class='card'>
                                          <div class='name'>${row[i].name}</div>
                                          <div class='price'>${row[i].price}</div>
                                           <img src='${row[i].pdtimg}'>
                                           <div class='detail'>${row[i].detail}</div>
                                           <div class='action'>
                                           <button onclick='editproduct(${i})'>Edit</button>
                                          <button onclick='deleteproduct(${i})'>Delete</button>
                                          </div>          
                                        </div>`;
            }
        }
        function deleteproduct(ind){
            row.splice(ind,1);
            render();
        }
        function addproduct(){
            nameObj=document.getElementById("name")
            priceObj=document.getElementById("price")
            detailObj=document.getElementById("detail")
            if(nameObj.value==''|| priceObj.value==''|| detailObj.value==''){
                alert("Missing values") 
                return                               
            }           
            tmpObj={name:nameObj.value,price:priceObj.value,detail:detailObj.value}
                row.push(tmpObj);
                render();
                nameObj.value='';
                priceObj.value='';
                detailObj.value='';
        } 
        function editproduct(ind){
            enameObj.value=row[ind].name
            epriceObj.value=row[ind].price
            edetailObj.value=row[ind].detail 
            openPopup();
            globalIndex=ind;
        }
        function saveproduct(){
            tmpObj={name:enameObj.value,price:epriceObj.value,detail:edetailObj.value}
            row[globalIndex]=tmpObj;
            closePopup();
            render();   
        }
        function cancelproduct(){
            closePopup();
        }
        function openPopup()
        {popup.style.display='block';}
        
        function closePopup()
        {popup.style.display='none';}
    </script>
</body>
</html>
<?php
include "menu.html";

?>