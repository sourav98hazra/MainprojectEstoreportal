
<?php

include 'includes/common.php.';

$user= $_POST['email'];
$pwd=md5($_POST['pwd']);

$conn= mysqli_connect("localhost","root","","store")or die(mysqli_err($conn));
$query="select password,name,id,usertype from users where email='$user';";
$result= mysqli_query($conn, $query)or die(mysqli_error($conn));
$row= mysqli_fetch_array($result);

if(mysqli_num_rows($result)==0)
{
  header('location:signup.php');
}
else
{
if ($row['password']==$pwd)
{ 
     
 $_SESSION['email']=$row['id'];
 $_SESSION['utype']=$row['usertype'];
 if($row['usertype']=="Buyer")
 header('location:products.php');
 else
 header('location:sellerdash.php');
     

}
else {
 header('location:login.php?alert=invalid password please try again');   
}}

