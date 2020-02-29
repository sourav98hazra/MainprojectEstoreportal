<?php
session_start();
$item_id=$_GET['id'];
$user_id=$_SESSION['email'];
$conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
$query="INSERT INTO users_items(users_id, item_id, status) values('$user_id', '$item_id', 'Added to cart')";
mysqli_query($conn, $query) or die("could not be added to cart ". mysqli_error($conn));
header('location:products.php');