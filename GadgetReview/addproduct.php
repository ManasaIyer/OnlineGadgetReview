<?php
require'config.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
if(isset($_POST['ADD']))
{
$name = $_POST['ProductName'];
$rate = $_POST['rating'];
$image = $_POST['prodimage'];
$price = $_POST['price'];
$desp = $_POST['desp'];
$type = $_POST['producttype'];
if(empty($image)) {
  echo "<script>alert('Please upload a picture');window.location.href='ahome.php';</script>";
}
else{
  $idquery="SELECT * FROM `product` WHERE `productname`='$name' ";
  $query=mysqli_query($con,$idquery);
  $idcount = mysqli_num_rows($query);
  if($idcount>0)
  {
    echo "<script>alert('ID already exists⚠️');window.location.href='ahome.php';</script>";
  }
  else {

      $sql = "INSERT INTO `product`(`productname`,`producttype`,`price`,`description`,`productimage`,`ratings`) VALUES('$name','$type','$price','$desp','$image','$rate')";
      $result = mysqli_query($con, $sql);
    if($result)
    {
      echo "<script>alert('Product was added successfuly!🙂');window.location.href='ahome.php';</script>";
    }
    else
    {
      echo "<script>alert('Unsuccessful😕');window.location.href='ahome.php';</script>";
    }
  }
}
}
 ?>
