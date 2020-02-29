 <?php
    require 'includes/common.php';
    if (isset($_SESSION['email']) && ($_SESSION['utype']=='Buyer')) 
        { 
        header('location: products.php'); 
        }
         if (isset($_SESSION['email']) && ($_SESSION['utype']=='Seller')) 
        { 
        header('location: products.php'); 
        }
    ?>
  
<html>
   <head>
    <title>LIFESTYLE STORE | WELCOME E-COMMERCE WITH SCALE&STYLE</title>
    <link rel="stylesheet" href="webframeworks\bootstrap\css\bootstrap.css" type="text/css" />

    <script src="webframeworks\bootstrap\js\jquery-3.3.1.min.js" type="text/javascript"/>
    </script>

    <script src="webframeworks\bootstrap\js\bootstrap.js" type="text/javascript"/>
   </script>
   <link rel="stylesheet" type="text/css" href="index.css"/>
  </head>
  <body>
		<?php
                include 'includes/header.php';
                ?>

	<div id="banner_image">
		<div class="container">
			<div id="banner_content">
				<div class="text-center" style="background-color: transparent;">
					<h1>We let Sell Products and Buy products together</h1>
					<p style="word-spacing: 0.3em;letter-spacing:1.5px;">Portal to Business and Sale</p>
				</div>
                            <a class="btn btn-danger btn-lg active" href="products.php">Shop Now</a>
			</div>
		</div>
		</div>
<b>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
                            <a href="products.php#c">
				<div class="thumbnail">
				<img src="camera.jpg" class="img-thumbnail" style="width: 110%; height:36%;">
				<div class="caption" >
				<h3 class="text-center" >CAMERAS</h3>
				<p class="text-center">Choose The Best Available In The World</p>
				</div>
			    </div>
			</a>
			</div>
			<div class="col-md-4">
                            <a href="products.php#w">
				<div class="thumbnail">
				<img src="watch.jpg" class="img-thumbnail" style="width: 110%; height:36%;">
				<div class="caption" >
				<h3 class="text-center">WATCHES</h3>
				<p class="text-center">Original Watches From Best Brands</p>
			    </div>
				</div>
				</a>
		</div>
			<div class="col-md-4">
				<a href="products.php#s">
				<div class="thumbnail" >
				<img src="shirt.jpg" class="img-thumbnail" style="width: 110%; height:36%;">
				<div class="caption">
					<h3 class="text-center">SHIRTS</h3>
					<p class="text-center">Our Exclusive Collection Of Shirts</p>
				</div>
			    </div>
                                </a>
			</div>
		</a>
		</div>
	</div>

</b>

		<?php
                include 'includes/footer.php';
                ?>
	
  </body>
</html>