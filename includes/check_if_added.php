<?php
function check_if_added($itemid){
$conn= mysqli_connect("localhost","root","","store")or die(mysqli_error($conn));
$uid=$_SESSION['email'];
$query="select * from users_items where item_id='$itemid' and users_id='$uid' and status='Added to cart'";    
$result= mysqli_query($conn, $query);
if(mysqli_num_rows($result)>0)
{
    return 1;
}
else
{
    return 0;
    
}
}