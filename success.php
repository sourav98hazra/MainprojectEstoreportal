 <?php
    require 'includes/common.php';
    ?>
<?php


if(isset($_SESSION['email']))
{
    $user=$_SESSION['email']; 

$conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
$query="UPDATE users_items ui SET status='Requested merchant' WHERE ui.users_id='$user' and status='Added to cart';";
$query1="SELECT id,name,contact from users where id='$user';";
$result= mysqli_query($conn,$query1);
$row= mysqli_fetch_array($result);
echo "<script>console.log(".$row[0].");</script>";
$uid=$row[0];
$uname=$row[1];
$upno=$row[2];
    /* @var $uid type */
    $sms="Dear $uname with id $uid , your recent order with item id's  {$_SESSION['uc']} is in the process (confirmation will be coming soon) and amount of RS.{$_SESSION['t']}' to be confirmed,Thankyou!";
    
if(mysqli_query($conn, $query))
{
    $str='Your order is to be confirmed by merchant soon. Thank you for shopping
with us.<a href="products.php"> Click here </a>to purchase any other item.';
    $msg="this is confirmed!";
    
    echo '<html>
        <?php
 header("Access-Control-Allow-Origin: *");?>
    <body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

  var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://api.msg91.com/api/sendhttp.php?route=4&sender=LIFEIN&mobiles=+91 '.$upno.'&authkey=270947AKk59bQmVFN5ca63916&message='.$sms.'&country=91",
  "method": "GET",
  "headers": {}
};

$.ajax(settings).done(function (response) {
  alert(response);
});


</script>
</body>
</html>';
    
 
    
}
 else {
    $str='Order Could not be placed <a href="products.php">Go Back</a> and Try again! ';
}

}
else
{
    header('location:main.php');  
}
?>
<html>
  <head>
    <title>ORDER TO BE CONFIRMED SOON SUCCESSFULLY!</title>
    <link rel="stylesheet" href="webframeworks\bootstrap\css\bootstrap.css" type="text/css" />

    <script src="webframeworks\bootstrap\js\jquery-3.3.1.min.js" type="text/javascript"/>
    </script>

    <script src="webframeworks\bootstrap\js\bootstrap.js" type="text/javascript"/>
   </script>
   <link rel="stylesheet" type="text/css" href="index.css">
  </head>
  <body>
                <?php
                include 'includes/header.php';
                ?>


<div class="container">
<blockquote>
<?php echo $str; ?>
</blockquote>
</div>


    
		<?php
                include 'includes/footer.php';
                ?>
  </body>
  </html>


