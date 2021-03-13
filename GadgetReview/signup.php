<?php
require'config.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
if(isset($_POST['signup']))
{
$name = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['passward'];
$confirmpass = $_POST['cpassward'];
$image=$_POST['image'];

if(empty($image)) {
  $image="avatar.png";
}
  $emailquery="SELECT * FROM `login` WHERE `email`='$email' ";
  $query=mysqli_query($con,$emailquery);
  $emailcount = mysqli_num_rows($query);
  if($emailcount>0)
  {
    echo "<script>alert('Email already exists⚠️');window.location.href='index.html';</script>";
  }
  else {
    if($password==$confirmpass)
    {
      $sql = "INSERT INTO `login`(`name`, `email`, `password` , `phone`,`image`) VALUES('$name','$email','$password','$phone','$image')";
      $result = mysqli_query($con, $sql);
    }
    else
    {
          echo "<script>alert('Passwords does not match⚠️');window.location.href='index.html';</script>";
    }
    if($result)
    {
    	echo "<script>alert('Sign up was successful!🙂');window.location.href='index.html';</script>";
    }
    else
    {
    	echo "<script>alert('SignUp was Unsuccessful😕');window.location.href='index.html';</script>";
    }
  }
}
 ?>
