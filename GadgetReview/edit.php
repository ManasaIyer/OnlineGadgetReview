<?php
	session_start();
	require'config.php';
	error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
if(isset($_POST['edit']))
{
  $email =$_SESSION["email"];
  $phone = $_POST['number'];
  $name = $_POST['username'];
  $image=$_POST['image'];
  $password = $_POST['password'];
  if(empty($image)) {
    $image=$_SESSION['image'];
  }
  if(empty($phone)) {
    $phone=$_SESSION['phone'];
  }
  if(empty($name)) {
    $name=$_SESSION['name'];
  }
if(empty($password))
{
	$password =$_SESSION['password'];
}
  $sql = "UPDATE `login` SET `name`='$name', `phone`='$phone', `image`='$image' , `password`='$password' WHERE `email`='$email'";
  $result = mysqli_query($con, $sql);
  if ($result)
  {
  $_SESSION['name']=$name;
  $_SESSION['phone']=$phone;
  $_SESSION['image']=$image;
  echo "<script>alert('Update was successful!🙂');window.location.href='profile.php';</script>";
  }
 else {
  echo "Error updating record: ";
}
}
?>
