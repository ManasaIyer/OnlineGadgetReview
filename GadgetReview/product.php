<?php
	require'config.php';
	session_start();

	if ($_SESSION['value'] != 'null') {
		$value=$_SESSION['value'];
		$_SESSION['value']='null';
	}
	else {
		$value= $_COOKIE['val'];
	}
	$sql = "SELECT * FROM `product` WHERE  `productname`='$value'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_num_rows($result);
	if($row)
  {
		$array = mysqli_fetch_row($result);
		$gimg=$array[5];
	}
else{
	echo "<script>window.location.href='notfound.php';</script>";
}
?>
<!DOCTYPE html>
 <html>
   <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>product</title>
     <link rel="stylesheet" href="css/nav.css">
     <link rel="stylesheet" href="css/product.css">
		 <link rel="stylesheet" href="/css/index.css">
   </head>
	 <style>
	 	.row{
			display: flex;
		}
		.imagesection{
  		position: sticky;
	  	top: 1rem;
			width: 50%;
			height: 100%;
			padding-top: 7%;
		}
		.bttn{
		  color: white;
		  background:#41aea9;
		  border: 0px;
		  width: 100px;
		  height: 30px;
		  font-size: 20px;
		  border-radius: 10px;
		  outline: none;
		}
		.btn{
			margin-left: 22%;
		  margin-top: 20px;
		  height: 45px;
		}
		.bttn:hover{
		  color: #41aea9;
		  background: white;
		  border: 1px solid #41aea9;
		  outline: none;
		}
		.description{
			width: 50%;
			height: 100%;
		}
		.content{
			padding-top: 10%;
			padding-left: 7%;
			padding-right: 7%;
			margin-right: 7%;
		}
		.block{
			border-bottom: 1px solid #b7b7a4;
		}
		.imgview{
			margin-top: 5%;
			width: 85%;
			height: 410px;
			padding-left: 7%;
		}
		.smallimg{
			width: 20%;
			height: 10%;
		}
		.dpcell{
				width: 6%;
		}
		.dp{
			width: 100%;
			height: 1.5%;
			padding: 0px;
			margin: 0px;
			border-radius: 50% ;
			border: 1px solid black;
		}
		.review{
			margin-top: 3%;
		}
		.name{
			padding-left: 10px;
			font-size: 18px;
		}
		.right1{
			float: right;
		}
		.reviewdetail{
			margin: 0px;
			padding: 0px;
			text-align: justify;
		}

		/* The Modal (background) */
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		  overflow:hidden;
		}

		/* Modal Content/Box */
		.modal-content {
		  color: #41aea9;
		  text-align: center;
		  background-color: #fefefe;
		  margin: 5% auto; /* 15% from the top and centered */
		  padding: 20px;
		  border: 1px solid #888;
		  width: 50%; /* Could be more or less, depending on screen size */
		}

		/* The Close Button */
		.close , .close2 {
		  color: #aaa;
		  float: right;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus,
		.close2:hover,
		.close2:focus {
		  color: black;
		  text-decoration: none;
		  cursor: pointer;
		}

		/*signin and login input*/
		.inp{
		  text-align: center;
		  width: 450px;
		  color: #41aea9;
		  font-size: 15px;
		  outline: none;
		  padding-top: 10px;
		  letter-spacing: 1px;
		  height: 40px;
		  border-style: solid;
		  border-width: 0px 0px 1.5px 0px;
		  border-color: #41aea9;
		  margin-top: 15px;
		}
		.editimg{
		  padding: 5px;
		  width: 200px;
		  height: 190px;
		  margin-top: 20px;
		  border-radius: 125px;
		  border: 1px solid #41aea9;
		}
		.logoimg{
			width: 100px;
			height: 100px;
			margin: 2%;
		}
		.logoimg:hover{
			transform: scaleY(1.1);
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
.rev
{
  margin: 2px;
  width: 100px;
  height: 100px;
  border: none;
}

	 </style>
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
         <li class="right m"><a href="profile.php">Profile</a></li>
				 <li class="right m">
 					<?php if($_SESSION['email'] == 'ancy@gmail.com')
 					{ ?>
 					<a href="ahome.php">Home</a></li>
 				<?php }  else { ?>
 							<a href="home.php">Home</a></li>
 				 <?php	} ?>
          <li class="right m">
						<form class="" action="search.php" method="post">
									 <input type="text" name="search" value="" placeholder="search" class="search">
									 <button type="submit" name="searchbutton" class="searchbtn">&#128269;</button>
							 </form>
         </li>
       </ul>
     </nav>

		 <div class="row">
			 <div class="imagesection">
				 <?php echo '<img class="imgview" src="img/'.$array[4].'" alt="">'?>
				 <?php if($_SESSION['email'] != 'ancy@gmail.com') { ?>
				 <center><button id= "ptBttn" class="btn bttn">Post</button></center>&nbsp;&nbsp;&nbsp;&nbsp;
			 <?php } ?>


			 </div>
			 <div class="description">
				 <div class="content">
						 <h1><?php echo $value; echo "<p class=right>₹".$array[2]."</p>";
						 $_SESSION['productname'] = $value;?></h1>
						 <?php
						 $r=$array[5];
						 for($i=0;$i<$r;$i++)
						 {?>
							&#11088;
						<?php }?>
						<br></br>
					 <div class="block">
						 <iframe width="420" height="315"
							<?php echo'src="https://www.youtube.com/embed/'.'?autoplay=1&mute=1">' ?>
							</iframe>
							</div>
							<div class="block">
						 <h3>Description</h3>
						 <?php $carry=explode("\n",$array[3]);
									 $c = count($carry);
									 for($i=0; $i<$c;$i++)
									 {
										 echo $carry[$i];
										 echo '<br>';
									 }?>
					 </div>
					 <div class="block">
					 	<h3>Reviews</h3>
						<?php
								$sql = "select * from review";
								$result = mysqli_query($con,$sql);
								while($row = mysqli_fetch_array($result))
							{
								if($row['pdt_id'] == $value)
								{
							?>
						<div class="review">
							<table>
								<tr>
									<td class="dpcell"><img style="width:30px;height:30px;" src="img/avatar.png" alt=""></td>
									<td class="name"><p><?php echo $row['user_id'];

				$v = $row['ratings'];
				for($i=0;$i<$v;$i++)
				{?>
					 &#11088;
		 <?php }?> </p></td>
								</tr>
							</table>
							<p class="reviewdetail"><?php $content = $row['review'];
								$carry=explode('\n',$content);
								for ($i=0; $i<count($carry);$i++)
								{
									echo $carry[$i];
								}

							?></p></p>
							<p ><?php
							if(empty($row['image']))
							{
								continue;
							}
							else
							 echo '<img class="rev" src="img/'.$row['image'].'" alt="">'?></p>
							<?php }
						} ?>
						</div>
		 </div>

		 <div id="pst" class="modal">
	 <!-- Modal content -->
	 <div class="modal-content">
		 <span class="close">&times;</span>
		 <h3 style="font-size:25px;">Review</h3>
		 <form class="signup" action="post.php" method="post">
					 <center><textarea id="msg" resize=none name="prev" style="border-color:#41aea9 ;color:#41aea9" rows="8" cols="80" required></textarea><br><br>
					 <input type="file" name="image" id="image" value="" accept="image/*" placeholder="editimg"></center><br><br>
					 <h3>Ratings</h3>
            <div class="ratings">
              <input type="checkbox" name="rating" id="star-1" value="5"><label for="star-1"></label>
              <input type="checkbox" name="rating" id="star-2" value="4"><label for="star-2"></label>
              <input type="checkbox" name="rating" id="star-3" value="3"><label for="star-3"></label>
              <input type="checkbox" name="rating" id="star-4" value="2"><label for="star-4"></label>
              <input type="checkbox" name="rating" id="star-5" value="1"><label for="star-5"></label>
            </div><br><br>
			 <center><button name="post" type="submit" class="bttn">Post</button></center>
		 </form>
	 </div>
 </div>
 <!-- The Modal -->
</div>
<script type="text/javascript">

function myFunction(value) {
	document.cookie = "val = " + value;
	location.href = 'product.php';
}
</script>
		 <script type="text/javascript">
		 var modal2 = document.getElementById("myModal2");

		 var bttn = document.getElementById("myBttn");

		 var span2 = document.getElementsByClassName("close2")[0];


		 bttn.onclick = function() {
		 modal2.style.display = "block";
		 }



		 span2.onclick = function() {
		 modal2.style.display = "none";
		 }


		 window.onclick = function(event) {
		 if (event.target == modal2) {
		   modal2.style.display = "none";
		 }
		 }
		 </script>
		 <script type="text/javascript">
		 	 // Get the modal
		 	 var modal = document.getElementById("pst");

		 	 // Get the button that opens the modal
		 	 var btn = document.getElementById("ptBttn");

		 	 // Get the <span> element that closes the modal
		 	 var span = document.getElementsByClassName("close")[0];

		 	 // When the user clicks on the button, open the modal
		 	 btn.onclick = function() {
		 		 modal.style.display = "block";
		 	 }

		 	 // When the user clicks on <span> (x), close the modal
		 	 span.onclick = function() {
		 		 modal.style.display = "none";
		 		 document.getElementById("prev").value = "";
		 		 document.getElementById("image").value = "";
		 	 }
		 	 // When the user clicks anywhere outside of the modal, close it
		 	 window.onclick = function(event) {
		 		 if (event.target == modal) {
		 			 modal.style.display = "none";
					 document.getElementById("prev").value = "";
					 document.getElementById("image").value = "";
		 		 }
		 	 }
		  </script>

   </body>
 </html>
