<?php
	error_reporting(0);
	session_start();
  require'config.php';

	$_SESSION['value']='null';
?>
<!-- ADMIN HOMEPAGE HTML VERSION -->
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gadget Review</title>
	<link rel="stylesheet" href="css/nav.css">
		<link rel="stylesheet" href="css/home1.css">
    <link rel="stylesheet" href="css/index.css">
    <style media="screen">
    .btn1{
      height: 40px;
      width: 170px;
      margin: 0;
    }
    .bttn1{
      color: white;
      background:#41aea9;
      border: 0px;
      width: 200px;
      height: 30px;
      font-size: 20px;
      border-radius: 10px;
      outline: none;
    }
    .bttn1:hover{
      font-weight: bold;
    	outline: none;
    }
    nav ul
    {
      margin-right: 20px;
      padding: 5px;
    }
		.ratings
{
	 font-size: 40px;
	 direction: rtl;

}
.ratings input
{
	display : none;
}
.ratings  label
{
	display: inline-block;
	cursor: pointer;
	position: relative;
	padding: 15px;

}
.ratings  label:before
{
	content :'\2605';
	color:black;
	position: absolute;
	top: 0;
	left:0;
}
.ratings label:after
{
	content :'\2605';
	color: #41aea9;
	position: absolute;
	display: inline-block;
	top: 0;
	left:0;
	opacity: 0;
	transition: .5s;
	text-shadow: 0 2px 5px rgba(0,0,0,.5);
}

.ratings label:hover:after,
.ratings label:hover ~ label:after,
.ratings label:hover ~ input:checked ~label:after,
.ratings input:checked ~ label:after
{
	opacity : 1;

}
select
{
  border : 1px solid #41aea9;
  border-radius: 05px;
  padding : 10px 10px 10px 10px;
}
.col1 img
{
  width:300px;
  height:200px;
  border-radius:0px;
}
    </style>
</head>

<body>

  <nav role="navigation">
    <ul>
      <li class="m" style="font-size:28px; font-style:italic; font-weight:bold;">Gadget Review</li>
      <li class="right">
        <div class="dropdown">
          <?php echo '<img class="profilepic" src="img/'.$_SESSION['image'].'" alt="">'?>
          <div class="dropdown-content">
            <button type="button" class="drop" onclick="window.location.href='profile.php';" name="button"><?php echo $_SESSION['email']?></button>
            <button type="button" class="drop" onclick="window.location.href='logout.php';" name="button">log out</button>
          </div>
        </div>
      </li>
      <li class="right m"><a href="profile.php">Profile</a></li>
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
        </div>
      </li>
			<li class="right m"><button id="abtn" class="btn1 bttn1"> Add product</button></li>
        <li class="right m"><a href="ahome.php">Home</a></li>
        <li class="right m">
					<form class="" action="search.php" method="post">
                <input type="text" name="search" value="" placeholder="search" class="search">
                <button type="submit" name="searchbutton" class="searchbtn">&#128269;</button>
            </form>
        </li>


        <!-- The Modal -->
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
						echo ' <p> ₹'.$row['price'].'</p>';
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
						echo ' <p>'.$row['price'].'</p>';
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
</div>
  <!-- Add product -->
  <br>
</br>
<div style="  text-align: center;" class="button">
  <button id="abtn1" class="btn1 bttn"> Add product</button>
</div>
<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
      <span class="close">&times;</span>
      <center><h2>Product</h2></center>
      <form class="signup" action="addproduct.php" method="post">
        <div class="row">
          <div class="col2">
            <h2>Upload Picture</h2>
            <img class="editimg" src="img/avatar.png" alt=""><br>
            <input type="file" name="prodimage" id="image" value="" accept="image/*" placeholder="editimg">
          </div>
          <div class="col2">
            <input type="text" id="prname" name="ProductName" class="inp" placeholder="ProductName" required><br>
						<br></br>
					   <label style ="float:left; font-size:20px;">Product type:</label>
							<select style='float:left;' name="producttype">
							<option value="">--Select--</option>
							<option value="Mobiles and Tablets">Mobiles and Tablets</option>
							<option value="Laptop">Laptop</option>
							<option value="Camera">Camera</option>
							<option value="Speakers and headphones">Speakers and headphones</option>
							<option value="Storage devices">Storage devices</option>
						</select>
						<br>
						<input type="number" id="price" name="price" class="inp" placeholder="Price" required><br>
						<br>
						<center><textarea id="msg1" resize=none name="desp" style="border-color:#41aea9 ;color:#41aea9" rows="10" cols="50"  required></textarea><br>
            <h2>Ratings</h2>
            <div class="ratings">
              <input type="radio" name="rating" id="star-1" value="5"><label for="star-1"></label>
              <input type="radio" name="rating" id="star-2" value="4"><label for="star-2"></label>
              <input type="radio" name="rating" id="star-3" value="3"><label for="star-3"></label>
              <input type="radio" name="rating" id="star-4" value="2"><label for="star-4"></label>
              <input type="radio" name="rating" id="star-5" value="1"><label for="star-5"></label>
            </div>
						       <button name="ADD" type="submit" class="btn bttn">ADD</button>
          </div>
        </div>
      </form>
    </div>
  </div>
	<script type="text/javascript">
	function Category(value) {
		document.cookie = "product = " + value;
		location.href = 'ahome.php';
	}
	function myFunction(value) {
		document.cookie = "val = " + value;
		location.href = 'product.php';
	}
	</script>

  <script type="text/javascript">
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("abtn");
    var btn1 = document.getElementById("abtn1");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
		var span1 = document.getElementsByClassName("close")[0];


    // When the user clicks on the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }
		btn1.onclick = function() {
			modal.style.display = "block";
		}


    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
        modal.style.display = "none";
      document.getElementById("prname").value = "";
      document.getElementById("pdtid").value = "";
      document.getElementById("star-1").checked = false;
      document.getElementById("star-2").checked = false;
      document.getElementById("star-3").checked = false;
      document.getElementById("star-4").checked = false;
      document.getElementById("star-5").checked = false;
    }
		span1.onclick = function() {
			modal.style.display = "none";
				modal.style.display = "none";
			document.getElementById("prname").value = "";
			document.getElementById("pdtid").value = "";
			document.getElementById("star-1").checked = false;
			document.getElementById("star-2").checked = false;
			document.getElementById("star-3").checked = false;
			document.getElementById("star-4").checked = false;
			document.getElementById("star-5").checked = false;
		}
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      document.getElementById("prname").value = "";
      document.getElementById("pdtid").value = "";
      document.getElementById("star-1").checked = false;
      document.getElementById("star-2").checked = false;
      document.getElementById("star-3").checked = false;
      document.getElementById("star-4").checked = false;
      document.getElementById("star-5").checked = false;
      }
    }
  </script>
</body>
</html>
