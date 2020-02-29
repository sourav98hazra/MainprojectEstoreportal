<?php
session_start();
$iid=$_GET['id'];
$uid=$_SESSION['email'];

if(isset($_SESSION['email']))
{
$conn= mysqli_connect("localhost","root","","store")or die(mysqli_errno($conn));
$query=" delete  from users_items where users_id=$uid and item_id=$iid;";
mysqli_query($conn, $query) or die("could not be deleted from cart ". mysqli_error($conn));
header('location:cart.php');
}
else
{
    echo 'no set;';
    header('location:main.php');
}