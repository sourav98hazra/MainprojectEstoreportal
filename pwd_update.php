<?php
session_start();
$pwdold= md5($_POST['pwdold']);
$pwdnew=md5($_POST['pwdnew']);
$pwdrenew=md5($_POST['pwdrenew']);
$user_id=$_SESSION['email'];
if(isset($_SESSION['email']))
{
$conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
$query="select password from users where id=$user_id;";
$result=mysqli_query($conn, $query) or die("this is err ".mysqli_error($conn));
$row= mysqli_fetch_array($result);
$str="";
print_r($row);

if($row['password']==$pwdold)
{
    $query1="UPDATE users SET password='$pwdrenew' WHERE id='$user_id';";
    if(mysqli_query($conn, $query1)){
        $str="PASSWORD SUCESSFULLY UPDATED";
        header('location:products.php');
    }
 else {
        $str="PASSWORD DID NOT SUCESSFULLY UPDATE ". mysqli_error($conn); 
        header('location:setting.php?str='.$str);
    }
}
 else {
    $str="YOU HAVE ENTERED A INVALID PASSWORD , TRY AGAIN!";
    header('location:setting.php?str='.$str);
    
}
}
else
    echo 'notset';
    

