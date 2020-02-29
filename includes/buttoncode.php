<?php
include 'includes/check_if_added.php';
function setbtn($id)
{
    if(!isset($_SESSION['email']))
    {
     echo  '<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>';
    }
       else {
           if(check_if_added($id))
           {
               echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
           }
           else {
           echo '<a href="cart_add.php?id='.$id.'" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>';
           }
       }
    
}
