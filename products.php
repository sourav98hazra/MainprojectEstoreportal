 <?php
    require 'includes/common.php';
    ?>
<html>
  <head>
    <title>Check Out The Products</title>
    <link rel="stylesheet" href="webframeworks\bootstrap\css\bootstrap.css" type="text/css" />

    <script src="webframeworks\bootstrap\js\jquery-3.3.1.min.js" type="text/javascript"/>
    </script>

    <script src="webframeworks\bootstrap\js\bootstrap.js" type="text/javascript"/>
   </script>
   <style>
       img {
    max-width: 600px;
    max-height: 470px;
}
#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myUL {
  /* Remove default list styling */
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd; /* Add a border to all links */
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6; /* Grey background color */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove default text underline */
  font-size: 18px; /* Increase the font-size */
  color: black; /* Add a black text color */
  display: block; /* Make it into a block element to fill the whole list */
}

#myUL li a:hover:not(.header) {
  background-color: #eee; /* Add a hover effect to all links, except for headers */
}
   </style>
   <script>
      
function myFunction() {
  // Declare variables
  document.getElementById("myUL").style.display="block";
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}


</script>
   <link rel="stylesheet" type="text/css" href="index.css">
   
     
   
  </head>
  <body>
            <?php
                include 'includes/header.php';
                ?>
      
       <?php
      include 'includes/buttoncode.php';
     
      ?>
     
     
       <div class="container" id="content">

            <!-- Jumbotron Header -->
            <div class="jumbotron home-spacer" id="products-jumbotron">
                <h1>Welcome to our Lifestyle Store!</h1>
                <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>

            </div>
            <hr>
            <form method="post"action="products.php">         
  <div class="input-group">
     
    <div class="input-group-btn">
        <input type="text" class="form-control" id="myInput" name="sname" onkeyup="myFunction()" placeholder="Search for names..">
        <input class="btn btn-default" class="form-control" type="submit" >
    </div>
  </div>
            </form>

            
           

            <ul id="myUL" style="display:none">
      <?php
            $conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
            $sql = "SELECT product_name FROM items";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
                <li onclick="document.getElementById('myInput').value='<?php echo $row['product_name'] ?>';document.getElementById('myUL').style.display='none';"><a href="#"><?php echo $row['product_name'] ?></a></li>
  

              <?php
}}
mysqli_close($conn);
            ?>
  </ul>
            <hr>
            
            <?php
            $conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
            if(empty($_POST['sname']))
            {
            $sql = "SELECT * FROM items";
            }
        else {
            $sql = "SELECT * FROM items where product_name='{$_POST['sname']}';";
            
}
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
            
    
            <div class=" text-center"  id="<?php echo $row['product_name'] ?>" class="products">
                
                    <div class="thumbnail">
                        <img src="<?php echo $row['images']?>" alt="" >
                        <div class="caption">
                            <h2><?php echo $row['product_name'] ?></h2>(<?php echo $row['product_brand'] ?>)
                            <p>Rs. <?php echo '<del>'.$row['retail_price'].'</del>' ?> <?php echo $row['discounted_price'] ?> </p>
                            <p style="text-align: center;"><b>Description:</b><br><center><?php echo $row['description'] ?></center></p>
                            <?php setbtn($row['pid']); //takes care of the button acoording to status and login ?>
                        </div>
                    </div>
                
            </div>
   
            
            
            <?php
       
    }
}
mysqli_close($conn);
            ?>
           
		<?php
                include 'includes/footer.php';
                ?>
</body>
</html>