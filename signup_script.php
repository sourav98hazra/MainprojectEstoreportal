<?php
session_start();

$name =$_POST['name'];
$email =$_POST['email'];
$pwd=md5($_POST['pwd']);
$contact=$_POST['contact'];
$city=$_POST['city'];
$address =$_POST['address'];
$utype=$_POST['utype'];

$conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));

$query1="select id from users where email='$email'";
$results=mysqli_query($conn,$query1) or die('<a href="signup.php">goback</a> its an error!'.mysqli_error($conn));
$row= mysqli_fetch_array($results);
if(mysqli_num_rows($results)>0)
{
    die(('cant be registered <a href="signup.php">goback and try again</a> the email is registered already!'.mysqli_error($conn)));
}
else {
$query="insert into users(name,email,password,contact,city,address,usertype) values('$name','$email','$pwd','$contact','$city','$address','$utype');";

mysqli_query($conn,$query) or die('<a href="main.php">goback</a> its an error!'.mysqli_error($conn));
echo 'inserted sucessfully';
echo ' thank you '.$name." for registering with email ".$email."<br><a href='form.php' >goback</a>"."<br><a href='login.php' >go for login</a>";
$query2="select id,usertype from users where email='$email'";
$result=mysqli_query($conn,$query2) or die('<a href="signup.php">goback</a> its an error!'.mysqli_error($conn));
$row= mysqli_fetch_array($result);
$_SESSION['email']=$row['id'];
$_SESSION['utype']=$row['usertype'];
header('location:products.php');
}




