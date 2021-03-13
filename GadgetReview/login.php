<?php
	session_start();
	require'config.php';
	error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
if(isset($_POST['login']))
{
$email = $_POST['email1'];
$password = $_POST['passward1'];
  $sql = "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_num_rows($result);
  if($row==1)
  {
		if($email == 'ancy@gmail.com' && $password == 'ancy')
		{
			echo "<script>alert('Admin Login was successful!🙂');window.location.href='ahome.php';</script>";
			$_SESSION['email']=$email;
			$array = mysqli_fetch_row($result);
			$_SESSION['name']=$array[0];
			$_SESSION['phone']=$array[3];
			$_SESSION['password']=$array[2];
			$_SESSION['image']=$array[4];
		}
		else {
			$_SESSION['email']=$email;
			$array = mysqli_fetch_row($result);
			$_SESSION['name']=$array[0];
			$_SESSION['phone']=$array[3];
			$_SESSION['password']=$array[2];
			$_SESSION['image']=$array[4];
			echo "<script>alert('Login was successful!🙂');window.location.href='home.php';</script>";
		}

  }
  else {
        echo "<script>alert('Login was unsuccessful!😕');window.location.href='index.html';</script>";
  }

}
 ?>
