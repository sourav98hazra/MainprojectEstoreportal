<?php include 'includes/getdata.php' ?>
<div class="navbar navbar-inverse navbar-static-top"> 
    <div class="container">
        <div class="navbar-header"> 
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> 
                <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
            </button>
            <?php if (isset($_SESSION['email'])) { ?> 
             <?php  if($_SESSION['utype']=='Buyer'){ ?>
            <a class="navbar-brand" href="main.php">Lifestyle Store</a> 
             <?php } ?>
              <?php  if($_SESSION['utype']=='Seller'){ ?>
            <a class="navbar-brand" href="sellerdash.php">Lifestyle Store</a> 
            <?php } } else {
     echo '<a class="navbar-brand" href="#">Lifestyle Store</a> ';
 }?>
        </div> 
        <div class="collapse navbar-collapse" id="myNavbar"> 
            <ul class="nav navbar-nav navbar-right"> 
                <?php if (isset($_SESSION['email'])) { ?> 
                <li ><a style="color:white;">Welcome <?php getname()?></a></li>
                
                <?php  if($_SESSION['utype']=='Buyer'){ ?>
                <li><a href = "cart.php"><span class = "glyphicon glyphicon-shopping-cart"></span> Cart </a></li> 
                <?php }?>
           
                 <?php if ($_SESSION['utype']=='Seller') { ?>
                <li><a href = "updateitems.php"><span class = "glyphicon glyphicon-shopping-cart"></span> Item's </a></li>
                <?php } ?>
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