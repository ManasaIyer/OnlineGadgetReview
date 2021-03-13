<?php
error_reporting(0);
session_start();
$_SESSION['value']='null';
	if(empty($_SESSION['email']))
		echo "<script>alert('Please log in');window.location.href='index.html';</script>";
		require'config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadget Review</title>
    <link rel="stylesheet" href="css/nav.css">
		  <link rel="stylesheet" href="css/home1.css">
</head>
  <body>

    <nav role="navigation">
      <ul>
        <li class="m" style="font-size: 28px;font-style: italic;font-weight: bold;">Gadget Review</li>
				<li class="right">
					<div class="dropdown">
	          <?php echo '<img class="profilepic" src="img/'.$_SESSION['image'].'" alt="">'?>
	          <div class="dropdown-content">
	            <button type="button" class="drop"  onclick="window.location.href='profile.php';" name="button"><?php echo $_SESSION['email']?></button>
	            <button type="button" class="drop"  onclick="window.location.href='logout.php';" name="button">log out</button>
	          </div>
	        </div></li>
        <li class="right m" style="font-size: 15px;">
        <li class="right m"><a href="profile.php" style="color: white;">Profile</a></li>
        <li class="right m" style="color: white;">
          <div class="dropdown">
            <span>Category</span>
						<div class="dropdown-content">
							<button type="button" class="drop" onclick="Category('Mobiles and Tablets');"name="button">Mobiles and Tablets</button>
							<button type="button" class="drop" onclick="Category('Laptop');" name="button">Laptop</button>
							<button type="button" class="drop" onclick="Category('Camera');" name="button">Camera</button>
							<button type="button" class="drop" onclick="Category('Speakers and headphones');" name="button">Speakers and headphones</button>
							<button type="button" class="drop" onclick="Category('Storage devices')" name="button">Storage devices</button>
							<button type="button" class="drop" onclick="Category('')" name="button">All</button>
						</div>
          </div></li>
        <li class="right m"><a href=""  style="color: white;"></a></li>
        <li class="right m"><a href="home.php" style="color: white;">Home</a></li>
         <li class="right m">
            <form class="" action="search.php" method="post">
                <input type="text" name="search" value="" placeholder="search" class="search">
                <button type="submit" name="searchbutton" class="searchbtn">&#128269;</button>
            </form>
        </li>
      </ul>
    </nav>
    <div class="categories">
     <div class="sm-cnt">
       <div class="row">
				 <?php
					$value= $_COOKIE['product'];
				 if($value == '')
				 {
					$sql = "select * from product";
					$result = mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{
						echo '<div class="col1 animateborder">';
							 echo '<img src="img/'.$row['productimage'].'" alt="Dell">';
							 echo '<center>';
							 echo ' <h4>'.$row['productname'].'</h4>';
							 $r=$row['ratings'];
								for($i=0;$i<$r;$i++)
								{
								 echo '&#11088;';
							 }
							echo ' <p>₹'.$row['price'].'</p>';
							echo '<button class="bttn" id="'.$row['productname'].'" onclick="myFunction(this.id)">view</button>';
							echo '</center>';
						echo '</div>';
					}
				 }
				 else {
					$value= $_COOKIE['product'];
					$sql = "select * from product where producttype='$value'";
					$value='';
					$result = mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{
						echo '<div class="col1 animateborder">';
							 echo '<img src="img/'.$row['productimage'].'" alt="Dell">';
							 echo '<center>';
							 echo ' <h4>'.$row['productname'].'</h4>';
							 $r=$row['ratings'];
								for($i=0;$i<$r;$i++)
								{
								 echo '&#11088;';
							 }
							echo ' <p>₹'.$row['price'].'</p>';
							echo '<button class="bttn" id="'.$row['productname'].'" onclick="myFunction(this.id)">view</button>';
							echo '</center>';
						echo '</div>';
					}
				 }
				 ?>
				 <script type="text/javascript">
				 function Category(value) {
					 document.cookie = "product = " + value;
					 location.href = 'home.php';
				 }
				 </script>
				 <script type="text/javascript">
				 function myFunction(value) {
				   document.cookie = "val = " + value;
				   location.href = 'product.php';
				 }
				 </script>
     </div>
	 </div>
   </div>
  </body>
</html>
