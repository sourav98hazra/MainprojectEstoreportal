<?php

$string = "Internshala";
$insert_query = "INSERT INTO users(name) VALUES('$string')";
$result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
echo "User successfully inserted";
?>