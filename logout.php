<?php
session_start();
if(!isset($_SESSION['email']))
{
    header('location:main.php');
}
 else {
    session_destroy();
    header('location:main.php');
}