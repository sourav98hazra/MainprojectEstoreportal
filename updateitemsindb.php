<?php
error_reporting(E_ALL ^ E_WARNING); 

session_start();
$target="img/";
$fname=$_FILES["image"][name];

$ftmpname=$_FILES["image"][tmp_name];
if(!$fname)
{
    $destination=$_POST['selectedimage'];
}
else
{
$destination="img/".$fname;
}
$pname=$_POST['q3_productName'];
$pbrand=$_POST['q4_productsBrand'];
$pcat=$_POST['q5_productCategory'];
$prp=$_POST['q6_retailPrice'];
$pdp=$_POST['q7_discountedPrice'];
$pdesc=$_POST['q9_productDescription'];
$pid=$_POST['pid'];


$conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
$query="UPDATE `items` SET `product_name` = '{$pname}', `product_brand` = '{$pbrand}', `product_category` = '{$pcat}', `retail_price` = '{$prp}', `discounted_price` = '{$pdp}', `description` = '{$pdesc}',`images` = '{$destination}' WHERE `items`.`pid` = {$pid}; ";
mysqli_query($conn,$query) or die('<a href="index.php">goback</a> its an error!'.mysqli_error($conn));

move_uploaded_file($ftmpname, $destination);#or die("image upload not successfull,try again");

header('location:updateitems.php');