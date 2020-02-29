<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require 'includes/common.php';
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="webframeworks\bootstrap\css\bootstrap.css" type="text/css" />

    <script src="webframeworks\bootstrap\js\jquery-3.3.1.min.js" type="text/javascript"/>
    </script>

    <script src="webframeworks\bootstrap\js\bootstrap.js" type="text/javascript"/>
   </script>
   <link rel="stylesheet" type="text/css" href="index.css">
   <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  border-radius: 5px;
  margin: auto;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #111; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#ddd{
    color:red;
}
#ddd:hover{
    color: whitesmoke;
    transition: 0.5s;
}

</style>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
    </head>
    <body>
        
        
        <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#" style="color:white;"><h2>My Dashboard</h2></a>
  <a href="#">My Profile</a>
  <a href="#">Sign Out</a>
  <a href="#">About</a>
</div>

        <?php include 'includes/getdata.php' ?>

<div id="main">
           <div class="navbar navbar-inverse navbar-static-top"> 
    <div class="container-fluid">
        <div class="navbar-header"> 
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> 
                <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
            </button> 
            <a class="navbar-brand" href="sellerdash.php">Lifestyle Store</a> 
            <span id="ddd" style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776; </span>
        </div> 
        <div class="collapse navbar-collapse" id="myNavbar"> 
            <ul class="nav navbar-nav navbar-right"> 
                <?php if (isset($_SESSION['email'])) { ?> 
                <li ><a style="color:white;">Welcome <?php getname() ?></a></li>
                <li><a href = "#"><span class = "glyphicon glyphicon-shopping-cart"></span> Items </a></li> 
                <li><a href = "setting.php"><span class = "glyphicon glyphicon-user"></span> Settings</a></li> 
                <li><a href = "logout.php"><span class = "glyphicon glyphicon-log-in"></span> Logout</a></li>  
                    <?php } else { ?> 
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> 
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
                    <?php } ?> 
            </ul> 
        </div> 
    </div> 
</div>
        
        <div class="row">
            <div class="col-sm-4" >
                     
                <a href="additems.php" style="color:inherit"> <div class="card">
  <img src="https://www.freeiconspng.com/uploads/add-item-icon-orange-1.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Add Item</b></h4> 
    <p>Add an item to your store.</p> 
  </div>
                    </div> </a> 
       
            </div>
    <div class="col-sm-4" >
                     
                <a href="ordersrecieved.php" style="color:inherit"> <div class="card">
  <img src="https://getdrawings.com/free-icon/order-management-icon-51.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Orders Manager</b></h4> 
    <p>Manage all the Orders </p> 
  </div>
                    </div> </a> 
       
            </div>
     <div class="col-sm-4" >
                     
                <a href="updateitems.php" style="color:inherit"> <div class="card">
  <img src="https://cdn3.iconfinder.com/data/icons/e-commerce-trading/512/items-512.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Items Edit</b></h4> 
    <p>Edit and details of item</p> 
  </div>
                    </div> </a> 
       
            </div>
  </div>
       
   
            <?php
                include 'includes/footer.php';
                ?>
</div>
    </body>
</html>
