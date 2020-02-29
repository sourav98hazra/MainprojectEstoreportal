<?php

function getname()
{    
$uid=$_SESSION['email'];
    $conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
$query="select name from users where id='$uid'";
$results= mysqli_query($conn, $query);
$rows= mysqli_fetch_array($results);
$r=$rows['name'];
echo $r;
}

