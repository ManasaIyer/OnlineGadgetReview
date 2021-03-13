<?php
require'config.php';
error_reporting(E_ALL ^ E_NOTICE);
session_start();

if(isset($_POST['searchbutton']))
{
$_SESSION['value'] = $_POST['search'];

echo "<script>window.location.href='product.php';</script>";
}


?>
