<?php
	session_start();
	require'config.php';
	error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
if(isset($_POST['post']))
{
$email =  $_SESSION['email'];
$pid =  $_SESSION['productname'];
$review = $_POST['prev'];
$image =  $_POST['image'];
$ratings =  $_POST['rating'];
$sql = "INSERT INTO `review`(`pdt_id`, `user_id`, `review` ,`image`, `ratings`) VALUES('$pid','$email','$review','$image','$ratings')";
$result = mysqli_query($con, $sql);
    if($result)
    {
    	echo "<script>alert('Review was added successfully!🙂');window.location.href='product.php';</script>";
    }
    else
    {
    	echo "<script>alert('We could not add your review😕');window.location.href='product.php';</script>";
    }
}
 ?>
