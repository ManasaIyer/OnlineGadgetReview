<?php
	session_start();
	require'config.php';
	error_reporting(E_ALL ^ E_NOTICE);

session_destroy();
echo "<script>alert('Logout was successful!🙂');window.location.href='index.html';</script>";
?>
